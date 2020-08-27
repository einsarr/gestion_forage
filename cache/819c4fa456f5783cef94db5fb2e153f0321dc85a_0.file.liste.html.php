<?php
/* Smarty version 3.1.30, created on 2020-08-27 18:15:27
  from "C:\xampp\htdocs\gestion_forage\src\view\consommations\liste.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5f47dc1f106179_43661288',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '819c4fa456f5783cef94db5fb2e153f0321dc85a' => 
    array (
      0 => 'C:\\xampp\\htdocs\\gestion_forage\\src\\view\\consommations\\liste.html',
      1 => 1598544925,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:src/view/header.html' => 1,
    'file:src/view/footer.html' => 1,
  ),
),false)) {
function content_5f47dc1f106179_43661288 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:src/view/header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalConsommation">
		<i class="fas fa-plus"></i> Nouveau
	  </button><br><br>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">LISTE DES CONSOMMATIONS</h6>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th>N°</th>
                    <th>Code</th>
                    <th>Nombre de litre</th>
                    <th>Date consommation</th>
                    <th>Prix du litre d'eau</th>
                    <th>Compteur</th>
                    <th>Options</th>
                </tr>
            </thead>
            <tbody id="result-consommations">

            </tbody>
          </table>
        </div>
      </div>
    </div>

  </div>
  <!-- /.container-fluid -->


  <div class="modal fade" id="modalConsommation">
    <div class="modal-dialog">
        <form method="post" id="consommation_form">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title text-primary">Ajout d'un Consommation</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    
                </div>
                
                <div class="modal-body">
                    <div class="form-group">
                      <label>Code consommation</label>
                      <input type="text" name="code_consommation" id="code_consommation" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Nombre de litre consommés</label>
                        <input type="text" name="nombre_litre_consomme" id="nombre_litre_consomme" class="form-control" required>
                    </div>
                    <div class="form-group">
                      <label>Date de consommation</label>
                      <input type="date" name="date_consommation" id="date_consommation" class="form-control" required>
                    </div>
                    <div class="form-group">
                      <label>Prix du litre d'eau</label>
                      <input type="text" name="prix_litre_eau" id="prix_litre_eau" class="form-control" required>
                    </div>
                    <div class="form-group">
                      <label>Le compteur</label>
                      <select class="form-control" name="compteur_id" id="compteur_id">
                          <option value="">---Choisir le compteur---</option>
                          <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['compteurs']->value, 'compteur');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['compteur']->value) {
?>
                          <option value="<?php echo $_smarty_tpl->tpl_vars['compteur']->value->getId();?>
"><?php echo $_smarty_tpl->tpl_vars['compteur']->value->getNumero_compteur();?>
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
