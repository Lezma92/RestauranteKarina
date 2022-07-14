function cargarQuinielas(id_jornada, id_liga) {
    nombrejor = $("#nomJornada").val();
    $(".cambiarQuinielas").load("paginas/jugar.php?id_jornada=" + id_jornada + "&id_liga=" + id_liga);

    document.getElementById("text_title").innerHTML = "Jugar " + nombrejor;
}

