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
                            <li class="breadcrumb-item active" aria-current="page">Tables</li>
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
                    <h3 class="mb-0">Form Profil UMKM</h3>
                </div>
                <form class="form" method="post" action="{{route('product.store')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="form-group row">
                            <!-- Pict 3 -->
                            <div class="col-lg-6">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="customFileLang" lang="en">
                                    <label class="custom-file-label" for="customFileLang">Select file</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-lg-6">
                                <label for="exampleTextarea">Instagram</label>
                                <input type="number" class="form-control" value="{{ old('price') }}" name="price" />
                            </div>
                            <div class="col-lg-6">
                                <label for="exampleTextarea">Email</label>
                                <input type="number" class="form-control" value="{{ old('price') }}" name="price" />
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-lg-6">
                                <label for="exampleTextarea">No Telepon</label>
                                <input type="number" class="form-control" value="{{ old('price') }}" name="price" />                            </div>
                                <div class="col-lg-6">
                                <label for="exampleTextarea">Alamat 1</label>
                                <textarea class="form-control" rows="3" name="desc" >{{ old('desc') }}</textarea>
                            </div>    
                            
                        </div>
                        <div class="form-group row">
                            <div class="col-lg-6">
                                <label for="exampleTextarea">Deskripsi 1</label>
                                <textarea class="form-control" rows="3" name="desc" >{{ old('desc') }}</textarea>
                            </div>    
                            <div class="col-lg-6">
                                <label for="exampleTextarea">Deskripsi 2</label>
                                <textarea class="form-control" rows="3" name="desc" >{{ old('desc') }}</textarea>
                            </div>                            
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="row">
                            <div class="col-lg-4"></div>
                            <div class="col-lg-8">
                                <button type="submit" class="btn btn-primary mr-2">Submit</button>
                                <button type="button" class="btn btn-secondary"><a href="{{route('bahan_baku.index')}}">Cancel</a></button>
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