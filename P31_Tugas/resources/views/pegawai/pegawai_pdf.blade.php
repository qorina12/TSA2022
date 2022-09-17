<!DOCTYPE html>
<html>

<head>
      <title>Membuat Laporan PDF Dengan DOMPDF Laravel</title>
</head>

<body>
      <style type="text/css">
            table tr td,
            table tr th {
                  font-size: 9pt;
            }
      </style>
              <div class="pull-left mt-2">
                  <h3 style="text-align: center"><u>Data Pegawai - Badan Pusat Statistik (BPS) Kota Malang</u></h3><br>
              </div>

     <table class="table table-bordered">
    <thead class="thead-dark">
        <tr style="text-align: center" class="thead-light">
            <th width="50px">No</th>
            <th width="75px">NIP</th>
            <th width="150px">Nama</th>
            <th width="100px">Divisi</th>
            <th width="150px">Pendidikan</th>
            <th width="150px">Gambar Pegawai</th>
        </tr>
    </thead>
    @foreach ($pegawai as $pgw)
    <tr style="text-align: center">
        <td>{{ $loop->iteration }}</td>
        <td>{{ $pgw ->nomor_pegawai }}</td>
        <td>{{ $pgw ->nama }}</td>
        <td>{{ $pgw ->divisi }}</td>
        <td>{{ $pgw ->pendidikan->jenis_pendidikan }}</td>
        <td><img width="100px" src="{{ storage_path('app/public/'.$pgw->image) }}"></td></td>
        <td>
        </td>
    </tr>
    @endforeach
    



            {{-- <tbody>
                  @foreach($pegawai as $p)
                  <tr>
                        <td>{{ $p->nama }}</td>
                        <td>{{ $p->alamat }}</td>
                        <td><img width="100px" src="{{ storage_path('app/public/'.$p->image) }}"></td>
                  </tr>
                  @endforeach
            </tbody> --}}




      </table>

</body>

</html>