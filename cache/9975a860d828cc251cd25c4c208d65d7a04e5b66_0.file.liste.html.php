<?php
/* Smarty version 3.1.30, created on 2020-08-07 02:05:16
  from "C:\xampp\htdocs\gestion_forage\src\view\chefs_village\liste.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5f2c9abc0482e4_54216389',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '9975a860d828cc251cd25c4c208d65d7a04e5b66' => 
    array (
      0 => 'C:\\xampp\\htdocs\\gestion_forage\\src\\view\\chefs_village\\liste.html',
      1 => 1596758696,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:src/view/header.html' => 1,
    'file:src/view/footer.html' => 1,
  ),
),false)) {
function content_5f2c9abc0482e4_54216389 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:src/view/header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalChef_Village">
		<i class="fas fa-plus"></i> Nouveau
	  </button><br><br>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">LISTE DES CHEFS DE VILLAGES</h6>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th>N°</th>
                    <th>Prénom</th>
                    <th>Téléphone</th>
                    <th>village</th>
                    <th>Options</th>
                </tr>
            </thead>
            <tbody id="result-chefs_village">

            </tbody>
          </table>
        </div>
      </div>
    </div>

  </div>
  <!-- /.container-fluid -->


  <div class="modal fade" id="modalChef_Village">
    <div class="modal-dialog">
        <form method="post" id="chefs_village_form">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title text-primary">Ajout d'un chef de village</h4>
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
?>
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
                        <label>Prénom du chef de  village</label>
                        <input type="text" name="prenom_chef_village" id="prenom_chef_village" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Téléphone du chef de village</label>
                        <input type="text" name="telephone_chef_village" id="telephone_chef_village" class="form-control" placeholder="Numéro de téléphone" required>
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
