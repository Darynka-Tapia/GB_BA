
var controladorTiempo = "";

$(document).ready(function(){
  $('#Matricula').focus()

  $('#Matricula').on('keyup', function(){
    var Matricula = $('#Matricula').val()
    $.ajax({
      type: 'POST',
      url: 'php/Matricula.php',
      data: {'Matricula': Matricula},
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