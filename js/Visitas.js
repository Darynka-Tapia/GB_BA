
var controladorTiempo = "";

$(document).ready(function(){
  $('#Visitas').focus()

  $('#Visitas').on('keyup', function(){
    var Visitas = $('#Visitas').val()
    $.ajax({
      type: 'POST',
      url: 'php/Visitas.php',
      data: {'Visitas': Visitas},
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