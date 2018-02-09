<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class LombaController extends Controller
{
    function index(){
        if(Auth::user()->role !='admin'){
            return 'maaf anda bukan admin';
        }
        return view('lomba.index');
    }

    function detail($id){
        return view('lomba.detail');
    }

    function edit($id){
        if(Auth::user()->role !='admin'){
            return 'maaf anda bukan admin';
        }
        $lomba = \App\Lomba::find($id);
        return view('lomba.edit')->with('lomba',$lomba);
    }

    function create(Request $request){
        if(Auth::user()->role !='admin'){
            return 'maaf anda bukan admin';
        }
        // dd($request);
        $nama = $request->nama;
        $deskripsi = $request->deskripsi;
        $poster = $request->poster;
        $tgl = $request->tglttp;

        if($nama == null){
            return 'nama kosong';
        }
        if($deskripsi == null){
            return 'deskripsi kosong';
        }
        if($poster == null){
            return 'poster kosong';
        }
        if($tgl == null){
            return 'tanggal kosong';
        }

        $lomba = new \App\Lomba; // membuat data baru
        $lomba->name = $nama;
        $lomba->deskripsi = $deskripsi;
        $lomba->poster = $poster;
        $lomba->tanggal_tutup = $tgl;
        $lomba->save();
        return redirect('lomba');
    }

    function update(Request $request, $id){
        if(Auth::user()->role !='admin'){
            return 'maaf anda bukan admin';
        }
        $nama = $request->nama;
        $deskripsi = $request->deskripsi;
        $poster = $request->poster;
        $tgl = $request->tglttp;

        if($nama == null){
            return 'nama kosong';
        }
        if($deskripsi == null){
            return 'deskripsi kosong';
        }
        if($poster == null){
            return 'poster kosong';
        }
        if($tgl == null){
            return 'tanggal kosong';
        }

        $lomba = \App\Lomba::find($id); //get data yg sudah ada berdasarkan ID
        $lomba->name = $nama;
        $lomba->deskripsi = $deskripsi;
        $lomba->poster = $poster;
        $lomba->tanggal_tutup = $tgl;
        $lomba->save();
        return redirect('lomba');
    }

    function delete($id){
        if(Auth::user()->role !='admin'){
            return 'maaf anda bukan admin';
        }
        $lomba = \App\Lomba::find($id);
        return view('lomba.delete')->with('data',$lomba);
    }

    function add(){
        if(Auth::user()->role !='admin'){
            return 'maaf anda bukan admin';
        }
        return view('lomba.add');
    }
    function deleteConfirm($id){
        if(Auth::user()->role !='admin'){
            return 'maaf anda bukan admin';
        }
        $lomba = \App\Lomba::find($id);
        $lomba->delete();
        return redirect('lomba');
    }
}
