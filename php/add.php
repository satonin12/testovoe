<?php
include 'config.php';

if($_POST){
  $number = $_POST['number'];
  $date = $_POST['date'];
  $fio = $_POST['fio'];
}else {
  echo ("Пустые параметры");
  exit();
}

if($number=="" or $date=="" or $fio==""){
  echo "Заполните все поля";
}

// тестовый запрос
$query_selectAll = 'select protocol_number from ' . $table.' where protocol_number = '.$number;
$query_insert = '
  insert into protocol_table(protocol_number, protocol_date, protocol_resp_employee, protocol_confirm)
  values ('.$number.', "'.$date.'", "'.$fio.'", 1)
  on duplicate key update protocol_number = protocol_number;';

$conn = mysqli_connect($host, $userDB, "", $db);
if (!$conn) {
    echo ("Ошибка соединения");
    exit();
}
mysqli_set_charset($conn, "utf8");
if ($res = mysqli_query($conn, $query_selectAll)) {
  if($res->num_rows == 0) {
    if($resultInsert = mysqli_query($conn, $query_insert)) {
      echo(200);
    }else{
      echo('Ошибка вставки значений');
    }
  }else{
    echo(400);
  }
}

mysqli_close($conn);
