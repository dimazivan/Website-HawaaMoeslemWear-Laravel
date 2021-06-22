@extends('admin.layouts.app')
@section('content')
<div class="header bg-primary pb-6">
  <div class="container-fluid">
    <div class="header-body">
      <div class="row align-items-center py-4">
        <div class="col-lg-6 col-7">
          <h6 class="h2 text-white d-inline-block mb-0">Default</h6>
          <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
            <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
              <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
              <li class="breadcrumb-item"><a href="/admin">Dashboards</a></li>
            </ol>
          </nav>
        </div>
      </div>
      <!-- Card stats -->
      <div class="row">
        <div class="col-xl-3 col-md-6">
          <div class="card card-stats">
            <!-- Card body -->
            <div class="card-body">
              <div class="row">
                <div class="col">
                  <h5 class="card-title text-uppercase text-muted mb-0">Pengeluaran</h5>
                  <span class="h2 font-weight-bold mb-0">Rp. {{number_format($pengeluaran,2,',','.')}}</span>
                </div>
                <div class="col-auto">
                  <div class="icon icon-shape bg-gradient-red text-white rounded-circle shadow">
                    <i class="ni ni-active-40"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-md-6">
          <div class="card card-stats">
            <!-- Card body -->
            <div class="card-body">
              <div class="row">
                <div class="col">
                  <h5 class="card-title text-uppercase text-muted mb-0">Pemasukan</h5>
                  <span class="h2 font-weight-bold mb-0">Rp. {{number_format($pemasukkancustom,2,',','.')}}</span>
                </div>
                <div class="col-auto">
                  <div class="icon icon-shape bg-gradient-orange text-white rounded-circle shadow">
                    <i class="ni ni-chart-pie-35"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-md-6">
          <div class="card card-stats">
            <!-- Card body -->
            <div class="card-body">
              <div class="row">
                <div class="col">
                  <h5 class="card-title text-uppercase text-muted mb-0">Keuntungan</h5>
                  <span class="h2 font-weight-bold mb-0">Rp. {{number_format($keuntungan,2,',','.')}}</span>
                </div>
                <div class="col-auto">
                  <div class="icon icon-shape bg-gradient-green text-white rounded-circle shadow">
                    <i class="ni ni-money-coins"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-md-6">
          <div class="card card-stats">
            <!-- Card body -->
            <div class="card-body">
              <div class="row">
                <div class="col">
                  <h5 class="card-title text-uppercase text-muted mb-0">Pesanan</h5>
                  <span class="h2 font-weight-bold mb-0">{{ $jmlordercustom }}</span>
                </div>
                <div class="col-auto">
                  <div class="icon icon-shape bg-gradient-info text-white rounded-circle shadow">
                    <i class="ni ni-chart-bar-32"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="container-fluid mt--6">
  <div class="row">
    <div class="col-xl-8">
      <div class="card bg-default">
        <div class="card-header bg-transparent">
          <div class="row align-items-center">
            <div class="col">
              <h6 class="text-light text-uppercase ls-1 mb-1">Overview</h6>
              <h5 class="h3 text-white mb-0">Total Pemasukan</h5>
            </div>
            <div class="col">
              <ul class="nav nav-pills justify-content-end">
                <li class="nav-item mr-2 mr-md-0" data-toggle="chart" data-target="#chart-sales-dark" data-update='{"data":{"datasets":[{"data":[0, 20, 10, 30, 15, 40, 20, 60, 60]}]}}' data-prefix="$" data-suffix="k">
                  <a href="#" class="nav-link py-2 px-3 active" data-toggle="tab">
                    <span class="d-none d-md-block">Bulan</span>
                    <span class="d-md-none">M</span>
                  </a>
                </li>
                <li class="nav-item" data-toggle="chart" data-target="#chart-sales-dark" data-update='{"data":{"datasets":[{"data":[0, 20, 5, 25, 10, 30, 15, 40, 40]}]}}' data-prefix="$" data-suffix="k">
                  <a href="#" class="nav-link py-2 px-3" data-toggle="tab">
                    <span class="d-none d-md-block">Minggu</span>
                    <span class="d-md-none">W</span>
                  </a>
                </li>
              </ul>
            </div>
          </div>
        </div>
        <div class="card-body">
          <!-- Chart -->
          <div class="chart">
            <!-- Chart wrapper -->
            <canvas id="chart-sales-dark" class="chart-canvas"></canvas>
          </div>
        </div>
      </div>
    </div>
    <div class="col-xl-4">
      <div class="card">
        <div class="card-header bg-transparent">
          <div class="row align-items-center">
            <div class="col">
              <h6 class="text-uppercase text-muted ls-1 mb-1">Performance</h6>
              <h5 class="h3 mb-0">Total Pesanan</h5>
            </div>
          </div>
        </div>
        <div class="card-body">
          <!-- Chart -->
          <div class="chart">
            <canvas id="chart-bars" class="chart-canvas"></canvas>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-xl-8">
      <div class="card">
        <div class="card-header border-0">
          <div class="row align-items-center">
            <div class="col">
              <h3 class="mb-0">Pesanan</h3>
            </div>
            <div class="col text-right">
              <a href="#!" class="btn btn-sm btn-primary">Lihat Semua</a>
            </div>
          </div>
        </div>
        <div class="table-responsive">
          <!-- Projects table -->
          <table class="table align-items-center table-flush">
            <thead class="thead-light">
              <tr>
                <th scope="col">Nama Pelanggan</th>
                <th scope="col">Total</th>
                <th scope="col">Jumlah Produk</th>
                <th scope="col">Status</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <th scope="row">
                  Ricky Rikado
                </th>
                <td>
                  4,569,000
                </td>
                <td>
                  340
                </td>
                <td>
                  Lunas
                </td>
              </tr>
              <tr>
                <th scope="row">
                  Ricky Rikado
                </th>
                <td>
                  4,569,000
                </td>
                <td>
                  340
                </td>
                <td>
                  Belum Bayar
                </td>
              </tr>
              <tr>
                <th scope="row">
                  Ricky Rikado
                </th>
                <td>
                  4,569,000
                </td>
                <td>
                  340
                </td>
                <td>
                  Lunas
                </td>
              </tr>
              <tr>
                <th scope="row">
                  Ricky Rikado
                </th>
                <td>
                  4,569,000
                </td>
                <td>
                  340
                </td>
                <td>
                  Belum Bayar
                </td>
              </tr>
              <tr>
                <th scope="row">
                  Ricky Rikado
                </th>
                <td>
                  4,569,000
                </td>
                <td>
                  340
                </td>
                <td>
                  Lunas
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
    <div class="col-xl-4">
      <div class="card">
        <div class="card-header border-0">
          <div class="row align-items-center">
            <div class="col">
              <h3 class="mb-0">Produk</h3>
            </div>
            <div class="col text-right">
              <a href="/produk" class="btn btn-sm btn-primary">Lihat Semua</a>
            </div>
          </div>
        </div>
        <div class="table-responsive">
          <!-- Projects table -->
          <table class="table align-items-center table-flush">
            <thead class="thead-light">
              <tr>
                <th scope="col">Nama Produk</th>
                <th scope="col">Stok</th>
                <!-- <th scope="col">Produk Terjual</th> -->
              </tr>
            </thead>
            <tbody>
              <tr></tr>
              <tr></tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
  @include('admin.layouts.footer')
</div>
@endsection