function createXmlHttpRequestObject() {
  let xmlHttp
  try {
    xmlHttp = new XMLHttpRequest()
  } catch (e) {
    try {
      xmlHttp = new ActiveXObject('MSXML2.XMLHTTP')
    } catch (e) {
      try {
        xmlHttp = new ActiveXObject('Microsoft.XMLHTTP')
      } catch (e) {}
    }
  }
  if (!xmlHttp) {
    alert('Не удалось создать объект XMLHttpRequest')
  }
  return xmlHttp
}
function display(obj) {
  console.log(obj)
}
function Recieve(req) {
  req.onreadystatechange = () => {
    if (req.readyState != 4) {
      console.log('error')
    }
    if (req.readyState != 200) {
      console.log('error')
    }
    let obj = JSON.parse(req.responseText)
    display(obj)
  }
}
function init(val) {
  let req = createXmlHttpRequestObject()
  req.open('POST', 'ini.php')
  req.setRequestHeader('Content-type', 'application/x-www-form-urlencoded')
  send(req, val)
  Receive(req)
}
function send(req, val) {
  req.send(val)
}
