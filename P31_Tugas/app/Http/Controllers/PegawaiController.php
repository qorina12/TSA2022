<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
use App\Models\Pendidikan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDF;

class PegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //yang semula Pegawai::all, diubah menjadi with() yang menyatakan relasi
        $pegawai = Pegawai::with('pendidikan')->get();
        $paginate = Pegawai::orderBy('nomor_pegawai', 'asc')->paginate(3);
        return view('pegawai.index', ['pegawai' => $pegawai,'paginate'=>$paginate]);
    }

/**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //Mendapatkan data dari tabel pendidikan
        $pendidikan = Pendidikan::all();
        return view('pegawai.create',['pendidikan' => $pendidikan]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
            
        //melakukan validasi data
        $request->validate([
            'nomor_pegawai' => 'required',
            'nama' => 'required',
            'divisi' => 'required',
            'email' => 'required', 
            'alamat' => 'required', 
            'image' => 'required',
            'tanggal_lahir' => 'required', 
            'pendidikan_id' => 'required'
        ]);

        $pegawai = new Pegawai;
    
        $pegawai->nomor_pegawai = $request->get('nomor_pegawai');
        $pegawai->nama = $request->get('nama');
        $pegawai->divisi = $request->get('divisi');
        $pegawai->email = $request->get('email');
        $pegawai->alamat = $request->get('alamat');
        $pegawai->image = $request->get('image');
        $pegawai->tanggal_lahir = $request->get('tanggal_lahir');
        
        if ($request->file('image')) {
            $pegawai->image = $request->file('image')->store('images', 'public');
        }
    
        $pendidikan = new Pendidikan;
        $pendidikan->id = $request->get('pendidikan_id');
    
        //fungsi eloquent untuk menambah data dengan relasi belongsTo
        $pegawai->pendidikan()->associate($pendidikan);
        $pegawai->save();
    
        //jika data berhasil ditambahkan, akan kembali ke halaman utama
        return redirect()->route('pegawai.index')
        ->with('success', 'Data Pegawai Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($nomor_pegawai)
    {
        //menampilkan detail data dengan menemukan/berdasarkan Nim Pegawai
        //code sebelum dibuat relasi -->$pegawai = Pegawai::find($nomor_pegawai);
        $pegawai = Pegawai::with('pendidikan')->where('nomor_pegawai', $nomor_pegawai)->first();
        return view('pegawai.detail', ['pegawai' => $pegawai]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($nomor_pegawai)
    {
        //menampilkan detail data dengan menemukan berdasarkan Nomor Pegawai untuk diedit
        $pegawai = DB::table('pegawai')->where('nomor_pegawai', $nomor_pegawai)->first();
        //mendapatkan data dari tabel pendidikan
        $pendidikan = Pendidikan::all();
        return view('pegawai.edit', compact('pegawai','pendidikan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $nomor_pegawai)
    {
        //melakukan validasi data
        $request->validate([
       'nomor_pegawai' => 'required',
       'nama' => 'required',
       'divisi' => 'required',
       'email' => 'required', 
       'alamat' => 'required', 
       'image' => 'required',
       'tanggal_lahir' => 'required', 
       'pendidikan_id' => 'required'
    ]);

    $pegawai = Pegawai::with('pendidikan')->where('nomor_pegawai', $nomor_pegawai)->first();
    $pegawai->nomor_pegawai = $request->get('nomor_pegawai');
    $pegawai->nama = $request->get('nama');
    $pegawai->divisi = $request->get('divisi');
    $pegawai->email = $request->get('email');
    $pegawai->alamat = $request->get('alamat');
    $pegawai->image = $request->get('image');
    $pegawai->tanggal_lahir = $request->get('tanggal_lahir');

    if ($pegawai->image && file_exists(storage_path('app/public/' . $pegawai->image))) 
    {
        \Storage::delete('public/' . $pegawai->image);
    }
    $image = $request->file('image')->store('images', 'public');
    $pegawai->image = $image;
    $pegawai->save();

    $pendidikan = new Pendidikan;
    $pendidikan->id = $request->get('pendidikan_id');

    //fungsi eloquent untuk menambah data dengan relasi belongsTo
    // $pegawai->pendidikan()->associate($pendidikan);
    $pegawai->save();

    return redirect()->route('pegawai.index')
    ->with('success', 'Data Pegawai Berhasil Diupdate');
    }
    
    public function downloadPDF() {
        $pegawai = Pegawai::all();
        $pdf = PDF::loadView('pegawai.pegawai_pdf',compact('pegawai'));
        return $pdf->stream('pegawai.pdf');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($nomor_pegawai)
    {
        //fungsi eloquent untuk menghapus data
        Pegawai::find($nomor_pegawai)->delete();
        return redirect()->route('pegawai.index')
        ->with('success', 'Data Pegawai Berhasil Dihapus');
    }
}
