$(function() {
    //adicionar manipulador de evento nos links dos resultados
    $('.editar').click(function() {
        var linha = $(this).parent().parent();
        var id = linha.children("td:nth-child(1)").text();
        var passaId= function(id){
            window.location = "edit.php?id="+id;
        }
        passaId(id);
    });
});

$(document).ready(function () {
    $("#myInput").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $("#myTable td").filter(function() {
        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
    });
});
