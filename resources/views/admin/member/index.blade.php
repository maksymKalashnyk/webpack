@extends('layouts.admin_layouts');

@section('title', 'All members')

@section('content')

<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">All members</h1>
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
                            First Name
                        </th>
                        <th>
                            Last Name
                        </th>
                        <th>
                            Birthdate
                        </th>
                        <th>
                            Report Subject
                        </th>
                        <th>
                            Country
                        </th>
                        <th>
                            Phone
                        </th>
                        <th>
                            Email
                        </th>
                        <th style="width: 15%">
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($members as $member)
                        <tr>
                            <td>
                                {{ $member['id'] }}
                            </td>
                            <td>
                                {{ $member['firstName'] }}
                            </td>
                            <td>
                                {{ $member['lastName'] }}
                            </td>
                            <td>
                                {{ $member['birthdate'] }}
                            </td>
                            <td>
                                {{ $member['reportSubject'] }}
                            </td>
                            <td>
                                {{ $member->country['name'] }}
                            </td>
                            <td>
                                {{ $member['phone'] }}
                            </td>
                            <td>
                                {{ $member['email'] }}
                            </td>
                            <td class="project-actions text-right">
                                <a class="btn btn-info btn-sm"
                                    href="{{ route('member.edit', $member['id']) }}">
                                    <i class="fas fa-pencil-alt">
                                    </i>
                                    Edit
                                </a>
                                <form
                                    action="{{ route('member.destroy', $member['id']) }}"
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
