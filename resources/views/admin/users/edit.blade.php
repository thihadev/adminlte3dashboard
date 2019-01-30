@extends('admin.layouts.master')

@section('title')
    User Management
@stop

@section ('style')

@stop

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            User Management
            <small>Edit User Form</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Edit User Form</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">

        @if(Session::has('flash'))
            <div class="alert alert-success alert-flash">
                <h4><i class="icon fa fa-check"></i> Success!</h4>
                {{Session::get('flash')}}
            </div>
        @endif


    <div class="row">
        <div class="col-md-6">
            <div class="box box-primary">
                <div class="box-body">
                    <form role="form" method="post" action="{{route('admin.users.update', $user->id)}}" enctype="multipart/form-data">
                        {{csrf_field()}}
                        {{method_field('PATCH')}}
                    
                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }} has-feedback">
                            <label for="name">User Name</label>
                            <input id="name" type="text" class="form-control" name="name" value="{{ $user->name }}" required autofocus>
                            @if ($errors->has('name'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                            @endif
                            <span class="glyphicon glyphicon-user form-control-feedback"></span>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }} has-feedback">
                            <label for="email">Email</label>
                            <input id="email" type="email" class="form-control" name="email"  value="{{ $user->email }}" required>
                            @if ($errors->has('email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                        </div>

                        <div class="form-group {{ $errors->has('role') ? ' has-error' : '' }} ">
                            <label for="role"><span class="fa fa-key"></span> Select Role</label>
                            <select id="role" name="role" class="select2 form-control" style="width: 100%;" required tabindex="-1" aria-hidden="true">
                                <option value="1" @if($user->role == 1) selected @endif>Admin</option>
                                <option value="2" @if($user->role == 2) selected @endif >User</option>
                            </select>
                            @if ($errors->has('role'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('role') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="row">
                            <div class="col-xs-4">
                                <button type="submit" class="btn btn-primary btn-block btn-flat">Update</button>
                            </div>
                            <!-- /.col -->
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- /.content -->
@stop

@section('footer-script')

@stop