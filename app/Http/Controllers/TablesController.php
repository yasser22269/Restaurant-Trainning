<?php

namespace App\Http\Controllers;
use App\Http\Requests\TableRequest;
use App\Models\Table;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TablesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $tables = Table::all();
        return view('table.index', compact('tables'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('table.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TableRequest $request)
    {
        try {
            Table::create($request->all());
            return redirect()->route('table.index')->with(['success' => 'تم ألاضافة بنجاح']);
        }catch (\Exception $ex) {
            DB::rollback();
            return redirect()->route('table.index')
                ->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tables = Table::find($id);
        return view('table.edit', compact('tables'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TableRequest $request, $id)
    {
        try {
        $table = Table::find($id);
        $table->update([
            'name' => $request->name,
            'status' => $request->status,
            'number_of_chairs' => $request->number_of_chairs,
        ]);
            return redirect()->route('table.index')->with(['success' => 'تم التعديل بنجاح']);
        }catch (\Exception $ex) {
            DB::rollback();
            return redirect()->route('table.index')
                ->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $Table = Table::find($id);
            if (!$Table)
                return redirect()->route('table.index')->with(['error' => 'هذا العنصر غير موجود ']);
            $Table->delete();
            return redirect()->route('table.index')->with(['success' => 'تم الحذف بنجاح']);
        }catch (\Exception $ex) {
            DB::rollback();
            return redirect()->route('table.index')
                ->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);
        }

    }
}
