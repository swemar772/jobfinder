@extends('layouts.backend')
@section('title')
    Settings
@endsection

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Settings</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
              <li class="breadcrumb-item active">Settings</li>
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
                            <h3 class="fw-bold float-left"><strong><i class="fas fa-shield-alt" aria-hidden="true"></i> Setting List</strong></h3>
                            <a href="{{ route('settings.create') }}" class="btn btn-primary float-right"><i class="fa fa-plus-circle mr-1" aria-hidden="true"></i> Create</a>
                        </div>

                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="table" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Setting Name</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        {{-- @foreach ($settings as $setting)
                                            <tr>
                                                <td>{{ $setting->id }}</td>
                                                <td>{{ $setting->name }}</td>
                                                <td>
                                                    @if ($setting->status == 1)
                                                        <span class="badge bg-success">Active</span>
                                                    @else
                                                        <span class="badge bg-danger">Inactive</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    <button type="button" class="btn btn-outline-info btn-sm mb-1 mt-1" data-toggle="modal" data-target="#showModal{{ $setting->id }}">
                                                        <i class="fa fa-eye" aria-hidden="true"></i>
                                                    </button> --}}
                                                    <!-- Detail Modal -->
                                                    {{-- <div class="modal fade" id="showModal{{ $setting->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLabel">{{ $setting->name }} <span class="text-secondary">Detail</span></h5>
                                                                    <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times" aria-hidden="true"></i></button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <div class="mb-3">
                                                                        <div class="row">
                                                                            <div class="col-sm-5">
                                                                                <label for="name" class="text-muted">setting Name : </label>
                                                                            </div>
                                                                            <div class="col-sm-7">
                                                                                <span class="fw-bold">{{ $setting->name }}</span>
                                                                            </div>
                                                                        </div>

                                                                        <div class="row">
                                                                            <div class="col-sm-5">
                                                                                <label for="status" class="text-muted">Status : </label>
                                                                            </div>
                                                                            <div class="col-sm-7">
                                                                                @if ($setting->status == 1)
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
                                                                                <span class="fw-bold">{{ date('d-m-Y  g:i A', strtotime($setting->created_at))}}</span>
                                                                            </div>
                                                                        </div>

                                                                        <div class="row">
                                                                            <div class="col-sm-5">
                                                                                <label for="name" class="text-muted">Updated Date : </label>
                                                                            </div>
                                                                            <div class="col-sm-7">
                                                                                <span class="fw-bold">{{ date('d-m-Y  g:i A', strtotime($setting->updated_at))}}</span>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <a href="{{ route('settings.edit',$setting->id) }}" class="btn btn-outline-warning btn-sm mb-1 mt-1"><i class="fa fa-edit" aria-hidden="true"></i></a>
                                                    <a href="{{ route('settings.delete',$setting->id) }}" onclick="confirmation(event)" class="btn btn-outline-danger btn-sm mb-1 mt-1"><i class="fa fa-trash-alt" aria-hidden="true"></i></a>
                                                </td>
                                            </tr>
                                        @endforeach --}}
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>#</th>
                                            <th>Setting Name</th>
                                            <th>Status</th>
                                            <th>Action</th>
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
