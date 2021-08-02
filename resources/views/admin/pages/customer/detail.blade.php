@extends('admin.layouts.app')
@section('content')
<div class="header bg-primary pb-6">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row align-items-center py-4">
                <div class="col-lg-8 col-7">
                    <h6 class="h2 text-white d-inline-block mb-0">Penjualan</h6>
                    <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                        <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                            <li class="breadcrumb-item"><a href="/admin"><i class="fas fa-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="/customer">Daftar Customer</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Detail Data Customer</li>
                        </ol>
                    </nav>
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
                    <h3 class="mb-0">Detail Customer, Customer Id : {{ $id }} </h3>
                </div>
                <form class="form" method="post" action="">
                    <div class="card-body">
                        <div class="form-group row">
                            <div class="col-lg-6">
                                <label>Id Customer : {{ $id }}</label>
                            </div>
                            <div class="col-lg-6">
                                <label>Nama Customer : <strong>{{ $pelanggan[0]->first_name }}</strong></label>
                            </div>
                        </div>
                        <div class="form-group row">
                        <div class="col-lg-6">
                                <label>Alamat : <strong>{{ $pelanggan[0]->address }}</strong></label><br>
                                <label>Kecamatan : <strong>{{ $pelanggan[0]->kecamatan }}</strong></label>
                            </div>
                            <div class="col-lg-6">
                                <label>Kelurahan : <strong>{{ $pelanggan[0]->kelurahan }}</strong></label><br>
                                <label>Kota : <strong>{{ $pelanggan[0]->city }}</strong></label>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="row">
                            <div class="col-lg-4"></div>
                            <div class="col-lg-8">
                                <button type="button" class="btn btn-secondary"><a href="{{route('customer.index')}}">Kembali</a></button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @include('admin.layouts.footer')
</div>
@endsection