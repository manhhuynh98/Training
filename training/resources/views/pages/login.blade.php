@extends('layouts.index')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-8">
                <img src="images\bg.jpg" alt="" class="img-fluid">
            </div>
            <form class="col-4 p-5" method="POST" action="login">
                @csrf
                @if (session('messege')!=null)
                    <div class="alert alert-warning">
                        {{ session('messege') }}
                    </div>
                @endif
                <h4 class="fw-300 c-grey-900 mB-40 ">Login</h4>
                <div class="form-group">
                <label for="exampleInputEmail1">Email address</label>
                <input type="email" class="form-control" name="email">
                </div>
                <div class="form-group">
                <label for="exampleInputPassword1">Password</label>
                <input type="password" class="form-control" id="exampleInputPassword1" name="pass">
                </div>
                <div class="row p-3">
                    <div class="form-group form-check col-8">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1" name="remember">
                    <label class="form-check-label" for="exampleCheck1">Remember me</label>
                    </div>
                    <button type="submit" class="btn btn-primary col-4 ">Login</button>
                </div>
                <div class="row mt-4">
                    <div class="col-6">
                        <a href="">Forgot Your Password?</a>
                    </div>
                    <div class="col-6">
                        <a href="register">Create new account</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
