@extends('layouts.admin_layouts')

@section('title', 'Member Editing')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Member editing:
                    {{ $members['firstName'] . ' ' . $members['lastName'] }}
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
                        action="{{ route('member.update', $members['id']) }}"
                        method="POST"
                        novalidate
                        >
                        @csrf
                        @method('PUT')
                        <div class="card-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">First Name</label>
                                <input type="text" value="{{ $members['firstName'] }}"
                                    name="firstName" class="form-control" id="exampleInputEmail1"
                                    placeholder="Enter first name">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Last Name</label>
                                <input type="text" value="{{ $members['lastName'] }}"
                                    name="lastName" class="form-control" id="exampleInputEmail1"
                                    placeholder="Enter last name" >
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Birthdate</label>
                                <input type="date" value="{{ $members['birthdate'] }}"
                                    name="birthdate" class="form-control" id="exampleInputEmail1"
                                    placeholder="Enter birthdate" >
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Report Subject</label>
                                <input type="text" value="{{ $members['reportSubject'] }}"
                                    name="reportSubject" class="form-control" id="exampleInputEmail1"
                                    placeholder="Enter report subject" >
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Country</label>
                                <select name="countryId" class="form-control" id="" >
                                    @foreach($countries as $country)
                                        <option value="{{ $country['id'] }}" @if ($country['id'] == $members['countryId']) selected
                                        @endif>{{ $country['name'] }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Phone</label>
                                <input type="text" value="{{ $members['phone'] }}" name="phone"
                                    class="form-control" id="phone" placeholder="Enter phone" >        
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Email</label>
                                <input type="email" value="{{ $members['email'] }}" name="email"
                                    class="form-control" id="exampleInputEmail1" placeholder="Enter email address"
                                    >
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
