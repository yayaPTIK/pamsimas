<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Block;
use App\Models\User;
use App\Models\Tagihan;

class BlockController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::where('role',0);
        $block = Block::all();
        return view('admin.block.showBlock',compact('block','users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.block.inputBlock');
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
        ]);

        $block = new Block();
        $block->name = $request->name;
        $block->save();
        return redirect()->route('block.index')->with('successMsg', 'Data Block berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $block = Block::find($id);
        $tagih = Tagihan::all();
        // $user = User::with('tagihans')->find($id);
        $users = User::with('tagihans')->orderBy('name','asc')->where('alamat',$block->name)->where('role',0)->paginate(1000);
        return view('admin.block.pelanggan',compact('block','users','tagih'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $block = Block::find($id);
        return view('admin.block.editBlock',compact('block'));
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
            'name' => 'required'
        ]);

        $l = Block::find($id);
        $l->name = $request->name;
        $l->save();
        return redirect()->route('block.index')->with('successMsg','Data Berhasil di Update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $block = Block::find($id);
        $block->delete();
        return redirect()->back()->with('successMsg','Data Berhasil dihapus');
    }
}
