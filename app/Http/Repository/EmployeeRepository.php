<?php

namespace App\Http\Repository;

use App\Http\Requests\EmployeeRequest;
use App\Models\Employee;
use http\Env\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\File;

class EmployeeRepository implements EmployeeRepositoryInterface
{
    public function index()
    {
        $employees = Employee::all();
        return view('employee.employee', compact('employees'));
    }

    public function create()
    {
        return view('employee.create');
    }

    public function store($request)
    {
        // TODO: Implement store() method.
try{
        $request->validated();
        $employee = Employee::create($request->except('_token', 'photo'));
        $fileName = uploadImage('employee', $request->photo);
        $employee->photo = $fileName;

        $employee->save();
        return redirect()->route('employee.index')->with(['success' => 'تم الاضافة بنجاح']);
    }catch (\Exception $e){
        return redirect()->route('employee.index')->with(['error' => 'حدث خطا ما اثناء عملية التحديث الرجاء المحاوله لاحقا']);
    }


    }

    public function edit($id)
    {
        // TODO: Implement edit() method.
        $employee = Employee::findOrFail($id);
        return view('employee.edit', compact('employee'));
    }

    public function update($request, $id)
    {
        // TODO: Implement update() method.
        try {
            $employee = Employee::findOrFail($id);
            $employee->update($request->except('_token', 'photo'));
            if($request->photo){
                $photo = replaceurl($employee->photo);
                if(File::exists($photo)){
                    File::delete($photo);
                }
                $fileName = uploadImage('employee', $request->photo);
                $employee->photo = $fileName;
                $employee->save();
            }
            return redirect()->route('employee.index')->with(['success' => 'تم التحديث بنجاح']);
        }catch (\Exception $e){
            return redirect()->route('employee.index')->with(['error' => 'حدث خطا ما اثناء عملية التحديث الرجاء المحاوله لاحقا']);
        }
    }

    public function show($id)
    {
        // TODO: Implement show() method.
        $employees = Employee::findOrFail($id);
        return view('employee.profile', compact('employees'));
    }
    public function changePassword($request, $id)
    {
        // TODO: Implement show() method.
//        if(!Hash::check($request->old_password, auth()->user()->password)){
//            return back()->with("error", "Old Password Doesn't match!");
//        }
//
//
//        #Update the new Password
//        Employee::where('id', $id)->update([
//            'password' => Hash::make($request->new_password)
//        ]);
    }


    public function destroy($id)
    {
        // TODO: Implement destroy() method.
        try {
            Employee::findOrFail($id)->delete();
            return redirect()->route('employee.index')->with(['success' => 'تم الحذف بنجاح']);
        }catch (\Exception $e){
            return redirect()->route('employee.index')->with(['error' => 'حدث خطا ما اثناء عملية الحذف الرجاء المحاوله لاحقا']);
        }
    }
}
