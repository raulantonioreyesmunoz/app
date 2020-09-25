<?php $user = current_user(); ?>
<html lang="es-CL" class="no-js">
   <head>
      <title><?php if (!empty($page_title)) echo remove_junk($page_title);
         elseif (!empty($user)) echo ucfirst($user['name']);
         else echo "Sistema simple de inventario"; ?>
      </title>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <!-- Tell the browser to be responsive to screen width -->
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <!-- Favicon -->
      <link rel="shortcut icon" href="./favicon.png" type="image/png">
      <!-- Css Code -->
      <link rel="stylesheet" href="libs/plugins/bootstrap/css/bootstrap.min.css">
      <link rel="stylesheet" href="libs/plugins/bootstrap-datepicker/bootstrap-datepicker.min.css"  />
      <link rel="stylesheet" href="libs/css/style.css">
      <link rel="stylesheet" href="libs/css/main.css" />
      <link rel="stylesheet" href="libs/css/colors/red.css" id="theme">
      <link rel="stylesheet" href="libs/plugins/datatables/dataTables.bootstrap4.min.css" />
      <link rel="stylesheet" href="libs/plugins/datatables/buttons.bootstrap4.min.css" />
      <link rel="stylesheet" href="libs/plugins/morrisjs/morris.css">
   </head>
   <body class="fix-header fix-sidebar card-no-border">
      <div class="preloader">
         <svg class="circular" viewBox="25 25 50 50">
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" />
         </svg>
      </div>
      <?php if ($session->isUserLoggedIn(true)): ?>
      <div id="main-wrapper">
      <header class="topbar">
         <nav class="navbar top-navbar navbar-expand-md navbar-light">
            <!-- ============================================================== -->
            <!-- Logo -->
            <!-- ============================================================== -->
            <div class="navbar-header">
               <a class="navbar-brand logo-image" href="/">
                  <img src="./libs/images/logo.svg" alt="alternative">
                  <h2 class="textLocation">
                     <span id="autoType"></span>
                  </h2>
               </a>
            </div>
            <!-- ============================================================== -->
            <!-- End Logo -->
            <!-- ============================================================== -->
            <div class="navbar-collapse">
               <!-- ============================================================== -->
               <!-- toggle and nav items -->
               <!-- ============================================================== -->
               <ul class="navbar-nav mr-auto mt-md-0">
                  <!-- This is  -->
                  <li class="nav-item"> <a class="nav-link nav-toggler hidden-md-up text-muted waves-effect waves-dark" href="javascript:void(0)"><i class="mdi mdi-menu"></i></a> </li>
                  <li class="nav-item m-l-10"> <a class="nav-link sidebartoggler hidden-sm-down text-muted waves-effect waves-dark" href="javascript:void(0)"><i class="ti-menu"></i></a> </li>
                  <!-- ============================================================== -->
                  <!-- Messages -->
                  <!-- ============================================================== -->
                  <li class="nav-item dropdown mega-dropdown">
                     <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="mdi mdi-view-grid"></i></a>
                     <div class="dropdown-menu animated slideInUp">
                        <ul class="mega-dropdown-menu row">
                           <!-- Column -->
                           <li class="col-md-6 col-lg-3 col-xlg-3">
                              <div class="card card-inverse card-info">
                                 <div class="box bg-info text-center">
                                    <h1 class="font-light text-white"><?=count(count_by_id('users')); ?></h1>
                                    <h6 class="text-white">Usuarios</h6>
                                 </div>
                              </div>
                           </li>
                           <!-- Column -->
                           <li class="col-md-6 col-lg-3 col-xlg-3">
                              <div class="card card-success card-inverse">
                                 <div class="box text-center">
                                    <h1 class="font-light text-white"><?=count(count_by_id('categories')); ?></h1>
                                    <h6 class="text-white">Categorías</h6>
                                 </div>
                              </div>
                           </li>
                           <!-- Column -->
                           <li class="col-md-6 col-lg-3 col-xlg-3">
                              <div class="card card-inverse card-danger">
                                 <div class="box text-center">
                                    <h1 class="font-light text-white"><?=count(count_by_id('products')); ?></h1>
                                    <h6 class="text-white">Productos</h6>
                                 </div>
                              </div>
                           </li>
                           <!-- Column -->
                           <li class="col-md-6 col-lg-3 col-xlg-3">
                              <div class="card card-inverse card-dark">
                                 <div class="box text-center">
                                    <h1 class="font-light text-white"><?=count(count_by_id('sales')); ?></h1>
                                    <h6 class="text-white">Ventas</h6>
                                 </div>
                              </div>
                           </li>
                        </ul>
                     </div>
                  </li>
                  <!-- ============================================================== -->
                  <!-- End Messages -->
                  <!-- ============================================================== -->
               </ul>
               <!-- ============================================================== -->
               <!-- User profile and search -->
               <!-- ============================================================== -->
               <ul class="navbar-nav my-lg-0">
                  <!-- ============================================================== -->
                  <!-- Profile -->
                  <!-- ============================================================== -->
                  <li class="nav-item dropdown">
                     <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="mdi mdi-account-settings-variant"></span>
                        <!-- <img src="uploads/users/<?php echo $user['image']; ?>" alt="user" class="profile-pic" />-->
                     </a>
                     <div class="dropdown-menu dropdown-menu-right scale-up">
                        <ul class="dropdown-user">
                           <li>
                              <div class="dw-user-box">
                                 <div class="u-img"><img src="uploads/users/<?php echo $user['image']; ?>" alt="user"></div>
                                 <div class="u-text">
                                    <h4><?php echo remove_junk(ucfirst($user['name'])); ?></h4>
                                    <p class="text-muted"><?php echo strtolower($user['username']); ?></p>
                                    <a href="profile.php?id=<?php echo (int)$user['id']; ?>" class="btn btn-rounded btn-danger btn-sm">Perfil</a>
                                 </div>
                              </div>
                           </li>
                           <li role="separator" class="divider"></li>
                           <li><a href="product.php"><i class="mdi mdi-widgets"></i> Fármacos</a></li>
                           <li role="separator" class="divider"></li>
                           <li><a href="edit_account.php"><i class="ti-settings"></i> Configuración</a></li>
                           <li role="separator" class="divider"></li>
                           <li><a href="logout.php"><i class="fa fa-power-off"></i> Salir</a></li>
                        </ul>
                     </div>
                  </li>
               </ul>
            </div>
         </nav>
      </header>
      <!-- ============================================================== -->
      <!-- Left Sidebar  -->
      <!-- ============================================================== -->
            <?php if ($user['user_level'] === '1'): ?>
             <!-- Admin user -->
      <aside class="left-sidebar">
         <div class="scroll-sidebar">
            <?php include_once ('admin_menu.php'); ?>
         </div>
      </aside>
            <?php
               elseif ($user['user_level'] === '2'): ?>
            <!-- Special user -->
      <aside class="left-sidebar">
         <div class="scroll-sidebar">
            <?php include_once ('special_menu.php'); ?>
         </div>
      </aside>
            <?php
               elseif ($user['user_level'] === '3'): ?>
            <!-- User menu -->
      <aside class="left-sidebar">
         <div class="scroll-sidebar">
            <?php include_once ('user_menu.php'); ?>
         </div>
      </aside>
            <?php
               endif; ?>


      <div class="page-wrapper">
      <div class="row page-titles">
         <div class="col-md-5 align-self-center">
            <h3 class="text-themecolor"><?php if (!empty($page_title)) echo remove_junk($page_title);
               elseif (!empty($user)) echo ucfirst($user['name']);
               else echo "Sistema simple de inventario"; ?></h3>
         </div>
      </div>
      <div class="container-fluid">
      <?php
         endif; ?>
      <div class="container-fluid">