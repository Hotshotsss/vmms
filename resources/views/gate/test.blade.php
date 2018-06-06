@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Gate Test</div>

                <div class="card-body">
                test
              {!! Form::open(array('action'=>'GateController@indexGate','method'=>'post')) !!}
              <input type="text" name="name" class="input-group" placeholder="add name">
              <button type="submit" name="button">Submit</button>
              {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
