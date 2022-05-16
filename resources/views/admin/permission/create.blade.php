@extends('layouts.app')

@section('content')
<div class="container" style="margin: 0">
    <div class="card">  
        <div class="card-header d-sm-flex d-block border-0 pb-0">
            <h3>Add New permission</h3>
            <a href="{{ route('permission.index') }}" class="btn btn-success btn-sm">Manage Permission</a>
        </div>
        <div class="card-body" style="min-height: 200px;">
            <form method="POST" action="{{ route('permission.store') }}">
                @csrf
                <input type="hidden" name="update_id" id="id">
                <div class="form-group">
                    <input id="group_name" type="text" id="group_name" name="group_name" class="form-control input-default" placeholder="Group Name" required>
                </div>
                <div class="form-group">
                    <input onkeyup="urlGenerator(this.value)" id="permission_name" type="text" name="permission_name" class="form-control input-default" placeholder="Permission Name" required>
                </div>
                <div class="form-group">
                    <input readonly type="text" id="permissoin_slug" name="permissoin_slug" class="form-control input-default" placeholder="Permissino Slug" required>
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-primary" value="Add">
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
@push('scripts')
    <script>




        // Url genaretor 
        function urlGenerator(input_value){
            var value = input_value.toLowerCase().trim();
            var str = value.replace(/ +(?= )/g, '');
            var name = str.split(' ').join('-');
            $('#permissoin_slug').val(name);
        }


    </script>
@endpush
