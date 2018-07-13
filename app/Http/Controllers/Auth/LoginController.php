<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Validation\ValidationException;
use Auth;
use Carbon\Carbon;
use App\EmployeeSchedule;
use App\Http\Helpers\TransHelper as Transearly;
class LoginController extends Controller
{
  use AuthenticatesUsers;
  protected $referrer;
  protected $type;

  /**
   * Show the application's login form.
   *
   * @return \Illuminate\Http\Response
   */
  public function showLoginForm()
  {
      return view('auth.login');
  }

  /**
   * Handle a login request to the application.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Http\JsonResponse
   *
   * @throws \Illuminate\Validation\ValidationException
   */
  public function login(Request $request)
  {
      $this->validateLogin($request);

      // If the class is using the ThrottlesLogins trait, we can automatically throttle
      // the login attempts for this application. We'll key this by the username and
      // the IP address of the client making these requests into this application.
      if ($this->hasTooManyLoginAttempts($request)) {
          $this->fireLockoutEvent($request);

          return $this->sendLockoutResponse($request);
      }

      if ($this->attemptLogin($request)) {
          return $this->sendLoginResponse($request);
      }

      // If the login attempt was unsuccessful we will increment the number of attempts
      // to login and redirect the user back to the login form. Of course, when this
      // user surpasses their maximum number of attempts they will get locked out.
      $this->incrementLoginAttempts($request);

      return $this->sendFailedLoginResponse($request);
  }

  /**
   * Validate the user login request.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return void
   */
  protected function validateLogin(Request $request)
  {
      $this->validate($request, [
          $this->username() => 'required|string',
          'password' => 'required|string',
      ]);
  }

  /**
   * Attempt to log the user into the application.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return bool
   */
  protected function attemptLogin(Request $request)
  {
      return $this->guard()->attempt(
          $this->credentials($request), $request->filled('remember')
      );
  }

  /**
   * Get the needed authorization credentials from the request.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return array
   */
  protected function credentials(Request $request)
  {
      // $request->request->add(['type'=>$this->type]);
      return $request->only($this->username(), 'password');
  }

  /**
   * Send the response after the user was authenticated.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  protected function sendLoginResponse(Request $request)
  {
      $request->session()->regenerate();

      $this->clearLoginAttempts($request);
      $var = $this->checkSched();

      if($var){
        return $this->authenticated($request, $this->guard()->user())
                ?: redirect()->intended($var);
      }

      return $this->autoLogout();

  }

  public function checkSched(){
    $assigned = null;
    if(auth()->user()->type !== 0){
      $now = Carbon::today();
      $time = Carbon::now()->format('H:i');

      $sched = EmployeeSchedule::where('user_id',auth()->user()->id)
      ->where(function ($query) use($now){
        $query->where('date_from','<=',$now)->where('date_to','>=',$now);
      })->where(function ($query) use($time){
        $query->where('time_in','<=',$time)->where('time_out','>=',$time);
      })->first();

      if($sched){
        $assigned = Transearly::redirect($sched->assigned_at);
        session()->put('user_type',$sched->assigned_at);
      }else{
        $assigned = null;
      }
    }else{
       $assigned = "/admin/home";
    }
    return $assigned;
  }

  /**
   * The user has been authenticated.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  mixed  $user
   * @return mixed
   */
  protected function authenticated(Request $request, $user)
  {
      //
  }

  /**
   * Get the failed login response instance.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Symfony\Component\HttpFoundation\Response
   *
   * @throws \Illuminate\Validation\ValidationException
   */
  protected function sendFailedLoginResponse(Request $request)
  {
      throw ValidationException::withMessages([
          $this->username() => [trans('auth.failed')],
      ]);
  }

  /**
   * Get the login username to be used by the controller.
   *
   * @return string
   */
  public function username()
  {
      return 'username';
  }

  /**
   * Log the user out of the application.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function logout(Request $request)
  {

      $this->guard()->logout();

      $request->session()->invalidate();

      return redirect('/');
  }


  public function autoLogout()
  {
      auth()->logout();

      session()->invalidate();

      return redirect('/')->withErrors(['notAllowed'=>trans('auth.notAuthorized')]);
  }
  /**
   * Get the guard to be used during authentication.
   *
   * @return \Illuminate\Contracts\Auth\StatefulGuard
   */
  protected function guard()
  {
      return Auth::guard();
  }
}
