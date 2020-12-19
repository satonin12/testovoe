<?php
  include 'php/config.php';

  // тестовый запрос
  $query_selectAll = 'select * from '. $table;
  $conn = mysqli_connect($host, $userDB, "", $db);
  if (!$conn) {
      echo ("Ошибка соединения");
      exit();
  }
  mysqli_set_charset($conn, "utf8");
  if ($res = mysqli_query($conn, $query_selectAll)) {
      echo ('
        <table>
          <thead>
            <tr>
              <th>№ п\п</th>
              <th>Номер протокола</th>
              <th>Дата выдачи (дд.мм.гг)</th>
              <th>Ответсвенный (ФИО)</th>
              <th>Соответствие (да, нет)</th>
            </tr>
          </thead>
          <tbody>');
      while ($row = $res->fetch_array((MYSQLI_ASSOC))) {
          echo ('
          <tr>
            <td></td>
            <td>' . $row['protocol_number'] . '</td>
            <td>' . $row['protocol_date'] . '</td>
            <td>' . $row['protocol_resp_employee'] . '</td>
            <td>Да</td>
          </tr>');
      }
      echo ('</tbody></table>');
  }else{
    echo ('Произошла ошибка сетевого соединения, перезагрузите страницу или повторите позже <br>');
  }
  mysqli_close($conn);
