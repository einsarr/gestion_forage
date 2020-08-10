<?php
/* Smarty version 3.1.30, created on 2020-08-10 02:25:20
  from "C:\xampp\htdocs\gestion_forage\src\view\reglements\liste.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5f3093f0d8c095_87614654',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '54321de8a33533da9ae34c4dc7fd344a588882a6' => 
    array (
      0 => 'C:\\xampp\\htdocs\\gestion_forage\\src\\view\\reglements\\liste.html',
      1 => 1597018985,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:src/view/header.html' => 1,
    'file:src/view/footer.html' => 1,
  ),
),false)) {
function content_5f3093f0d8c095_87614654 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:src/view/header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalReglement">
		<i class="fas fa-plus"></i> Nouveau
	  </button><br><br>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">LISTE DES REGLEMENETS</h6>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th>N°</th>
                    <th>Etat</th>
                    <th>Date limite</th>
                    <th>Date du reglement</th>
                    <th>Facturation</th>
                    <th>Taxe</th>
                    <th>Montant</th>
                    <th>Options</th>
                </tr>
            </thead>
            <tbody id="result-reglements">

            </tbody>
          </table>
        </div>
      </div>
    </div>

  </div>
  <!-- /.container-fluid -->


  <div class="modal fade" id="modalReglement">
    <div class="modal-dialog">
        <form method="post" id="reglement_form">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title text-primary">Ajout d'un Reglement</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    
                </div>
                
                <div class="modal-body">
                    <div class="form-group">
                      <label>Etat reglement</label>
                      <select name="etat_reglement" id="etat_reglement" class="form-control">
                        <option value="">Selectionner l'état</option>
                        <option value="Réglé">Réglé</option>
                        <option value="Non réglé">Non réglé</option>
                      </select>
                    </div>
                    
                    <div class="form-group">
                      <label>La facture</label>
                      <select class="form-control" name="facturation_id" id="facturation_id">
                          <option value="">---Choisir la facturation---</option>
                          <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['facturations']->value, 'facturation');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['facturation']->value) {
?>
                          <option value="<?php echo $_smarty_tpl->tpl_vars['facturation']->value->getId();?>
"><?php echo $_smarty_tpl->tpl_vars['facturation']->value->getConsommation()->getNombre_litre_consomme()*$_smarty_tpl->tpl_vars['facturation']->value->getConsommation()->getPrix_litre_eau();?>
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
