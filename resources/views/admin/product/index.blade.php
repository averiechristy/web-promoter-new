@extends('layouts.admin.app')

@section('content')

  <!-- Begin Page Content -->
  <div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Produk</h1>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <a href="{{route('admin.product.create')}}" class="btn btn-warning btn-sm">Tambah Data</a>
    </div>
    <div class="card-body">
        
        <div class="table-responsive">
        @include('components.alert')

            <table id= "myDataTable" class="table table-bordered" id="dataTable" width="100%" cellspacing="0" style="border-radius: 10px;">
                <thead>
                    <tr>
                        
                        <th>Kode Produk</th>
                        <th>Nama Produk</th>
                        <th>Poin Produk</th>
                        <th>Gambar Produk</th>
                        <th>Deskripsi Produk</th>
                        <th>Role Produk</th>
                        <th>Created At </th>
                        <th>Created By </th>

                        <th>Updated At </th>
                        <th>Updated By </th>

                        <th>Action</th>
                    </tr>
                </thead>
                
                <tbody>
                @foreach ($dtProduct as $item)
                    <tr>
                  
                     
                        <td>{{ $item->kode_produk}}</td>
                        <td>{{ $item->nama_produk }}</td>
                        <td>{{ $item->poin_produk}}</td>

                        <td>

                        <a href="#" data-toggle="modal" data-target="#gambarModal{{ $item->id }}">Lihat Gambar</a>


    <!-- Kode lainnya -->

    <!-- Modal untuk gambar artikel -->
    <div class="modal fade" id="gambarModal{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="gambarModalLabel{{ $item->id }}" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="gambarModalLabel{{ $item->id }}">Gambar Produk</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <img src="{{ asset('img/'.$item->gambar_produk) }}" alt="Gambar Artikel" class="img-fluid">
                </div>
                <div class="modal-footer">
                </div>
            </div>
        </div>
    </div>
                    <!-- {{ $item->gambar_produk}} -->
                        </td>
                        <td>   <a href="{{ route('detailproduct', $item->id) }}"><button type="button" class="btn btn-link">
    Lihat Deskripsi Produk
</button></a>     </td>
                        <td>{{ $item->Role->jenis_role }}</td>
                           <td>{{$item->created_at}}</td>
                           <td> @if ($item->created_by)
                {{ $item->created_by }}
            @else
                User tidak terdeteksi
            @endif</td>
                                            <td>{{$item->updated_at}}</td>
                                            <td> @if ($item->updated_by)
                {{ $item->updated_by }}
            @else
               Belum ada pembaruan
            @endif</td>
                        <td> 
                           <div class="row">
                           <a href="{{route('tampilproduct', $item->id)}}" class="btn" data-toggle="tooltip" title='Edit'><i class="fas fa-fw fa-edit" style="color:orange" ></i></a>                 
                           <form method="POST" action="{{ route('deleteproduct', $item->id) }}">
                            @csrf
                            <input name="_method" type="hidden" value="DELETE">
                            <button type="submit" class="btn show_confirm" data-toggle="tooltip" title='Hapus'><i class="fas fa-fw fa-trash" style="color:red" ></i></button>
                        </form>                                              
                            </div>
                            </td>
                        
                    </tr>
                    @endforeach
                    
                </tbody>
            </table>
        </div>
    </div>
</div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<!-- Footer -->

<!-- End of Footer -->

</div>
<!-- End of Content Wrapper -->

</div>

@endsection