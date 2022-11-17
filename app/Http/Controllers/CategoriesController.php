<?php

namespace App\Http\Controllers;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

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
    public function store(Request $request)
    {


        $this->validate($request, [
            'name' => 'required|string',
            'status' => 'required|numeric',
            'image' => 'required',
        ]);
        $image = $request->image;
        $image_name = time() . '.' . $image->extension();
        $request->image->move(public_path('images'), $image_name);

        Category::create([
            'name' => $request->name,
            'status' => $request->status,
            'icon' => 'images/' . $image_name,
        ]);
        return redirect('/categories')->with('success', 'categories Added Successfully');

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
    public function update(Request $request, $id)
    {
        $categories = Category::find($id);
                if($request->image != ''){
            if ($categories->image != ''  && $categories->image != null) {
                $file_old = $categories->image;
                unlink($file_old);
            }

            $image = $request->image;
            $image_new = time() . '.' . $image->extension();
            $request->image->move(public_path('images'), $image_new);
            $categories->update(['icon' => 'images/' . $image_new]);
                }

        $categories->update([
            'name' => $request->name,
            'status' => $request->status,
        ]);

        return redirect('/categories')->with('success', 'categories Edit Successfully');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        Category::find($request->id)->delete();
        return redirect('/categories')->with('success', 'categories Deleted Successfully');

    }
}
