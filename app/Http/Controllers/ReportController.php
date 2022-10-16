<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tagihan;

class ReportController extends Controller
{
    public function index()
    {
        $tagihans = Tagihan::latest()->report()->where('status', 1)->get();
        return view('admin.report.index', compact('tagihans'));
    }
}
