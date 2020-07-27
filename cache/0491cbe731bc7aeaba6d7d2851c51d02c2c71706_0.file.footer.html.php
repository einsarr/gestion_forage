<?php
/* Smarty version 3.1.30, created on 2020-07-27 02:21:18
  from "C:\xampp\htdocs\gestion_forage\src\view\footer.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5f1e1dfea5e9f5_00992222',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '0491cbe731bc7aeaba6d7d2851c51d02c2c71706' => 
    array (
      0 => 'C:\\xampp\\htdocs\\gestion_forage\\src\\view\\footer.html',
      1 => 1595809097,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5f1e1dfea5e9f5_00992222 (Smarty_Internal_Template $_smarty_tpl) {
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
        load_villages();
        load_clients();
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
            var id = $(this).attr('id');
            $.ajax({
                url: "<?php echo $_smarty_tpl->tpl_vars['url_base']->value;?>
Client/edit/" + id,
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
                    $('#modalVillaget').modal('show');
                    $('#village_id').val(data.village);
                    $('#nom_famille').val(data.nom_famille);
                    $('#telephone_abonne').val(data.telephone_abonne);
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
