@extends('admin.layout')
@section('content')
    <div class="row">
        <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-6 col-sm-6">
            <div class="small-box bg-info">
                <div class="inner">
                    <h3>{{$jumlah_produk}}</h3>

                    <p>Jumlah Produk</p>
                </div>
                <div class="icon">
                    <i class="ion ion-bag"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-6 col-sm-6">
            <div class="small-box bg-primary">
                <div class="inner">
                    <h3>{{$jumlah_user}} </h3>

                    <p>Jumlah User</p>
                </div>
                <div class="icon">
                    <i class="ion ion-person"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-6 col-sm-6">
            <div class="small-box bg-warning">
                <div class="inner">
                    <h3> {{$jumlah_transaksi}} </h3>

                    <p>Jumlah Transaksi</p>
                </div>
                <div class="icon">
                    <i class="ion ion-stats-bars"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-6 col-sm-6">
            <div class="small-box bg-secondary">
                <div class="inner">
                    <h3>{{$jumlah_transaksi_selesai}}</h3>

                    <p>Jumlah Transaksi Selesai</p>
                </div>
                <div class="icon">
                    <i class="ion ion-bag"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>

        <div class="col-6 ">
            <div class="card">
                <div class="card-body">
                    <h3>Data Penjualan</h3>
                    <canvas id="chartBarPenjualan"></canvas>
                </div>
            </div>

        </div>

        <div class="col-6 ">


            <div class="card">
                <div class="card-body">
                    <h3>Data Penjualan</h3>
                    <div class="d-flex justify-content-center">
                        <canvas id="chartPiePenjualan" style="height: 20vw; width:auto;"></canvas>

                    </div>
                </div>


            </div>

        </div>

        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title font-weight-bold mb-3">Data Penjualan</h5>
                    <div class="table-responsive">
                        <table id="dataTable" class="table table table-bordered table-hover">
                            <thead>
                                <caption>
                                    Data Transaksi
                                </caption>
                                <tr>
                                    <th>#</th>
                                    <th>Number</th>
                                    <th>Pemesan</th>
                                    <th>Status Pembayaran</th>
                                    {{-- <th>Aksi</th> --}}
                                </tr>
                            </thead>
                            <tbody class="table-group-divider">
                                @foreach ($transaksis as $item)
                                    <tr>
                                        <td scope="row">{{ $loop->iteration }}</td>
                                        <td>{{ $item->number }}</td>
                                        <td>{{ $item->user->name }}</td>
                                        <td>
                                            @if ($item->payment_status == '1')
                                                <button type="button" class="btn btn-sm btn-warning">
                                                    Menunggu Pembayaran
                                                </button>
                                            @elseif($item->payment_status == '2')
                                                <button type="button" class="btn btn-sm btn-success">
                                                    Pembayaran Dikonfirmasi
                                                </button>
                                            @elseif($item->payment_status == '3')
                                                <button type="button" class="btn btn-sm btn-primary">
                                                    Diproses
                                                </button>
                                            @elseif($item->payment_status == '4')
                                                <button type="button" class="btn btn-sm btn-info">
                                                    Dikirim
                                                </button>
                                            @elseif($item->payment_status == '5')
                                                <button type="button" class="btn btn-sm btn-light">
                                                    Sampai di Tujuan
                                                </button>
                                            @elseif($item->payment_status == '6')
                                                <button type="button" class="btn btn-sm btn-success">
                                                    Selesai
                                                </button>
                                            @else
                                                <button type="button" class="btn btn-sm btn-secondary">
                                                    Status Tidak Valid
                                                </button>
                                            @endif

                                        </td>
                                        {{-- <td>
                                            <a href="{{ route('home.bayar', $item->id) }}"
                                                class="btn btn-sm btn-primary">Bayar</a>
                                        </td> --}}
                                    </tr>
                                @endforeach

                            </tbody>
                            <tfoot>

                            </tfoot>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>



    <script>
        var ctx = document.getElementById('chartBarPenjualan').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: @json($penjualanLabels),
                datasets: [{
                    label: 'Data',
                    data: @json($penjualanData),
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });


        var ctxPie = document.getElementById('chartPiePenjualan').getContext('2d');
        var myPieChart = new Chart(ctxPie, {
            type: 'pie',
            data: {
                labels: @json($penjualanLabels),
                datasets: [{
                    label: 'Jumlah Transaksi',
                    data: @json($penjualanData),
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: false,
                plugins: {
                    legend: {
                        position: 'top',
                    },
                    tooltip: {
                        callbacks: {
                            label: function(tooltipItem) {
                                return tooltipItem.label + ': ' + tooltipItem.raw + ' transaksi';
                            }
                        }
                    }
                }
            }
        });

        $('#dataTable').DataTable();
    </script>
@endsection
