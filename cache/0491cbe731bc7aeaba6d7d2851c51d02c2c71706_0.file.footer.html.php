<?php
/* Smarty version 3.1.30, created on 2020-09-17 14:18:41
  from "C:\xampp\htdocs\gestion_forage\src\view\footer.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5f635421b29bf9_39055036',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '0491cbe731bc7aeaba6d7d2851c51d02c2c71706' => 
    array (
      0 => 'C:\\xampp\\htdocs\\gestion_forage\\src\\view\\footer.html',
      1 => 1600345118,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5f635421b29bf9_39055036 (Smarty_Internal_Template $_smarty_tpl) {
?>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<!-- Footer -->
<footer class="sticky-footer bg-white">
    <div class="container my-auto">
        <div class="copyright text-center my-auto">
            <span>Copyright &copy; Ges-User 2020</span>
        </div>
    </div>
</footer>
<!-- End of Footer -->

</div>
<!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Déconnexion en cours ...</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Voulez-vous quitter ?</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Annuler</button>
                <a class="btn btn-primary" href="<?php echo $_smarty_tpl->tpl_vars['url_base']->value;?>
Login/logout">Quitter</a>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap core JavaScript-->
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['url_base']->value;?>
public/template/vendor/jquery/jquery.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['url_base']->value;?>
public/template/vendor/bootstrap/js/bootstrap.bundle.min.js"><?php echo '</script'; ?>
>

<!-- Core plugin JavaScript-->
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['url_base']->value;?>
public/template/vendor/jquery-easing/jquery.easing.min.js"><?php echo '</script'; ?>
>

<!-- Custom scripts for all pages-->
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['url_base']->value;?>
public/template/js/sb-admin-2.min.js"><?php echo '</script'; ?>
>

<!-- Page level plugins -->
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['url_base']->value;?>
public/template/vendor/chart.js/Chart.min.js"><?php echo '</script'; ?>
>

<!-- Page level custom scripts -->
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['url_base']->value;?>
public/template/js/demo/chart-area-demo.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['url_base']->value;?>
public/template/js/demo/chart-pie-demo.js"><?php echo '</script'; ?>
>

<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['url_base']->value;?>
public/template/vendor/datatables/jquery.dataTables.min.js"><?php echo '</script'; ?>
>
  <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['url_base']->value;?>
public/template/vendor/datatables/dataTables.bootstrap4.min.js"><?php echo '</script'; ?>
>
 
  <!-- Page level custom scripts -->
  <?php echo '<script'; ?>
 src=" https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.33.1/sweetalert2.min.js"><?php echo '</script'; ?>
>
  <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['url_base']->value;?>
public/template/js/demo/datatables-demo.js"><?php echo '</script'; ?>
>


  <?php echo '<script'; ?>
>
    $(document).ready(function() {
        load_chefs_village();
        load_villages();
        load_clients();
        load_abonnements();
        load_compteurs();
        load_consommations();
        load_facturations();
        load_reglements();
        load_users();

        //CRUD ROLE
        $('#role_form').on('submit', function(event) {
            event.preventDefault();
            if ($('#action').val() == 'Add') {
                $.ajax({
                    url: "<?php echo $_smarty_tpl->tpl_vars['url_base']->value;?>
Roles/add",
                    method: "post",
                    data: $('form').serialize(),
                    dataType: "json",
                    success: function(strMessage) {
                        $('#message').text(strMessage);
                        $('#modalRole').modal('hide');
                        $('#role_form')[0].reset();
                    },
                    error: function() {
                        $('#message').text(strMessage);
                    }
                });
            }
        });
        $(document).on('click', '.delete-role', function() {
            var id = $(this).attr("id");
            if (confirm("Etes vous sure de vouloir supprimer ?")) {
                $.ajax({
                    url: "<?php echo $_smarty_tpl->tpl_vars['url_base']->value;?>
Roles/delete/" + id,
                    method: "POST",
                    dataType: "json",
                    success: function(data) {
                        $('#message').text(data);
                        load_users();
                    }
                });
            }
        });
        //CRUD USER
        $('#user_form').on('submit', function(event) {
            event.preventDefault();
            if ($('#action').val() == 'Add') {
                $.ajax({
                    url: "<?php echo $_smarty_tpl->tpl_vars['url_base']->value;?>
User/add",
                    method: "post",
                    data: $('form').serialize(),
                    dataType: "json",
                    success: function(strMessage) {
                        $('#message').text(strMessage);
                        $('#modalUser').modal('hide');
                        $('#user_form')[0].reset();
                        load_users();
                    },
                    error: function() {
                        $('#message').text(strMessage);
                    }
                });
            }
            if ($('#action').val() == 'Edit') {
                $.ajax({
                    url: "<?php echo $_smarty_tpl->tpl_vars['url_base']->value;?>
User/Update",
                    data: $('form').serialize(),
                    type: "POST",
                    dataType: "json",
                    success: function(result) {
                        $('#message').text(result);
                        $('#modalUser').modal('hide');
                        load_users();
                    },
                });
            }
        });
        $(document).on('click', '.edit-user', function() {
            //alert("ok");
            var id = $(this).attr('id');
            $.ajax({
                url: "<?php echo $_smarty_tpl->tpl_vars['url_base']->value;?>
User/edit/" + id,
                method: "POST",
                dataType: "json",
                success: function(data) {
                    $('#modalUser').modal('show');
                    $('#nom').val(data.nom);
                    $('#prenom').val(data.prenom);
                    $('#password').val(data.password);
                    $('#id').val(data.id);
                    $('#action').val("Edit");
                    $('.modal-title').html("Modification d'un user");
                }
            });
        });
        $(document).on('click', '.delete-user', function() {
            var id = $(this).attr("id");
            if (confirm("Etes vous sure de vouloir supprimer ?")) {
                $.ajax({
                    url: "<?php echo $_smarty_tpl->tpl_vars['url_base']->value;?>
User/delete/" + id,
                    method: "POST",
                    dataType: "json",
                    success: function(data) {
                        $('#message').text(data);
                        load_users();
                    }
                });
            }
        });


        //CRUD CLIENT
        $('#client_form').on('submit', function(event) {
            event.preventDefault();
            if ($('#action').val() == 'Add') {
                $.ajax({
                    url: "<?php echo $_smarty_tpl->tpl_vars['url_base']->value;?>
Client/add",
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
                    url: "<?php echo $_smarty_tpl->tpl_vars['url_base']->value;?>
Client/Update",
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
            //alert("ok");
            var id = $(this).attr('id');
            $.ajax({
                url: "<?php echo $_smarty_tpl->tpl_vars['url_base']->value;?>
Client/edit/" + id,
                method: "POST",
                dataType: "json",
                success: function(data) {
                    $('#modalClient').modal('show');
                    $('#chef_village_id').val(data.chef_village);
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
                    url: "<?php echo $_smarty_tpl->tpl_vars['url_base']->value;?>
Client/delete/" + id,
                    method: "POST",
                    dataType: "json",
                    success: function(data) {
                        $('#message').text(data);
                        load_clients();
                    }
                });
            }
        });

        //CRUD VILLAGE
        $('#village_form').on('submit', function(event) {
            event.preventDefault();
            if ($('#action').val() == 'Add') {
                $.ajax({
                    url: "<?php echo $_smarty_tpl->tpl_vars['url_base']->value;?>
Village/add",
                    method: "post",
                    data: $('form').serialize(),
                    dataType: "json",
                    success: function(strMessage) {
                        $('#message').text(strMessage);
                        $('#modalVillage').modal('hide');
                        $('#village_form')[0].reset();
                        load_villages();
                    },
                    error: function() {
                        $('#message').text(strMessage);
                    }
                });
            }
            if ($('#action').val() == 'Edit') {
                $.ajax({
                    url: "<?php echo $_smarty_tpl->tpl_vars['url_base']->value;?>
Village/Update",
                    data: $('form').serialize(),
                    type: "POST",
                    dataType: "json",
                    success: function(result) {
                        $('#message').text(result);
                        $('#modalVillage').modal('hide');
                        load_villages();
                    },
                });
            }
        });
        $(document).on('click', '.edit-village', function() {
            var id = $(this).attr('id');
            $.ajax({
                url: "<?php echo $_smarty_tpl->tpl_vars['url_base']->value;?>
Village/edit/" + id,
                method: "POST",
                dataType: "json",
                success: function(data) {
                    $('#modalVillage').modal('show');
                    $('#identifiant_village').val(data.identifiant_village);
                    $('#nom_village').val(data.nom_village);
                    $('#id').val(data.id);
                    $('#action').val("Edit");
                    $('.modal-title').html("Modification d'un village");
                }
            });
        });
        $(document).on('click', '.delete-village', function() {
            var id = $(this).attr("id");
            if (confirm("Etes vous sure de vouloir supprimer ?")) {
                $.ajax({
                    url: "<?php echo $_smarty_tpl->tpl_vars['url_base']->value;?>
Village/delete/" + id,
                    method: "POST",
                    dataType: "json",
                    success: function(data) {
                        $('#message').text(data);
                        load_villages();
                    }
                });
            }
        });

        //CRUD CHEF DE VILLAGE
        $('#chefs_village_form').on('submit', function(event) {
            event.preventDefault();
            if ($('#action').val() == 'Add') {
                $.ajax({
                    url: "<?php echo $_smarty_tpl->tpl_vars['url_base']->value;?>
Chef_village/add",
                    method: "post",
                    data: $('form').serialize(),
                    dataType: "json",
                    success: function(strMessage) {
                        $('#message').text(strMessage);
                        $('#modalChef_Village').modal('hide');
                        $('#chefs_village_form')[0].reset();
                        load_chefs_village();
                    },
                    error: function() {
                        $('#message').text(strMessage);
                    }
                });
            }
            if ($('#action').val() == 'Edit') {
                $.ajax({
                    url: "<?php echo $_smarty_tpl->tpl_vars['url_base']->value;?>
Chef_village/Update",
                    data: $('form').serialize(),
                    type: "POST",
                    dataType: "json",
                    success: function(result) {
                        $('#message').text(result);
                        $('#modalChef_Village').modal('hide');
                        load_chefs_village();
                    },
                });
            }
        });
        $(document).on('click', '.edit-chef_village', function() {
            var id = $(this).attr('id');
            $.ajax({
                url: "<?php echo $_smarty_tpl->tpl_vars['url_base']->value;?>
Chef_village/edit/" + id,
                method: "POST",
                dataType: "json",
                success: function(data) {
                    $('#modalChef_Village').modal('show');
                    $('#identifiant_village').val(data.identifiant_village);
                    $('#village_id').val(data.village_id);
                    $('#prenom_chef_village').val(data.prenom_chef_village);
                    $('#telephone_chef_village').val(data.telephone_chef_village);
                    $('#id').val(data.id);
                    $('#action').val("Edit");
                    $('.modal-title').html("Modification d'un chef de village");
                }
            });
        });
        $(document).on('click', '.delete-chef_village', function() {
            var id = $(this).attr("id");
            if (confirm("Etes vous sure de vouloir supprimer ?")) {
                $.ajax({
                    url: "<?php echo $_smarty_tpl->tpl_vars['url_base']->value;?>
Village/delete/" + id,
                    method: "POST",
                    dataType: "json",
                    success: function(data) {
                        $('#message').text(data);
                        load_chefs_village();
                    }
                });
            }
        });

        //CRUD ABONNEMENT
        $('#abonnement_form').on('submit', function(event) {
            event.preventDefault();
            if ($('#action').val() == 'Add') {
                $.ajax({
                    url: "<?php echo $_smarty_tpl->tpl_vars['url_base']->value;?>
Abonnement/add",
                    method: "post",
                    data: $('form').serialize(),
                    dataType: "json",
                    success: function(strMessage) {
                        $('#message').text(strMessage);
                        $('#modalAbonnement').modal('hide');
                        $('#abonnement_form')[0].reset();
                        load_abonnements();
                    },
                    error: function() {
                        $('#message').text(strMessage);
                    }
                });
            }
            if ($('#action').val() == 'Edit') {
                $.ajax({
                    url: "<?php echo $_smarty_tpl->tpl_vars['url_base']->value;?>
Abonnement/Update",
                    data: $('form').serialize(),
                    type: "POST",
                    dataType: "json",
                    success: function(result) {
                        $('#message').text(result);
                        $('#modalAbonnement').modal('hide');
                        load_abonnements();
                    },
                });
            }
        });
        $(document).on('click', '.edit-abonnement', function() {
            var id = $(this).attr('id');
            $.ajax({
                url: "<?php echo $_smarty_tpl->tpl_vars['url_base']->value;?>
Abonnement/edit/" + id,
                method: "POST",
                dataType: "json",
                success: function(data) {
                    $('#modalAbonnement').modal('show');
                    $('#client_id').val(data.client);
                    $('#numero_abonnement').val(data.numero_abonnement);
                    $('#description_abonnement').html(data.description_abonnement);
                    $('#date_abonnement').val(data.date_abonnement);
                    $('#id').val(data.id);
                    $('#action').val("Edit");
                    $('.modal-title').html("Modification d'un abonnement");
                }
            });
        });
        $(document).on('click', '.delete-abonnement', function() {
            var id = $(this).attr("id");
            if (confirm("Etes vous sure de vouloir supprimer ?")) {
                $.ajax({
                    url: "<?php echo $_smarty_tpl->tpl_vars['url_base']->value;?>
Abonnement/delete/" + id,
                    method: "POST",
                    dataType: "json",
                    success: function(data) {
                        $('#message').text(data);
                        load_abonnements();
                    }
                });
            }
        });

         //CRUD COMPTEURS
        $('#compteur_form').on('submit', function(event) {
            event.preventDefault();
            if ($('#action').val() == 'Add') {
                $.ajax({
                    url: "<?php echo $_smarty_tpl->tpl_vars['url_base']->value;?>
Compteur/add",
                    method: "post",
                    data: $('form').serialize(),
                    dataType: "json",
                    success: function(strMessage) {
                        $('#message').text(strMessage);
                        $('#modalCompteur').modal('hide');
                        $('#compteur_form')[0].reset();
                        load_compteurs();
                    },
                    error: function() {
                        $('#message').text(strMessage);
                    }
                });
            }
            if ($('#action').val() == 'Edit') {
                $.ajax({
                    url: "<?php echo $_smarty_tpl->tpl_vars['url_base']->value;?>
Compteur/Update",
                    data: $('form').serialize(),
                    type: "POST",
                    dataType: "json",
                    success: function(result) {
                        $('#message').text(result);
                        $('#modalCompteur').modal('hide');
                        load_compteurs();
                    },
                });
            }
        });
        $(document).on('click', '.edit-compteur', function() {
            var id = $(this).attr('id');
            $.ajax({
                url: "<?php echo $_smarty_tpl->tpl_vars['url_base']->value;?>
Compteur/edit/" + id,
                method: "POST",
                dataType: "json",
                success: function(data) {
                    $('#modalCompteur').modal('show');
                    $('#abonnement_id').val(data.abonnement);
                    $('#numero_compteur').val(data.numero_compteur);
                    $('#etat_compteur').val(data.etat_compteur);
                    $('#id').val(data.id);
                    $('#action').val("Edit");
                    $('.modal-title').html("Modification d'un compteur");
                }
            });
        });
        $(document).on('click', '.delete-compteur', function() {
            var id = $(this).attr("id");
            if (confirm("Etes vous sure de vouloir supprimer ?")) {
                $.ajax({
                    url: "<?php echo $_smarty_tpl->tpl_vars['url_base']->value;?>
Compteur/delete/" + id,
                    method: "POST",
                    dataType: "json",
                    success: function(data) {
                        $('#message').text(data);
                        load_compteurs();
                    }
                });
            }
        });

          //CRUD CONSOMMATION
        $('#consommation_form').on('submit', function(event) {
            event.preventDefault();
            if ($('#action').val() == 'Add') {
                $.ajax({
                    url: "<?php echo $_smarty_tpl->tpl_vars['url_base']->value;?>
Consommation/add",
                    method: "post",
                    data: $('form').serialize(),
                    dataType: "json",
                    success: function(strMessage) {
                        $('#message').text(strMessage);
                        $('#modalConsommation').modal('hide');
                        $('#consommation_form')[0].reset();
                        load_consommations();
                    },
                    error: function() {
                        $('#message').text(strMessage);
                    }
                });
            }
            if ($('#action').val() == 'Edit') {
                $.ajax({
                    url: "<?php echo $_smarty_tpl->tpl_vars['url_base']->value;?>
Consommation/Update",
                    data: $('form').serialize(),
                    type: "POST",
                    dataType: "json",
                    success: function(result) {
                        $('#message').text(result);
                        $('#modalConsommation').modal('hide');
                        load_consommations();
                    },
                });
            }
        });
        $(document).on('click', '.edit-consommation', function() {
            var id = $(this).attr('id');
            $.ajax({
                url: "<?php echo $_smarty_tpl->tpl_vars['url_base']->value;?>
Consommation/edit/" + id,
                method: "POST",
                dataType: "json",
                success: function(data) {
                    $('#modalConsommation').modal('show');
                    $('#compteur_id').val(data.compteur);
                    $('#nombre_litre_consomme').val(data.nombre_litre_consomme);
                    $('#code_consommation').val(data.code_consommation);
                    $('#date_consommation').val(data.date_consommation);
                    $('#prix_litre_eau').val(data.prix_litre_eau);
                    $('#id').val(data.id);
                    $('#action').val("Edit");
                    $('.modal-title').html("Modification d'une consommation");
                }
            });
        });
        $(document).on('click', '.delete-consommation', function() {
            var id = $(this).attr("id");
            if (confirm("Etes vous sure de vouloir supprimer ?")) {
                $.ajax({
                    url: "<?php echo $_smarty_tpl->tpl_vars['url_base']->value;?>
Consommation/delete/" + id,
                    method: "POST",
                    dataType: "json",
                    success: function(data) {
                        $('#message').text(data);
                        load_consommations();
                    }
                });
            }
        });

        //CRUD FACTURATION
        $('#facturation_form').on('submit', function(event) {
            event.preventDefault();
            if ($('#action').val() == 'Add') {
                $.ajax({
                    url: "<?php echo $_smarty_tpl->tpl_vars['url_base']->value;?>
Facturation/add",
                    method: "post",
                    data: $('form').serialize(),
                    dataType: "json",
                    success: function(strMessage) {
                        $('#message').text(strMessage);
                        $('#modalFacturation').modal('hide');
                        $('#facturation_form')[0].reset();
                        load_facturations();
                    },
                    error: function() {
                        $('#message').text(strMessage);
                    }
                });
            }
            if ($('#action').val() == 'Edit') {
                $.ajax({
                    url: "<?php echo $_smarty_tpl->tpl_vars['url_base']->value;?>
Facturation/Update",
                    data: $('form').serialize(),
                    type: "POST",
                    dataType: "json",
                    success: function(result) {
                        $('#message').text(result);
                        $('#modalFacturation').modal('hide');
                        load_facturations();
                    },
                });
            }
        });
        $(document).on('click', '.edit-facturation', function() {
            var id = $(this).attr('id');
            $.ajax({
                url: "<?php echo $_smarty_tpl->tpl_vars['url_base']->value;?>
Facturation/edit/" + id,
                method: "POST",
                dataType: "json",
                success: function(data) {
                    $('#modalFacturation').modal('show');
                    $('#consommation_id').val(data.consommation);
                    $('#date_facturation').val(data.date_facturation);
                    $('#date_limite_paiement').val(data.date_limite_paiement);
                    $('#id').val(data.id);
                    $('#action').val("Edit");
                    $('.modal-title').html("Modification d'un facturation");
                }
            });
        });
        $(document).on('click', '.delete-facturation', function() {
            var id = $(this).attr("id");
            if (confirm("Etes vous sure de vouloir supprimer ?")) {
                $.ajax({
                    url: "<?php echo $_smarty_tpl->tpl_vars['url_base']->value;?>
Facturation/delete/" + id,
                    method: "POST",
                    dataType: "json",
                    success: function(data) {
                        $('#message').text(data);
                        load_facturations();
                    }
                });
            }
        });
       
       //CRUD REGLEMENT
       $('#reglement_form').on('submit', function(event) {
            event.preventDefault();
            if ($('#action').val() == 'Add') {
                $.ajax({
                    url: "<?php echo $_smarty_tpl->tpl_vars['url_base']->value;?>
Reglement/add",
                    method: "post",
                    data: $('form').serialize(),
                    dataType: "json",
                    success: function(strMessage) {
                        $('#message').text(strMessage);
                        $('#modalReglement').modal('hide');
                        $('#reglement_form')[0].reset();
                        load_reglements();
                    },
                    error: function() {
                        $('#message').text(strMessage);
                    }
                });
            }
            if ($('#action').val() == 'Edit') {
                $.ajax({
                    url: "<?php echo $_smarty_tpl->tpl_vars['url_base']->value;?>
Reglement/Update",
                    data: $('form').serialize(),
                    type: "POST",
                    dataType: "json",
                    success: function(result) {
                        $('#message').text(result);
                        $('#modalReglement').modal('hide');
                        load_reglements();
                    },
                });
            }
        });
        $(document).on('click', '.edit-reglement', function() {
            var id = $(this).attr('id');
            $.ajax({
                url: "<?php echo $_smarty_tpl->tpl_vars['url_base']->value;?>
Reglement/edit/" + id,
                method: "POST",
                dataType: "json",
                success: function(data) {
                    $('#modalReglement').modal('show');
                    $('#facturation_id').val(data.facturation);
                    $('#etat_reglement').val(data.etat_reglement);
                    $('#id').val(data.id);
                    $('#action').val("Edit");
                    $('.modal-title').html("Modification d'un facturation");
                }
            });
        });
        $(document).on('click', '.delete-reglement', function() {
            var id = $(this).attr("id");
            if (confirm("Etes vous sure de vouloir supprimer ?")) {
                $.ajax({
                    url: "<?php echo $_smarty_tpl->tpl_vars['url_base']->value;?>
Reglement/delete/" + id,
                    method: "POST",
                    dataType: "json",
                    success: function(data) {
                        $('#message').text(data);
                        load_reglements();
                    }
                });
            }
        });
       
    });
    //Fonction de chargement les users
    function load_users() {
            $.ajax({
                url: "<?php echo $_smarty_tpl->tpl_vars['url_base']->value;?>
User/load_users",
                dataType: "json",
                success: function(result) {
                    $('#result-users').html(result);
                }
            });
        }
    //Fonction de chargement les facturation
    function load_reglements() {
            $.ajax({
                url: "<?php echo $_smarty_tpl->tpl_vars['url_base']->value;?>
Reglement/load_reglements",
                dataType: "json",
                success: function(result) {
                    $('#result-reglements').html(result);
                }
            });
        }
    //Fonction de chargement les facturation
    function load_facturations() {
            $.ajax({
                url: "<?php echo $_smarty_tpl->tpl_vars['url_base']->value;?>
Facturation/load_facturations",
                dataType: "json",
                success: function(result) {
                    $('#result-facturations').html(result);
                }
            });
        }
    //Fonction de chargement les consommations
    function load_consommations() {
            $.ajax({
                url: "<?php echo $_smarty_tpl->tpl_vars['url_base']->value;?>
Consommation/load_consommations",
                dataType: "json",
                success: function(result) {
                    $('#result-consommations').html(result);
                }
            });
        }
    //Fonction de chargement les compteurs
    function load_compteurs() {
            $.ajax({
                url: "<?php echo $_smarty_tpl->tpl_vars['url_base']->value;?>
Compteur/load_compteurs",
                dataType: "json",
                success: function(result) {
                    $('#result-compteurs').html(result);
                }
            });
        }
    //Fonction de chargement les abonnements
    function load_abonnements() {
        $.ajax({
            url: "<?php echo $_smarty_tpl->tpl_vars['url_base']->value;?>
Abonnement/load_abonnements",
            dataType: "json",
            success: function(result) {
                $('#result-abonnements').html(result);
            }
        });
    }
    //Fonction de chargement des chefs de village
    function load_chefs_village() {
        $.ajax({
            url: "<?php echo $_smarty_tpl->tpl_vars['url_base']->value;?>
Chef_village/load_chefs_villages",
            dataType: "json",
            success: function(result) {
                $('#result-chefs_village').html(result);
            }
        });
    }
    //Fonction de chargement des villages
    function load_villages() {
            $.ajax({
                url: "<?php echo $_smarty_tpl->tpl_vars['url_base']->value;?>
Village/load_villages",
                dataType: "json",
                success: function(result) {
                    $('#result-villages').html(result);
                }
        });
    }
    //Fonction de chargement des clients
    function load_clients() {
        $.ajax({
            url: "<?php echo $_smarty_tpl->tpl_vars['url_base']->value;?>
Client/load_clients",
            dataType: "json",
            success: function(result) {
                $('#result-clients').html(result);
            }
        });
    }
  <?php echo '</script'; ?>
>
</body>
</html>

<?php }
}
