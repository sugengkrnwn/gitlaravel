<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class LombaController extends Controller
{
    function index(){
        if(Auth::user()->role != 'admin'){
            return "you are not admin"
        }
        $lombas= \App\Lomba::get();
        return view('lomba.index')->with('lomba',$lombas);
    }
    function add(){
        return view('lomba.add');
    }
    function create(Request $request){

        $nama = $request->name;
        $deskripsi = $request->deskripsi;
        $tanggal_tutup = $request->tanggal_tutup;
        $poster = $request->poster;
    }
    function edit(){
        return view('lomba.edit');
    }
    function update(Request $request){

    }
    function delete(){

    }
    function deleteConfirm(){
        
    }
}
