<?php

namespace App\Http\Controllers;
use App\Http\Requests\ProductRequest;
use App\Models\Attribute;
use App\Models\Category;
use App\Models\Option;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $products = Product::with('category')->get();
        return view('products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::CategoriesAvailable()->get();
        $attributes = Attribute::AttributesAvailable()->get();
        // $attributes = array();
        return view('products.add', compact('categories','attributes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
        //return $request;
         try {
            DB::beginTransaction();
            $Product =  Product::create($request->except('_token', 'picture'));
            $fileName = uploadImage('products', $request->picture);
            $Product->picture = $fileName;
            $Product->save();

            //  Options
            if(isset($request->option)){
                foreach ($request->option as $option) {
                    Option::create([
                        'product_id' => $Product->id,
                        'attribute_id' => $option['attribute_id'],
                        'name' => $option['name'],
                        'price' => $option['price'],
                        'status' => 1,
                    ]);
                }
            }
            DB::commit();
            return redirect()->route('Product.index')->with(['success' => 'تم ألاضافة بنجاح']);
           } catch (\Exception $ex) {
               DB::rollback();
              return redirect()->route('Product.index')->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);
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
        $product = Product::find($id);
        if (!$product)
            return redirect()->route('Product.index')->with(['error' => 'هذا العنصر غير موجود ']);
        else
            return redirect()->route('Product.index')->with(['error' => 'لم تتم عمل صفحه ال show بعد ']);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::find($id);
        if (!$product)
            return redirect()->route('Product.index')->with(['error' => 'هذا العنصر غير موجود ']);

        $categories = Category::CategoriesAvailable()->get();
        $attributes = Attribute::AttributesAvailable()->get();
        $options = Option::where('product_id',$product->id)->with('attribute')->get();
        return view('products.edit',
            compact('product','options','categories','attributes'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductRequest $request, $id)
    {

        try {
            DB::beginTransaction();
            $Product = Product::find($id);
            $Product->update($request->except('_token','picture','_method'));

            //  Start Change Photo
                if($request->picture){
                $photo  = replaceurl($Product->picture);
                if (File::exists($photo)) {
                    File::delete($photo);
                }
                    $fileName = uploadImage('products', $request->picture);
                    $Product->picture = $fileName;
                    $Product->save();
                }
            //End Change Photo

            //  Start Options
            if(isset($request->option)) {
                foreach ($request->option as $option) {
                    if (isset($option['id'])) {
                        Option::where('id', $option['id'])->update([
                            'name' => $option['name'],
                            'attribute_id' => $option['attribute_id'],
                            'price' => $option['price'],
                            'status' => $option['status'],
                        ]);
                    } else {
                        Option::create([
                            'product_id' => $id,
                            'attribute_id' => $option['attribute_id'],
                            'name' => $option['name'],
                            'price' => $option['price'],
                            'status' => 1,
                        ]);
                    }

                }
            }
            //  End Options

            DB::commit();
            return redirect()->route('Product.index')->with(['success' => 'تم التعديل بنجاح']);
        } catch (\Exception $ex) {
            DB::rollback();
            return redirect()->route('Product.index')->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);
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
        $Product = Product::find($id);
        if (!$Product)
            return redirect()->route('Product.index')->with(['error' => 'هذا العنصر غير موجود ']);

            $photo  = replaceurl($Product->picture);
            if (File::exists($photo)) {
                File::delete($photo);
            }
        $Product->delete();
        return redirect()->route('Product.index')->with(['success' => 'تم الحذف بنجاح']);

    }
}
