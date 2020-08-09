<?php
/* Smarty version 3.1.30, created on 2020-08-10 01:28:39
  from "C:\xampp\htdocs\gestion_forage\src\view\facturations\liste.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5f3086a7d63d80_74518751',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c1f33350635b3451acf08607c6fde706c6b81541' => 
    array (
      0 => 'C:\\xampp\\htdocs\\gestion_forage\\src\\view\\facturations\\liste.html',
      1 => 1597015714,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:src/view/header.html' => 1,
    'file:src/view/footer.html' => 1,
  ),
),false)) {
function content_5f3086a7d63d80_74518751 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:src/view/header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalFacturation">
		<i class="fas fa-plus"></i> Nouveau
	  </button><br><br>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">LISTE DES FACTURATIONS</h6>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th>N°</th>
                    <th>Numéro facturation</th>
                    <th>Date facturation</th>
                    <th>Consommation</th>
                    <th>Options</th>
                </tr>
            </thead>
            <tbody id="result-facturations">

            </tbody>
          </table>
        </div>
      </div>
    </div>

  </div>
  <!-- /.container-fluid -->


  <div class="modal fade" id="modalFacturation">
    <div class="modal-dialog">
        <form method="post" id="facturation_form">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title text-primary">Ajout d'un Facturation</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    
                </div>
                
                <div class="modal-body">
                    <div class="form-group">
                        <label>Date de facturation</label>
                        <input type="date" name="date_facturation" id="date_facturation" class="form-control" required>
                    </div>
                    <div class="form-group">
                      <label>Date limite de paiement</label>
                      <input type="date" name="date_limite_paiement" id="date_limite_paiement" class="form-control" required>
                    </div>
                    <div class="form-group">
                      <label>La consommation</label>
                      <select class="form-control" name="consommation_id" id="consommation_id">
                          <option value="">---Choisir la consommation---</option>
                          <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['consommations']->value, 'consommation');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['consommation']->value) {
?>
                          <option value="<?php echo $_smarty_tpl->tpl_vars['consommation']->value->getId();?>
"><?php echo $_smarty_tpl->tpl_vars['consommation']->value->getCode_consommation();?>
 - <?php echo $_smarty_tpl->tpl_vars['consommation']->value->getNombre_litre_consomme();?>
 Litres</option>
                          <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

                      </select>
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
