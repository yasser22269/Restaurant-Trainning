<?php

namespace App\Http\Controllers;
use App\Http\Requests\AttributeRequest;
use App\Models\Attribute;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class AttributeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $attributes = Attribute::all();
        return view('attributes.index', compact('attributes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('attributes.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AttributeRequest $request)
    {
        try {
            Attribute::create($request->all());
            return redirect()->route('Attribute.index')->with(['success' => 'تم ألاضافة بنجاح']);
        }catch (\Exception $ex) {
            DB::rollback();
            return redirect()->route('Attribute.index')
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
        $attribute = Attribute::find($id);
        return view('attributes.edit', compact('attribute'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AttributeRequest $request, $id)
    {
            try {
                $attributes = Attribute::find($id);
                $attributes->update($request->except('_token','_method'));
            return redirect()->route('Attribute.index')->with(['success' => 'تم التعديل بنجاح']);
        }catch (\Exception $ex) {
            DB::rollback();
            return redirect()->route('Attribute.index')
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
            $Attribute = Attribute::find($id);
            if (!$Attribute)
                return redirect()->route('Attribute.index')->with(['error' => 'هذا العنصر غير موجود ']);
            $Attribute->delete();
            return redirect()->route('Attribute.index')->with(['success' => 'تم الحذف بنجاح']);
        }catch (\Exception $ex) {
            DB::rollback();
            return redirect()->route('Attribute.index')
                ->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);
        }
    }
}
