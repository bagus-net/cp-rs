<!-- start page title -->
@extends('layouts.master')
@section('title')
@lang('translation.Datatables')
@endsection
@section('css')

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.7.0/dist/css/bootstrap.min.css">
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="{{ asset('path/to/apexcharts/dist/apexcharts.min.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="{{ asset('js/dashboard-charts.js') }}"></script>

<link href="{{ URL::asset('/assets/libs/datatables/datatables.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ URL::asset('/assets/libs/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ URL::asset('/assets/libs/chart-js/Chart.min.css') }}" rel="stylesheet" type="text/css" />


@endsection


@section('content')
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <h2 class="mb-0">Dashboard</h2>
            
            <h4 class="mb-0">
                <?php
                date_default_timezone_set('Asia/Jakarta'); // Atur zona waktu sesuai dengan lokasi Anda
                $currentTime = date('H:i'); // Ambil jam saat ini

                // Tentukan ucapan berdasarkan jam
    if ($currentTime >= '05:00' && $currentTime < '10:00') {
        $greeting = '🌞 Selamat Pagi'; // Emoji tangan menyapa di sini
    } elseif ($currentTime >= '10:01' && $currentTime < '14:59') {
        $greeting = '☀️ Selamat Siang'; // Emoji tangan menyapa di sini
    } elseif ($currentTime >= '15:00' && $currentTime < '17:30') {
        $greeting = '🌅 Selamat Sore'; // Emoji tangan menyapa di sini
    } else {
        $greeting = '🌙 Selamat Malam'; // Emoji tangan menyapa di sini
    }

                // Akses nama pengguna melalui auth()
                $userName = auth()->user()->nama ?? "Guest"; // Jika tidak ada pengguna terautentikasi, gunakan "Guest"

                echo $greeting . ', ' . $userName;
                ?>
            </h4>
            <p class="mb-0">
                <?php echo date('l, j F Y'); ?>
            </p>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-4 col-xl-4">
        <div class="card" style="background: #50a5f1; background: linear-gradient(135deg, #50a5f1 0%, #0b73ea 100%);">
            <div class="card-body">
                <div class="float-end mt-2">
                    <i class="fas fa-location-arrow text-white" style="font-size: 40px;"></i>
         
                </div>
                <div>
                    <h4 class="mb-1 mt-1">
                        <span data-plugin="counterup" style="color: white;">{{$jmlh_ftkp}}</span>
                    </h4>
                    <p class="text-white mb-0">Total Komplain</p>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4 col-xl-4">
        <div class="card" style="background: #50a5f1; background: linear-gradient(135deg, #50a5f1 0%, #0b73ea 100%);">
            <div class="card-body">
                <div class="float-end mt-2">
                    <i class="fas fa-chart-bar text-white" style="font-size: 40px;"></i>
         
                </div>
                <div>
                    <h4 class="mb-1 mt-1"><span data-plugin="counterup" style="color: white;">{{$pertahun_ftkp}}</span></h4>
                    <p class="text-white mb-0">Komplain Tahun {{ $currentYear }} </p>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4 col-xl-4">
        <div class="card" style="background: #50a5f1; background: linear-gradient(135deg, #50a5f1 0%, #0b73ea 100%);">
            <div class="card-body">
                <div class="float-end mt-2">
                    <i class="fas fa-chart-line text-white" style="font-size: 40px;"></i>
                </div>
                <div>
                    <h4 class="mb-1 mt-1"><span data-plugin="counterup" style="color: white;">{{$totalFtkpBulanIni}}</span></h4>
                    <p class="text-white mb-0">Komplain Bulan ini</p>
                </div>
            </div>
        </div>
    </div> </div>
    <div class="row">
    <div class="col-md-3 col-xl-3">
        <div class="card" style="background: #d6f3e9; background: linear-gradient(135deg, #d6f3e9 0%, ##34c38f 100%);">
            <div class="card-body">
                <div class="float-end mt-2">
                    <i class="fas fa-clipboard-check text-success" style="font-size: 40px;"></i>
                </div>
                <div>
                    <h4 class="mb-1 mt-1"><span data-plugin="counterup">{{$koreksi_ftkp}}</span></h4>
                    <p class="text-muted mb-0">
                        <i class="fas fa-check-circle text-success"></i> Telah Koreksi QC <!-- Example of a checkmark icon -->
                    </p>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3 col-xl-3">
        <div class="card" style="background: #fde1e1; background: linear-gradient(135deg, #fde1e1 0%, ##f46a6a 100%);">
            <div class="card-body">
                <div class="float-end mt-2">
                    <i class="fas fa-business-time text-danger" style="font-size: 40px;"></i>
                </div>
                <div>
                    <h4 class="mb-1 mt-1"><span data-plugin="counterup">{{$belumkoreksi_ftkp}}</span></h4>
                    <i class="far fa-times-circle text-danger"></i> Belum Dikoreksi QC <!-- Example of a times-circle icon -->
                </div>

            </div>
        </div>
    </div>

    <div class="col-md-3 col-xl-3">
        <div class="card" style="background: #d6f3e9; background: linear-gradient(135deg, #d6f3e9 0%, ##34c38f 100%);">
            <div class="card-body">
                <div class="float-end mt-2">
                    <i class="fas fa-user-check text-success" style="font-size: 40px;"></i>
                </div>
                <div>
                    <h4 class="mb-1 mt-1"><span data-plugin="counterup">{{$approve_ftkp}}</span></h4>
                    <i class="fas fa-check-circle text-success"></i> Approved <!-- Example of a times-circle icon -->
                </div>

            </div>
        </div>
    </div>

    <div class="col-md-3 col-xl-3">
        <div class="card" style="background: #fde1e1; background: linear-gradient(135deg, #fde1e1 0%, ##f46a6a 100%);">
            <div class="card-body">
                <div class="float-end mt-2">
                    <i class="fas fa-user-times text-danger" style="font-size: 40px;"></i>
                </div>
                <div>
                    <h4 class="mb-1 mt-1"><span data-plugin="counterup">{{$reject_ftkp}}</span></h4>
                    <i class="far fa-times-circle text-danger"></i> Rejected

                </div>

            </div>
        </div>
    </div></div>

    

    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <button id="switchYear" class="btn fas fa-exchange-alt btn-info mb-2"></button>
                    <div id="grafik-rekap-keluhan"></div>
                </div>
            </div>
        </div>
    
        <div class="col-lg-4">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-4">Persentase Koreksi</h4>

                    <div>
                        <canvas id="ftkpPieChart" width="400" height="330"></canvas>
                    </div>
                    <div class="mt-3 text-center">
                        <span class="badge bg-soft-success font-size-12"><i
                                class="mdi mdi-checkbox-blank-circle text-success me-1"></i>Telah Dikoreksi QC
                            <strong>({{ $percentKoreksi }}%)</strong></span>
                        <span class="badge bg-soft-info font-size-12"><i
                                class="mdi mdi-checkbox-blank-circle text-info me-1"></i>Belum Dikoreksi <strong>({{ $percentBelumKoreksi }}%)</strong></span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <div>
                            <button id="switchYearcust" class="btn fas fa-exchange-alt btn-info mb-2"></button>
                            <div id="chart-container">
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <p><strong>Rekap Komplain Customers</strong></p>
                    <canvas id="topKodeCustChart" width="400" height="300"></canvas>
                </div>
            </div>
        </div>
    </div>

        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <div>
                            <button id="switchYearmsn" class="btn fas fa-exchange-alt btn-info mb-2"></button>
                            <div id="chart-msn">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <p><strong>Rekap Komplain Mesin Flexo</strong></p>
                    <canvas id="topFlexoChart" width="400" height="300"></canvas>
                </div>
            </div>
        </div>  
    </div>
            <div class="row">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-body">
                            <div>
                                <button id="switchYearkaru" class="btn fas fa-exchange-alt btn-info mb-2"></button>
                                <div id="chart-karu">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <p><strong>Rekap Komplain Karu Flexo</strong></p>
                    <canvas id="topReguChart" width="400" height="300"></canvas>
                </div>
            </div>
        </div>
    </div>

            <div class="row">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-body">
                            <div>
                                <button id="switchYearregu" class="btn fas fa-exchange-alt btn-info mb-2"></button>
                                <div id="chart-regu">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <p><strong>Rekap Komplain Regu Flexo</strong></p>
                    <canvas id="topOprChart" width="400" height="300"></canvas>
                </div>
            </div>
        </div>
    </div>
    


<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <p><strong>Transaksi Terbaru</strong></p>
                <div class="table-responsive">
                    <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nomor FTKP</th>
                                <th>Tanggal</th>
                                <th>Nama</th>
                                <th>Status Koreksi</th>
                                <th>Status Approve</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($transaksiTerakhir as $transaksi)
                            <tr>
                                <td>{{ $loop->index + 1}}</td>
                                <td>{{ $transaksi->nojnl}}</td>
                                <td>{{ $transaksi->tgl}}</td>
                                <td>{{ $transaksi->kode}}</td>
                                <td>
                                    <h3 class="font-size-12 mb-1">
                                        @if($transaksi->status_qc == 'Telah Dikoreksi QC')
                                        <h3 class="font-size-12 mb-1">
                                            <div class="badge bg-pill bg-soft-success font-size-12">{{ $transaksi->status_qc}}
                                        </h3>
                                        @else
                                        <h3 class="font-size-12 mb-1">
                                            <div class="badge bg-pill bg-soft-warning font-size-12">{{ $transaksi->status_qc}}
                                        </h3>
                                        @endif
                                        {{ $transaksi->updated_qc}} {{ $transaksi->modifyqc_by}}
                                </td>
                                <td>
                                    <h3 class="font-size-12 mb-1">
                                        @if($transaksi->status_mg == 'Telah di ACC Manager')

                                        <h3 class="font-size-12 mb-1">
                                            <div class="badge bg-pill bg-soft-success font-size-12">{{ $transaksi->status_mg}}
                                        </h3>
                                        @elseif ($transaksi->status_mg == 'Tidak di ACC Manager')
                                        <h3 class="font-size-12 mb-1">
                                            <div class="badge bg-pill bg-soft-danger font-size-12">{{ $transaksi->status_mg}}
                                        </h3>
                                        @else
                                        <h3 class="font-size-12 mb-1">
                                            <div class="badge bg-pill bg-soft-warning font-size-12">{{ $transaksi->status_mg}}
                                        </h3>
                                        @endif
                                        {{ $transaksi->updated_mg}} {{ $transaksi->modifymg_by}}
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                    </body>

                    </html>
                    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
                    <script src="{{ asset('assets/libs/chart.js/Chart.min.js') }}"></script>
                    
                    <script>
                        
                        
                      // Initial data for the chart
    var currentYearData = @json($currentYearData);
    var previousYearData = @json($previousYearData);
    var data = currentYearData;
    var currentYear = true;

    var grafikRekapKeluhan = new ApexCharts(document.querySelector("#grafik-rekap-keluhan"), {
        chart: {
            type: "bar",
            height: 350,
        },
        series: [{
            name: "Total Komplain",
            data: data
        }],
        xaxis: {
            categories: getMonthNames(currentYear),
            labels: {
                rotate: -45,
            }
        },
        title: {
            text: 'Rekap Total Komplain Per Bulan - ' + (currentYear ? {{ $currentYear }} : {{ $previousYear }})
        },
        responsive: [{
            breakpoint: 480,
            options: {
                chart: {
                    height: 250,
                }
            }
        }]
    });
    grafikRekapKeluhan.render();

    // Switch between current and previous year
    document.getElementById('switchYear').addEventListener('click', function () {
        currentYear = !currentYear;
        data = currentYear ? currentYearData : previousYearData;
        grafikRekapKeluhan.updateOptions({
            title: {
                text: 'Rekap Total Komplain Per Bulan - ' + (currentYear ? {{ $currentYear }} : {{ $previousYear }})
            }
        });
        grafikRekapKeluhan.updateSeries([{
            data: data
        }]);
        grafikRekapKeluhan.updateOptions({
            xaxis: {
                categories: getMonthNames(currentYear),
            }
        });
    });

    document.addEventListener("DOMContentLoaded", function() {
            // Pie Chart
            var ctx = document.getElementById('ftkpPieChart').getContext('2d');
            var myPieChart = new Chart(ctx, {
                type: 'pie',
                data: {
                    labels: ['Telah Dikoreksi QC', 'Belum Dikoreksi'],
                    datasets: [{
                        data: [{{ $koreksiFtkp }}, {{ $belumKoreksiFtkp }}],
                        backgroundColor: ['#4CAF50', '#3498db'],
                        hoverBackgroundColor: ['#45a049', '#2980b9'],
                        hoverBorderColor: "rgba(234, 236, 244, 1)",
                    }],
                },
                options: {
                    maintainAspectRatio: false,
                    tooltips: {
                        backgroundColor: "rgb(255,255,255)",
                        bodyFontColor: "#858796",
                        borderColor: '#dddfeb',
                        borderWidth: 1,
                        xPadding: 15,
                        yPadding: 15,
                        displayColors: false,
                        caretPadding: 10,
                    },
                    legend: {
                        display: false
                    },
                    cutoutPercentage: 80,
                },
            });
        });

    function getMonthNames(currentYear) {
        var year = currentYear ? {{ $currentYear }} : {{ $previousYear }};
        var monthNames = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
        return monthNames.map(function(month) {
            return month + ' ' + year;
        });
    }
                        var topKodeCustChartCanvas = document.getElementById('topKodeCustChart').getContext('2d');

                        var topKodeCustData = @json($topKodeCust); // Data dari controller

                        var labels = topKodeCustData.map(item => item.namacust);
                        var data = topKodeCustData.map(item => item.total_komplain);

                        new Chart(topKodeCustChartCanvas, {
                            type: 'line',
                            data: {
                                labels: labels,
                                datasets: [{
                                    label: 'Customers',
                                    data: data,
                                    backgroundColor: '#3498db',
                                    borderColor: '#3498db',
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

                        var topFlexoChartCanvas = document.getElementById('topFlexoChart').getContext('2d');
                        var topMesinFlexoData = @json($topMesinFlexo); // Data dari controller
                        var labels = topMesinFlexoData.map(item => item.nama_mesin_flex);
                        var data = topMesinFlexoData.map(item => item.total);
                        new Chart(topFlexoChartCanvas, {
                            type: 'line',
                            data: {
                                labels: labels,
                                datasets: [{
                                    label: 'Mesin Flexo',
                                    data: data,
                                    data: data,
                                    backgroundColor: '#3498db',
                                    borderColor: '#3498db',
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

                        var topReguChartCanvas = document.getElementById('topReguChart').getContext('2d');
                        var topReguFlexoData = @json($topReguFlexo); // Data dari controller
                        var labels = topReguFlexoData.map(item => item.nama_regu_flex);
                        var data = topReguFlexoData.map(item => item.total);
                        new Chart(topReguChartCanvas, {
                            type: 'line',
                            data: {
                                labels: labels,
                                datasets: [{
                                    label: 'Karu',
                                    data: data,
                                    data: data,
                                    backgroundColor: '#3498db',
                                    borderColor: '#3498db',
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

                        var topOprChartCanvas = document.getElementById('topOprChart').getContext('2d');
                        var topOprFlexoData = @json($topOprFlexo); // Data dari controller
                        var labels = topOprFlexoData.map(item => item.nama_operator);
                        var data = topOprFlexoData.map(item => item.total);
                        new Chart(topOprChartCanvas, {
                            type: 'line',
                            data: {
                                labels: labels,
                                datasets: [{
                                    label: 'Regu',
                                    data: data,
                                    data: data,
                                    backgroundColor: '#3498db',
                                    borderColor: '#3498db',
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

        var currentYearDatacust = {!! json_encode($currentYearTopCust) !!};
        var previousYearDatacust = {!! json_encode($previousYearTopCust) !!};
        var data = currentYearDatacust;
        var currentYearcust = true;

        var chartCust = new ApexCharts(document.getElementById('chart-container'), {
            chart: {
                type: 'bar',
                height: 350,
            },
            series: [{
                name: 'Total Komplain',
                data: data.map(item => item.total_komplain)
                
            }],
            xaxis: {
                categories: data.map(item => item.namacust),
            },
            title: {
                text: 'Komplain Customers'
            },
                
            responsive: [{
                breakpoint: 480,
                options: {
                    chart: {
                        height: 250,
                    }
                }
            }]
        });
        chartCust.render();

        document.getElementById('switchYearcust').addEventListener('click', function () {
    currentYearcust = !currentYearcust;
    data = currentYearcust ? currentYearDatacust : previousYearDatacust;

    chartCust.updateOptions({
        title: {
            text: 'Komplain Customers - ' + (currentYearcust ? '{{ $currentYearcust }}' : '{{ $previousYearcust }}')
        }
    });

    chartCust.updateSeries([{
        data: data.map(item => item.total_komplain)  // Corrected this line
    }]);

    chartCust.updateOptions({
        xaxis: {
            categories: data.map(item => item.namacust),
        }
    });
});

// CHART MSN

var currentYearDatamsn = {!! json_encode($currentYearTopmsn) !!};
var previousYearDatamsn = {!! json_encode($previousYearTopmsn) !!};
var dataMsn = currentYearDatamsn; // Change the variable name to avoid conflicts
var currentYearmsn = true;

var chartMsn = new ApexCharts(document.getElementById('chart-msn'), {
    chart: {
        type: 'bar',
        height: 350,
    },
    series: [{
        name: 'Total Komplain',
        data: dataMsn.map(item => item.total)
    }],
    xaxis: {
        categories: dataMsn.map(item => item.nama_mesin_flex),
    },
    title: {
        text: 'Komplain Mesin Flexo'
    },
    
    responsive: [{
        breakpoint: 480,
        options: {
            chart: {
                height: 250,
            }
        }
    }]
});
chartMsn.render();

document.getElementById('switchYearmsn').addEventListener('click', function () {
    currentYearmsn = !currentYearmsn;
    dataMsn = currentYearmsn ? currentYearDatamsn : previousYearDatamsn;

    chartMsn.updateOptions({
        title: {
            text: 'Komplain Mesin Flexo - ' + (currentYearmsn ? '{{ $currentYearmsn }}' : '{{ $previousYearmsn }}')
        }
    });

    chartMsn.updateSeries([{
        data: dataMsn.map(item => item.total)
    }]);

    chartMsn.updateOptions({
        xaxis: {
            categories: dataMsn.map(item => item.nama_mesin_flex),
        }
    });
});


        // CHART KARU 

        var currentYearDatakaru = {!! json_encode($currentYearTopkaru) !!};
var previousYearDatakaru = {!! json_encode($previousYearTopkaru) !!};
var dataKaru = currentYearDatakaru; // Change the variable name to avoid conflicts
var currentYearkaru = true;

var chartKaru = new ApexCharts(document.getElementById('chart-karu'), {
    chart: {
        type: 'bar',
        height: 350,
    },
    series: [{
        name: 'Total Komplain',
        data: dataKaru.map(item => item.total)
    }],
    xaxis: {
        categories: dataKaru.map(item => item.nama_regu_flex),
    },
    title: {
        text: 'Komplain Karu'
    },
    
    responsive: [{
        breakpoint: 480,
        options: {
            chart: {
                height: 250,
            }
        }
    }]
});
chartKaru.render();

document.getElementById('switchYearkaru').addEventListener('click', function () {
    currentYearkaru = !currentYearkaru;
    dataKaru = currentYearkaru ? currentYearDatakaru : previousYearDatakaru;

    chartKaru.updateOptions({
        title: {
            text: 'Komplain Karu - ' + (currentYearkaru ? '{{ $currentYearkaru }}' : '{{ $previousYearkaru }}')
        }
    });

    chartKaru.updateSeries([{
        data: dataKaru.map(item => item.total)
    }]);

    chartKaru.updateOptions({
        xaxis: {
            categories: dataKaru.map(item => item.nama_regu_flex),
        }
    });
});

         // CHART REGU

         var currentYearDataregu = {!! json_encode($currentYearTopregu) !!};
var previousYearDataregu = {!! json_encode($previousYearTopregu) !!};
var dataRegu = currentYearDataregu; // Change the variable name to avoid conflicts
var currentYearregu = true;

var chartRegu = new ApexCharts(document.getElementById('chart-regu'), {
    chart: {
        type: 'bar',
        height: 350,
    },
    series: [{
        name: 'Total Komplain',
        data: dataRegu.map(item => item.total)
    }],
    xaxis: {
        categories: dataRegu.map(item => item.nama_operator),
    },
    title: {
        text: 'Komplain Regu'
    },
    
    responsive: [{
        breakpoint: 480,
        options: {
            chart: {
                height: 250,
            }
        }
    }]
});
chartRegu.render();

document.getElementById('switchYearregu').addEventListener('click', function () {
    currentYearregu = !currentYearregu;
    dataRegu = currentYearregu ? currentYearDataregu : previousYearDataregu;

    chartRegu.updateOptions({
        title: {
            text: 'Komplain Regu - ' + (currentYearregu ? '{{ $currentYearregu }}' : '{{ $previousYearregu }}')
        }
    });

    chartRegu.updateSeries([{
        data: dataRegu.map(item => item.total)
    }]);

    chartRegu.updateOptions({
        xaxis: {
            categories: dataRegu.map(item => item.nama_operator),
        }
    });
});

                    </script>
                </div><!-- end card-body -->
            </div><!-- end card -->
        </div><!-- end col-md-4 -->
    </div>
    <!-- end row -->

</div>
<!-- end page title -->
@endsection
@section('script')
<script src="{{ URL::asset('/assets/libs/datatables/datatables.min.js') }}"></script>
<script src="{{ URL::asset('/assets/libs/jszip/jszip.min.js') }}"></script>
<script src="{{ URL::asset('/assets/libs/pdfmake/pdfmake.min.js') }}"></script>
<script src="{{ URL::asset('/assets/js/pages/datatables.init.js') }}"></script>
<script src="{{ URL::asset('/assets/libs/apexcharts/apexcharts.min.js') }}"></script>
<script src="{{ URL::asset('/assets/js/pages/apexcharts.init.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
<script src="{{ asset('js/dashboard-charts.js') }}"></script>
@endsection