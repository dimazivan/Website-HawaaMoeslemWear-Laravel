@extends('layouts.app')
@section('content')
<div class="hero-wrap js-fullheight" style="background-image: url({{'uploads/banner/'.$banner->picture}});">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-center">
            <h3 class="v">Hawaa Moslemwear - Better Moslem wear</h3>
            <h3 class="vr">Since - 2019</h3>
            <div class="col-md-11 ftco-animate text-center">
                <h1>{{$banner->title}}</h1>
                <h2><span>{{$banner->subtitle}}</span></h2>
            </div>
            <div class="mouse">
                <a href="/detailproduct" class="mouse-icon">
                    <div class="mouse-wheel"><span class="ion-ios-arrow-down"></span></div>
                </a>
            </div>
        </div>
    </div>
</div>

<div class="goto-here"></div>

<section id="promo" class="ftco-section ftco-product">
    <div class="container">
        <div class="row justify-content-center mb-3 pb-3">
            <div class="col-md-12 heading-section text-center ftco-animate">
                <h1 class="big">Product</h1>
                <h2 class="mb-4">Product</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="product-slider owl-carousel ftco-animate">
                    @forelse($shop as $key)
                    <div class="item">
                        <div class="product">
                            <a href="{{route('shop.show',[$key->id])}}" class="img-prod"><img class="img-fluid" src="{{'uploads/products/'.$key->pict_1}}" alt="Colorlib Template">
                            </a>
                            <div class="text py-3 px-3">
                                <h3><a href="#">{{$key->name}}</a></h3>
                                <div class="d-flex">
                                    <div class="pricing">
                                        <p class="price"><span class="price-sale">Rp {{number_format($key->price,2,',','.')}}</span></p>
                                    </div>
                                </div>
                                @guest
                                @else
                                <hr>
                                <form action="{{ route('store') }}" method="post">
                                    @csrf
                                    <input type="text" name="id" id="id" value="{{ $key->id }}" hidden readonly>
                                    <input type="number" name="price" id="price" value="{{ $key->price }}" hidden readonly>
                                    <input type="text" name="size" id="size" value="1" hidden readonly>
                                    <input type="number" name="qty" id="qty" value="1" hidden readonly>
                                    <input type="date" name="date" id="date" value="<?php echo date('Y-m-d'); ?>" hidden readonly>
                                    <p class="bottom-area d-flex">
                                        <button class="add-to-cart" type="submit"><span>Add to cart<i class="ion-ios-add ml-1"></i></span></button>
                                    </p>
                                </form>
                                @endguest
                            </div>
                        </div>
                    </div>
                    <!-- </form> -->
                    @empty
                    <tr>
                        <td colspan="7" class="text-center">Data Kosong</td>
                    </tr>
                    @endforelse
                    <!-- <div class="item">
                        <div class="product">
                            <a href="/detailproduct" class="img-prod"><img class="img-fluid" src="images/product-7.png" alt="Colorlib Template">
                                <span class="status">30%</span>
                            </a>
                            <div class="text pt-3 px-3">
                                <h3><a href="/detailproduct">Young Woman Wearing Dress</a></h3>
                                <div class="d-flex">
                                    <div class="pricing">
                                        <p class="price"><span class="mr-2 price-dc">Rp120.00</span><span class="price-sale">Rp80.00</span></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> -->
                </div>
            </div>
        </div>
    </div>
</section>

<section class="ftco-section bg-light ftco-services">
    <div class="container">
        <div class="row justify-content-center mb-3 pb-3">
            <div class="col-md-12 heading-section text-center ftco-animate">
                <h1 class="big">Services</h1>
                <h2></h2>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 text-center d-flex align-self-stretch ftco-animate">
                <div class="media block-6 services">
                    <div class="icon d-flex justify-content-center align-items-center mb-4">
                        <span class="flaticon-002-recommended"></span>
                    </div>
                    <div class="media-body">
                        <h3 class="heading">Customize Product</h3>
                        <p>Anda dapat melakukan customisasi produk yang anda pesan, sesuai dengan kebutuhan anda.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 text-center d-flex align-self-stretch ftco-animate">
                <div class="media block-6 services">
                    <div class="icon d-flex justify-content-center align-items-center mb-4">
                        <span class="flaticon-001-box"></span>
                    </div>
                    <div class="media-body">
                        <h3 class="heading">Premium Packaging</h3>
                        <p>Pengemasan produk kami menggunakan bahan yang sesuai dengan standarasi kualitas dalam pengiriman barang.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 text-center d-flex align-self-stretch ftco-animate">
                <div class="media block-6 services">
                    <div class="icon d-flex justify-content-center align-items-center mb-4">
                        <span class="flaticon-003-medal"></span>
                    </div>
                    <div class="media-body">
                        <h3 class="heading">Garansi Pengembalian</h3>
                        <p>Kami memberikan garansi pengembalian terhadap produk yang anda pesan melalui halaman website kami, apabila terjadi ketidakkesesuian dengan produk yang anda pesan.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection