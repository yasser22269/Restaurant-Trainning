<?php

namespace App\Http\Controllers;

use App\Http\Requests\ZoneRequest;
use App\Models\Zone;
use Illuminate\Support\Facades\DB;


class ZoneController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $zones = Zone::all();
        return view('zone.index', compact('zones'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('zone.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ZoneRequest $request)
    {
       try {
            zone::create($request->all());
            return redirect()->route('zone.index')->with(['success' => 'تم ألاضافة بنجاح']);
        }catch (\Exception $ex) {
            return redirect()->route('zone.index')
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
        $zones = Zone::findOrFail($id);
        return view('zone.edit',compact('zones'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ZoneRequest $request, $id)
    {
        try {
            $zones = Zone::find($id);
            $zones->update($request->except('_token','_method'));
            return redirect()->route('zone.index')->with(['success' => 'تم التعديل بنجاح']);
        }catch (\Exception $ex) {
            return redirect()->route('zone.index')
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

        $zones = Zone::findOrFail($id);
        $zones->delete();
        return redirect('zone')->with(['success' => 'تم الحذف بنجاح']);
    }
}
