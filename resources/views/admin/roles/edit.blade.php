@extends('layouts.app')

@section('content')
<div class="container" style="margin: 0">
    <div class="card">  
        <div class="card-header d-sm-flex d-block border-0 pb-0">
            <h3>Edit Role</h3>
            <a href="{{ route('role.index') }}" class="btn btn-success btn-sm">Manage Role</a>
        </div>
        <div class="card-body" style="min-height: 200px;">
            <form method="POST" action="{{ route('role.store') }}">
                @csrf
                <input type="hidden" name="update_id" value="{{ $role -> id }}" id="id">
                <div class="form-group">
                    <input id="role_name" type="text" name="role_name" class="form-control input-default" placeholder="Role Name" value="{{ $role -> role_name }}" required>
                </div>
                <div class="form-group"> 
                    <h3 style="margin: 30px 0">Add Permision</h3>
                    <div class="custom-control custom-checkbox mb-3 ">
                        <input type="checkbox" class="custom-control-input" id="checkPermissionAll" {{ App\Models\User::roleHasPermission($permission_role, $permissions_all) ? 'checked' : '' }}>
                        <label class="custom-control-label" for="checkPermissionAll">Check ALL</label>
                    </div>
                    <hr>
                    @php $i = 1; @endphp
                    @foreach ($permission_groups as $group)
                        <div class="row" style="margin-bottom: 20px">
                            @php
                                $permissions = App\Models\User::getPermissionByGroupName($group -> name);
                                $j = 1;
                            @endphp
                            <div class="col-md-3">
                                <div class="custom-control custom-checkbox mb-3 ">
                                    <input type="checkbox" id="{{ $i }}Management" class="custom-control-input" id="checkPermission" value="{{ $group -> name }}" onclick="checkPermissionByGroup('role-{{ $i }}-management-checkbox', this)" {{ App\Models\User::roleHasPermission($permission_role, $permissions) ? 'checked' : '' }}>
                                    <label class="custom-control-label" for="{{ $i }}Management">{{ $group -> name }}</label>
                                </div>
                            </div>
                            <div class="col-md-9 role-{{ $i }}-management-checkbox">
                                <div class="row">
                                    @foreach ($permissions  as $permission)
                                        <div class="col-md-4">
                                            <div class="custom-control custom-checkbox mb-3 ">
                                                <input type="checkbox" @if (collect($permission_role)->contains($permission->id)) {{ 'checked' }} @endif onclick="checkSinglePermission('role-{{ $i }}-management-checkbox', '{{ $i }}Management', {{ count($permissions) }})" name="permissions[]" class="custom-control-input" id="checkPermission{{ $permission -> id }}" value="{{ $permission -> id }}">
                                                <label class="custom-control-label" for="checkPermission{{ $permission -> id }}">{{ $permission -> permission_name }}</label>
                                            </div>
                                        </div>
                                        @php $j++; @endphp
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        @php  $i++; @endphp
                    @endforeach
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-primary" value="Update">
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
@push('scripts')
    @include('admin.roles.script')
@endpush
