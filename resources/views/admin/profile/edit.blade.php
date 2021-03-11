@extends('layouts.admin_layouts')

@section('title', 'Member Editing')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Profile editing:
                    {{ $profiles->user['firstName'] . ' ' . $profiles->user['lastName'] }}
                </h1>
            </div><!-- /.col -->
        </div><!-- /.row -->
        @if(session('success'))
            <div class="alert alert-success" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-check"></i>{{ session('success') }}</h4>
            </div>
        @elseif($errors->any())
            <div class="alert alert-danger" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card card-primary">
                    <!-- form start -->
                    <form
                        action="{{ route('profile.update', $profiles['id']) }}"
                        method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="card-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Company</label>
                                <input type="text" value="{{ $profiles['company'] }}"
                                    name="company" class="form-control" id="exampleInputEmail1"
                                    placeholder="Enter first name">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Position</label>
                                <input type="text" value="{{ $profiles['position'] }}"
                                    name="position" class="form-control" id="exampleInputEmail1"
                                    placeholder="Enter last name">
                            </div>
                            <div class="form-group">
                                <label>About Me</label>
                                <textarea class="form-control" rows="3" placeholder="Enter ..."
                                    name="aboutMe">{{ $profiles['aboutMe'] }}</textarea>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Photo</label>
                                <input type="file" name="photo"
                                    class="form-control" id="photo">
                            </div>

                            <div class="form-group">
                                <label for="">Hide</label>
                                <select name="hide" class="form-control">
                                    <option value="1" @if($profiles['hide']==1) selected @endif>
                                        True
                                    </option>
                                    <option value="0" @if($profiles['hide']==0) selected @endif>
                                        False
                                    </option>
                                </select>
                            </div>
                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>
<!-- /.content -->
@endsection
