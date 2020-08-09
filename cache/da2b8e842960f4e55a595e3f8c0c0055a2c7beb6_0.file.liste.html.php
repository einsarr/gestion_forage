<?php
/* Smarty version 3.1.30, created on 2020-08-09 23:45:10
  from "C:\xampp\htdocs\gestion_forage\src\view\compteurs\liste.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5f306e660f60d3_54329583',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'da2b8e842960f4e55a595e3f8c0c0055a2c7beb6' => 
    array (
      0 => 'C:\\xampp\\htdocs\\gestion_forage\\src\\view\\compteurs\\liste.html',
      1 => 1597009481,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:src/view/header.html' => 1,
    'file:src/view/footer.html' => 1,
  ),
),false)) {
function content_5f306e660f60d3_54329583 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:src/view/header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalCompteur">
		<i class="fas fa-plus"></i> Nouveau
	  </button><br><br>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">LISTE DES COMPTEURS</h6>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th>N°</th>
                    <th>Numéro compteur</th>
                    <th>Etat du compteur</th>
                    <th>Numéro abonnement</th>
                    <th>Options</th>
                </tr>
            </thead>
            <tbody id="result-compteurs">

            </tbody>
          </table>
        </div>
      </div>
    </div>

  </div>
  <!-- /.container-fluid -->


  <div class="modal fade" id="modalCompteur">
    <div class="modal-dialog">
        <form method="post" id="compteur_form">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title text-primary">Ajout d'un Compteur</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    
                </div>
                
                <div class="modal-body">
                    <div class="form-group">
                      <label>Numéro</label>
                      <input type="text" name="numero_compteur" id="numero_compteur" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Etat</label>
                        <select name="etat_compteur" id="etat_compteur" class="form-control">
                          <option value="">Selectionner l'état du compteur</option>
                          <option value="Actif">Actif</option>
                          <option value="Coupé">Coupé</option>
                        </select>
                    </div>
                    <div class="form-group">
                      <label>L'abonnement</label>
                      <select class="form-control" name="abonnement_id" id="abonnement_id">
                          <option value="">---Choisir l'abonnement---</option>
                          <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['abonnements']->value, 'abonnement');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['abonnement']->value) {
?>
                          <option value="<?php echo $_smarty_tpl->tpl_vars['abonnement']->value->getId();?>
"><?php echo $_smarty_tpl->tpl_vars['abonnement']->value->getNumero_abonnement();?>
 - <?php echo $_smarty_tpl->tpl_vars['abonnement']->value->getClient()->getNom_famille();?>
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
