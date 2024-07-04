<?php

namespace App\Http\Controllers;

use App\Models\UploadPersyaratan;
use App\Models\MasterDokumenSyarat;
use App\Models\Perusahaan;
use Barryvdh\DomPDF\PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\DataTables;

class UploadPersyaratanController extends Controller
{
    public function create()
    {
        $title['title'] = 'Upload Persyaratan';
        $data['perusahaan'] = MasterDokumenSyarat::where('jenis', 'perusahaan')->get();
        $data['media'] = MasterDokumenSyarat::where('jenis', 'media')->get();
        $data['jurnalis'] = MasterDokumenSyarat::where('jenis', 'jurnalis')->get();
        return view('uploadpersyaratan.create', $title)->with($data);
    }

    public function store(Request $request)
    {
        //Validasi data
        $validasi = [
            'nama_perusahaan' => 'required', //inputan
            'nama_direktur' => 'required', //inputan
            'nama_media' => 'required', //inputan
            'nama_jurnalis' => 'required', //inputan
            'email_jurnalis' => 'required|email', //inputan
            'nomor_kontak_jurnalis' => 'required', //inputan

        ];
        //Validasi file
        $dokumen = MasterDokumenSyarat::all();
        foreach ($dokumen as $key => $value) {
            if ($value->required == 1) {
                $validasi[$value->kode] = 'required|file|mimes:pdf|max:2048';
            }
        }
        $request->validate($validasi);

        //Validasi url
        if ($request->jenis_media == 'online') {
            $request->validate([
                'url_media' => 'required|url',
            ]);
        } else {
            $request->validate([
                'klasifikasi_media' => [
                    'required',
                    'in:lokal,regional,nasional',
                ],
            ]);
        }

        //upload isian form 
        $upload = new Perusahaan([
            'users_id' => Auth::id(),
            'nama_perusahaan' => $request->nama_perusahaan,
            'nama_direktur' => $request->nama_direktur,
            'nama_media' => $request->nama_media,
            'domisili_media' => $request->domisili_media,
            'nama_jurnalis' => $request->nama_jurnalis,
            'email_jurnalis' => $request->email_jurnalis,
            'nomor_kontak_jurnalis' => $request->nomor_kontak_jurnalis,
            'jenis_media' => $request->jenis_media,
            'url_media' => $request->url_media,
            'klasifikasi_media' => $request->klasifikasi_media,
            'status' => 'menunggu_verifikasi',
        ]);
        $upload->save();
        //mengambil id dari model
        $id_perusahaan = $upload->id;

        //upload dokumen
        foreach ($dokumen as $key => $value) {

            if ($request->hasFile("$value->kode")) {
                $file = $request->file("$value->kode");
                $filename = time() . '.' . $file->getClientOriginalExtension();
                $file->storeAs('public/' . $value->kode, $filename);
                $upload_dokumen = new UploadPersyaratan([
                    'perusahaan_id' => $id_perusahaan,
                    'dokumensyarat_id' => $value->id,
                    'status' => $request->status,
                    'file' => $filename,
                    'created_at' => date('Y-m-d H:i:s'),
                    'created_by' => Auth::id(),
                ]);
                $upload_dokumen->save();
            }
        }

        //redirect ke index
        return response()->json([
            'status' => 'success',
            'message' => 'Upload Persyaratan Berhasil',
            'url' => route('uploadpersyaratan.index')
        ]);
    }

    //Tampilan riwayat setelah user upload
    public function index(Request $request)
    {
        $title['title'] = 'Riwayat Upload Persyaratan';
        if ($request->ajax()) {
            $data = Perusahaan::select('id', 'nama_perusahaan', 'status',  'created_at')->where('users_id', Auth::id())->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($data) {
                    $button = '<div class="dropdown">
                    <button class="btn btn-primary dropdown-toggle" type="button" id="actionDropdown' . $data->id . '" data-bs-toggle="dropdown" aria-expanded="false">
                        Pilih Aksi
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="actionDropdown' . $data->id . '">
                        <li><a class="dropdown-item" href="' . route('users.edit', $data->id) . '"><i class="ki-duotone ki-pencil fs-5">
                            <span class="path1"></span>
                            <span class="path2"></span>
                        </i> Edit</a></li>
                    </ul>
                </div>';
                    return $button;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('uploadpersyaratan.index', $title);
    }

    //Tampilan table review verfikator
    public function review(Request $request)
    {
        $title['title'] = 'Verifikasi Berkas';
        $upload = Perusahaan::where('status', 'menunggu_verifikasi', 'terverifikasi')->get();
        if ($request->ajax()) {
            $data = Perusahaan::select('id', 'users_id', 'nama_perusahaan', 'status')->where('status', 'menunggu_verifikasi')->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($data) {
                    $button = '<div class="dropdown">
                                    <button class="btn btn-primary dropdown-toggle" type="button" id="actionDropdown' . $data->id . '" data-bs-toggle="dropdown" aria-expanded="false">
                                        Pilih Aksi
                                    </button>
                                    <ul class="dropdown-menu" aria-labelledby="actionDropdown' . $data->id . '">
                                        <li><a class="dropdown-item" href="' . route('verifikasi.detail', $data->id) . '"><i class="ki-duotone ki-eye fs-5">
                                            <span class="path1"></span>
                                            <span class="path2"></span>
                                            <span class="path3"></span>
                                        </i> Detail</a></li>
                                    </ul>
                                </div>';
                    return $button;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('uploadpersyaratan.review', $title, compact('upload'));
    }
    //Tampilan table riwayat verfikator
    public function riwayat(Request $request)
    {
        $title['title'] = 'Riwayat Verifikasi Persyaratan';
        $upload = Perusahaan::whereIn('status', ['terverifikasi', 'ditolak'])->get();
        if ($request->ajax()) {
            $data = Perusahaan::select('id', 'users_id', 'nama_perusahaan', 'status')->whereIn('status', ['terverifikasi', 'ditolak'])->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($data) {
                    $button = '<div class="dropdown">
                                    <button class="btn btn-primary dropdown-toggle" type="button" id="actionDropdown' . $data->id . '" data-bs-toggle="dropdown" aria-expanded="false">
                                        Pilih Aksi
                                    </button>
                                    <ul class="dropdown-menu" aria-labelledby="actionDropdown' . $data->id . '">
                                        <li><a class="dropdown-item" href="' . route('verifikasi.detail', $data->id) . '"><i class="ki-duotone ki-eye fs-5">
                                            <span class="path1"></span>
                                            <span class="path2"></span>
                                            <span class="path3"></span>
                                        </i> Detail</a></li>
                                    </ul>
                                </div>';
                    return $button;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('uploadpersyaratan.riwayat', $title, compact('upload'));
    }

    //menampilkan dalaman halaman ketika klik aksi detail
    public function detail($id)
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

        return view('uploadpersyaratan.detail', $title, compact('upload', 'perusahaan'));
    }

    public function verify($id)
    {
        $perusahaan = Perusahaan::find($id);
        if ($perusahaan) {
            $perusahaan->status = 'terverifikasi';
            $perusahaan->save();

            return redirect()->route('verifikasi.riwayat')->with('success', 'Dokumen berhasil diverifikasi.');
        } else {
            abort(404, 'Perusahaan tidak ditemukan');
        }
    }

    public function reject($id)
    {
        $perusahaan = Perusahaan::find($id);
        if ($perusahaan) {
            $perusahaan->status = 'ditolak';
            $perusahaan->save();

            return redirect()->route('verifikasi.riwayat')->with('success', 'Dokumen berhasil ditolak.');
        } else {
            abort(404, 'Perusahaan tidak ditemukan');
        }
    }

    public function showPdfViewer($id)
    {
        $pdf = UploadPersyaratan::findOrFail($id);
        if (!$pdf) {
            abort(404, 'PDF Tidak Ditemukan');
        }
        // Menampilkan PDF di PDF viewer
        $pdfUrl = route('uploadpersyaratan.fetchPDF', $id);

        return view('uploadpersyaratan.pdfviewer')->with([
            'FILE_PDF' => request()->input('file'),
            'URL_ASSET' => asset('frontend/pdfjs'),
        ]);
    }

    public function fetchPDF($id)
    {
        $pdf = UploadPersyaratan::findOrFail($id);
        if (!$pdf || !$pdf->path) {
            abort(404, 'PDF Tidak Ditemukan');
        }

        $filePath = Storage::disk('public')->url($pdf->path);
        // $filePath = storage_path('app/public/'.$file);
        $fileName = basename($pdf->path);

        return response()->streamDownload(function () use ($filePath) {
            echo file_get_contents($filePath);
        }, $fileName, [
            'Content-Type' => 'application/pdf',
        ]);
    }
}
