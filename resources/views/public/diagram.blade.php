@extends('templatepublic.main')

@section('contents')
<br>
<br>
<div class="chart1">
  <h3>Hasil Jawaban Responden Setiap Bulan</h3>
  <div id="chartContainer" style="height: 500px; width: 100%"></div>
  <script src="{{ asset('js/diagram.js') }}"></script>
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
<br>
<br>
@endsection
