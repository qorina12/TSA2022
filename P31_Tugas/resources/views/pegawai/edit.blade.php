@extends('pegawai.layout')

@section('content')

<div class="container mt-5">

    <div class="row justify-content-center align-items-center">
        <div class="card" style="width: 24rem;">
            <div class="card-header">
                Edit Pegawai
            </div>
            <div class="card-body">
                @if ($errors->any())
                <div class="alert alert-danger">
                    <strong>Whoops!</strong> Ada sesuatu yang salah dengan inputan anda<br><br>
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                <form method="post" action="{{ route('pegawai.update', $pegawai->nomor_pegawai) }}" id="myForm" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="nomor_pegawai">Nomor Pegawai</label>
                        <input type="number" name="nomor_pegawai" class="form-control" id="nomor_pegawai" value="{{ $pegawai->nomor_pegawai }}" aria-describedby="nomor_pegawai" placeholder="Silahkan isi nomor pegawai">
                    </div>
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" name="nama" class="form-control" id="nama" value="{{ $pegawai->nama }}" aria-describedby="nama" placeholder="Silahkan isi nama anda">
                    </div>
                    <div class="form-group">
                        <label for="divisi">Divisi</label>
                        <input type="text" name="divisi" class="form-control" id="divisi" value="{{ $pegawai->divisi }}" aria-describedby="divisi" placeholder="Silahkan isi divisi anda">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" name="email" class="form-control" id="email" value="{{ $pegawai->email }}" aria-describedby="email" placeholder="Silahkan isi email anda">
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <input type="text" name="alamat" class="form-control" id="alamat" value="{{ $pegawai->alamat }}" aria-describedby="alamat" placeholder="Silahkan isi alamat anda">
                    </div>
                    <div class="form-group">
                        <label for="image">Gambar Pegawai</label>
                        <input type="file" class="form-control" required="required" name="images" value="{{$pegawai->image}}"></br>
                        <img width="150px" src="{{asset('storage/'.$pegawai->image)}}">
                    </div>
                    <div class="form-group">
                        <label for="tanggal_lahir">Tanggal lahir</label>
                        <input type="date" name="tanggal_lahir" class="form-control" id="tanggal_lahir" value="{{ $pegawai->tanggal_lahir }}" aria-describedby="tanggal_lahir" placeholder="Silahkan isi tanggal lahir anda">
                    </div>
                    <div class="form-group">
                        <select name="pendidikan_id" class="form-control">
                            @foreach($pendidikan as $pd)
                                <option value="{{ $pd->id }}" {{ $pegawai->pendidikan_id == $pd->id ? 'selected' : '' }}>{{ $pd->jenis_pendidikan }}</option>
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