$(document).ready(function(){
  $( "#update" ).click(function( event ) {
    event.preventDefault();
    var href = $(this).attr('href');
        var message = $(this).data('confirm');

        swal({
            title: "Estas Seguro ??",
            text: message,
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
        .then((actualiza) => {
          if (actualiza) {
            swal("Actualizando!", {
              icon: "success",
            });
            window.location.href = href;
          } else {
            swal("No paso nada!");
          }
        });
  });
});
