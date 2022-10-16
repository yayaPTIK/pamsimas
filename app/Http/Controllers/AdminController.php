<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Layanan;
use App\Models\Tagihan;
use App\Models\Block;
use App\Models\Bulan;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;

class AdminController extends Controller
{
    public function index()
    {
        $layanan = Layanan::all();
        $tahun = date('Y');
        $user=User::all();
        $block=Block::all();
        $tagihans = Tagihan::latest()->where('status',true)->where('tahun',$tahun)->sum('total');
        $tagihans2 = Tagihan::latest()->where('status',false)->where('tahun',$tahun)->sum('total');

        // report day
        $day = Tagihan::whereDate('updated_at', date('Y-m-d'))->where('status',true)->sum('total');
        $month = Tagihan::whereMonth('updated_at', date('m'))->whereYear('updated_at', date('Y'))->where('status',true)->sum('total');

        $categories = [];
        for ($i=0; $i < 12; $i++) { 
            $categories[] = ['Jan','Feb','Mar','Apr','Mei','Jun','Jul','Agst','Sept','Okt','Nov','Des'];
        }
        $nilai1 = Tagihan::where('tahun',$tahun)->where('bulan','Januari')->count();
        $nilai2 = Tagihan::where('tahun',$tahun)->where('bulan','Februari')->count();
        $nilai3 = Tagihan::where('tahun',$tahun)->where('bulan','Maret')->count();
        $nilai4 = Tagihan::where('tahun',$tahun)->where('bulan','April')->count();
        $nilai5 = Tagihan::where('tahun',$tahun)->where('bulan','Mei')->count();
        $nilai6 = Tagihan::where('tahun',$tahun)->where('bulan','Juni')->count();
        $nilai7 = Tagihan::where('tahun',$tahun)->where('bulan','Juli')->count();
        $nilai8 = Tagihan::where('tahun',$tahun)->where('bulan','Agustus')->count();
        $nilai9 = Tagihan::where('tahun',$tahun)->where('bulan','September')->count();
        $nilai10 = Tagihan::where('tahun',$tahun)->where('bulan','Oketober')->count();
        $nilai11 = Tagihan::where('tahun',$tahun)->where('bulan','November')->count();
        $nilai12 = Tagihan::where('tahun',$tahun)->where('bulan','Desember')->count();
        
        return view('admin.dashboard', compact('layanan','tagihans','tagihans2','user','block','categories','day','month',
        'nilai1','nilai2','nilai3','nilai4','nilai5','nilai6','nilai7','nilai8','nilai9','nilai10','nilai11','nilai12',
    ));
    }

    public function addUser()
    {
        $block = Block::all();
        $layanan = Layanan::all();
        return view('auth.register',compact('layanan','block'));
    }

    public function addUserStore(Request $request)
    {
        $this->validate($request, [
            'name' => ['required', 'string', 'max:255'],
            'username' => ['required', 'string','unique:users'],
            'hp' => ['required', 'string','max:12'],
            'alamat' => ['required', 'string'],
            'layanan' => ['required','string'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->username = $request->username;
        $user->hp = $request->hp;
        $user->alamat = $request->alamat;
        $user->role = 0;
        $user->layanan_id = $request->layanan;
        $user->password = Hash::make($request->password);

        $user->save();
        return redirect()->back()->with('successMsg','data berhasil di simpan');
    }

    public function showUser()
    {
        $usersss = User::all();
        $tagih = Tagihan::all();
        // $all = User::all();
        $lalu = User::all();
        // $user = $users->tagihans->where('user_id',$id)->last();
        $users = User::latest()->search()->where('role','0')->paginate(15);
        return view('admin.pelanggan.showPelanggan', compact('users','tagih','lalu','usersss'));
    }

    public function printUser()
    {
        $userss = User::all()->where('role','0');
        return view('admin.pelanggan.printPelanggan',compact('userss'));
    }
    public function edit($id)
    {
        $block = Block::all();
        $layanan = Layanan::all();
        $user = User::find($id);
        return view('admin.edit',compact('user','block','layanan'));
    }

    public function UpdateUserStore(Request $request, $id)
    {
        $this->validate($request, [
            'name' => ['required', 'string', 'max:255'],
            'username' => ['required', 'string'],
            'hp' => ['required', 'string','max:12'],
            'alamat' => ['required', 'string'],
            'layanan' => ['required','string'],
        ]);

        $user = User::find($id);
        $user->name = $request->name;
        $user->username = $request->username;
        $user->hp = $request->hp;
        $user->alamat = $request->alamat;
        $user->layanan_id = $request->layanan;
        $user->save();
        return redirect()->route('showUser')->with('successMsg','data berhasil di update');
    }

    public function superAdmin()
    {
        $block  = Block::all();
        $tagihans = Tagihan::latest()->search()->paginate(20);
        return view('superadmin.delete',compact('block','tagihans'));
    }

    public function delete($id)
    {
        $tagihan = Tagihan::find($id);
        $tagihan->delete();
        return redirect()->back()->with('successMsg','data berhasil di hapus');
    }
}
