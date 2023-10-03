@extends('backend.auth.layouts.master')

@section('title','Register')
@section('content')
<div class="row d-flex justify-content-center mt-5">
        <div class="col-12 col-md-8 col-lg-6 col-xl-5">
            <div class="card py-3 px-2">
                <div class="division">
                    <div class="row">
                        <div class="col-3"><div class="line l"></div></div>
                        <div class="col-6"><h6>REGISTER</h6></div>
                        <div class="col-3"><div class="line r"></div></div>
                    </div>
                </div>
                <form class="myform" method="post" action="{{route('register')}}">
                    @csrf
                    <div class="form-group">
                        <input type="name" name="name" class="form-control mb-1" placeholder="name">
                        @error('name')
                        <code>*{{$message}}</code>
                        @enderror
                    </div>

                    <div class="form-group">
                        <input type="email" name="email" class="form-control mb-1" placeholder="email">
                        @error('email')
                        <code>*{{$message}}</code>
                        @enderror
                    </div>

                    <div class="form-group">
                        <input type="password" name="password" class="form-control mb-1" placeholder="password">
                        @error('password')
                        <code>*{{$message}}</code>
                        @enderror
                    </div>

                    <div class="form-group">
                        <input type="password" name="password_confirmation" class="form-control mb-1" placeholder="password confirmation">
                        @error('password')
                        <code>*{{$message}}</code>
                        @enderror
                    </div>

                    <div class="row">
                        <div class="col-md-6 col-12 ">
                            <a href="{{route('login')}}">Login Here</a>                            
                        </div>
                        <div class="col-md-6 col-12 text-md-end">
                            <a href="{{route('password.request')}}">Reset Here</a>                            
                        </div>
                    </div>
                    <div class="form-group mt-3">
                        <button type="submit" class="btn btn-block btn-primary btn-lg"><small><i class="far fa-user pr-2"></i>Register</small></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection