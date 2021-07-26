<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\confirm_payment;
use App\Models\detail_order;
use App\Models\order;
use App\Models\Product;
use App\Models\Recipe;
use PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Symfony\Component\HttpFoundation\Session\Session;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $page = DB::table('orders')
            ->join('detail_orders', 'detail_orders.orders_id', '=', 'orders.id')
            ->select(
                'orders.*'
            )
            ->distinct()
            ->get();

        return view('admin.pages.penjualan.index', [
            'page' => $page
        ]);
    }

    public function updsttspayden($id)
    {
        $dendes = DB::table('orders')
            ->where('id', '=', $id)->update([
                'status' => 'Ditolak'
            ]);
        return redirect('/penjualan');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    { }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    { }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    { }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    { }

    public function cetak_pdf(Request $request)
    {
        $tglawal = $request->get('tglawal');
        $tglakhir = $request->get('tglakhir');
        $jumlahtransaksi = DB::table('orders')
            ->where('status', '=', 'Selesai')
            ->count();

        $periode1 = 'All';
        $periode2 = $tglakhir;

        // dd(
        //     $tglakhir,
        //     $tglawal
        // );

        if (!isset($tglawal) && isset($tglakhir)) {
            $page = DB::table('orders')
                ->select('orders.*', 'users.first_name')
                ->join('customers', 'customers.id', '=', 'orders.customers_id')
                ->join('users', 'users.id', '=', 'customers.users_id')
                ->where('date', '<=', $tglakhir)
                ->get();

            $jumlahtransaksi = DB::table('orders')
                ->where('status', '=', 'Selesai')
                ->where('date', '<=', $tglakhir)
                ->count();

            $periode1 = $tglawal;
            $periode2 = $tglakhir;

            $total = order::where('date', '<=', $tglakhir)
                ->sum('total');
        } else if (!isset($tglakhir) && isset($tglawal)) {
            $page = DB::table('orders')
                ->select('orders.*', 'users.first_name')
                ->join('customers', 'customers.id', '=', 'orders.customers_id')
                ->join('users', 'users.id', '=', 'customers.users_id')
                ->where('date', '>=', $tglawal)
                ->get();

            $jumlahtransaksi = DB::table('orders')
                ->where('status', '=', 'Selesai')
                ->where('date', '>=', $tglawal)
                ->count();

            $periode1 = $tglawal;
            $periode2 = $tglakhir;

            $total = order::where('date', '>=', $tglawal)
                ->sum('total');
        } else if (!isset($tglawal) && !isset($tglakhir)) {
            $page = DB::table('orders')
                ->select('orders.*', 'users.first_name')
                ->join('customers', 'customers.id', '=', 'orders.customers_id')
                ->join('users', 'users.id', '=', 'customers.users_id')
                ->get();

            $jumlahtransaksi = DB::table('orders')
                ->where('status', '=', 'Selesai')
                ->count();

            $periode1 = $tglawal;
            $periode2 = $tglakhir;

            $total = order::sum('total');
        } else {
            $page = DB::table('orders')
                ->select('orders.*', 'users.first_name')
                ->join('customers', 'customers.id', '=', 'orders.customers_id')
                ->join('users', 'users.id', '=', 'customers.users_id')
                ->where('date', '>=', $tglawal)
                ->where('date', '<=', $tglakhir)
                ->get();

            $jumlahtransaksi = DB::table('orders')
                ->where('status', '=', 'Selesai')
                ->where('date', '>=', $tglawal)
                ->where('date', '<=', $tglakhir)
                ->count();

            $periode1 = $tglawal;
            $periode2 = $tglakhir;

            $total = order::where('date', '>=', $tglawal)
                ->where('date', '<=', $tglakhir)
                ->sum('total');
        }

        // $page = DB::table('orders')
        //     ->select(
        //         'orders.*',
        //     )
        //     ->get();
        // $total = order::sum('total');

        $pdf = PDF::loadview('admin.pages.penjualan.pdf', [
            'penjualan' => $page,
            'total' => $total,
            'periode1' => $periode1,
            'periode2' => $periode2,
            'jumlahtransaksi' => $jumlahtransaksi
        ]);
        return $pdf->download('laporan-penjualan-' . $periode1 . ' - ' . $periode2 . '.pdf');
    }
}
