<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Dokter;

class AdminController extends Controller
{
    public function addview()
    {
        return view('admin.tambah_dokter');
    }
    public function upload(Request $request)
    {
        $dokter=new dokter;
        $foto= $request->foto;
    $namafoto=time().'.'.$foto->getClientOriginalExtension();
    $request->foto->move('fotodokter',$namafoto);
    $dokter->foto=$namafoto;
    $dokter->name= $request->name;
    $dokter->no_hp= $request->no_hp;
    $dokter->ruangan= $request->ruangan;
    $dokter->spesialisasi= $request->spesialisasi;

    $dokter->save();
    return redirect()->back()->with('message', 'Berhasil Menambahkan Dokter');
    }
}