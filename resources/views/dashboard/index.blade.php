@extends('template')
@section('title','Dashboard')
    
@section('content')
<!-- Komponen Gaji -->
<div class="row">
  <div class="col-12 col-sm-6 col-md-3">
    <div class="info-box">
      <span class="info-box-icon bg-success elevation-1"><i class="far fa-money-bill-alt"></i></span>

      <div class="info-box-content">
        <span class="info-box-text">Debet Perusahaan</span>
        <span class="info-box-number">
          Rp.100.000.000
          <small>-</small>
        </span>
      </div>
      <!-- /.info-box-content -->
    </div>
    <!-- /.info-box -->
  </div>
  
 
  <!-- /.col -->
  <div class="col-12 col-sm-6 col-md-3">
    <div class="info-box mb-3">
      <span class="info-box-icon bg-warning elevation-1"><i class="far fa-money-bill-alt"></i></span>

      <div class="info-box-content">
        <span class="info-box-text">Kredit Pengeluaran</span>
        <span class="info-box-number">Rp. 50.332.000</span>
      </div>
      <!-- /.info-box-content -->
    </div>
    <!-- /.info-box -->
  </div>
  <div class="col-12 col-sm-6 col-md-3">
    <div class="info-box mb-3">
      <span class="info-box-icon bg-info elevation-1"><i class="fas fa-users"></i></span>

      <div class="info-box-content">
        <span class="info-box-text">Saldo Akhir</span>
        <span class="info-box-number">Rp. 49.668.000</span>
      </div>
      <!-- /.info-box-content -->
    </div>
    <!-- /.info-box -->
  </div>
  <div class="col-12 col-sm-6 col-md-3">
    <div class="info-box mb-3">
      <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-users"></i></span>

      <div class="info-box-content">
        <span class="info-box-text">Potongan Karyawan</span>
        <span class="info-box-number">Rp. 750.000</span>
      </div>
      <!-- /.info-box-content -->
    </div>
    <!-- /.info-box -->
  </div>
  <!-- /.col -->
  <div class="col-12 col-sm-6 col-md-3">
    <div class="info-box mb-3">
      <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-file-invoice-dollar"></i></span>
      <div class="info-box-content">
        <span class="info-box-text">Gaji Karyawan</span>
        <span class="info-box-number">Rp.30.000.000</span>
      </div>
    </div>
  </div>

  <div class="clearfix hidden-md-up"></div>
  <div class="col-12 col-sm-6 col-md-3">
    <div class="info-box mb-3">
      <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-file-invoice-dollar"></i></span>
      <div class="info-box-content">
        <span class="info-box-text">Tunjangan Karyawan</span>
        <span class="info-box-number">Rp.11.400.000</span>
      </div>
    </div>
  </div>

  <div class="col-12 col-sm-6 col-md-3">
    <div class="info-box mb-3">
      <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-user-clock"></i></span>
      <div class="info-box-content">
        <span class="info-box-text">Lembur Karyawan</span>
        <span class="info-box-number">Rp. 8000.000</span>
      </div>
    </div>
  </div>

  <div class="col-12 col-sm-6 col-md-3">
    <div class="info-box mb-3">
      <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-hand-holding-usd"></i></span>
      <div class="info-box-content">
        <span class="info-box-text">Bonus Karyawan</span>
        <span class="info-box-number">Rp. 932.000</span>
      </div>
    </div>
  </div>
</div>

<!-- Penggajian-->
<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header">
        <h5 class="card-title">Rekap Laporan Bulanan</h5>
      </div>
      <!-- /.Grafik Payroll -->
      <div class="card-body">
        <div class="row">
          <div class="col-md-12">
            <p class="text-center">
             <center> <strong ><h3 >Grafik Manajemen Sistem Penggajian</h3></strong></center>
            </p>
            <div id="container" style="width: 100%;">
              <canvas id="canvas" height="120" style="height: 180px;"></canvas>
            </div>
          </div>
              <button hidden = "true" id="randomizeData">Randomize Data</button>
          </div>
          <!-- /.col -->
      </div>


      <!-- ./card-body -->
      <div class="card-footer">
        <div class="row">
          <div class="col-sm-3 col-6">
            <div class="description-block border-right">
              <button class="btn btn-success" id="addDataset">Tambah</button>
              <h5 class="description-header">Komponen Keuangan</h5>
              <span class="description-text">/Bulan</span>
            </div>
            <!-- /.description-block -->
          </div>
          <!-- /.col -->
          <div class="col-sm-3 col-6">
            <div class="description-block border-right">
              <button class ="btn btn-danger" id="removeDataset">Hapus</button>
              <h5 class="description-header">Komponen Keuangan</h5>
              <span class="description-text">/Bulan</span>
            </div>
            <!-- /.description-block -->
          </div>
          <!-- /.col -->
          <div class="col-sm-3 col-6">
            <div class="description-block border-right">
              <button class="btn btn-success" id="addData">Tambah</button> 
              <h5 class="description-header">Tambah Data</h5>
              <span class="description-text">/Bulan</span>
            </div>
            <!-- /.description-block -->
          </div>
          <!-- /.col -->
          <div class="col-sm-3 col-6">
            <div class="description-block">
              <button class="btn btn-danger" id="removeData">Hapus</button>
              <h5 class="description-header">Hapus Data</h5>
              <span class="description-text">/Bulan</span>
            </div>
            <!-- /.description-block -->
          </div>
        </div>
      <!-- /.card-footer -->
      </div>
    <!-- /.card -->
    </div>
</div>

<!-- Grafik Absensi-->
<div class="row">
  <div class="col-md-8">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Rekap Jumlah Absensi Karyawan Bulanan</h3>
      </div>
        <div class="card-body p-0">
        <div class="d-md-flex">
          <div class="p-1 flex-fill" style="overflow: hidden">
            <!-- Map will be created here -->
            <div id="world-map-markers" style="height: 320px; overflow: hidden">
              <div id="canvas-holder" style="width:85%; " >
                <canvas id="chart-area" style="padding-bottom: 50px "></canvas>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
 </div>
  <div class="col-md-4">
    <div class="info-box mb-3 bg-success">
      <span class="info-box-icon"><i class="far fa-user"></i></span>
        <div class="info-box-content">
          <span class="info-box-text">Jumlah Pegawai Hadir</span>
          <span class="info-box-number">25</span>
        </div>
    </div>
    <div class="info-box mb-3 bg-warning">
      <span class="info-box-icon"><i class="fas fa-user"></i></span>
        <div class="info-box-content">
          <span class="info-box-text">Jumlah Pegawai Cuti</span>
          <span class="info-box-number">5</span>
        </div>
    </div>

    <div class="info-box mb-3 bg-danger">
      <span class="info-box-icon"><i class="fas fa-user"></i></span>
        <div class="info-box-content">
          <span class="info-box-text">Jumlah Pegawai Absen Tanpa Keterangan</span>
          <span class="info-box-number">5</span>
       </div>
   </div>
  
  <div class="info-box mb-3 bg-info">
    <span class="info-box-icon"><i class="far fa-user"></i></span>
      <div class="info-box-content">
       <span class="info-box-text">Jumlah Pegawai Sakit</span>
       <span class="info-box-number">3</span>
     </div>
  </div>
</div>

<div class="row">
  <div class="col-md-6">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Pengajuan Cuti</h5>
        <div id="container" style="width: 75%;">
        </div>
        
          <!-- Sales Chart Canvas -->
          <canvas id="chart-line" height="280" style="height: 290px; width:520px;"></canvas>
        
        <a href="#" class="card-link">Card link</a>
        <a href="#" class="card-link">Another link</a>
      </div>
    </div>
  
  </div>
  <div class="col-md-6">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Pengajuan Lembur</h5>
        <div id="container" style="width: 75%;">
        </div>
        
          <!-- Sales Chart Canvas -->
          <canvas id="chart-line2" height="280" style="height: 290px; width:520px;"></canvas>
        
        <a href="#" class="card-link">Card link</a>
        <a href="#" class="card-link">Another link</a>
      </div>
    </div>
  
  </div>
  
</div>




<!-- Main content -->

 
   
      


<style>
	canvas {
		-moz-user-select: none;
		-webkit-user-select: none;
		-ms-user-select: none;
	}
  #elementID {
        
        text-shadow: 1px 1px 1px #ccc;
        font-size: 25px;
    } 
   
	</style>
  <!--chartjs -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"></script>
<script src="{{asset('js/utils.js')}}"></script>
<script>
  var MONTHS = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
		var color = Chart.helpers.color;
		var barChartData = {
			labels: ['January', 'February', 'March', 'April'],
			datasets: [{
				label: 'Debet Perusahaan ',
				backgroundColor: color(window.chartColors.red).alpha(0.5).rgbString(),
				borderColor: window.chartColors.red,
				borderWidth: 1,
				data: [
					100,200,300,400
				]
			}, {
				label: 'Kredit Perusahaan',
				backgroundColor: color(window.chartColors.blue).alpha(0.5).rgbString(),
				borderColor: window.chartColors.blue,
				borderWidth: 1,
				data: [
					randomScalingFactor(),
					randomScalingFactor(),
					randomScalingFactor(),
					randomScalingFactor(),
					randomScalingFactor(),
					randomScalingFactor(),
					randomScalingFactor()
				]
      },{
				label: 'Saldo Akhir',
				backgroundColor: color(window.chartColors.purple).alpha(0.5).rgbString(),
				borderColor: window.chartColors.blue,
				borderWidth: 1,
				data: [
					randomScalingFactor(),
					randomScalingFactor(),
					randomScalingFactor(),
					randomScalingFactor(),
					randomScalingFactor(),
					randomScalingFactor(),
					randomScalingFactor()
				]
      },{
				label: 'Potongan Karyawan',
				backgroundColor: color(window.chartColors.yellow).alpha(0.5).rgbString(),
				borderColor: window.chartColors.blue,
				borderWidth: 1,
				data: [
					randomScalingFactor(),
					randomScalingFactor(),
					randomScalingFactor(),
					randomScalingFactor(),
					randomScalingFactor(),
					randomScalingFactor(),
					randomScalingFactor()
				]
      },{
				label: 'Gaji Karyawan',
				backgroundColor: color(window.chartColors.orange).alpha(0.5).rgbString(),
				borderColor: window.chartColors.blue,
				borderWidth: 1,
				data: [
					randomScalingFactor(),
					randomScalingFactor(),
					randomScalingFactor(),
					randomScalingFactor(),
					randomScalingFactor(),
					randomScalingFactor(),
					randomScalingFactor()
				]
      },{
				label: 'Tunjangan Karyawan',
				backgroundColor: color(window.chartColors.black).alpha(0.5).rgbString(),
				borderColor: window.chartColors.blue,
				borderWidth: 1,
				data: [
					randomScalingFactor(),
					randomScalingFactor(),
					randomScalingFactor(),
					randomScalingFactor(),
					randomScalingFactor(),
					randomScalingFactor(),
					randomScalingFactor()
				]
      },
        {
				label: 'Lembur + Bonus',
				backgroundColor: color(window.chartColors.grey).alpha(0.5).rgbString(),
				borderColor: window.chartColors.blue,
				borderWidth: 1,
				data: [
					randomScalingFactor(),
					randomScalingFactor(),
					randomScalingFactor(),
					randomScalingFactor(),
					randomScalingFactor(),
					randomScalingFactor(),
					randomScalingFactor()
				]
      },
    
    ]

		};

		window.onload = function() {
      var ctx2 = document.getElementById('chart-area').getContext('2d');
      window.myDoughnut = new Chart(ctx2, config);
      var ctx3 = document.getElementById('chart-line').getContext('2d');
      var ctx4 = document.getElementById('chart-line2').getContext('2d');
      var ctx = document.getElementById('canvas').getContext('2d');
      window.myBar = new Chart(ctx, {
				type: 'bar',
				data: barChartData,
				options: {
					responsive: true,
					legend: {
						position: 'right',
					},
					title: {
						display: true,
						text: ''
					}
				}
			});
      window.myLine = Chart.Line(ctx3, {
				data: lineChartData,
				options: {
					responsive: true,
					hoverMode: 'index',
					stacked: false,
					title: {
						display: true,
						text: 'Pengajuan Cuti Karyawan Per Bulan'
					},
					scales: {
						yAxes: [{
							type: 'linear', // only linear but allow scale type registration. This allows extensions to exist solely for log scale for instance
							display: true,
							position: 'left',
							id: 'y-axis-1',
						}, {
							type: 'linear', // only linear but allow scale type registration. This allows extensions to exist solely for log scale for instance
							display: true,
							position: 'right',
							id: 'y-axis-2',

							// grid line settings
							gridLines: {
								drawOnChartArea: false, // only want the grid lines for one axis to show up
							},
						}],
					}
				}
      });
      window.myLine = Chart.Line(ctx4, {
				data: lineChartData,
				options: {
					responsive: true,
					hoverMode: 'index',
					stacked: false,
					title: {
						display: true,
						text: 'Pengajuan Lembur Karyawan Per Bulan'
					},
					scales: {
						yAxes: [{
							type: 'linear', // only linear but allow scale type registration. This allows extensions to exist solely for log scale for instance
							display: true,
							position: 'left',
							id: 'y-axis-1',
						}, {
							type: 'linear', // only linear but allow scale type registration. This allows extensions to exist solely for log scale for instance
							display: true,
							position: 'right',
							id: 'y-axis-2',

							// grid line settings
							gridLines: {
								drawOnChartArea: false, // only want the grid lines for one axis to show up
							},
						}],
					}
				}
			});   
		   
		
		

		};



		var colorNames = Object.keys(window.chartColors);
		document.getElementById('addDataset').addEventListener('click', function() {
			var colorName = colorNames[barChartData.datasets.length % colorNames.length];
			var dsColor = window.chartColors[colorName];
			var newDataset = {
				label: 'Dataset ' + (barChartData.datasets.length + 1),
				backgroundColor: color(dsColor).alpha(0.5).rgbString(),
				borderColor: dsColor,
				borderWidth: 1,
				data: []
			};

			for (var index = 0; index < barChartData.labels.length; ++index) {
				newDataset.data.push(randomScalingFactor());
			}

			barChartData.datasets.push(newDataset);
			window.myBar.update();
		});



		document.getElementById('removeDataset').addEventListener('click', function() {
			barChartData.datasets.pop();
			window.myBar.update();
		});


    
    //Grafik Pengajuan Cuti dan Tidak
    var randomScalingFactor = function() {
			return Math.round(Math.random() * 100);
		};

		var config = {
			type: 'doughnut',
			data: {
				datasets: [{
					data: [
						5,
						5,
						25,
						3,
						
					],
					backgroundColor: [
						window.chartColors.red,
						window.chartColors.yellow,
						window.chartColors.green,
						window.chartColors.blue,
					],
				  	label: 'Dataset 1'
        }],
          labels: [
					'Pegawai Absen',
					'Pegawai Cuti',
					'Pegawai Hadir',
					'Pegawai sakit',
					
				]	},
			options: {
				responsive: true,
				legend: {
					position: 'left',
				},
				title: {
					display: true
					
				},
				animation: {
					animateScale: true,
					animateRotate: true
				}
			}
		};

// Grafik Pengajuan Lembur
var lineChartData = {
      labels: ['1','2', '3','5','6','8','9','10',
      '11','12','13','14','15','16','17','18',
      '19','20','21','22','23','24','25','26',
      '27','28','29','30','31'],
			datasets: [{
				label: 'Tidak di Setujui',
				borderColor: window.chartColors.red,
				backgroundColor: window.chartColors.red,
				fill: false,
				data: [
					randomScalingFactor(),
					randomScalingFactor(),
					randomScalingFactor(),
					randomScalingFactor(),
					randomScalingFactor(),
					randomScalingFactor(),
					randomScalingFactor()
				],
				yAxisID: 'y-axis-1',
			}, {
				label: 'Disetujui',
				borderColor: window.chartColors.blue,
				backgroundColor: window.chartColors.blue,
				fill: false,
				data: [
					randomScalingFactor(),
					randomScalingFactor(),
					randomScalingFactor(),
					randomScalingFactor(),
					randomScalingFactor(),
					randomScalingFactor(),
					randomScalingFactor()
				],
				yAxisID: 'y-axis-2'
			}]
		};
		
</script> 
@endsection