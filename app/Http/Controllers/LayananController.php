<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Layanan;

class LayananController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $layanan = Layanan::all();
        return view('admin.layanan.showLayanan',compact('layanan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.layanan.inputLayanan');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required',
            'abodamen' => ['required','numeric'],
            'permeter' => ['required','numeric']
        ]);

        $layanan = new Layanan();
        $layanan->name = $request->name;
        $layanan->abodamen = $request->abodamen;
        $layanan->permeter = $request->permeter;
        $layanan->save();
        return redirect()->route('layanan.index')->with('successMsg','Data Layanan Berhasil ditambahkan');
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
        $l = Layanan::find($id);
        return view('admin.layanan.editLayanan',compact('l'));
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
        $this->validate($request,[
            'name' => 'required',
            'abodamen'=>'required|numeric',
            'permeter'=> 'required|numeric'
        ]);

        $l = Layanan::find($id);
        $l->name = $request->name;
        $l->abodamen = $request->abodamen;
        $l->permeter = $request->permeter;
        $l->save();
        return redirect()->route('layanan.index')->with('successMsg','Data Berhasil di Update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $l = Layanan::find($id);
        $l->delete();
        return redirect()->back()->with('successMsg','Data Berhasil Dihapus!');
    }
}
