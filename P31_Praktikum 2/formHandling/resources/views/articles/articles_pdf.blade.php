<!DOCTYPE html> 
<html> 
<head>  
     <title>Membuat Laporan PDF Dengan DOMPDF Laravel</title> 
     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head> 
<body>  
    <style type="text/css">   
          table tr td,   
          table tr th{    
                font-size: 9pt;   
          }  
    </style>  
           <h5 class="text-center">Laporan Artikel</h4>    

      <table class="table table-bordered table-striped" >
      <thead class="thead-dark"> 
          <tr>     
                 <th class="text-center">No</th>     
                 <th class="text-center">Judul</th>     
                 <th class="text-center">Isi</th>     
                 <th class="text-center">Gambar</th>    
          </tr>   
        </thead>   
        <tbody>    
              @foreach($articles as $a)    
              <tr>    
                    <td class="text-center" width="10">{{ $loop->iteration }}</td>
                    <td class="text-center" width="115">{{$a->title}}</td>     
                    <td class="text-center" width="165">{{$a->content}}</td>     
                    <td class="text-center"> <br>
                    <img src="{{ public_path('storage/'.$a->featured_image) }}" alt="$a->featured_image" width="200" height="125">
                    </td>    
                </tr>    
                @endforeach   
        </tbody>  
    </table>   
</body> 
</html> 

