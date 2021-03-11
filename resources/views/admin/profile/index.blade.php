@extends('layouts.admin_layouts');

@section('title', 'All members')

@section('content')

<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">All profiles</h1>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="card-body p-0">
            <table class="table table-striped projects">
                <thead>
                    <tr>
                        <th>
                            ID
                        </th>
                        <th>
                            Company
                        </th>
                        <th>
                            Position
                        </th>
                        <th>
                            About me
                        </th>
                        <th>
                            Photo
                        </th>
                        <th>
                            Member ID
                        </th>
                        <th>
                            Hide
                        </th>
                        <th style="width: 15%">
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($profiles as $profile)
                        <tr>
                            <td>
                                {{ $profile['id'] }}
                            </td>
                            <td>
                                {{ $profile['company'] }}
                            </td>
                            <td>
                                {{ $profile['position'] }}
                            </td>
                            <td>
                                {{ $profile['aboutMe'] }}
                            </td>
                            <td>
                                {{ $profile['photo'] }}
                            </td>
                            <td>
                                {{ $profile['userId'] }}
                            </td>
                            <td>
                                @if($profile['hide'] == 0)
                                    False
                                @else
                                    True
                                @endif
                            </td>
                            <td class="project-actions text-right">
                                <a class="btn btn-info btn-sm"
                                    href="{{ route('profile.edit', $profile['id']) }}">
                                    <i class="fas fa-pencil-alt">
                                    </i>
                                    Edit
                                </a>
                                <form
                                    action="{{ route('profile.destroy', $profile['id']) }}"
                                    method="POST" style="display: inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm delete-btn">
                                        <i class="fas fa-trash">
                                        </i>
                                        Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- /.card-body -->

    </div>
</section>
<!-- /.content -->

@endsection
