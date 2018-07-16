<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>VMMS</title>

  <!-- Styles -->
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  <link rel="stylesheet" href="{{asset('css/sample.css')}}">
  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

  <!-- Optional theme -->

  <!-- Latest compiled and minified JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="{{asset('css/admin.css')}}">

</head>
<style media="screen">
  .container{
    position:absolute;bottom:70px;left:0;right:0;
  }
  .logoPng{
    width: 50%;
    margin-bottom: 0px;
  }
  @media(max-width:768px){
    .logoPng{
      width: 80%;
  margin-bottom: 0px;
    }
  }
  @media(max-width:1024px){
    .container{
      top:70px;bottom:0;left:0;right:0;
    }
  }
  @media(max-width:767px){
    body{
      background: white;
    }
    .container{
      top:20px;
    }
  }
</style>
<body>

  <div id="app">


          <main class="py-4">
            @yield('content')
          </main>
        </div>
      </body>
      <script src="{{ asset('js/app.js') }}"></script>
      </html>
