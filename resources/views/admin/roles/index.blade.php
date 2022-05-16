@extends('layouts.app')

@section('content')
<div class="container" style="margin: 0">
    <div class="card">  
        <div class="card-header d-sm-flex d-block border-0 pb-0">
            <h2>Mange Role</h2>
            <a href="{{ route('role.create') }}" class="btn btn-success btn-sm">Add New</a>
        </div>
        <div class="card-body" style="min-height: 200px;">
            <div class="table-responsive">
                <table class="table table-responsive-md">
                    <thead>
                        <tr>
                            <th class="width80"><strong>#</strong></th>
                            <th style="width: 150px"><strong>Name</strong></th>
                            <th><strong>Permission</strong></th>
                            <th><strong>Action</strong></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($roles as $role)
                        <tr>
                            <td><strong>{{ $loop -> index + 1}}</strong></td>
                            <td>{{ $role -> role_name }}</td>
                            <td>
                                @foreach ($role->permission_role as $permission)
                                    <span style="display: inline-block; margin-bottom: 8px" class="badge light badge-success">{{ $permission -> permission_name }}</span>
                                @endforeach
                            </td>
                            <td>
                                <div class="dropdown">
                                    <button type="button" class="btn btn-success light sharp" data-toggle="dropdown" aria-expanded="false">
                                        <svg width="20px" height="20px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"></rect><circle fill="#000000" cx="5" cy="12" r="2"></circle><circle fill="#000000" cx="12" cy="12" r="2"></circle><circle fill="#000000" cx="19" cy="12" r="2"></circle></g></svg>
                                    </button>
                                    <div class="dropdown-menu" style="">
                                        <a class="dropdown-item" href="{{ route('role.edit', $role->id) }}">Edit</a>
                                        <a class="dropdown-item" href="{{ route('role.delete', $role->id) }}">Delete</a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
