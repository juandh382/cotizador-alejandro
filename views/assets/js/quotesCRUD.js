$(document).ready(function() {
    $('#tablaCotizaciones').DataTable({
            "language": {
                "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
            }
        }),
        $(".modificar").click(handlerClickEditButton);


    function handlerClickEditButton(e) {
        e.preventDefault();
        window.scroll(0, window.outerHeight);
        $.ajax({
            type: "GET",
            url: `${QUOTE_CONTROLLER}?idCotizacion=${this.id}"&getQuoteById="true`,
            success: function(data) {
                //alert(data);
                /* var result = $.parseJSON(data);
                $("#idCotizacion").val(result.idUsuario);
                $("#empresa").val(result.empresa);
                $("#idCotizacion2").val(result.idCotizacioin2);
                $("#fechaInicio").val(result.fechaInicio);
                $("#fechaTermino").val(result.fechaTermino);
                $("#insumos").val(result.insumos);
                $("#comentarios").val(result.comentarios);
                $("#cantidad").val(result.cantidad);
                $("#valorUnitario").val(result.valorUnitario);
                $("#porcentaje").val(result.porcentaje);
                $("#despacho").val(result.despacho);
                $("#accion").val("modificar"); */

                console.log(data);
            },
        });
    }
});