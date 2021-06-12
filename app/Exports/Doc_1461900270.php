<?php

namespace App\Exports;

use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;

class Doc_1461900270 implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $dataBuku = DB::table("rak_buku")
        -> join("buku","rak_buku.id_buku","=","buku.id")
        -> join("jenis_buku","rak_buku.id_jenis_buku","=","jenis_buku.id")
        -> select("rak_buku.id as id","buku.judul as nama","jenis_buku.jenis as jenis","buku.tahun_terbit as tahun")
        -> get();
        return $dataBuku;
    }
}
