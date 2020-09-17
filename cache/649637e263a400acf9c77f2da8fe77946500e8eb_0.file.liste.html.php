<?php
/* Smarty version 3.1.30, created on 2020-09-17 14:17:24
  from "C:\xampp\htdocs\gestion_forage\src\view\roles\liste.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5f6353d43934f0_42045396',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '649637e263a400acf9c77f2da8fe77946500e8eb' => 
    array (
      0 => 'C:\\xampp\\htdocs\\gestion_forage\\src\\view\\roles\\liste.html',
      1 => 1600345040,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:src/view/header.html' => 1,
    'file:src/view/footer.html' => 1,
  ),
),false)) {
function content_5f6353d43934f0_42045396 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:src/view/header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalRole">
		<i class="fas fa-plus"></i> Nouveau
	  </button><br><br>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">LISTE DES ROLES</h6>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th>Identifiant</th>
                    <th>Libelle du role</th>
                    <th>Options</th>
                </tr>
            </thead>
            <tbody>
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['roles']->value, 'role');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['role']->value) {
?>
                    <tr>
                        <td><?php echo $_smarty_tpl->tpl_vars['role']->value->getId();?>
</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['role']->value->getNom();?>
</td>
                        <td> 
                          <a href="<?php echo $_smarty_tpl->tpl_vars['url_base']->value;?>
Roles/delete/<?php echo $_smarty_tpl->tpl_vars['role']->value->getId();?>
" class='btn btn-danger btn-xs delete-role'>del</a>
                        </td>
                    </tr>
                <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

            </tbody>
          </table>
        </div>
      </div>
    </div>

  </div>
  <!-- /.container-fluid -->


  <div class="modal fade" id="modalRole">
    <div class="modal-dialog">
        <form method="post" id="role_form">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title text-primary">Ajout d'un role</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Libellé du role</label>
                        <input type="text" name="libelle" id="libelle" class="form-control" required>
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
?>


<?php }
}
