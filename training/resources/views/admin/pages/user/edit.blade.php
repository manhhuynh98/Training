@extends('admin.layouts.index')

@section('content')
    <div class="container">
        <div class="card col-8 ml-3">
            <div class="card-header">
                <h4>Add User</h4>
            </div>
            <div class="card-body">
                <form method="POST" action="admin/user/edit/{{$user->id}}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputEmail1">Name</label>
                    <input type="text" class="form-control" name="name" value="{{$user->name}}" id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Email</label>
                        <input type="email" class="form-control" name="email" value="{{$user->email}}" id="exampleInputPassword1">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Password</label>
                        <input type="password" class="form-control" name="pass" id="exampleInputPassword1">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Confirm Passrword</label>
                        <input type="password" class="form-control" id="exampleInputPassword1">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Role</label>
                        <select class="custom-select custom-select mb-3" name="role" 
                        @if ($user->role==0)
                            >
                            <option value="0" selected>User</option>
                            <option value="1">Admin</option>
                        </select>
                        @else
                            >
                            <option value="0">User</option>
                            <option value="1" selected>Admin</option>
                        </select>
                        @endif
                    </div>
                    <div class="form-group">
                        <label>Avarta</label>
                        <br>
                        <img src="upload/{{$user->image}}" alt="" style="width: 150px">
                        <input type="file" name="image" id="" class="form-control mt-2">
                    </div>
                    <button type="submit" class="btn btn-primary">Edit</button>
                </form>
            </div>
        </div>
    </div>
@endsection