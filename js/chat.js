let message = ''

const getMessages = () => {
  if ($('#messages-container').hasClass('sb')) {
    let e = document.getElementById('messages-container')
    let sh = e.scrollHeight
    $('#messages-container').scrollTop(sh)
  }
  $.ajax({
    url: '../php/message.php',
    type: 'GET',
    data: 'messages=messages',
    success: function (r) {
      $('#messages-container').html(r)
      if (r == '') {
        $('#messages-container').html('<h1>No message yet!</h1>')
      }
    }
  })
}

$('#messages-container').on('touchstart', function () {
  $('#messages-container').removeClass('sb')
})

setInterval(getMessages, 100)

$('#to-home').click(function () {
  location.href = 'content.php'
})


$('#message').click(function () {
  $('#messages-container').addClass('sb')
})

$('#message').keyup( e =>  {
  message = e.target.value
  if (message != '') {
    $('#message-send').css({
      color: '#4621cf'
    })
  } else {
    $('#message-send').css({
      color: '#10131c'
    })
  }
})

$('#message-send').click(() => {
  if (message != '') {
    $.ajax({
      url: '../php/message.php',
      type: 'GET',
      data: 'message='+message,
      success: function (r) {
        $('#message').val('')
        $('#message-send').css({
          color: '#10131c'
        })
        $('#messages-container').addClass('sb')
      }
    })
  } else {
    alert('no')
  }
})