<html>
    <head>
<title>php test</title>
    </head>
<body0>   
<?php
use LDAP\Result;



// $date = $_POST["date"];
// echo "Ваш запрос: ".$date ."";

echo "<link rel='stylesheet' type='text/css' href='main.css'>";
$conn = new mysqli("localhost", "root", "1111","sys", 4000);
$conn->query("select * from Mywork");
$sql = "select * from Mywork";
$json_data =[];
if($result = $conn ->query($sql)){

    

    foreach($result as $row){
        $json_data[ ] = $row;
    }
    var_dump($json_data) ;
    $result->free();
}
echo "Подключение успешно установлено";
$conn->close();
include 'index.html';
$date = array();
while ($row = mysqli_fetch_assoc($result)){
    $data[] = $row;
    $json_data = json_encode($data);
    
}
?>
</body>
<a href="index.html">sdasd</a>

</html>