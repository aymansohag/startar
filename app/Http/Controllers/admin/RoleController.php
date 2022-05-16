<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Permission;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function index(){
        $permissions = Permission::all();
        $roles = Role::with('permission_role')->get();
        return view('admin.roles.index', compact('permissions','roles'));
    }

    public function create(){
        $permission_groups = User::getPermissionGroups();
        $permissions_all = Permission::all();
        return view('admin.roles.create', compact('permissions_all','permission_groups'));
    }

    public function storeOrUpdate(Request $request){
        $id = $request->update_id;

        if($id){
            $request->validate([
                'role_name' => 'required|unique:roles,role_name,'.$id,
            ]);
        }else{
            $request->validate([
                'role_name' => 'required|unique:roles,role_name,'.$id,
            ]);
        }

        $collection = $request->except('update_id','_token','permissions');

        $role = Role::updateOrCreate(['id' => $id], $collection);

        if($role){
            $result = $role->permission_role()->sync($request->permissions);
        }

        if($result){
            if($id){
                return redirect()->back() -> with('success', 'Role updated successfull');
            }else{
                return redirect()->back() -> with('success', 'Role created successfull');
            }

        }

    }

    public function edit($id){
        $permission_groups = User::getPermissionGroups();
        $permissions_all = Permission::all();
        $role = Role::with('permission_role')->where('id', $id)->first();

        $permission_role = [];
        if(!$role->permission_role->isEmpty()){
            foreach ($role->permission_role as $value) {
                array_push($permission_role, $value->id);
            }
        }

        // return $permission_role;
        return view('admin.roles.edit', compact('permission_groups','role','permission_role','permissions_all'));
    }

    public function delete($id){
        $role = Role::with('permission_role')->where('id', $id)->first();
        if($role){
            $permission = $role->permission_role()->detach();
            if($permission){
                $role->delete();
            }
            return redirect()->back() -> with('success', 'Role deleted successfull');
        }
    }
}
