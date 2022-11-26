<?php

namespace App\Http\Repository;

use App\Models\Employee;
use Illuminate\Support\Facades\Hash;

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

        try {
            if($request->hasfile('Photo')){
                foreach ($request->file('Photo') as $file){
                    $name = $file->getClientOriginalName();
                    $path =$file->storeAs('images/employee/'.$request->Name, $file->getClientOriginalName(), 'upload_attachments');

            $employee = new Employee();
            $employee->name         = $request->Name;
            $employee->email        = $request->Email;
            $employee->phone        = $request->Phone;
            $employee->nid          = $request->nid;
            $employee->password     = Hash::make($request->password);
            $employee->age          = $request->Age;
            $employee->address      = $request->Address;
            $employee->salary       = $request->Salary;
            $employee->start_date   = $request->date;
            $employee->position     = $request->Position;
            $employee->office       = $request->Office;
            $employee->photo        = $path;
            $employee->status       = $request->status;
            $employee->role_id      = $request->role;

            $employee->save();

                }
            }
            return redirect()->route('employee.index')->with(['success' => 'تم ألاضافة بنجاح']);
        }catch(\Exception $e){
            return redirect()->route('employee.index')->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);
        }


    }

    public function edit($id)
    {
        // TODO: Implement edit() method.
        $employee = Employee::findOrFail($id);
        return view('employee.edit', compact('employee'));
    }

    public function update($request)
    {
        // TODO: Implement update() method.
        try {
            $employee = Employee::findOrFail($request->id);
            $employee->name = $request->Name;
            $employee->email = $request->Email;
            $employee->phone = $request->Phone;
            $employee->nid = $request->nid;
            $employee->age = $request->Age;
            $employee->address = $request->Address;
            $employee->salary = $request->Salary;
            $employee->start_date = $request->date;
            $employee->position = $request->Position;
            $employee->office = $request->Office;
            $employee->status = $request->status;
            $employee->role_id = $request->role;

            $employee->update();
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
