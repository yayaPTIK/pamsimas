<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Layanan;
use App\Models\Tagihan;
use App\Models\Block;
use Carbon\Carbon;

class TagihanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $block  = Block::all();
        $tagihans = Tagihan::latest()->where('user_id',$id)->search()->paginate(12);
        return view('admin.tagihan.showTagihan', compact('tagihans','block'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $date = Carbon::now();
        $month = $date->format('F');
        $users = User::find($id);
        // $user3 = User::with('tagihans')->find($id);
        $user = $users->tagihans->where('user_id',$id)->last();
        // $user3 = $users->tagihans->where('user_id',$id)->first()->m_lalu;
        $tagih = Tagihan::all();
        $meter  = Tagihan::where('user_id',$id);
        return  view('admin.tagihan.createTagihan', compact('users','meter','tagih','user','month'));
    }

    public function list()
    {
        $lists = Block::all();
        return view('admin.tagihan.index',compact('lists'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $this->validate($request,[
        //     'user_id' => 'required',
        //     'transaksiID' => 'required',
        //     'name' => 'required',
        //     'bulan' => 'required',
        //     'tahun' => 'required',
        //     'm_lalu' => 'required',
        //     'm_ini' => 'required',
        //     'pemakaian' => 'required',
        //     'abodamen' => 'required',
        //     'denda' => 'required',
        //     'diskon' => 'required',
        //     'total' => 'required',

        // ]);
        $month = date('m');
        $day = date('d');
        $year = date('Y');
        $tagihan = new Tagihan();
        $tagihan->user_id = $request->user_id;
        $tagihan->transaksiID = 'ID'.$request->user_id.''.$day.''.$month.''. $year.''.$request->transaksiID;
        $tagihan->name = $request->name;
        $tagihan->block = $request->block;
        $tagihan->bulan = $request->bulan;
        $tagihan->tahun = $year;
        $tagihan->m_lalu = $request->m_lalu;
        $tagihan->m_ini = $request->m_ini;
        $tagihan->pemakaian = $request->pemakaian;
        $tagihan->permeter = $request->permeter;
        $layanan = $request->layanan;
        if ($layanan == 2) {
            $tagihan->abodamen = 0;
            $tagihan->total = $request->total;
        }else if($layanan == 3){
            $tagihan->abodamen=5000;
            $tagihan->total = $request->total + 5000;
        }else if($layanan == 1){
            if ($tagihan->pemakaian == 0) {
                $tagihan->abodamen = 15000;
                $tagihan->total = $request->total + $tagihan->abodamen = 15000;
            }else if($request->pemakaian == 1){
                $tagihan->abodamen = 14000;
                $tagihan->total = $request->total + 14000;
            }else if($request->pemakaian == 2){
                $tagihan->abodamen = 13000;
                $tagihan->total = $request->total + 13000;
            }else if($request->pemakaian == 3){
                $tagihan->abodamen = 12000;
                $tagihan->total = $request->total + 12000;
            }else if($request->pemakaian == 4){
                $tagihan->abodamen = 11000;
                $tagihan->total = $request->total + 11000;
            }else if($request->pemakaian == 5){
                $tagihan->abodamen = 10000;
                $tagihan->total = $request->total + 10000;
            }else if($request->pemakaian == 6){
                $tagihan->abodamen = 9000;
                $tagihan->total = $request->total + 9000;
            }else if($request->pemakaian == 7){
                $tagihan->abodamen = 8000;
                $tagihan->total = $request->total + 8000;
            }else if($request->pemakaian == 8){
                $tagihan->abodamen = 7000;
                $tagihan->total = $request->total + 7000;
            }else if($request->pemakaian == 9){
                $tagihan->abodamen = 6000;
                $tagihan->total = $request->total + 6000;
            }else if($request->pemakaian >= 10){
                $tagihan->abodamen = 5000;
                $tagihan->total = $request->total + 5000;
            }
        }
        $tagihan->denda = 0;
        $tagihan->diskon = $request->diskon;
        $tagihan->status = false;
        $tagihan->save();
        return redirect()->back()->with('successMsg','Tagihan '.$tagihan->name.' berhasil ditambahkan! Kembali untuk membuat tagihan.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tagihan = Tagihan::find($id);
        return view('admin.tagihan.struckTagihan',compact('tagihan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tagihan = Tagihan::find($id);
        return view('admin.tagihan.editLunasTagihan',compact('tagihan'));
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
        $tagihan = Tagihan::find($id);
        $tagihan->status = 1;
        $tagihan->save();
        return view('admin.tagihan.struckTagihan',compact('tagihan'));
        // redirect()->route('tagihan.index')->with('successMsg','Pembayaran Berhasil');
    }

    public function denda($id) 
    {
        $tagihan = Tagihan::find($id);
        $tagihan->denda = 5000;
        $tagihan->total = $tagihan->total + 5000;
        $tagihan->save();
        return redirect()->route('tagihan.index',$tagihan->user_id)->with('successMsg','Tagihan berhasil ditambahkan Denda.');
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

    //khusus page tahigan
    public function tunggakan()
    {
        $tagihans = Tagihan::latest()->where('status',0)->search()->paginate(12);
        return view('admin.dataTunggakan.tagihan', compact('tagihans'));
    }

    public function printTunggakan()
    {
        $userss = User::all()->where('role','0');
        return view('admin.dataTunggakan.printTunggakan',compact('userss'));
        // return view('admin.dataTunggakan.printTunggakan', compact('userss'));
        // $userss = User::all()->where('role','0');
        // return view('admin.pelanggan.printPelanggan',compact('userss'));
    }
}
