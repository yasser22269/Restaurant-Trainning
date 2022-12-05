<?php

namespace App\Http\Controllers;

use App\Models\TimeEmp;
use App\Models\Employee;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\TimeRequest;

use Illuminate\Http\Request;

class TimeEmpController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $timeEmp = TimeEmp::with('employee')->get();
        return view('timeEmp.index', compact('timeEmp'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $employee = Employee::all();
        return view('timeemp.add', compact('employee'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TimeRequest $request)
    {
        try {
            TimeEmp::create($request->all());
            return redirect()->route('timeemp.index')->with(['success' => 'تم ألاضافة بنجاح']);
        }catch (\Exception $ex) {
            DB::rollback();
            return redirect()->route('timeemp.index')
                ->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TimeEmp  $timeEmp
     * @return \Illuminate\Http\Response
     */
    public function show(TimeEmp $timeEmp)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TimeEmp  $timeEmp
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $employee = Employee::all();
        $timeemp = TimeEmp::find($id);
        return view('timeemp.edit', compact('timeemp','employee'));


    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TimeEmp  $timeEmp
     * @return \Illuminate\Http\Response
     */
    public function update(TimeRequest $request, $id)
    {
        $timeemp = TimeEmp::find($id);
        $timeemp->update([
            'emp_id' => $request->emp_id,
            'start_at' => $request->start_at,
            'end_at' => $request->end_at,
        ]);
            return redirect()->route('timeemp.index')->with(['success' => 'تم التعديل بنجاح']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TimeEmp  $timeEmp
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $timeemp = TimeEmp::find($id);
            if (!$timeemp)
                return redirect()->route('timeemp.index')->with(['error' => 'هذا العنصر غير موجود ']);
            $timeemp->delete();
            return redirect()->route('timeemp.index')->with(['success' => 'تم الحذف بنجاح']);
        }catch (\Exception $ex) {
            DB::rollback();
            return redirect()->route('timeemp.index')
                ->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);
        }

    }
}