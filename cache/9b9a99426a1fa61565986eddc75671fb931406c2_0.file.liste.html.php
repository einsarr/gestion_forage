<?php
/* Smarty version 3.1.30, created on 2020-09-17 15:29:21
  from "C:\xampp\htdocs\gestion_forage\src\view\userroles\liste.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5f6364b1268353_20434388',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '9b9a99426a1fa61565986eddc75671fb931406c2' => 
    array (
      0 => 'C:\\xampp\\htdocs\\gestion_forage\\src\\view\\userroles\\liste.html',
      1 => 1600349357,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:src/view/header.html' => 1,
    'file:src/view/footer.html' => 1,
  ),
),false)) {
function content_5f6364b1268353_20434388 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:src/view/header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="row">
<div class="col-md-8">
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">LISTE DES USERS</h6>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th>Identifiant</th>
                    <th>Prenom</th>
                    <th>Nom</th>
                    <th>Email</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['users']->value, 'user');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['user']->value) {
?>
                    <tr  <?php if (isset($_smarty_tpl->tpl_vars['idUser']->value)) {?>
                            <?php if ($_smarty_tpl->tpl_vars['idUser']->value == $_smarty_tpl->tpl_vars['user']->value->getId()) {?>
                                class="alert alert-warning"
                            <?php }?>
                        <?php }?>>
                        <td><?php echo $_smarty_tpl->tpl_vars['user']->value->getId();?>
</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['user']->value->getPrenom();?>
</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['user']->value->getNom();?>
</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['user']->value->getEmail();?>
</td>
                        <td><a href="<?php echo $_smarty_tpl->tpl_vars['url_base']->value;?>
UserRoles/affectation/<?php echo $_smarty_tpl->tpl_vars['user']->value->getId();?>
"></a>
                        
                            <a href="<?php echo $_smarty_tpl->tpl_vars['url_base']->value;?>
UserRoles/affectation/<?php echo $_smarty_tpl->tpl_vars['user']->value->getId();?>
" class="btn btn-success btn-circle btn-xs">
                                <i class="fas fa-check"></i>
                              </a>

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
<div class="col-md-4">
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">AFFECTATION</h6>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th>Libelle du role</th>
                    <th>Affectation</th>
                </tr>
            </thead>
            <tbody>
                <form method="post" action="<?php echo $_smarty_tpl->tpl_vars['url_base']->value;?>
UserRoles/affecter">
                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['roles']->value, 'role');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['role']->value) {
?>

                            <tr>
                                <td><?php echo $_smarty_tpl->tpl_vars['role']->value->getNom();?>
</td>
                                <td>
                                    <input type="hidden" name="idUser" <?php if (isset($_smarty_tpl->tpl_vars['idUser']->value)) {?> value="<?php echo $_smarty_tpl->tpl_vars['idUser']->value;?>
" <?php }?> />
                                    <input type="checkbox"
                                           <?php if (isset($_smarty_tpl->tpl_vars['usersroles']->value)) {?>
                                                <?php echo $_smarty_tpl->tpl_vars['role']->value->chercherRole($_smarty_tpl->tpl_vars['usersroles']->value,$_smarty_tpl->tpl_vars['role']->value->getNom());?>

                                           <?php }?>
                                    name="roles[]" value="<?php echo $_smarty_tpl->tpl_vars['role']->value->getNom();?>
"/></td>
                            </tr>
                    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

                    <?php if (isset($_smarty_tpl->tpl_vars['usersroles']->value)) {?>
                        <tr>
                            <td colspan="2">
                                <button type="submit" class="btn btn-primary btn-icon-split">
                                    <span class="icon text-white-50">
                                      <i class="fas fa-check"></i>
                                    </span>
                                    <span class="text">Attribuer roles</span>
                                  </button>
                            </td>
                        </tr>
                        <?php }?>
                    </form>
            </tbody>
          </table>
        </div>
      </div>
    </div>
</div>
</div>


  </div>
  <!-- /.container-fluid -->
  <?php $_smarty_tpl->_subTemplateRender("file:src/view/footer.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>






















<?php }
}
