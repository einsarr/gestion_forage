<?php
/* Smarty version 3.1.30, created on 2020-08-09 22:30:14
  from "C:\xampp\htdocs\gestion_forage\src\view\abonnements\liste.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5f305cd683bf50_05516730',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'b87c6d05085ad7d57c0ff7aca339dbe008cf042e' => 
    array (
      0 => 'C:\\xampp\\htdocs\\gestion_forage\\src\\view\\abonnements\\liste.html',
      1 => 1597004906,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:src/view/header.html' => 1,
    'file:src/view/footer.html' => 1,
  ),
),false)) {
function content_5f305cd683bf50_05516730 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:src/view/header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalAbonnement">
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
                    <th>Numéro abonnement</th>
                    <th>Date abonnement</th>
                    <th>Client</th>
                    <th>Description</th>
                    <th>Options</th>
                </tr>
            </thead>
            <tbody id="result-abonnements">

            </tbody>
          </table>
        </div>
      </div>
    </div>

  </div>
  <!-- /.container-fluid -->


  <div class="modal fade" id="modalAbonnement">
    <div class="modal-dialog">
        <form method="post" id="abonnement_form">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title text-primary">Ajout d'un Abonnement</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    
                </div>
                
                <div class="modal-body">
                    <div class="form-group">
                      <label>Numéro</label>
                      <input type="text" name="numero_abonnement" id="numero_abonnement" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Date d'abonnement</label>
                        <input type="date" name="date_abonnement" id="date_abonnement" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Description</label>
                        <textarea name="description_abonnement" id="" cols="30" rows="3" id="description_abonnement" class="form-control"></textarea>
                    </div>
                    <div class="form-group">
                      <label>Le client</label>
                      <select class="form-control" name="client_id" id="client_id">
                          <option value="">---Choisir le client---</option>
                          <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['clients']->value, 'client');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['client']->value) {
?>
                          <option value="<?php echo $_smarty_tpl->tpl_vars['client']->value->getId();?>
"><?php echo $_smarty_tpl->tpl_vars['client']->value->getNom_famille();?>
</option>
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
