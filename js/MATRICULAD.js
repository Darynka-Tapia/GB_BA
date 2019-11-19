$(document).ready(function(){
  $('#MatriculaD').focus()

  $('#MatriculaD').on('keyup', function(){
    var MatriculaD = $('#MatriculaD').val()
    $.ajax({
      type: 'POST',
      url: 'php/MatriculaD.php',
      data: {'MatriculaD': MatriculaD},
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