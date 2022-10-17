<!DOCTYPE html>
<html lang="en-GB">

<Body>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-black">Daftar Cashflow</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                @if (session()->has('info'))
                <div class="alert alert-info">
                    {{ session()->get('info') }}
                </div>
                @endif
                <thead>
                    <caption><b>Arus Kas Dari Kegiatan Operasional </b></caption>
                    <table class="table table-striped table-bordered" id="dataTable">
                        @php
                        $grandtotal=0;
                        @endphp
                        @foreach ($akun as $a)
                        @php
                        $total =0;
                        $jenis ='a';
                        @endphp
                        @foreach($transaksi as $t)
                        @if($a->id == $t->id_akun)
                        @php
                        $total = $total + $t->jumlah;
                        $jenis = $t->jenis;

                        @endphp

                        @endif
                        <tr>
                            @if ($a->index == 2)
                            <th colspan="4" class="text-left">{{ $a->nama_akun }}</th>
                            <th colspan="4" class="text-left">
                                @if ($jenis == 'debit')
                                @php
                                $grandtotal=$grandtotal + $total;
                                @endphp
                                {{ "Rp " . number_format($total,2,',','.') }}
                                @else
                                Rp.0
                                @endif
                            </th>
                            <th colspan="4" class="text-left">
                                @if ($jenis == 'kredit')
                                @php
                                $grandtotal=$grandtotal - $total;
                                @endphp
                                {{ "Rp " . number_format($total,2,',','.') }}
                                @else
                                Rp.0
                                @endif
                            </th>
                            @endif
                        </tr>
                        <tr>
                            <th colspan="1" class="text-left"><b>Total kas kegiatan Operasional</b></th>
                            <th colspan="8" class="text-center">
                                {{ $grandtotal }}
                            </th>
                        </tr>
                    </table>
                    <caption><b>Arus Kas Dari Kegiatan Investasi </b></caption>
                    <table class="table table-striped table-bordered" id="dataTable">
                        <tr>
                            @if ($a->index == 1)
                            <th colspan="4" class="text-left">
                                {{ $a->nama_akun }}
                            </th>
                            <th colspan="4" class="text-left">
                                @php
                                $grandtotal=$grandtotal + $total;
                                @endphp
                                @if ($jenis == 'debit')
                                {{ "Rp " . number_format($total,2,',','.') }}
                                @else
                                Rp.0
                                @endif
                            </th>
                            <th colspan="4" class="text-left">
                                @php
                                $grandtotal=$grandtotal - $total;
                                @endphp
                                @if ($jenis == 'kredit')
                                {{ "Rp " . number_format($total,2,',','.') }}
                                @else
                                Rp.0
                                @endif
                            </th>
                            @endif
                        </tr>
                        <tr>
                            <th colspan="1" class="text-left"><b>Total kas kegiatan Inventasi</b></th>
                            <th colspan="8" class="text-center">
                                {{ $grandtotal }}
                            </th>
                        </tr>
                    </table>

                    <caption><b>Arus Kas Dari Kegiatan Pendanaan </b></caption>
                    <table class="table table-striped table-bordered" id="dataTable">

                        <tr>
                            @if ($a->index == 3)
                            <th colspan="4" class="text-left">{{ $a->nama_akun }}</th>
                            <th colspan="4" class="text-left">
                                @if ($jenis == 'debit')
                                @php
                                $grandtotal=$grandtotal + $total;
                                @endphp
                                {{ "Rp " . number_format($total,2,',','.') }}
                                @else
                                Rp.0
                                @endif
                            </th>
                            <th colspan="4" class="text-left">
                                @if ($jenis == 'kredit')
                                @php
                                $grandtotal=$grandtotal - $total;
                                @endphp
                                {{ "Rp " . number_format($total,2,',','.') }}
                                @else
                                Rp.0
                                @endif
                            </th>
                            @endif
                        </tr>
                        <tr>
                            <th colspan="1" class="text-left"><b>Total kas kegiatan Pendanaan</b></th>
                            <th colspan="8" class="text-center">
                                {{ $grandtotal }}
                            </th>
                        </tr>
                    </table>
                    <caption><b>Kenaikan atau Penurunan Kas Akhir Periode </b></caption>
                    <table class="table table-striped table-bordered" id="dataTable">
                        <tr>
                            <th colspan="4" class="text-left">Kenaikan atau Penurunan Kas</th>
                            <th colspan="8" class="text-center"></th>
                        </tr>
                        <tr>
                            <th colspan="4" class="text-left">Saldo Kas Akhir</th>
                            <th colspan="8" class="text-center"></th>
                        </tr>
                    </table>
                </thead>
                <tfoot>
                </tfoot>
            </div>
        </div>
    </div>
</Body>

</html>