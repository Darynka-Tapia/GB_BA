
var controladorTiempo = "";

$(document).ready(function(){
  $('#MatriculaR').focus()

  $('#MatriculaR').on('keyup', function(){
    var MatriculaR = $('#MatriculaR').val()
    $.ajax({
      type: 'POST',
      url: 'php/MatriculaR.php',
      data: {'MatriculaR': MatriculaR},
      beforeSend: function(){
        $('#res').html('<p>Cargando...</p>')

      }
    })
    .done(function(resultado){
      $('#res').html(resultado)
    })
    .fail(function(){
      alert('Hubo un error :(')
    })
  })
}) 