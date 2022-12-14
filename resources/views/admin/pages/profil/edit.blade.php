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
                            <li class="breadcrumb-item"><a href="/admin"><i class="fas fa-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="/profilumkm">Tables</a></li>
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
                    <h3 class="mb-0">Form Edit Profile UMKM</h3>
                </div>
                <form class="form" method="post" action="{{route('profilumkm.update',[$page->id])}}" enctype="multipart/form-data">
                    @csrf
                    {{method_field("PUT")}}
                    <div class="card-body">
                        @if($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif

                        <div class="form-group row">
                            <!-- Pict 1 -->
                            <div class="col-lg-6">
                            <div class="custom-file">
                                    <input type="file" name="picture" accept=".png, .jpg, .jpeg" class="custom-file-input" id="customFileLang" lang="en">
                                    <input type="hidden" name="id" value="{{ old('picture') }}" />
                                    <label class="custom-file-label" for="customFileLang">Select file</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-lg-6 mt-4">
                                <label>Instagram</label>
                                <input type="text" class="form-control" value="{{ $page->ig }}"name="ig" placeholder="Masukkan Judul" />
                            </div>
                            <div class="col-lg-6 mt-4">
                                <label>Email</label>
                                <input type="text" class="form-control" value="{{ $page->email }}" name="email" placeholder="Masukkan Sub Judul" />
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-lg-6">
                                <label>No Telepon</label>
                                <input type="text" class="form-control" value="{{ $page->telepon }}" name="telepon" />                            
                            </div>
                            <div class="col-lg-6">
                                <label>Alamat</label>
                                <textarea class="form-control" rows="3" name="address" >{{ $page->address }}</textarea>
                            </div>       
                        </div>
                        <div class="form-group row">
                            <div class="col-lg-6">
                                <label>Deskripsi 1</label>
                                <textarea class="form-control" rows="3" name="desc_1" >{{ $page->desc_1 }}</textarea>
                            </div>    
                            <div class="col-lg-6">
                                <label>Deskripsi 2</label>
                                <textarea class="form-control" rows="3" name="desc_2" >{{ $page->desc_2 }}</textarea>
                            </div>                            
                        </div>
                    </div>
                
                    <div class="card-footer">
                        <div class="row">
                            <div class="col-lg-4"></div>
                            <div class="col-lg-8">
                                <button type="submit" class="btn btn-primary mr-2">Update</button>
                                <button type="button" class="btn btn-secondary"><a href="{{route('profilumkm.index')}}">Cancel</a></button>
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