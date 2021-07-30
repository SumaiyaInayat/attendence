<?php $a=16;$b=86;?>
<!DOCTYPE HTML>
<html>
<head>
  <script type="text/javascript">
  window.onload = function () {
    var chart = new CanvasJS.Chart("chartContainer",
    {
      legend: {
        horizontalAlign: "right",
        verticalAlign: "center"
      },
      data: [
      {
       color: "LightSeaGreen",
       indexLabelPlacement: "outside",
       showInLegend: true,
       type: "doughnut",
       dataPoints: [
       {  y: <?php echo $a;?>, legendText: "Absent", color: "RoyalBlue" },
       {  y: <?php echo $b;?>, legendText: "Present", color: "LightSeaGreen" }
       ]
     }
     ]
   });

    chart.render();
  }
  </script>
  <script type="text/javascript" src="https://canvasjs.com/assets/script/canvasjs.min.js"></script></head>
  <body>
    <div id="chartContainer" style="height: 300px; width:300px;">
    </div>
  </body>
  </html>