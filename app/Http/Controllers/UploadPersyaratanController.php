<?php

namespace App\Http\Controllers;

use App\Models\UploadPersyaratan;
use Barryvdh\DomPDF\PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\DataTables;

class UploadPersyaratanController extends Controller
{
    public function create()
    {
        $title['title'] = 'Upload Persyaratan';
        return view('uploadpersyaratan.create', $title);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_perusahaan' => 'required',
            'akta_pendirian' => 'required|file|mimes:pdf|max:2048', //upload file
            'nib_siup' => 'required|file|mimes:pdf|max:2048', //upload file
            'npwp_perusahaan' => 'required|file|mimes:pdf|max:2048', //upload file
            'nomor_pkp' => 'required|file|mimes:pdf|max:2048', //upload file
            'spt_tahunan' => 'required|file|mimes:pdf|max:2048', //upload file
            'domisili_perusahaan' => 'required|file|mimes:pdf|max:2048', //upload file
            'nama_direktur' => 'required', //inputan
            'ktp_direktur' => 'required|file|mimes:pdf|max:2048', //upload file
            'surat_penawaran_kerjasama' => 'required|file|mimes:pdf|max:2048', //upload file
            'surat_kuasa_pimpinan' => 'file|mimes:pdf|max:2048', //upload file
            'nama_media' => 'required', //inputan
            'domisili_media' => 'required', //inputan
            'sertifikat_dewan_pers' => 'required|file|mimes:pdf|max:2048', //upload file
            'organisasi_kewartanan' => 'required|file|mimes:pdf|max:2048', //upload file
            'surat_pernyataan_aktif' => 'required|file|mimes:pdf|max:2048', //upload file
            'nama_jurnalis' => 'required', //inputan
            'email_jurnalis' => 'required|email', //inputan
            'nomor_kontak_jurnalis' => 'required', //inputan
            'kartu_pers' => 'required|file|mimes:pdf|max:2048', //upload file
            'sertifikat_ukw' => 'required|file|mimes:pdf|max:2048', //upload file
        ]);

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

        $upload = new UploadPersyaratan();
        $upload->users_id = Auth::id();
        $upload->nama_perusahaan = $request->nama_perusahaan;
        $upload->nama_direktur = $request->nama_direktur;
        $upload->nama_media = $request->nama_media;
        $upload->domisili_media = $request->domisili_media;
        $upload->nama_jurnalis = $request->nama_jurnalis;
        $upload->email_jurnalis = $request->email_jurnalis;
        $upload->nomor_kontak_jurnalis = $request->nomor_kontak_jurnalis;
        $upload->jenis_media = $request->jenis_media;
        $upload->url_media = $request->url_media;
        $upload->klasifikasi_media = $request->klasifikasi_media;
        $upload->status = 'Menunggu verifikasi';
        $upload->save();


        if ($request->hasFile('akta_pendirian')) {
            $file = $request->file('akta_pendirian');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->storeAs('public/akta_pendirian', $filename);
            $upload->akta_pendirian = $filename;
            $upload->save();
        }
        if ($request->hasFile('nib_siup')) {
            $file = $request->file('nib_siup');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->storeAs('public/nib_siup', $filename);
            $upload->nib_siup = $filename;
            $upload->save();
        }
        if ($request->hasFile('npwp_perusahaan')) {
            $file = $request->file('npwp_perusahaan');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->storeAs('public/npwp_perusahaan', $filename);
            $upload->npwp_perusahaan = $filename;
            $upload->save();
        }
        if ($request->hasFile('nomor_pkp')) {
            $file = $request->file('nomor_pkp');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->storeAs('public/nomor_pkp', $filename);
            $upload->nomor_pkp = $filename;
            $upload->save();
        }
        if ($request->hasFile('spt_tahunan')) {
            $file = $request->file('spt_tahunan');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->storeAs('public/spt_tahunan', $filename);
            $upload->spt_tahunan = $filename;
            $upload->save();
        }
        if ($request->hasFile('domisili_perusahaan')) {
            $file = $request->file('domisili_perusahaan');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->storeAs('public/domisili_perusahaan', $filename);
            $upload->domisili_perusahaan = $filename;
            $upload->save();
        }
        if ($request->hasFile('ktp_direktur')) {
            $file = $request->file('ktp_direktur');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->storeAs('public/ktp_direktur', $filename);
            $upload->ktp_direktur = $filename;
            $upload->save();
        }
        if ($request->hasFile('surat_penawaran_kerjasama')) {
            $file = $request->file('surat_penawaran_kerjasama');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->storeAs('public/surat_penawaran_kerjasama', $filename);
            $upload->surat_penawaran_kerjasama = $filename;
            $upload->save();
        }
        if ($request->hasFile('surat_kuasa_pimpinan')) {
            $file = $request->file('surat_kuasa_pimpinan');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->storeAs('public/surat_kuasa_pimpinan', $filename);
            $upload->surat_kuasa_pimpinan = $filename;
            $upload->save();
        }
        if ($request->hasFile('sertifikat_dewan_pers')) {
            $file = $request->file('sertifikat_dewan_pers');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->storeAs('public/sertifikat_dewan_pers', $filename);
            $upload->sertifikat_dewan_pers = $filename;
            $upload->save();
        }
        if ($request->hasFile('organisasi_kewartanan')) {
            $file = $request->file('organisasi_kewartanan');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->storeAs('public/organisasi_kewartanan', $filename);
            $upload->organisasi_kewartanan = $filename;
            $upload->save();
        }
        if ($request->hasFile('surat_pernyataan_aktif')) {
            $file = $request->file('surat_pernyataan_aktif');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->storeAs('public/surat_pernyataan_aktif', $filename);
            $upload->surat_pernyataan_aktif = $filename;
            $upload->save();
        }
        if ($request->hasFile('kartu_pers')) {
            $file = $request->file('kartu_pers');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->storeAs('public/kartu_pers', $filename);
            $upload->kartu_pers = $filename;
            $upload->save();
        }
        if ($request->hasFile('sertifikat_ukw')) {
            $file = $request->file('sertifikat_ukw');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->storeAs('public/sertifikat_ukw', $filename);
            $upload->sertifikat_ukw = $filename;
            $upload->save();
        }

        return response()->json([
            'status' => 'success',
            'message' => 'Upload Persyaratan Berhasil',
            'url' => route('uploadpersyaratan.index')
        ]);
    }

    //Tampilan riwayat upload user
    public function index(Request $request)
    {
        $title['title'] = 'Riwayat Upload Persyaratan';
        if ($request->ajax()) {
            $data = UploadPersyaratan::select('id', 'users_id', 'nama_perusahaan', 'status', 'created_at')->where('users_id', Auth::id())->get();
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
        $title['title'] = 'Review Persyaratan';
        $upload = UploadPersyaratan::where('status', 'menunggu verifikasi')->get();
        if ($request->ajax()) {
            $data = UploadPersyaratan::select('id', 'users_id', 'nama_perusahaan', 'status')->where('status', 'menunggu verifikasi')->get();
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

    //menampilkan dalaman halaman ketika klik aksi detail
    public function detail($id)
    {
        $title['title'] = 'Detail Upload Persyaratan';
        $upload = UploadPersyaratan::findOrFail($id);
        return view('uploadpersyaratan.detail', $title, compact('upload'));
    }

    public function verify($id)
    {
        $upload = UploadPersyaratan::find($id);
        $upload->status = 'terverifikasi';
        $upload->save();

        return response()->json([
            'status' => 'success',
            'message' => 'Persyaratan berhasil diverifikasi',
            'url' => route('uploadpersyaratan.review')
        ]);
    }

    public function reject($id)
    {
        $upload = UploadPersyaratan::find($id);
        $upload->status = 'ditolak';
        $upload->save();

        return response()->json([
            'status' => 'success',
            'message' => 'Persyaratan ditolak',
            'url' => route('uploadpersyaratan.review')
        ]);
    }

    public function showPdfViewer($id)
    {
        $pdf = UploadPersyaratan::findOrFail($id);
        if (!$pdf) {
            abort(404, 'PDF Tidak Ditemukan');
        }
        // Menampilkan PDF di PDF viewer
        $upload = Storage::url($pdf->path);
        return view('uploadpersyaratan.pdfviewer', compact('upload'));
    }
}
