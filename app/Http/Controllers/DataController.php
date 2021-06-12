<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\Doc_1461900270;


class DataController extends Controller
{
    public function index(){
        $dataBuku = DB::table("rak_buku")
        -> join("buku","rak_buku.id_buku","=","buku.id")
        -> join("jenis_buku","rak_buku.id_jenis_buku","=","jenis_buku.id")
        -> select("rak_buku.id as id","buku.judul as nama","jenis_buku.jenis as jenis","buku.tahun_terbit as tahun")
        -> get();
        return view('main0270',['data' => $dataBuku]);
    }
    public function export(){
        return Excel::download(new Doc_1461900270,"Doc_1461900270.xlsx");
    }
}
