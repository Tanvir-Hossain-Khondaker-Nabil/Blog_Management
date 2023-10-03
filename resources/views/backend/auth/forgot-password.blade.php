@extends('backend.auth.layouts.master')

@section('title','Reset Password')
@section('content')
<div class="row d-flex justify-content-center mt-5">
        <div class="col-12 col-md-8 col-lg-6 col-xl-5">
            <div class="card py-3 px-2">
                <div class="division">
                    <div class="row">
                        <div class="col-3"><div class="line l"></div></div>
                        <div class="col-6"><h6>RESET PASSWORD</h6></div>
                        <div class="col-3"><div class="line r"></div></div>
                    </div>
                </div>
                <form class="myform" method="post" action="{{route('password.email')}}">
                    @csrf
                    <div class="form-group">
                        <input type="email" name="email" class="form-control mb-1" placeholder="email">
                        @error('email')
                        <code>*{{$message}}</code>
                        @enderror
                    </div>
                    <div class="row">
                        <div class="col-md-6 col-12 ">
                            <a href="{{route('login')}}">Login Here</a>                            
                        </div>
                        <div class="col-md-6 col-12 text-md-end">
                            <a href="{{route('register')}}">Register Here</a>                            
                        </div>
                    </div>
                    <div class="form-group mt-3">
                        <button type="submit" class="btn btn-block btn-primary btn-lg"><small><i class="far fa-user pr-2"></i>Reset Password</small></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection