$(document).ready(function () {
    $('#activo').on('change', function(){
        this.value = this.checked ? 1 : 0;
    }).change();

    $('#eliminado').on('change', function(){
        this.value = this.checked ? 1 : 0;
    }).change()


    $("#salarioPesos").on("keyup", function() {
        $.ajax({
            url : 'https://www.banxico.org.mx/SieAPIRest/service/v1/series/SF43718/datos/oportuno?token=c9cc35d6fb3e43f4ed25893a7fd85da598d1a4b2f58dd2f25cf536ae89cc2596',
            jsonp : 'callback',
            dataType : 'jsonp',
            success : function(response) {
                var series=response.bmx.series[0].datos[0].dato;
                
                var a = document.getElementById('salarioPesos').value;
                var total = (a / series).toFixed(2);
                $("#salarioDolares").val(total);
            }
        });
        
    });

    $(function(){
        // Fórmula usada: V + (P/100*V)
        var b = document.getElementById('salarioPesosS').innerHTML;
        var aumentoSalarial = (Number(b)+(5/100*b)).toFixed(2);

        $("#mes1").val(aumentoSalarial);

        //-----------------------------------
        var c = document.getElementById('mes1').value;

        var aumentoSalarial2 = (Number(c)+(5/100*c)).toFixed(2);

        $("#mes2").val(aumentoSalarial2);

        //-----------------------------------

        var d = document.getElementById('mes2').value;

        var aumentoSalarial3 = (Number(d)+(5/100*d)).toFixed(2);

        $("#mes3").val(aumentoSalarial3);

        //-----------------------------------

        var e = document.getElementById('mes3').value;

        var aumentoSalarial4 = (Number(e)+(5/100*e)).toFixed(2);

        $("#mes4").val(aumentoSalarial4);

        //-----------------------------------

        var f = document.getElementById('mes4').value;

        var aumentoSalarial5 = (Number(f)+(5/100*f)).toFixed(2);

        $("#mes5").val(aumentoSalarial5);

        //-----------------------------------

         var g = document.getElementById('mes5').value;
 
         var aumentoSalarial6 = (Number(g)+(5/100*g)).toFixed(2);
 
         $("#mes6").val(aumentoSalarial6);


    });

    $(function() {
        $.ajax({
            url : 'https://www.banxico.org.mx/SieAPIRest/service/v1/series/SF43718/datos/oportuno?token=c9cc35d6fb3e43f4ed25893a7fd85da598d1a4b2f58dd2f25cf536ae89cc2596',
            jsonp : 'callback',
            dataType : 'jsonp',
            success : function(response) {
                var series=response.bmx.series[0].datos[0].dato;
                
                var a = document.getElementById('mes1').value;
                var total = (a / series).toFixed(2);
                $("#mes1D").val(total);

                var b = document.getElementById('mes2').value;
                var total2 = (b / series).toFixed(2);
                $("#mes2D").val(total2);

                var c = document.getElementById('mes3').value;
                var total3 = (c / series).toFixed(2);
                $("#mes3D").val(total3);

                var d = document.getElementById('mes4').value;
                var total4 = (d / series).toFixed(2);
                $("#mes4D").val(total4);

                var e = document.getElementById('mes5').value;
                var total5 = (e / series).toFixed(2);
                $("#mes5D").val(total5);

                var f = document.getElementById('mes6').value;
                var total6 = (f / series).toFixed(2);
                $("#mes6D").val(total6);

            }
        });
        
    });

});