<?php
/* Smarty version 3.1.30, created on 2020-08-10 02:43:23
  from "C:\xampp\htdocs\gestion_forage\src\view\villages\liste.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5f30982b4c9c69_87347052',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'bd269e28f0d94597c3d7f09223886744ebfc87ce' => 
    array (
      0 => 'C:\\xampp\\htdocs\\gestion_forage\\src\\view\\villages\\liste.html',
      1 => 1596410887,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:src/view/header.html' => 1,
    'file:src/view/footer.html' => 1,
  ),
),false)) {
function content_5f30982b4c9c69_87347052 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:src/view/header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalVillage">
		<i class="fas fa-plus"></i> Nouveau
	  </button><br><br>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">LISTE DES VILLAGES</h6>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th>N°</th>
                    <th>Village</th>
                    <th>code du village</th>
                    <th>Options</th>
                </tr>
            </thead>
            <tbody id="result-villages">

            </tbody>
          </table>
        </div>
      </div>
    </div>

  </div>
  <!-- /.container-fluid -->


  <div class="modal fade" id="modalVillage">
    <div class="modal-dialog">
        <form method="post" id="village_form">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title text-primary">Ajout d'un village</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    
                </div>
                
                <div class="modal-body">
                    <div class="form-group">
                        <label>Identifiant du village</label>
                        <input type="text" name="identifiant_village" id="identifiant_village" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Nom du village</label>
                        <input type="text" name="nom_village" id="nom_village" class="form-control" placeholder="Numéro de téléphone" required>
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
