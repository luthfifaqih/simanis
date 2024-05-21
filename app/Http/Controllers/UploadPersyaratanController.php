<?php

namespace App\Http\Controllers;

use App\Models\Document;
use App\Models\UploadPersyaratan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DocumentController extends Controller
{
    public function create()
    {
        $title['title'] = 'Upload Dokumen';
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
            'nama_direktur' => 'required',
            'ktp_direktur' => 'required|file|mimes:pdf|max:2048', //upload file
            'surat_penawaran_kerjasama' => 'required|file|mimes:pdf|max:2048', //upload file
            'surat_kuasa_pimpinan' => 'file|mimes:pdf|max:2048', //upload file
            'nama_media' => 'required',
            'domisili_media' => 'required',
            'sertifikat_dewan_pers' => 'required|file|mimes:pdf|max:2048', //upload file
            'organisasi_kewartanan' => 'required|file|mimes:pdf|max:2048', //upload file
            'surat_pernyataan_aktif' => 'required|file|mimes:pdf|max:2048', //upload file
            'nama_jurnalis' => 'required',
            'email_jurnalis' => 'required|email',
            'nomor_kontak_jurnalis' => 'required',
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
        $upload->nama_perusahaan = $request->nama_perusahaan;
        $upload->nama_direktur = $request->nama_direktur;
        $upload->nama_media = $request->nama_media;
        $upload->domisilit_media = $request->domisili_media;
        $upload->nama_jurnalis = $request->nama_jurnalis;
        $upload->email_jurnalis = $request->email_jurnalis;
        $upload->nomor_kontak_jurnalis = $request->nomor_kontak_jurnalis;
        $upload->jenis_media = $request->jenis_media;
        $upload->url_media = $request->url_media;
        $upload->klasifikasi_media = $request->klasifikasi_media;


        if ($request->hasFile('akta_pendirian')) {
            $file = $request->file('akta_pendirian');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $path = $file->storeAs('public/akta_pendirian', $filename);
            $upload->file_path = $path;
        }
        if ($request->hasFile('nib_siup')) {
            $file = $request->file('nib_siup');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $path = $file->storeAs('public/nib_siup', $filename);
            $upload->file_path = $path;
        }
        if ($request->hasFile('npwp_perusahaan')) {
            $file = $request->file('npwp_perusahaan');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $path = $file->storeAs('public/npwp_perusahaan', $filename);
            $upload->file_path = $path;
        }
        if ($request->hasFile('nomor_pkp')) {
            $file = $request->file('nomor_pkp');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $path = $file->storeAs('public/nomor_pkp', $filename);
            $upload->file_path = $path;
        }
        if ($request->hasFile('spt_tahunan')) {
            $file = $request->file('spt_tahunan');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $path = $file->storeAs('public/spt_tahunan', $filename);
            $upload->file_path = $path;
        }
        if ($request->hasFile('domisili_perusahaan')) {
            $file = $request->file('domisili_perusahaan');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $path = $file->storeAs('public/domisili_perusahaan', $filename);
            $upload->file_path = $path;
        }
        if ($request->hasFile('ktp_direktur')) {
            $file = $request->file('ktp_direktur');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $path = $file->storeAs('public/ktp_direktur', $filename);
            $upload->file_path = $path;
        }
        if ($request->hasFile('surat_penawaran_kerjasama')) {
            $file = $request->file('surat_penawaran_kerjasama');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $path = $file->storeAs('public/surat_penawaran_kerjasama', $filename);
            $upload->file_path = $path;
        }
        if ($request->hasFile('surat_kuasa_pimpinan')) {
            $file = $request->file('surat_kuasa_pimpinan');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $path = $file->storeAs('public/surat_kuasa_pimpinan', $filename);
            $upload->file_path = $path;
        }
        if ($request->hasFile('sertifikat_dewan_pers')) {
            $file = $request->file('sertifikat_dewan_pers');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $path = $file->storeAs('public/sertifikat_dewan_pers', $filename);
            $upload->file_path = $path;
        }
        if ($request->hasFile('organisasi_kewartanan')) {
            $file = $request->file('organisasi_kewartanan');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $path = $file->storeAs('public/organisasi_kewartanan', $filename);
            $upload->file_path = $path;
        }
        if ($request->hasFile('surat_pernyataan_aktif')) {
            $file = $request->file('surat_pernyataan_aktif');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $path = $file->storeAs('public/surat_pernyataan_aktif', $filename);
            $upload->file_path = $path;
        }
        if ($request->hasFile('kartu_pers')) {
            $file = $request->file('kartu_pers');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $path = $file->storeAs('public/kartu_pers', $filename);
            $upload->file_path = $path;
        }
        if ($request->hasFile('sertifikat_ukw')) {
            $file = $request->file('sertifikat_ukw');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $path = $file->storeAs('public/sertifikat_ukw', $filename);
            $upload->file_path = $path;
        }
        $upload->save();

        return redirect()->route('uploadpersyaratan.index')->with('success', 'Upload Persyaratan Berhasil');
    }

    public function index()
    {
        $upload = UploadPersyaratan::where('users_id', Auth::id())->get();
        return view('uploadpersyaratan.index', compact('upload'));
    }

    public function review()
    {
        $upload = UploadPersyaratan::where('status', 'menunggu verifikasi')->get();
        return view('uploadpersyaratan.review', compact('upload'));
    }

    public function verify($id)
    {
        $upload = UploadPersyaratan::find($id);
        $upload->status = 'terverifikasi';
        $upload->save();

        return redirect()->route('uploadpersyaratan.review')->with('success', 'Persyaratan berhasil diverifikasi');
    }

    public function reject($id)
    {
        $upload = UploadPersyaratan::find($id);
        $upload->status = 'ditolak';
        $upload->save();

        return redirect()->route('uploadpersyaratan.review')->with('success', 'Persyaratan ditolak');
    }
}
