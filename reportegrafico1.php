<?php
    $con = new mysqli("localhost","root","","covid19");
    //$sql ="SELECT count(Sexo) FROM covid WHERE Sexo='masculino'";
    $sql =" select Sexo, count(*) as covid2019 from covid group by SEXO";
    $res = $con-> query ($sql);
    $con->close();
?>

<html>
  <head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Genero', 'Cantidades'],
         <?php
           
         while($fila = $res->fetch_assoc()){
             echo "['".$fila["Sexo"]."',".$fila["covid2019"]."],";
           
         }

         ?>
        ]);

        var options = {
          title: 'GRAFICA DE GENEROS DE COVID2019',
          is3D: true
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }
    </script>
  </head>
    
  <body>
        <div id="piechart" style="width: 800px; height: 500px;"></div>
    <div>
        <H3 COLOR= "WHITE">TABLA DE INGRESOS DE COVID 2019</H3>
    </div>
  </body>
</html>
