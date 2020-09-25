                <!-- User profile -->
                <div class="user-profile">
                    <!-- User profile image -->
                    <div class="profile-img"> 
                        <img src="uploads/users/<?php echo (!empty($user['image'])) ? $user['image'] : 'avatar.png'; ?>" alt="user" />
                        <!-- this is blinking heartbit-->
                        <div class="notify setpos"> <span class="heartbit"></span> <span class="point"></span> </div>
                    </div>
                    <!-- User profile text-->
                    <div class="profile-text">
                        <h5><?php echo $user['name'];?></h5>
                        <a href="#" class="dropdown-toggle u-dropdown" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="true"><i class="mdi mdi-settings"></i></a>
                        <a href="sales.php" class="" data-toggle="tooltip" title="Solicitudes"><i class="mdi mdi-file-chart"></i></a>
                        <a href="logout.php" class="" data-toggle="tooltip" title="Salir"><i class="mdi mdi-power"></i></a>
                        <div class="dropdown-menu animated flipInY">
                            <!-- text-->
                            <a href="profile.php?id=<?php echo (int)$user['id'];?>" class="dropdown-item"><i class="ti-user"></i> Mi Perfil</a>
                            <!-- text-->
                            <a href="sales_report.php" class="dropdown-item"><i class="mdi mdi-chart-line"></i> Solicitudes</a>
                            <!-- text-->
                            <a href="product.php" class="dropdown-item"><i class="mdi mdi-widgets"></i> Fármacos</a>
                            <!-- text-->
                            <div class="dropdown-divider"></div>
                            <!-- text-->
                            <a href="edit_account.php" class="dropdown-item"><i class="ti-settings"></i> Configuración</a>
                            <!-- text-->
                            <div class="dropdown-divider"></div>
                            <!-- text-->
                            <a href="logout.php" class="dropdown-item"><i class="fa fa-power-off"></i> Salir</a>
                            <!-- text-->
                        </div>
                    </div>
                </div>
                <!-- End User profile text-->
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <li class="nav-devider"></li>
                        <li> <a class="waves-effect waves-dark" href="admin.php" ><i class="fa fa-gear"></i><span class="hide-menu">Administración</span></a>
                        </li>
                        <li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="ti-user"></i><span class="hide-menu">Perfil de Usuario</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="group.php">Gestionar Perfil </a></li>
                                <li><a href="users.php">Gestionar Usuario</a></li>
                            </ul>
                        </li>
                        <li> <a class="waves-effect waves-dark" href="categorie.php" ><i class="fa fa-sitemap"></i><span class="hide-menu">Categorías</span></a>
                        </li>
                        <li> <a class="waves-effect waves-dark" href="media.php" ><i class="fa fa-file-image-o"></i><span class="hide-menu">Media</span></a>
                        </li>
                        <li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="mdi mdi-widgets"></i><span class="hide-menu">Fármacos <span class="label label-rouded label-themecolor pull-right"><?php echo count(join_product_table());?></span></span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="product.php">Administrar Fármacos</a></li>
                                <li><a href="add_product.php">Agregar Fármacos</a></li>
                            </ul>
                        </li>

                        <li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="mdi mdi-arrange-send-backward"></i><span class="hide-menu">Solicitudes</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="sales.php">Administrar Solicitudes</a></li>
                                <li><a href="add_sale.php">Agregar Solicitud</a></li>
                                <li> <a class="has-arrow" href="#" aria-expanded="false">Reportes Solicitudes</a>
                                    <ul aria-expanded="false" class="collapse">
                                        <li><a href="sales_report.php">Reporte por Fecha</a></li>
                                        <li><a href="monthly_sales.php">Reporte Mensual</a></li>
                                        <li><a href="daily_sales.php">Reporte Diario</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
