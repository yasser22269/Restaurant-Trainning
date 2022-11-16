<?php

namespace App\Http\Controllers;
use App\Models\Table;
use Illuminate\Http\Request;

class TablesCotroller extends Controller
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
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string',
            'status' => 'required|numeric',
            'number_of_chairs' => 'required|numeric',
        ]);

        Table::create([
            'name' => $request->name,
            'status' => $request->status,
            'number_of_chairs' => $request->number_of_chairs,
        ]);
        return redirect('/table')->with('success', 'Table Added Successfully');

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
    public function update(Request $request, $id)
    {
                $table = Table::find($id);

        $table->update([
            'name' => $request->name,
            'status' => $request->status,
            'number_of_chairs' => $request->number_of_chairs,
        ]);

        return redirect('/table')->with('success', 'table Edit Successfully');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        Table::find($request->id)->delete();
        return redirect('/table')->with('success', 'Table Deleted Successfully');

    }
}