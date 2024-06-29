@extends('templatepublic.main')

@section('contents')
<br>
<br>
<div class="chart1">
  <h3>Hasil Jawaban Responden Setiap Bulan</h3>
  <div id="chartContainer" style="height: 500px; width: 100%"></div>
  <script src="{{ asset('js/diagram.js') }}"></script>
</div>
<div class="chart1">
  <h3>Hasil Jawaban Responden Setiap Bulan</h3>
  <div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Jenis Kelamin</h4>
                        <canvas id="doughnutChart" height="200"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
  </div>
</div>
<div class="chart1">
  <h3>Hasil Jawaban Responden Setiap Bulan</h3>
  <div class="main-panel">
    <div class="content-wrapper">
      <div class="row">
        <div class="col-lg-6 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">Umur</h4>
              <canvas id="doughnutChart2" height="200"></canvas>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="chart1">
  <h3>Hasil Jawaban Responden Setiap Bulan</h3>
  <div class="main-panel">
    <div class="content-wrapper">
      <div class="row">
        <div class="col-lg-6 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">Pendidikan Terakhir</h4>
              <canvas id="doughnutChart3" height="200"></canvas>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
  window.onload = function () {
    var data = @json($data);
    var months = ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"];
    
    var chart = new CanvasJS.Chart("chartContainer", 
    {
      animationEnabled: true,
      legend: {
        cursor: "pointer",
        itemclick: toggleDataSeries,
      },
      toolTip: {
        shared: true,
        content: toolTipFormatter,
      },
      data: [
        {
          type: "bar",
          showInLegend: true,
          name: "Sangat Baik",
          color: "#00cc00",
          dataPoints: months.map((month, index) => ({ y: data.SangatBaik[index + 1] || 0, label: month })),
        },
        {
          type: "bar",
          showInLegend: true,
          name: "Baik",
          color: "#00ff00",
          dataPoints: months.map((month, index) => ({ y: data.Baik[index + 1] || 0, label: month })),
        },
        {
          type: "bar",
          showInLegend: true,
          name: "Kurang Baik",
          color: "#ffff33",
          dataPoints: months.map((month, index) => ({ y: data.KurangBaik[index + 1] || 0, label: month })),
        },
        {
          type: "bar",
          showInLegend: true,
          name: "Tidak Baik",
          color: "#ff0000",
          dataPoints: months.map((month, index) => ({ y: data.TidakBaik[index + 1] || 0, label: month })),
        },
      ],
    });
    chart.render();

    function toolTipFormatter(e) {
      var str = "";
      var total = 0;
      var str3;
      var str2;
      for (var i = 0; i < e.entries.length; i++) {
        var str1 =
          '<span style= "color:' +
          e.entries[i].dataSeries.color +
          '">' +
          e.entries[i].dataSeries.name +
          "</span>: <strong>" +
          e.entries[i].dataPoint.y +
          "</strong> <br/>";
        total = e.entries[i].dataPoint.y + total;
        str = str.concat(str1);
      }
      str2 = "<strong>" + e.entries[0].dataPoint.label + "</strong> <br/>";
      str3 =
        '<span style = "color:Tomato">Total: </span><strong>' +
        total +
        "</strong><br/>";
      return str2.concat(str).concat(str3);
    }

    function toggleDataSeries(e) {
      if (
        typeof e.dataSeries.visible === "undefined" ||
        e.dataSeries.visible
      ) {
        e.dataSeries.visible = false;
      } else {
        e.dataSeries.visible = true;
      }
      chart.render();
    }
  };
</script>

<script>
  document.addEventListener("DOMContentLoaded", function() {
      // Data untuk Jenis Kelamin
      var jenisKelaminData = @json($jenisKelamin);
      var labelsJenisKelamin = jenisKelaminData.JenisKelamin;
      var dataJenisKelamin = Object.values(jenisKelaminData['Data Jenis Kelamin']);
      
      // Data untuk Umur
      var umurData = @json($umur);
      var labelsUmur = umurData.Umur;
      var dataUmur = Object.values(umurData['Data Umur']);
      
      // Data untuk Pendidikan
      var pendidikanData = @json($pendidikan);
      var labelsPendidikan = pendidikanData.Pendidikan;
      var dataPendidikan = Object.values(pendidikanData['Data Pendidikan']);
      
      function getRandomColor() {
          var letters = '0123456789ABCDEF';
          var color = '#';
          for (var i = 0; i < 6; i++) {
              color += letters[Math.floor(Math.random() * 16)];
          }
          return color;
      }

      function generateColors(dataLength, isEmpty) {
          var backgroundColors = [];
          var borderColors = [];
          for (var i = 0; i < dataLength; i++) {
              var color = isEmpty ? '#CCCCCC' : getRandomColor();
              backgroundColors.push(isEmpty ? '#CCCCCC80' : color + '80'); // Adding opacity
              borderColors.push(isEmpty ? '#CCCCCC' : color);
          }
          return { backgroundColors, borderColors };
      }

      // Function to handle chart creation
      function createDoughnutChart(canvasId, labels, data, title) {
          var isEmpty = data.length === 0;
          if (isEmpty) {
              labels = ["No Data"];
              data = [1];
          }
          var colors = generateColors(data.length, isEmpty);

          if (document.getElementById(canvasId)) {
              var doughnutChartCanvas = document.getElementById(canvasId).getContext("2d");
              new Chart(doughnutChartCanvas, {
                  type: 'doughnut',
                  data: {
                      datasets: [{
                          data: data,
                          backgroundColor: colors.backgroundColors,
                          borderColor: colors.borderColors,
                      }],
                      labels: labels
                  },
                  options: {
                      responsive: true,
                      maintainAspectRatio: false,
                      plugins: {
                          legend: {
                              position: 'top',
                          },
                          title: {
                              display: true,
                              text: title
                          }
                      }
                  }
              });
          }
      }

      // Generate and create charts
      createDoughnutChart("doughnutChart", labelsJenisKelamin, dataJenisKelamin, 'Jenis Kelamin');
      createDoughnutChart("doughnutChart2", labelsUmur, dataUmur, 'Umur');
      createDoughnutChart("doughnutChart3", labelsPendidikan, dataPendidikan, 'Pendidikan Terakhir');
  });
</script>

@endsection
