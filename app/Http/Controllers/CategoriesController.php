<?php

namespace App\Http\Controllers;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use App\Http\Requests\CategoryRequest;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
        return view('categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('categories.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {
         try {
             DB::beginTransaction();
             $Category =  Category::create($request->except('_token', 'icon'));
             $fileName = uploadImage('categories', $request->icon);
             $Category->icon = $fileName;
             $Category->save();

             DB::commit();
             return redirect()->route('categories.index')->with(['success' => 'تم ألاضافة بنجاح']);
         } catch (\Exception $ex) {
             DB::rollback();
             return redirect()->route('categories.index')->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);
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
        $categories = Category::find($id);
        return view('categories.edit', compact('categories'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryRequest $request, $id)
    {
        try {
            DB::beginTransaction();
            $Category = Category::find($id);
            $Category->update($request->except('_token','icon','_method'));

            //  Start Change Photo
            if($request->icon){
                $photo  = replaceurl($Category->icon);
                if (File::exists($photo)) {
                    File::delete($photo);
                }
                $fileName = uploadImage('categories', $request->icon);
                $Category->icon = $fileName;
                $Category->save();
            }
            //End Change Photo

            DB::commit();
            return redirect()->route('categories.index')->with(['success' => 'تم التعديل بنجاح']);
        } catch (\Exception $ex) {
            DB::rollback();
            return redirect()->route('categories.index')->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);
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
            $Category = Category::find($id);
            if (!$Category)
                return redirect()->route('categories.index')->with(['error' => 'هذا العنصر غير موجود ']);

            if($Category->icon){
                $photo  = replaceurl($Category->icon);
                if (File::exists($photo)) {
                    File::delete($photo);
                }
            }

            $Category->delete();
            return redirect()->route('categories.index')->with(['success' => 'تم الحذف بنجاح']);
        }catch (\Exception $ex) {
            DB::rollback();
            return redirect()->route('categories.index')
                ->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);
        }
    }
}