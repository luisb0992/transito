//-- activar conductor
$(".btn-activar").click(function(e) {
    var vehi = $("#vehiculo").val();
    var cond = $("#conductor").val();
    var token = $("#token").val();
    var ruta = "conductoresactuales";
    //$(".btn-activar").removeClass('text-primary');
    //$(".btn-activar").addClass('text-warning').text('Espere...');
    console.log('llegue antes del ajax');
    e.preventDefault();
    $.ajax({
      url: ruta,
      type: 'POST',
      headers: {'X-CSRF-TOKEN': token},
      dataType: 'JSON',
      data: {conductor_id:cond,vehiculo_id:vehi},
    })
    .done(function() {
      console.log('llegue');
      $("#mensaje").fadeIn('slow/400/fast');
      //$(this).fadeOut(1000);
      //location.reload();
      
    })
    .fail(function() {
      console.log("error");
    })
    .always(function() {
      console.log("complete");
    });
    
});

// ----- select dinamico
$('#operadora').change(function(event) {
  $.get("vehi/"+event.target.value+"",function(response, operadora){
    $("#vehiculo").empty();
    for (i = 0; i<response.length; i++) {
        $("#vehiculo").append("<option value='"+response[i].id+"'> "+response[i].placa+' / '+response[i].serial+"</option>"); 
    }
  });
});
// -------- datapicker from, to
$(function() {
  var dateFormat = "dd/mm/yy",
    from = $( "#from" )
      .datepicker({
        defaultDate: "+1w",
        changeMonth: true,
        changeYear: true,
        numberOfMonths: 1
      })
      .on( "change", function() {
        to.datepicker( "option", "minDate", getDate( this ) );
      }),
    to = $( "#to" ).datepicker({
      defaultDate: "+1w",
      changeMonth: true,
      changeYear: true,
      numberOfMonths: 1
    })
    .on( "change", function() {
      from.datepicker( "option", "maxDate", getDate( this ) );
    });

  function getDate( element ) {
    var date;
    try {
      date = $.datepicker.parseDate( dateFormat, element.value );
    } catch( error ) {
      date = null;
    }

    return date;
  }
} );

// ------ conversion de datapicker a español
$.datepicker.regional['es'] = {
closeText: 'Cerrar',
prevText: '< Ant',
nextText: 'Sig >',
currentText: 'Hoy',
monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
monthNamesShort: ['Ene','Feb','Mar','Abr', 'May','Jun','Jul','Ago','Sep', 'Oct','Nov','Dic'],
dayNames: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
dayNamesShort: ['Dom','Lun','Mar','Mié','Juv','Vie','Sáb'],
dayNamesMin: ['Do','Lu','Ma','Mi','Ju','Vi','Sá'],
weekHeader: 'Sm',
dateFormat: 'dd/mm/yy',
firstDay: 1,
isRTL: false,
showMonthAfterYear: false,
yearSuffix: ''
};
$.datepicker.setDefaults($.datepicker.regional['es']);

// --------------- funciones personales
$("#pdf").click(function(){
    $("#pdf").text('Descargando...');
    $("#pdf").attr('readonly', 'readonly');
});

$("#registro").click(function(){
    $("#registro").text('Cargando...');
});

// ------ --- inicializacion de datatables
$(document).ready(function(){
   $('#datatable').Datatable(); 
});        

//-- inicializar bootstrap material desing
$.material.init();


