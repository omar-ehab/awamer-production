<?php

namespace App\Http\Controllers;

use App\Permission;
use App\Role;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{

    public function __construct()
    {
        $this->middleware('permission:read-admin')->only('indexAdmin');
        $this->middleware('permission:create-admin')->only(['createAdmin', 'storeAdmin']);
        $this->middleware('permission:update-admin')->only(['editAdmin', 'updateAdmin']);
        $this->middleware('permission:delete-admin')->only('destroyAdmin');
        $this->middleware('permission:read-user')->only('indexUser');
        $this->middleware('permission:create-user')->only(['createUser', 'storeUser']);
        $this->middleware('permission:update-user')->only(['editUser', 'updateUser']);
        $this->middleware('permission:delete-user')->only('destroyUser');
    }

    public function indexAdmin()
    {
        if(auth()->user()->can('read-admin'))
        {
            $role = Role::where('name', 'admin')->first();
            $admins = $role->users;
            return view('admins.index', compact('admins'));
        }
        return redirect('/')->with('data', ['alert'=>'حدث خطأ في المصادقة','alert-type'=>'danger']);
    }

    public function createAdmin()
    {
        if(auth()->user()->can('create-admin'))
        {
            return view('admins.create');
        }
        return redirect('/')->with('data', ['alert'=>'حدث خطأ في المصادقة','alert-type'=>'danger']);
    }

    public function storeAdmin(Request $request)
    {

        if(auth()->user()->can('create-admin'))
        {
            $this->validate($request, [
                'name' => 'required|string',
                'email' => 'required|email',
                'password' => 'required|string|min:8',
                'c_password' => 'string|same:password|min:8',
                'permissions' => 'required|array|min:1',
                'permissions.*' => 'required|string|distinct'
            ]);
            $establishmentId = auth()->user()->establishment_id;
            $admin = User::create([
                'establishment_id' => $establishmentId,
                'name' => $request['name'],
                'email' => $request['email'],
                'password' => bcrypt($request['password'])
            ]);
            $adminRole = Role::where('name', 'admin')->first();
            $admin->attachRole($adminRole);
            $admin->syncPermissions($request['permissions']);
            return redirect('/admins')->with('data', ['alert'=>'تم إنشاء حساب ادمن بنجاح','alert-type'=>'success']);
        }
        return redirect('/')->with('data', ['alert'=>'حدث خطأ في المصادقة','alert-type'=>'danger']);
    }

    public function editAdmin(User $admin)
    {
        if(auth()->user()->can('update-admin'))
        {
            return view('admins.edit', compact('admin'));
        }
        return redirect('/')->with('data', ['alert'=>'حدث خطأ في المصادقة','alert-type'=>'danger']);
    }

    public function updateAdmin(Request $request, User $admin)
    {
        if(auth()->user()->can('update-admin'))
        {
            if($request['password'])
            {
                $this->validate($request, [
                    'name' => 'required|string',
                    'email' => 'required|email',
                    'password' => 'required|string|min:8',
                    'c_password' => 'required|string|same:password|min:8',
                    'permissions' => 'required|array|min:1',
                    'permissions.*' => 'required|string|distinct'
                ]);

                $admin->update([
                    'name' => $request['name'],
                    'email' => $request['email'],
                    'password' => bcrypt($request['password'])
                ]);
            } else
            {
                $this->validate($request, [
                    'name' => 'required|string',
                    'email' => 'required|email',
                    'permissions' => 'required|array|min:1',
                    'permissions.*' => 'required|string|distinct'
                ]);
                $admin->update([
                    'name' => $request['name'],
                    'email' => $request['email'],
                ]);
            }
            $admin->syncPermissions($request['permissions']);
            return redirect('/users')->with('data', ['alert'=>'تم تحديث بيانات الحساب بنجاح','alert-type'=>'success']);
        }
        return redirect('/')->with('data', ['alert'=>'حدث خطأ في المصادقة','alert-type'=>'danger']);
    }

    public function destroyAdmin(User $admin)
    {
        if(auth()->user()->can('create-admin'))
        {
            try {
                $admin->delete();
            } catch (\Exception $e) {
                throw $e;
            }
            return redirect('/users')->with('data', ['alert'=>'تم حذف الموظف بنجاح','alert-type'=>'success']);
        }
        return redirect('/')->with('data', ['alert'=>'حدث خطأ في المصادقة','alert-type'=>'danger']);
    }

    public function indexUser()
    {
        if(auth()->user()->can('read-user'))
        {
            $role = Role::where('name', 'user')->first();
            $users = $role->users;
            return view('employees.index', compact('users'));
        }
        return redirect('/')->with('data', ['alert'=>'حدث خطأ في المصادقة','alert-type'=>'danger']);
    }

    public function createUser()
    {
        if(auth()->user()->can('create-user'))
        {
            return view('employees.create');
        }
        return redirect('/')->with('data', ['alert'=>'حدث خطأ في المصادقة','alert-type'=>'danger']);
    }

    public function storeUser(Request $request)
    {
        if(auth()->user()->can('create-user'))
        {
            $this->validate($request, [
                'name' => 'required|string',
                'email' => 'required|email',
                'password' => 'required|string|min:8',
                'c_password' => 'required|string|same:password|min:8',
                'permissions' => 'required|array|min:1',
                'permissions.*' => 'required|string|distinct'
            ]);
            $establishmentId = auth()->user()->establishment_id;
            $user = User::create([
                'establishment_id' => $establishmentId,
                'name' => $request['name'],
                'email' => $request['email'],
                'password' => bcrypt($request['password'])
            ]);
            $userRole = Role::where('name', 'user')->first();
            $user->attachRole($userRole);
            $user->syncPermissions($request['permissions']);
            return redirect('/users')->with('data', ['alert'=>'تم إنشاء الحساب بنجاح','alert-type'=>'success']);

        }
        return redirect('/')->with('data', ['alert'=>'حدث خطأ في المصادقة','alert-type'=>'danger']);
    }

    public function editUser(User $user)
    {
        if(auth()->user()->can('update-user'))
        {
            return view('employees.edit', compact('user'));
        }
        return redirect('/')->with('data', ['alert'=>'حدث خطأ في المصادقة','alert-type'=>'danger']);
    }

    public function updateUser(Request $request, User $user)
    {
        if(auth()->user()->can('update-user'))
        {
            if($request['password'])
            {
                $this->validate($request, [
                    'name' => 'required|string',
                    'email' => 'required|email',
                    'password' => 'required|string|min:8',
                    'c_password' => 'required|string|same:password|min:8',
                    'permissions' => 'required|array|min:1',
                    'permissions.*' => 'required|string|distinct'
                ]);

                $user->update([
                    'name' => $request['name'],
                    'email' => $request['email'],
                    'password' => bcrypt($request['password'])
                ]);
            } else
            {
                $this->validate($request, [
                    'name' => 'required|string',
                    'email' => 'required|email',
                    'permissions' => 'required|array|min:1',
                    'permissions.*' => 'required|string|distinct'
                ]);
                $user->update([
                    'name' => $request['name'],
                    'email' => $request['email'],
                ]);
            }
            $user->syncPermissions($request['permissions']);
            return redirect('/users')->with('data', ['alert'=>'تم تحديث بيانات الحساب بنجاح','alert-type'=>'success']);
        }
        return redirect('/')->with('data', ['alert'=>'حدث خطأ في المصادقة','alert-type'=>'danger']);
    }

    public function destroyUser(User $user)
    {
        if(auth()->user()->can('create-user'))
        {
            try {
                $user->delete();
            } catch (\Exception $e) {
                throw $e;
            }
            return redirect('/users')->with('data', ['alert'=>'تم حذف الموظف بنجاح','alert-type'=>'success']);
        }
        return redirect('/')->with('data', ['alert'=>'حدث خطأ في المصادقة','alert-type'=>'danger']);
    }

    public function markNotificationAsRead()
    {
        $user = auth()->user();

        foreach ($user->unreadNotifications as $notification) {
            $notification->markAsRead();
        }
        return redirect()->back();
    }


    public function changePassword(Request $request)
    {
        $user = auth()->user();
        if(Hash::check($request['old_password'], $user->password ))
        {
            if($request['old_password'] === $request['password'])
            {
                return redirect('/')->with('data', ['alert'=>'تم تغيير كلمة المرور بنجاح','alert-type'=>'success']);
            }
            if($request['password'] === $request['c_password'])
            {
                $this->validate($request, [
                    'password' => 'string|min:8'
                ]);
                $user->update([
                    'password' => bcrypt($request['password'])
                ]);
                return redirect('/')->with('data', ['alert'=>'تم تغيير كلمة المرور بنجاح','alert-type'=>'success']);
            }
            return redirect('/')->with('data', ['alert'=>'كلمات المرور غير متطابقة','alert-type'=>'danger']);

        }
        return redirect('/')->with('data', ['alert'=>'برجاء ادخال كلمه مرور القديمة صحيحه','alert-type'=>'danger']);
    }

}
