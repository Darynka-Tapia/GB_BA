
var controladorTiempo = "";

$(document).ready(function(){
  $('#FL1').focus()

  $('#FL1').on('keyup', function(){
    var FL1 = $('#FL1').val()
    $.ajax({
      type: 'POST',
      url: 'php/FL1.php',
      data: {'FL1': FL1},
      beforeSend: function(){
        $('#resf').html('<p>Cargando...</p>')

      }
    })
    .done(function(resultado){
      $('#resf').html(resultado)
    })
    .fail(function(){
      alert('Hubo un error :(')
    })
  })
}) 