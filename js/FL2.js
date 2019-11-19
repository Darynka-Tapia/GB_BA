
var controladorTiempo = "";

$(document).ready(function(){
  $('#FL2').focus()

  $('#FL2').on('keyup', function(){
    var FL2 = $('#FL2').val()
    $.ajax({
      type: 'POST',
      url: 'php/FL2.php',
      data: {'FL2': FL2},
      beforeSend: function(){
        $('#resf2').html('<p>Cargando...</p>')

      }
    })
    .done(function(resultado){
      $('#resf2').html(resultado)
    })
    .fail(function(){
      alert('Hubo un error :(')
    })
  })
}) 