function obtener_lista_archivos() {
    var lista_archivos = null;
    $.ajax({
        type: "GET",
        url: "lista_archivos.php",
        dataType: "json",
        async: false,
        success: function (data) {
            lista_archivos = data;
        }
    });
    $('#cont').text(lista_archivos+Date());
    return lista_archivos;
}