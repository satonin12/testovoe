<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>😊 Test</title>
  <!-- CSS -->
  <link rel="stylesheet" href="./css/index.css">
  <!-- JQuery -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> 
</head>
<body>
  <h3>Тестовое задание (ИЦ "УралНИИстром")</h3>
  <h4>Таблица данных</h4>

  <?php
    require_once './php/sqlBegin.php';
  ?>

  <button class="modalHandler">Добавить протокол</button>
  <div class="modal">
    <form action="" id="formAdd">
      <h2 class="form__title">Форма добавления протокола</h2>
      <div class="form__row">
        <label for="">
          Укажите номер протокола
          <input id="numb" class="form__input" type="number" name="number" value="" placeholder="Например: 135" required>
        </label>
      </div>
      <div class="form__row">
        <label for="">
          Укажите дату выдачи
          <input id="dat" class="form__input" type="date" name="date" value="" placeholder="Например: 2020.11.17" required>
        </label>
      </div>
      <div class="form__row">
        <label for="">
          Укажите ответственное лицо
          <input id="fio" class="form__input" type="text" name="fio" value="" placeholder="Например: Сатонин Владислав Юрьевич" required>
        </label>
      </div>
      <button class="form_sub form__input" type="submit" >Сохранить</button>
    </form>
  </div>
  <script src="./js/index.js"></script>
</body>
</html>
