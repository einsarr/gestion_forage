$(document).ready(function() {

    //CRUD CLIENT
    load_clients();
    $('#client_form').on('submit', function(event) {
        event.preventDefault();
        if ($('#action').val() == 'Add') {
            $.ajax({
                url: "{$url_base}Client/add",
                method: "post",
                data: $('form').serialize(),
                dataType: "json",
                success: function(strMessage) {
                    $('#message').text(strMessage);
                    $('#modalClient').modal('hide');
                    $('#client_form')[0].reset();
                    load_clients();
                },
                error: function() {
                    $('#message').text(strMessage);
                }
            });
        }
        if ($('#action').val() == 'Edit') {
            $.ajax({
                url: "{$url_base}Client/Update",
                data: $('form').serialize(),
                type: "POST",
                dataType: "json",
                success: function(result) {
                    $('#message').text(result);
                    $('#modalClient').modal('hide');
                    load_clients();
                },
            });
        }
    });
    $(document).on('click', '.edit-client', function() {
        var id = $(this).attr('id');
        $.ajax({
            url: "{$url_base}Client/edit/" + id,
            method: "POST",
            dataType: "json",
            success: function(data) {
                $('#modalClient').modal('show');
                $('#village_id').val(data.village);
                $('#nom_famille').val(data.nom_famille);
                $('#telephone_abonne').val(data.telephone_abonne);
                $('#id').val(data.id);
                $('#action').val("Edit");
                $('.modal-title').html("Modification d'un client");
            }
        });
    });
    
    $(document).on('click', '.delete-client', function() {
        var id = $(this).attr("id");
        if (confirm("Etes vous sure de vouloir supprimer ?")) {
            $.ajax({
                url: "{$url_base}Client/delete/" + id,
                method: "POST",
                dataType: "json",
                success: function(data) {
                    $('#message').text(data);
                    load_clients();
                }
            });
        }
    });
});


//Fonction de chargement des clients
function load_clients() {
    $.ajax({
        url: "{$url_base}Client/load_clients",
        dataType: "json",
        success: function(result) {
            $('#result-clients').html(result);
        }
    });
}