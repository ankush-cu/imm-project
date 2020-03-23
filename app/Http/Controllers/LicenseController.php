<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\license;

class LicenseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $licenses = license::all();
     
        return view('admin.license.license')->with('licenses',$licenses);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.license.add_license');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->isMethod('post'))
        {
            $data=$request->all();

            $license = new license;
            $license->lic_name=$data['license_name'];
            $license->status=1;
            $license->save();
            return redirect('/admin/license/create')->with('flash_message_success','New License Type Added');


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
        $license = license::find($id);
        return view('admin.license.edit_license')->with('license',$license);
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
        if($request->isMethod('Put'))
        {
            $data=$request->all();  
            $license = license::find($id);
            $license->lic_name=$data['license_name'];   
           
            $license->save();
            return redirect('/admin/license')->with('flash_message_success','License Name Updated');


        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        if($request->isMethod('delete'))
        {
           $license = license::find($id);

            if($license->status==0)
            {
                license::where('lic_id', $id)->update(['status' => 1]);
            }
            else{
                license::where('lic_id', $id)->update(['status' => 0]);
            }

        
            return redirect('/admin/license')->with('flash_message_error','Status Updated');
        }
    }
}
