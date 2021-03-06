<?php
/* Smarty version 3.1.30, created on 2020-09-17 15:08:14
  from "C:\xampp\htdocs\gestion_forage\src\view\header.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5f635fbe82c839_79621052',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '13f5dd08e9f2f9c4c4efe635880687cdfcdafd77' => 
    array (
      0 => 'C:\\xampp\\htdocs\\gestion_forage\\src\\view\\header.html',
      1 => 1600348079,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5f635fbe82c839_79621052 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!DOCTYPE html>
<html lang="fr">

<head>

    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="First App Samane | Application de gestion des forages">
    <meta name="author" content="ngorseck@gmail.com">

    <title>Forage</title>
    
    <!-- Custom fonts for this template-->
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@8.19.0/dist/sweetalert2.min.css" rel="stylesheet" type="text/css">
    <link href="<?php echo $_smarty_tpl->tpl_vars['url_base']->value;?>
public/template/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?php echo $_smarty_tpl->tpl_vars['url_base']->value;?>
public/template/css/sb-admin-2.min.css" rel="stylesheet">
    <link href="<?php echo $_smarty_tpl->tpl_vars['url_base']->value;?>
public/template/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>

<body id="page-top">

<!-- Page Wrapper -->
<div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

        <!-- Sidebar - Brand -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="">
            <div class="sidebar-brand-icon rotate-n-15">
                <img src="<?php echo $_smarty_tpl->tpl_vars['url_base']->value;?>
public/image/forage.jpg" alt="forage" width="60px">
            </div>
            <div class="sidebar-brand-text mx-3">Sen Forage</div>
        </a>

        <!-- Divider -->
        <hr class="sidebar-divider my-0">

        <!-- Nav Item - Dashboard -->
        <li class="nav-item active">
            <a class="nav-link" href="">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Tableau de bord</span></a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading">
            Gestion des pages
        </div>
        <?php if ($_smarty_tpl->tpl_vars['user']->value->hasRole("ROLE_USER")) {?>
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                <i class="fas fa-fw fa-folder"></i>
                <span>Gestion</span>
            </a>
            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Gestion:</h6>
                    <a class="collapse-item" href="<?php echo $_smarty_tpl->tpl_vars['url_base']->value;?>
Village/liste">Villages</a>
                    <a class="collapse-item" href="<?php echo $_smarty_tpl->tpl_vars['url_base']->value;?>
Chef_village/liste">Chefs de village</a>
                    <a class="collapse-item" href="<?php echo $_smarty_tpl->tpl_vars['url_base']->value;?>
Client/liste">Clients</a>
                    <a class="collapse-item" href="<?php echo $_smarty_tpl->tpl_vars['url_base']->value;?>
Abonnement/liste">Abonnement</a>
                    <a class="collapse-item" href="<?php echo $_smarty_tpl->tpl_vars['url_base']->value;?>
Compteur/liste">Compteurs</a>
                    <a class="collapse-item" href="<?php echo $_smarty_tpl->tpl_vars['url_base']->value;?>
Consommation/liste">Consommations</a>
                    <a class="collapse-item" href="<?php echo $_smarty_tpl->tpl_vars['url_base']->value;?>
Facturation/liste">Faturation</a>
                    <a class="collapse-item" href="<?php echo $_smarty_tpl->tpl_vars['url_base']->value;?>
Reglement/liste">Reglements</a>
                </div>
            </div>
        </li>
        <?php }?>
        <?php if ($_smarty_tpl->tpl_vars['user']->value->hasRole("ROLE_ADMIN")) {?>
        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
                <i class="fas fa-fw fa-folder"></i>
                <span>Sécurité</span>
            </a>
            <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Administartion:</h6>
                        <a class="collapse-item" href="<?php echo $_smarty_tpl->tpl_vars['url_base']->value;?>
User/liste">Utilisateurs</a>
                        <a class="collapse-item" href="<?php echo $_smarty_tpl->tpl_vars['url_base']->value;?>
Roles/liste">Roles</a>
                        <a class="collapse-item" href="<?php echo $_smarty_tpl->tpl_vars['url_base']->value;?>
UserRoles/liste">Affectation de roles</a>
                </div>
            </div>
        </li>
        <?php }?>


        <!-- Divider -->
        <hr class="sidebar-divider d-none d-md-block">

        <!-- Sidebar Toggler (Sidebar) -->
        <div class="text-center d-none d-md-inline">
            <button class="rounded-circle border-0" id="sidebarToggle"></button>
        </div>

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">

            <!-- Topbar -->
            <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                <!-- Sidebar Toggle (Topbar) -->
                <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                    <i class="fa fa-bars"></i>
                </button>

                <!-- Topbar Search -->
                <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                    <div class="input-group">
                        <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                        <div class="input-group-append">
                            <button class="btn btn-primary" type="button">
                                <i class="fas fa-search fa-sm"></i>
                            </button>
                        </div>
                    </div>
                </form>

                <!-- Topbar Navbar -->
                <ul class="navbar-nav ml-auto">

                    <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                    <li class="nav-item dropdown no-arrow d-sm-none">
                        <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-search fa-fw"></i>
                        </a>
                        <!-- Dropdown - Messages -->
                        <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                            <form class="form-inline mr-auto w-100 navbar-search">
                                <div class="input-group">
                                    <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                                    <div class="input-group-append">
                                        <button class="btn btn-primary" type="button">
                                            <i class="fas fa-search fa-sm"></i>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </li>

                    <div class="topbar-divider d-none d-sm-block"></div>

                    <!-- Nav Item - User Information -->
                    <li class="nav-item dropdown no-arrow">
                        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $_smarty_tpl->tpl_vars['user']->value->getPrenom();?>
  <?php echo $_smarty_tpl->tpl_vars['user']->value->getNom();?>
</span>
                            <img class="img-profile rounded-circle" src="https://source.unsplash.com/QAB-WJcbgJk/60x60">
                        </a>
                        <!-- Dropdown - User Information -->
                        <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                Logout
                            </a>
                        </div>
                    </li>

                </ul>

            </nav>
            <!-- End of Topbar -->

            <!-- Begin Page Content -->
            <div class="container-fluid">
<?php }
}
