@extends('layouts.backend')
@section('title')
    Edit User
@endsection

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Edit User</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
              <li class="breadcrumb-item"><a href="{{ route('users.index') }}">Users</a></li>
              <li class="breadcrumb-item active">Edit User</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12 col-md-6 col-lg-6">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="fw-bold float-left"><strong><i class="fa fa-edit" aria-hidden="true"></i> Edit User</strong></h3>
                            <a href="{{ route('users.index') }}" class="btn btn-primary float-right"><i class="fas fa-chevron-circle-left"></i> Back</a>
                        </div>

                        <div class="card-body">
                            <form action="{{ route('users.update',$user->id) }}" method="POST">
                                @csrf
                                <input type="hidden" name="id" value="{{ $user->id }}">
                                <div class="mb-3">
                                    <label for="name">Full Name</label>
                                    <input type="text" name="name" value="{{ $user->name }}" class="form-control @error('name') is-invalid @enderror" placeholder="Full Name">
                                    @error('name')
                                        <span class="text-danger fw-bold">* {{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="email">Email</label>
                                    <input type="text" name="email" value="{{ $user->email }}" class="form-control @error('email') is-invalid @enderror" placeholder="Email Address">
                                    @error('email')
                                        <span class="text-danger fw-bold">* {{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <div class="form-group">
                                        <label for="role">Role</label>
                                        <select class="form-control" name="role_id">
                                            @foreach ($roles as $role)
                                                <option {{ $role->id == $user->role_id ? 'selected' : '' }} value="{{ $role->id }}">{{ $role->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <div class="form-group">
                                        <label for="status">Status</label>
                                        <select class="form-control" name="status">
                                            <option {{ $user->status == 1 ? 'selected' : '' }} value="1">Active</option>
                                            <option {{ $user->status == 0 ? 'selected' : '' }} value="0">Inactive</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <button type="submit" class="btn btn-success float-right"><i class="fas fa-save" aria-hidden="true"></i> Update</button>
                                </div>
                            </form>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
                <div class="col-sm-12 col-md-6 col-lg-6">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="fw-bold float-left"><strong><i class="fa fa-lock" aria-hidden="true"></i> Change Password</strong></h3>
                            <a href="{{ route('users.index') }}" class="btn btn-primary float-right"><i class="fas fa-chevron-circle-left"></i> Back</a>
                        </div>

                        <div class="card-body">
                            <form action="{{ route('users.changepassword',$user->id) }}" method="POST">
                                @csrf
                                <input type="hidden" name="id" value="{{ $user->id }}">

                                <div class="mb-3">
                                    <label for="password">Password</label>
                                    <input type="password" name="password" value="{{ old('password') }}" class="form-control @error('password') is-invalid @enderror" placeholder="Password">
                                    @error('password')
                                        <span class="text-danger fw-bold">* {{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="password_confirmation">Confirm Password</label>
                                    <input type="password" name="password_confirmation" class="form-control @error('password_confirmation') is-invalid @enderror" placeholder="Confirm Password">
                                    @error('password_confirmation')
                                        <span class="text-danger fw-bold">* {{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <button type="submit" class="btn btn-success float-right"><i class="fas fa-save" aria-hidden="true"></i> Change</button>
                                </div>
                            </form>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
            </div>
        </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->
</div>
@endsection
