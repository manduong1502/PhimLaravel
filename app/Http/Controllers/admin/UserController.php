<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //  Role::create(['name' => 'user']);
        //  Permission::create(['name' => 'vaitro']);
        // $users = User::find(2);
        // $users->givePermissionTo('theloai');


        
        // $role = Role::findByName('admin'); // Lấy vai trò 'editor'

        // if ($role) {
        //     $role->syncPermissions(['danhmuc', 'theloai']);
        // }

        $users = User::with('roles','permissions')->orderBy('id','asc')->get();
        
        
        return  view('admin.pagesadmin.user.form',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pagesadmin.user.index');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = new User();
        $user -> username = $request->username;
        $user -> email = $request->email;
        $user->password = bcrypt($request->password);
        $user->save();
        return redirect()->back()->with('success', 'Bạn đã thêm thành công');
    }

    /**
     * Display the specified resource.
     */

    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function phan_vaitro(string $id)
    {
        $user = User::find($id);    
        $role = Role::orderBy('id', 'asc')->get();
        $role_all = $user -> roles->first();

        $permisstion = Permission::orderBy('id','asc')->get();
        return view('admin.pagesadmin.user.phan_vaitro',compact('user','role','role_all','permisstion'));
    }

    public function phan_quyen(string $id)
    {
        $user = User::find($id);    
        $role_all = $user -> roles->first();

        $permisstion = Permission::orderBy('id','asc')->get();

        $name_roles = $user->roles->first()->name;
        $get_permisstion_via_role = $user-> getPermissionsViaRoles();

        return view('admin.pagesadmin.user.phan_quyen',compact('user','role_all','permisstion','name_roles','get_permisstion_via_role'));
    }

    public function insert_roles(Request $request, string $id)
    {
        $data = $request->all();
        $user = User::find($id);
        $user -> syncRoles($data['role']);
        return redirect()->back()->with('success','Bạn đã thêm vai trò thành công');
    }

    public function insert_quyen(Request $request, string $id)
{
    $data = $request->all();

    $user = User::find($id);
    $role_id = $user->roles->pluck('id')->first();

    $role = Role::find($role_id);
    $role->syncPermissions($data['permission']);

    return redirect()->back()->with('success', 'Bạn đã thêm phân quyền thành công');
}

    public function add_permissions (Request $request) {
        $permission = new Permission();
        $permission -> name = $request->name;
        $permission -> save();
        return redirect()->back()->with('success','Bạn đã thêm quyền thành công');
    }

    public function add_roles (Request $request) {
        $role = new Role();
        $role -> name = $request->name;
        $role -> save();
        return redirect()->back()->with('success','Bạn đã thêm vai trò thành công');
    }
}
