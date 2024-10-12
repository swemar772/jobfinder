@extends('layouts.backend')
@section('title')
    Edit Permission
@endsection

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Edit Permission</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
              <li class="breadcrumb-item"><a href="{{ route('permissions.index') }}">Permissions</a></li>
              <li class="breadcrumb-item active">Edit Permission</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Info boxes -->
            {{-- <div class="row">
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box">
                        <span class="info-box-icon bg-info elevation-1"><i class="fas fa-cog"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">CPU Traffic</span>
                            <span class="info-box-number">
                                10
                                <small>%</small>
                            </span>
                        </div>
                    <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>

                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box mb-3">
                    <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-thumbs-up"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Likes</span>
                        <span class="info-box-number">41,410</span>
                    </div>
                    <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <div class="clearfix hidden-md-up"></div>

                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box mb-3">
                    <span class="info-box-icon bg-success elevation-1"><i class="fas fa-shopping-cart"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Sales</span>
                        <span class="info-box-number">760</span>
                    </div>
                    <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>

                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box mb-3">
                    <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-users"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">New Members</span>
                        <span class="info-box-number">2,000</span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
            </div> --}}

            </div>
            <div class="row">
                <div class="col-sm-12 col-md-6 col-lg-6">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="fw-bold float-left"><strong><i class="fa fa-edit" aria-hidden="true"></i> Edit Permission</strong></h3>
                            <a href="{{ route('permissions.index') }}" class="btn btn-primary float-right"><i class="fas fa-chevron-circle-left"></i> Back</a>
                        </div>

                        <div class="card-body">
                            <form action="{{ route('permissions.update',$permission->id) }}" method="POST">
                                @csrf

                                <input type="hidden" name="id" value="{{ $permission->id }}">

                                <div class="mb-3">
                                    <label for="name">Permission Name</label>
                                    <input type="text" name="name" value="{{ $permission->name }}" class="form-control @error('name') is-invalid @enderror" placeholder="Permission Name">
                                    @error('name')
                                        <span class="text-danger fw-bold">* {{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="groupby">Groupby</label>
                                    <input type="text" name="groupby" value="{{ $permission->groupby }}" class="form-control @error('groupby') is-invalid @enderror" placeholder="Groupby No">
                                    @error('groupby')
                                        <span class="text-danger fw-bold">* {{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <div class="form-group">
                                        <label for="status">Status</label>
                                        <select class="form-control" name="status">
                                            <option {{ $permission->status == 1 ? 'selected' : '' }} value="1">Active</option>
                                            <option {{ $permission->status == 0 ? 'selected' : '' }} value="0">Inactive</option>
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
            </div>
        </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->
</div>
@endsection
