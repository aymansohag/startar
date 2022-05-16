<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Permission;
use Illuminate\Http\Request;

class PermissionController extends Controller
{
    public function index(){
        return view('admin.permission.index');
    }

    public function create(){
        return view('admin.permission.create');
    }

    public function storeOrUpdate(Request $request){
        $id = $request->update_id;

        if($id){
            $request->validate([
                'permission_name' => 'required',
                'permissoin_slug' => 'required|unique:permissions,permissoin_slug,'.$id,
            ]);
        }else{
            $request->validate([
                'permission_name' => 'required',
                'permissoin_slug' => 'required|unique:permissions,permissoin_slug',
            ]);
        }

        $collection = $request->except('update_id','_token');

        $result = Permission::updateOrCreate(['id' => $id], $collection);

        if($result){
            return redirect()->back() -> with('success', 'Permission created successfull');
        }

    }
}
