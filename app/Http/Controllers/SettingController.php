<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\SettingRequest;
use Illuminate\Support\Facades\File;

use Illuminate\Http\Request;
use App\Models\Setting;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $settings = Setting::firstOrCreate();
        return view('settings.index',compact('settings'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SettingRequest $request, $id)
    {
       // return $request;
        try {
            DB::beginTransaction();
            $setting = Setting::find($id);
            Setting::where('id',$id)->update($request->except('_token','logo','smallLogo','_method'));
           if($request->hasFile('logo')){
                $logo  = replaceurl($setting->logo);
                if (File::exists($logo)) {
                    File::delete($logo);
                }
                $fileName = uploadImage('setting', $request->logo);
                $setting->logo = $fileName;
                $setting->save();
            }
            if($request->hasFile('smallLogo')){
                $logo  = replaceurl($setting->smallLogo);
                if (File::exists($logo)) {
                    File::delete($logo);
                }
                $fileName = uploadImage('setting', $request->smallLogo);
                $setting->smallLogo = $fileName;
                $setting->save();
            }
            DB::commit();
            return redirect()->back()->with(['success' => 'تم التعديل بنجاح']);
        } catch (\Exception $ex) {
            DB::rollback();
            return redirect()->back()->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);
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
        //
    }
}
