<?php
/* Smarty version 3.1.30, created on 2020-07-27 00:27:28
  from "C:\xampp\htdocs\gestion_forage\src\view\clients\liste.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5f1e03508f1ad2_83859615',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '5a058bf9d135fa23709dcd4582c7ab44f3755230' => 
    array (
      0 => 'C:\\xampp\\htdocs\\gestion_forage\\src\\view\\clients\\liste.html',
      1 => 1595802440,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:src/view/header.html' => 1,
    'file:src/view/footer.html' => 1,
  ),
),false)) {
function content_5f1e03508f1ad2_83859615 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:src/view/header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalClient">
		<i class="fas fa-plus"></i> Nouveau
	  </button><br><br>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">LISTE DES CLIENTS</h6>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th>N°</th>
                    <th>Nom de famille</th>
                    <th>Téléphone</th>
                    <th>Village</th>
                    <th>Options</th>
                </tr>
            </thead>
            <tbody id="result-clients">

            </tbody>
          </table>
        </div>
      </div>
    </div>

  </div>
  <!-- /.container-fluid -->


  <div class="modal fade" id="modalClient">
    <div class="modal-dialog">
        <form method="post" id="client_form">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title text-primary">Ajout d'un client</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    
                </div>
                
                <div class="modal-body">
                    
                    <div class="form-group">
                        <label>Village</label>
                        <select class="form-control" name="village_id" id="village_id">
                            <option value="">---Choisir le village---</option>
                            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['villages']->value, 'village');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['village']->value) {
?>-->
                            <option value="<?php echo $_smarty_tpl->tpl_vars['village']->value->getId();?>
"><?php echo $_smarty_tpl->tpl_vars['village']->value->getNom_village();?>
</option>
                            <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

                        </select>
                    </div>
                    <div class="form-group">
                        <label>Nom de famille</label>
                        <input type="text" name="nom_famille" id="nom_famille" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Téléphone abonné</label>
                        <input type="text" name="telephone_abonne" id="telephone_abonne" class="form-control" placeholder="Numéro de téléphone" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="id" id="id">
                    <input type="submit" name="action" id="action" class="btn btn-primary" value="Add">
                    <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Fermer</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </form>
    </div>
    <!-- /.modal-dialog -->
</div>
  <?php $_smarty_tpl->_subTemplateRender("file:src/view/footer.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
