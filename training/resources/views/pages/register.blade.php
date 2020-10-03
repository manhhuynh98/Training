@extends('layouts.index')

@section('content')
        <div class="row no-gutters">
            <div class="col-8">
                <img src="images\bg.jpg" alt="" class="img-fluid">
            </div>
            <form class="col-4 p-5" method="POST" action="register">
                @csrf
                <h4 class="fw-300 c-grey-900 mB-40 ">Login</h4>
                <div class="form-group">
                <label for="exampleInputPassword1">Name</label>
                <input type="text" class="form-control" id="exampleInputPassword1" name="name">
                </div>
                <div class="form-group">
                <label for="exampleInputEmail1">Email address</label>
                <input type="email" class="form-control" name="email">
                </div>
                <div class="form-group">
                <label for="exampleInputPassword1">Password</label>
                <input type="password" class="form-control" id="exampleInputPassword1" name="pass">
                </div>
                <div class="form-group">
                <label for="exampleInputPassword1">Confirm Password</label>
                <input type="password" class="form-control" id="exampleInputPassword1" name="confirm">
                </div>
                <div class="form-group">
                    <label>Avarta</label>
                    <input type="file" name="image" id="" class="form-control">
                </div>
                <div class="row p-3">
                    <div class="col-8">
                        <a href="login">I have an account</a>
                    </div>
                    <button type="submit" class="btn btn-primary col-4 ">Register</button>
                </div>
            </form>
        </div>
@endsection
