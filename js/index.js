// Автоматическая нумерация строк
$('tbody tr').each(function (i) {
  let number = i + 1
  $(this).find('td:first').text(number);
})
// показ формы отправки данных
$(document).ready(function() {
  $('.modalHandler').click(function () {
    $('.modal').css('display', 'block')
  })
})
// валидация формы и отправка ajax
$('#formAdd').on('submit', function (event) {
  event.preventDefault();
  if (validateForm()) {
    return false;
  }
  let number = $('input')
  let obj = {
    number: number[0].value,
    date: number[1].value,
    fio: number[2].value,
  }
  $.ajax({
    method: 'POST',
    url: './php/add.php',
    contentType: 'application/x-www-form-urlencoded; charset=utf-8',
    data: obj,
    error: function (xhr, status, error) {
      alert('ошибка сетевого запроса, пожалуйста обновите страницу или првоерьте соединение с сетью');
    },
    success: function (responce, status) {
      if (responce == 400) {
        alert('Такой номер протокола уже существует')
      } else {
        addTable(obj)
      }
    },
  })
  return false;
})
// функция валидации
function validateForm() {
  // проверка на пустоту
  let nmb = $('#numb')
  let dat = $('#dat')
  let fio = $('#fio')
  let eNumber = false
  let eFio = false

  // проверка number
  if (nmb.val() <= 0) {
    eNumber = true
    nmb.after(
      '<span class="input-requirements">Номер должен быть положительный</span>'
    )
    nmb.toggleClass('input_required_unvalid')
  } else {
    nmb.toggleClass('input_required_valid')
  }
  // проверка date
  dat.toggleClass('input_required_valid')
  // проверка fio
  if (fio.val().length <= 9) {
    eFio = true
    fio.after(
      '<span class="input-requirements">Длина должна превышать 9 символов</span>'
    )
    fio.toggleClass('input_required_unvalid')
  } else {
    fio.toggleClass('input_required_valid')
  }
  return eNumber || eFio
}
// добавление значений в таблицу, при успешной вставке
function addTable(obj) {
  $('table > tbody:last-child').append(
    `<tr>
      <td>` + 14 +`</td>
      <td>`+ obj.number +`</td>
      <td>`+ obj.date + `</td>
      <td>`+ obj.fio + `</td>
      <td>Да</td>
    </tr>`
  )
  // очищаем поля формы
  $('input').each(function () {
    $(this).val('')
  })
  // скрываем форму добавления протокола
  $('#formAdd').trigger('reset')
  $('.modal').fadeOut()
}
