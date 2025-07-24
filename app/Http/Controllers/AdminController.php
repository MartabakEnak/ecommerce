<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;

class AdminController extends Controller
{
    public function dashboard()
    {
        return view('admin.dashboard');
    }

    public function produk()
    {
        $produks = Produk::all();
        return view('admin.produk', compact('produks'));
    }
}
