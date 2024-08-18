<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolesAndPermissionController extends Controller
{

   public function addPermissions(){
    $permissions =[
        'Employee'
    ];
    foreach($permissions as $permission){
        Permission::create(['name'=> $permission]);
    }
    }


   public function createRole(Request $request){
   $role = Role::create(['name'=>$request->name]);
   foreach($request->permissions as $permission){
    $role->givePermissionTo($permission);
   }
   foreach($request->users as $user){
    $user->assignRole($role->name);
   }

   }
}
