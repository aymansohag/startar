@extends('layouts.app')

@section('content')
<div class="container" style="margin: 0">
    <div class="card">  
        <div class="card-header d-sm-flex d-block border-0 pb-0">
            <h2>Add New permission</h2>
            <a href="" class="btn btn-success">Manage Permission</a>
        </div>
        <div class="card-body" style="min-height: 200px;">
            <form>
                @csrf
                <div class="form-group">
                    <input type="text" name="permission_name" class="form-control input-default" placeholder="Permission Name">
                </div>
                <div class="form-group">
                    <input readonly type="text" name="permission_slug" class="form-control input-default" placeholder="Permissino Slug">
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-primary" value="Add">
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
