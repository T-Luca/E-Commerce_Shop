@extends('adminlte::page')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="row">
                <div class="col-lg-11 margin-tb">
                    <div class="pull-right">
                        <a class="btn btn-success" href="{{ route('user.add') }}"> Add User</a>
                    </div>
                </div>
            </div>
            <!-- Table content -->
            <section class="content">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Users Table</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table class="table table-bordered">
                            <tr>
                                <th style="width: 10px">ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Password</th>
                                <th>Role<br>a=1 u=0</th>
                                <th>Created at</th>
                                <th>Updated at</th>
                                <th style="width: 100px">Action</th>
                            </tr>

                            @foreach ($users as $user)
                                <tr>
                                    <td>{{ $user->id }} </td>
                                    <td>{{ $user->name }} </td>
                                    <td>{{ $user->email }} </td>
                                    <td>{{ $user->password }} </td>
                                    <td>{{ $user->role_id }} </td>
                                    <td>{{ $user->created_at }} </td>
                                    <td>{{ $user->updated_at }} </td>

                                    <td>
                                        <a href="{{ route('user.edit', $user->id) }}" class="label label-warning">Edit</a>
                                        <a href="{{ route('user.delete', $user->id) }}" class="label label-danger" onclick="return confirm('Are you sure to delete?')">Delete</a>
                                    </td>
                                </tr>
                            @endforeach

                        </table>
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer clearfix">
                        <ul class="pagination pagination-sm no-margin pull-right">
                            <li><a href="#">&laquo;</a></li>
                            <li><a href="#">1</a></li>
                            <li><a href="#">2</a></li>
                            <li><a href="#">3</a></li>
                            <li><a href="#">&raquo;</a></li>
                        </ul>
                    </div>
                </div>
                <!-- /.box -->
            </section>
        </div>
    </div>
@endsection