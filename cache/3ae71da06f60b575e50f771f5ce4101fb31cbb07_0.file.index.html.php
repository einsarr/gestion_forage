<?php
/* Smarty version 3.1.30, created on 2020-08-27 18:10:32
  from "C:\xampp\htdocs\gestion_forage\src\view\pdf\index.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5f47daf81a02d7_79065491',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '3ae71da06f60b575e50f771f5ce4101fb31cbb07' => 
    array (
      0 => 'C:\\xampp\\htdocs\\gestion_forage\\src\\view\\pdf\\index.html',
      1 => 1598544629,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5f47daf81a02d7_79065491 (Smarty_Internal_Template $_smarty_tpl) {
?>
<html>
	<head>
		<meta charset="UTF-8">
		<title>PDF generator</title>
		<!-- l'appel de <?php echo $_smarty_tpl->tpl_vars['url_base']->value;?>
 vous permet de recupérer le chemin de votre site web  -->
		<link type="text/css" rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['url_base']->value;?>
public/css/bootstrap.min.css"/>
		<link type="text/css" rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['url_base']->value;?>
public/css/samane.css"/>
		<style>
			h1{ 
				color: #40007d;
			}
		</style>
	</head>
	<body>
		<a href="<?php echo $_smarty_tpl->tpl_vars['url_base']->value;?>
Welcome"><img src="<?php echo $_smarty_tpl->tpl_vars['url_base']->value;?>
public/image/logo.jpg" class="resize" /></a>
		<div class="col-md-8 col-xs-12 col-md-offset-2" style="margin-top:150px;">
			<div class="panel panel-info">
				<div class="panel-heading">BIENVENUE A NOTRE PAGE DE TELECHARGEMENT SAMANE MVC
					
				</div>
				<div class="panel-body">
					<?php $_smarty_tpl->_assignInScope('fichier', explode('/',$_smarty_tpl->tpl_vars['pdfResult']->value));
?>
					<?php if (isset($_smarty_tpl->tpl_vars['pdfResult']->value)) {?>
						<div class="alert alert-warning">
							<a href="<?php echo $_smarty_tpl->tpl_vars['url_base']->value;
echo $_smarty_tpl->tpl_vars['pdfResult']->value;?>
" target="_blank" class="btn btn-info">visualiser</a>
							<br/>
							<a href="<?php echo $_smarty_tpl->tpl_vars['url_base']->value;
echo $_smarty_tpl->tpl_vars['pdfResult']->value;?>
" download="<?php echo $_smarty_tpl->tpl_vars['fichier']->value[3];?>
"><img src="<?php echo $_smarty_tpl->tpl_vars['url_base']->value;?>
public/image/Download-PDF.png" width="200px"></a>
						</div>
					<?php }?>
				</div>
			</div>
		</div>
	</body>
</html><?php }
}
