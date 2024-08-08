<?php

namespace App\Http\Controllers;

use App\Models\Perusahaan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DetailPersController extends Controller
{
    public function detailPers($id)
    {
        $title['title'] = 'Detail Upload Persyaratan';
        $perusahaan = Perusahaan::findOrFail($id);
        // $upload = UploadPersyaratan::where('perusahaan_id', $id)->firstOrFail();
        $upload = DB::table('m_dokumensyarat')
            ->join('upload_persyaratans', 'm_dokumensyarat.id', '=', 'upload_persyaratans.dokumensyarat_id')
            ->select('upload_persyaratans.*', 'm_dokumensyarat.nama_dokumen', 'm_dokumensyarat.kode')
            ->whereColumn('m_dokumensyarat.id', '=', 'upload_persyaratans.dokumensyarat_id')
            ->where('upload_persyaratans.perusahaan_id',  $id)
            ->get();
        $join_dokumen = DB::table('upload_persyaratans')
            ->join('m_dokumensyarat', 'upload_persyaratans.dokumensyarat_id', '=', 'm_dokumensyarat.id')
            ->join('perusahaan', 'upload_persyaratans.perusahaan_id', '=', 'perusahaan.id')
            ->select(
                'upload_persyaratans.perusahaan_id',
                'upload_persyaratans.dokumensyarat_id',
                'upload_persyaratans.file',
                'm_dokumensyarat.kode',
                'm_dokumensyarat.nama_dokumen',
                'perusahaan.status'
            )
            ->where('upload_persyaratans.perusahaan_id', $id)
            ->get();


        return view('pers.detailpers', $title, compact('perusahaan', 'join_dokumen', 'upload'));
    }
}
