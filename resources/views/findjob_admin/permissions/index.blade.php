@extends('layouts.backend')
@section('title')
    Permissions
@endsection

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Permissions</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
              <li class="breadcrumb-item active">Permissions</li>
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
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="fw-bold float-left"><strong><i class="fas fa-shield-alt" aria-hidden="true"></i> Permission List</strong></h3>
                            @if (!empty($PermissionCreate))
                                <a href="{{ route('permissions.create') }}" class="btn btn-primary float-right"><i class="fa fa-plus-circle mr-1" aria-hidden="true"></i> Create</a>
                            @endif
                        </div>

                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="table" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Permission Name</th>
                                            <th>GroupBy</th>
                                            <th>Status</th>
                                            @if (!empty($PermissionShow) || !empty($PermissionEdit) || !empty($PermissionDelete))
                                                <th>Action</th>
                                            @endif
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($permissions as $permission)
                                            <tr>
                                                <td>{{ $permission->id }}</td>
                                                <td>{{ $permission->name }}</td>
                                                <td>{{ $permission->groupby }}</td>
                                                <td>
                                                    @if ($permission->status == 1)
                                                        <span class="badge bg-success">Active</span>
                                                    @else
                                                        <span class="badge bg-danger">Inactive</span>
                                                    @endif
                                                </td>
                                                @if (!empty($PermissionShow) || !empty($PermissionEdit) || !empty($PermissionDelete))

                                                    <td>
                                                        @if (!empty($PermissionShow))
                                                            <button type="button" class="btn btn-outline-info btn-sm mb-1 mt-1" data-toggle="modal" data-target="#showModal{{ $permission->id }}">
                                                                <i class="fa fa-eye" aria-hidden="true"></i>
                                                            </button>

                                                            <!-- Detail Modal -->
                                                            <div class="modal fade" id="showModal{{ $permission->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                                <div class="modal-dialog">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title" id="exampleModalLabel">{{ $permission->name }} <span class="text-secondary">Detail</span></h5>
                                                                            <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times" aria-hidden="true"></i></button>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <div class="mb-3">
                                                                                <div class="row">
                                                                                    <div class="col-sm-5">
                                                                                        <label for="name" class="text-muted">Permission Name : </label>
                                                                                    </div>
                                                                                    <div class="col-sm-7">
                                                                                        <span class="fw-bold">{{ $permission->name }}</span>
                                                                                    </div>
                                                                                </div>

                                                                                <div class="row">
                                                                                    <div class="col-sm-5">
                                                                                        <label for="status" class="text-muted">Status : </label>
                                                                                    </div>
                                                                                    <div class="col-sm-7">
                                                                                        @if ($permission->status == 1)
                                                                                            <span class="badge bg-success">Active</span>
                                                                                        @else
                                                                                            <span class="badge bg-danger">Inactive</span>
                                                                                        @endif
                                                                                    </div>
                                                                                </div>

                                                                                <div class="row">
                                                                                    <div class="col-sm-5">
                                                                                        <label for="name" class="text-muted">Created Date : </label>
                                                                                    </div>
                                                                                    <div class="col-sm-7">
                                                                                        <span class="fw-bold">{{ date('d-m-Y  g:i A', strtotime($permission->created_at))}}</span>
                                                                                    </div>
                                                                                </div>

                                                                                <div class="row">
                                                                                    <div class="col-sm-5">
                                                                                        <label for="name" class="text-muted">Updated Date : </label>
                                                                                    </div>
                                                                                    <div class="col-sm-7">
                                                                                        <span class="fw-bold">{{ date('d-m-Y  g:i A', strtotime($permission->updated_at))}}</span>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        @endif
                                                        @if (!empty($PermissionEdit))
                                                            <a href="{{ route('permissions.edit',$permission->id) }}" class="btn btn-outline-warning btn-sm mb-1 mt-1"><i class="fa fa-edit" aria-hidden="true"></i></a>
                                                        @endif

                                                        @if (!empty($PermissionDelete))
                                                            <a href="{{ route('permissions.delete',$permission->id) }}" onclick="confirmation(event)" class="btn btn-outline-danger btn-sm mb-1 mt-1"><i class="fa fa-trash-alt" aria-hidden="true"></i></a>
                                                        @endif
                                                    </td>

                                                @endif
                                            </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>#</th>
                                            <th>Permission Name</th>
                                            <th>GroupBy</th>
                                            <th>Status</th>
                                            @if (!empty($PermissionShow) || !empty($PermissionEdit) || !empty($PermissionDelete))
                                                <th>Action</th>
                                            @endif
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
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
