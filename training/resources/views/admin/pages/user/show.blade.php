@extends('admin.layouts.index')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Users</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <a href="admin/user/add"><button class="btn btn-success">Add</button></a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($user as $item)
                            <tr>
                                <td>{{ $item->name }}</td>  
                                <td>{{ $item->email }}</td>
                                <td>
                                    <a href="admin/user/edit/{{$item->id}}" class="btn btn-primary btn-sm mr-3"><span class="fas fa-edit fa-fw"></span></a>
                                    <a href="admin/user/delete/{{$item->id}}" class="btn btn-danger btn-sm"><span class="fas fa-trash fa-fw"></span></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $user->links() }}
            </div>
        </div>
    </div>
</div>

  <!-- /.container-fluid -->
@endsection