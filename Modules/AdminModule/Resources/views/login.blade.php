@extends('adminmodule::layouts.authMaster')

@section('style')
    {{Html::style('assetsUi/css/login.css')}}
@endsection
@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-5 mx-auto">
                <div id="first">
                    <div class="myform form ">
                        <div class="logo mb-3">
                            <div class="col-md-12 text-center">
                                <h1>Login</h1>
                            </div>
                        </div>
                        {{Form::open([
                        'method'=>'post',
                        'route'=>'handleLogin',
                        ])}}
                        <div class="form-group">
                            <label>Username </label>
                            <input class="form-control" name="username" type="text" placeholder="type username .."
                                   value="{{old('username')}}">
                            <span class="text-danger">{{$errors->first('username')}}</span>
                        </div>
                        <div class="form-group">
                            <label for="">Password</label>
                            <input class="form-control" name="password" type="password" placeholder="type password .."
                                   value="{{old('username')}}">
                            <span class="text-danger">{{$errors->first('password')}}</span>
                        </div>
                        <div class="form-group">
                            <p class="text-center">By signing up you accept our <a href="#">Terms Of Use</a></p>
                        </div>
                        <div class="col-md-12 text-center ">
                            <button type="submit" class=" btn btn-block mybtn btn-primary tx-tfm">Login</button>
                        </div>
                        {{Form::close()}}

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
