<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // Role create page
    public static function getPermissionGroups(){
        $permission_groups = DB::table('permissions')
                            ->select('group_name as name')
                            ->groupBy('group_name')
                            ->get();
        return $permission_groups;
    }
    public static function getPermissionByGroupName($group_name){
        $permissions = DB::table('permissions')
                        ->select('permission_name','id')
                        ->where('group_name',$group_name)
                        ->get();
        return $permissions;
    }
    public static function roleHasPermission($permission_role, $permissions){
        $hasPermission = true;
        foreach($permissions as $permission){
            if(!collect($permission_role)->contains($permission->id)){
                $hasPermission = false;
                return $hasPermission;
            }
        }
        return $hasPermission;
    }
}
