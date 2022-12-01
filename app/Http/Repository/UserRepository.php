<?php

namespace App\Http\Repository;

use App\Models\User;

class UserRepository implements UserRepositoryInterface
{
    public function index()
    {
        // TODO: Implement index() method.
        $users = User::all();
        return view('user.index', compact('users'));
    }

    public function create()
    {
        // TODO: Implement create() method.
        return view('user.create');
    }

    public function store($request)
    {
        // TODO: Implement store() method.
        try {
            $request->validated();

            $user = User::create($request->except('_token'));
            return redirect()->route('user.index')->with(['success'=>'تم اضافة مستخدم بنجاح']);
        }catch (\Exception $e){
            return redirect()->route('user.index')->with(['error' => 'حدث خطا ما اثناء عملية الاضافة الرجاء المحاوله لاحقا']);
        }


    }

    public function destroy($id)
    {
        // TODO: Implement destroy() method.
        try {
            User::findOrFail($id)->delete();
            return redirect()->route('user.index')->with(['success'=>'تم اضافة الحذف بنجاح']);
        }catch (\Exception $e){
            return redirect()->route('user.index')->with(['error' => 'حدث خطا ما اثناء عملية الحذف الرجاء المحاوله لاحقا']);
        }
    }

}
