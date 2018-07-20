window.onload = function() {

  // swal('This is your money making area');




  $(document).ready(function(){
      $("#agregarCredito").click(function(){
          $("#form1").toggle();
      });

  });








//por clase porque por id se pisaban
  $( "form.delete-form" ).click(function( event ) {
    event.preventDefault();

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

            this.submit();
          } else {
            swal("No paso nada!");
          }
        });
  });




  }
