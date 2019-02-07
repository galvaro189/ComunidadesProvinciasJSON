$(function () {
    var peticion = $.ajax({
        method: "GET",
        url: "obtenerComunidades.php",
        dataType: "json"
    });
    peticion.done(function (datos) {
        var comunidades = datos["comunidades"]
            for (var comunidad of comunidades) {
                $("#comunidad").append("<option value='" + comunidad["id_comunidad"] + "'>" + comunidad["nombre"] + "</option>")
            }
        }
    );
    $("#comunidad").on("change",function () {
        $("#provincia").empty();
        var id_comunidad=$(this).val();
        var peticion2 = $.ajax({
            method: "GET",
            url: "obtenerProvincias.php",
            dataType: "json",
            data: {comunidad:id_comunidad}
        });
        peticion2.done(function (data) {
                var provincias = data["provincias"];
                for (var provincia of provincias) {
                    $("#provincia").append("<option value='" + provincia["n_provincia"] + "'>" + provincia["nombre"] + "</option>")
                }
            }
        );
    })
});
