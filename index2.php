
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
    <link rel="stylesheet" type="text/css" href="main.css">
    <link rel="preconnect" href="https://fonts.googleapis.com ">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--Load the AJAX API-->
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      <?php 
      $conn = new mysqli("localhost", "root", "1111","sys", 4000);
      
      $sql = "select  date,  information  from Mywork";
      $json_data =[];
      if($result = $conn ->query($sql)){
        $json_data[] = ["date", "information"];
          foreach($result as $row){
            $json_data[] = [$row["date"],intval($row["information"])];
          }
      } 
      ?>

      // Загрузите API визуализации и пакет corechart.
      google.charts.load('current', {'packages':['corechart']});

      // Установите обратный вызов для запуска при загрузке Google Visualization API.
      google.charts.setOnLoadCallback(drawChart);

      // Обратный вызов, который создает и заполняет таблицу данных,
      // создает экземпляр линейной диаграммы, передает данные и
      // рисует его.
      function drawChart() {

        let json_data = <?php echo json_encode($json_data); ?>;
        console.log(json_data);

        // Содание таблицы.
        var data = google.visualization.arrayToDataTable(
         json_data
          
        );

        var options = {
          title: 'Company Performance',
          curveType: 'function',
          legend: { position: 'bottom' }
        };

        // Опции таблицы.
        var options = {'title':'График вывода данных с БД',
                       'width':2000,
                       'height':1000};
        var chart = new google.visualization.LineChart(document.getElementById('chart_div'));
        chart.draw(data, options);
      }
    </script>
    <title>Вывод данных с бд</title>
</head>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript"></script>
<body >
        <main class ="main">         
                <form action="index.php" method="POST">
                <p class="p1">Дата:<input type="date" id="date" name="date"/></p> 
                <button type="submit" class="button" >Найти</button>
                <div id="chart_div" style="width: 900px; height: 900px;"></div>
                <form>
                    <p>
                    </p>
                </form>
        </main>
        <br>
        <a href="index.php"> gfgfg</a>
        
</body>
</html>
