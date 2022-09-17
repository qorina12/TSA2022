@extends('pegawai.layout')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center align-items-center">
        <div class="card" style="width: 24rem;">
            <div class="card-header">
                Detail Pegawai - BPS Kota Malang
            </div>
            <div class="card-body">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item" style="text-align: center"><b>Gambar Pegawai</b></li>
                    <li class="list-group-item" style="text-align: center"><img width="150px" src="{{asset('storage/'.$pegawai->image)}}"></li>
                    <li class="list-group-item"><b>Nomor Pegawai: </b>{{$pegawai->nomor_pegawai}}</li>
                    <li class="list-group-item"><b>Nama: </b>{{$pegawai->nama}}</li>
                    <li class="list-group-item"><b>Divisi: </b>{{$pegawai->divisi}}</li>
                    <li class="list-group-item"><b>Email: </b>{{$pegawai->email}}</li>
                    <li class="list-group-item"><b>Alamat: </b>{{$pegawai->alamat}}</li>
                    <li class="list-group-item"><b>Tanggal Lahir: </b>{{$pegawai->tanggal_lahir}}</li>
                    <li class="list-group-item"><b>Pendidikan: </b>{{$pegawai->pendidikan->type_pendidikan}}</li>
                </ul>
            </div>
            <a class="btn btn-success mt-3" href="{{ route('pegawai.index') }}">Kembali</a>
        </div>
    </div>
</div>
@endsection