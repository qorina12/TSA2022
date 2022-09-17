@extends('pegawai.layout')

@section('content')

<div class="container mt-5">

    <div class="row justify-content-center align-items-center">
        <div class="card" style="width: 24rem;">
            <div class="card-header">
                Tambah Pegawai 
            </div>
            <div class="card-body">
                @if ($errors->any())
                <div class="alert alert-danger">
                    <strong>Whoops!</strong>Ada sesuatu yang salah dengan inputan anda.<br><br>
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                <form method="post" action="{{ route('pegawai.store') }}" id="myForm" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="nomor_pegawai">Nomor Pegawai</label>
                        <input type="number" name="nomor_pegawai" class="form-control" id="nomor_pegawai" aria-describedby="nomor_pegawai" placeholder="Silahkan masukkan nomor pegawai">
                    </div> 
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" name="nama" class="form-control" id="nama" aria-describedby="nama" placeholder="Silahkan masukkan nama anda">
                    </div>
                    <div class="form-group">
                        <label for="divisi">Divisi</label>
                        <input type="text" name="divisi" class="form-control" id="divisi" aria-describedby="divisi" placeholder="Silahkan masukkan divisi anda">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" name="email" class="form-control" id="email" aria-describedby="email" placeholder="Silahkan masukkan email anda">
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <input type="text" name="alamat" class="form-control" id="alamat" aria-describedby="alamat" placeholder="Silahkan masukkan alamat anda">
                    </div>
                    <div class="form-group">
                        <label for="image">Image</label> 
                        <input type="file" class="form-control" required="required" name="image"></br> 
                    </div>
                    <div class="form-group">
                        <label for="tanggal_lahir">Tanggal Lahir</label>
                        <input type="date" name="tanggal_lahir" class="form-control" id="tanggal_lahir" aria-describedby="tanggal_lahir" placeholder="Silahkan masukkan tanggal lahir anda">
                    </div>
                    <div class="form-group">
                        <label for="Pendidikan">Pendidikan</label>
                        <select class="form-control" name="pendidikan_id">
                            @foreach($pendidikan as $pd)
                            <option value="{{ $pd->id }}">{{ $pd->jenis_pendidikan }}</option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection