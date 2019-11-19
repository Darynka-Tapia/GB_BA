
var controladorTiempo = "";

$(document).ready(function(){
  $('#BuscarLibro').focus()

  $('#BuscarLibro').on('keyup', function(){
    var BuscarLibro = $('#BuscarLibro').val()
    $.ajax({
      type: 'POST',
      url: 'php/BuscarLibro.php',
      data: {'BuscarLibro': BuscarLibro},
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