@extends('admin.layouts.app')
@section('content')
<div class="header bg-primary pb-6">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row align-items-center py-4">
                <div class="col-lg-6 col-7">
                    <h6 class="h2 text-white d-inline-block mb-0">Tables</h6>
                    <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                        <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                            <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="#">Tables</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Daftar Customer</li>
                        </ol>
                    </nav>
                </div>
                <div class="col-lg-6 col-5 text-right">
                    <!-- <a href="/admin/datacustomer/formcustomer" class="btn btn-sm btn-neutral">Tambah Customer</a> -->
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Page content -->
<div class="container-fluid mt--6">
    <div class="row">
        <div class="col">
            <div class="card">
                <!-- Card header -->
                <div class="card-header border-0">
                    <h3 class="mb-0">Daftar Customer</h3>
                </div>
                <!-- Light table -->
                <div class="table-responsive">
                    <table class="table align-items-center table-flush">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col" class="sort" data-sort="id_produk">Id</th>
                                <th scope="col" class="sort" data-sort="nama_produk">Nama Lengkap</th>
                                <th scope="col" class="sort" data-sort="harga_produk">Email</th>
                                <th scope="col" class="sort" data-sort="harga_produk">Kota</th>
                                <th scope="col" class="sort" data-sort="harga_produk">Provinsi</th>
                                <th scope="col" class="sort" data-sort="harga_produk">Alamat</th>
                                <th scope="col" class="sort" data-sort="stok_produk">No Telepon</th>
                                <th scope="col" class="sort" data-sort="aksi">Aksi</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody class="list">
                        @forelse($items as $key)
                            @foreach ($key->customer as $item)
                            @if ($item->status==1)
                            <tr>
                                <th class="no">1.</th>
                                <td class="id_produk">{{$key->id}}</td>
                                <td class="nama_produk">{{$key->first_name}} {{$key->last_name}}</td>
                                <td class="harga_produk">{{$key->email}}</td>
                                <td class="stok_produk">{{$item->city}}</td>
                                <td class="stok_produk">{{$item->province}}</td>
                                <td class="stok_produk">{{$item->address}}</td>
                                <td class="stok_produk">{{$item->phone}}</td>
                                <td>
                                    <a href="{{route('customer.edit',[$key->id])}}" class="btn btn-outline-primary" title="Edit">
                                        Update
                                    </a>
                                    <!-- <button type="button" class="btn btn-outline-primary">Update</button> -->
                                    <button class="btn btn-outline-danger delete" data-id="{{$item->id}}">Delete</button>
                                </td>
                            </tr>
                            @endif
                            @endforeach
                            @empty
                            <tr>
                                <td colspan="7" class="text-center">Data Kosong</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                <!-- Card footer -->
                <div class="card-footer py-4">
                    <nav aria-label="...">
                        <ul class="pagination justify-content-end mb-0">
                            <li class="page-item disabled">
                                <a class="page-link" href="#" tabindex="-1">
                                    <i class="fas fa-angle-left"></i>
                                    <span class="sr-only">Previous</span>
                                </a>
                            </li>
                            <li class="page-item active">
                                <a class="page-link" href="#">1</a>
                            </li>
                            <li class="page-item">
                                <a class="page-link" href="#">2 <span class="sr-only">(current)</span></a>
                            </li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item">
                                <a class="page-link" href="#">
                                    <i class="fas fa-angle-right"></i>
                                    <span class="sr-only">Next</span>
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    @include('admin.layouts.footer')
</div>
@endsection