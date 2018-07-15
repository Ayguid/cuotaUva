

var xmlhttp = new XMLHttpRequest();

var anio = "2018";
var mes = "07";
var dia = "01";

var params;
// var params = "start_date="+anio+"-"+mes+"-"+dia;

xmlhttp.open("GET", "https://www.quandl.com/api/v3/datasets/BCRA/MVAR_CVS.json?api_key=nC9UCjEyhYM3BFkvARZS"+"&"+params, true);

var text='';

// var params = "collapse=monthly";


xmlhttp.onreadystatechange = function() {
  if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {

    responseCuotas = JSON.parse(this.responseText);

    var cuotas = responseCuotas.dataset.data

    for (var i=0; i<cuotas.length; i++) {
      // console.log(cuotas[i])
      text += "<li>"+"Fecha "+cuotas[i][0]+" Valor   "+cuotas[i][1] +"</li>";
    }
    document.getElementById("cuotaDia").innerHTML = text;
  }
};


xmlhttp.send();
