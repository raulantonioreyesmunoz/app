<?php
  $page_title = 'Página de inicio';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
   page_require_level(1);
?>
<?php
 $c_categorie     = count_by_id('categories');
 $c_product       = count_by_id('products');
 $c_sale          = count_by_id('sales');
 $c_user          = count_by_id('users');
 //$products_sold   = find_higest_saleing_product('10');
 //$recent_products = find_recent_product_added('5');
 $recent_sales    = find_recent_sale_added('50')
?>
<?php include_once('layouts/header.php'); ?>

<div class="row">
   <div class="col-md-6">
     <?php echo display_msg($msg); ?>
   </div>
</div>
                                <div class="row m-t-40">
                                    <!-- Column -->
                                    <div class="col-md-6 col-lg-3 col-xlg-3">
                                        <div class="card card-inverse card-info">
                                            <div class="box bg-info text-center">
                                                <h1 class="font-light text-white"><?php  echo $c_user['total']; ?></h1>
                                                <a href="users.php"><h6 class="text-white">Usuarios</h6></a>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Column -->
                                    <div class="col-md-6 col-lg-3 col-xlg-3">
                                        <div class="card card-success card-inverse">
                                            <div class="box text-center">
                                                <h1 class="font-light text-white"><?php  echo $c_categorie['total']; ?></h1>
                                                <a href="categorie.php"><h6 class="text-white">Categorías</h6></a>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Column -->
                                    <div class="col-md-6 col-lg-3 col-xlg-3">
                                        <div class="card card-inverse card-danger">
                                            <div class="box text-center">
                                                <h1 class="font-light text-white"><?php  echo $c_product['total']; ?></h1>
                                                <a href="product.php"><h6 class="text-white">Productos</h6></a>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Column -->
                                    <div class="col-md-6 col-lg-3 col-xlg-3">
                                        <div class="card card-inverse card-dark">
                                            <div class="box text-center">
                                                <h1 class="font-light text-white"><?php  echo $c_sale['total']; ?></h1>
                                                <a href="sales.php"><h6 class="text-white">Solicitudes</h6></a>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Column -->
                                </div>

<hr>

  <div class="row">
   <div class="col-md-12">
      <div class="panel panel-default">
        <div class="panel-heading">
          <strong>
            <span class="fa fa-th"></span>
            <span>Últimas solicitudes</span>
          </strong>
        </div>
        <div class="panel-body table-responsive">
          <table id="ProductosList" class="table table-bordered">
       <thead>
         <tr>
           <th class="text-center" style="width: 50px;">Id</th>
           <th>Fármaco</th>
           <th>Fecha</th>
           <th>Unidad</th>
           <th>Usuario</th>
           <th>Cantidad</th>
         </tr>
       </thead>
       <tbody>
         <?php foreach ($recent_sales as  $recent_sale): ?>
         <tr>
           <td class="text-center"><?php echo remove_junk(ucfirst($recent_sale['id'])); ?></td>
           <td><a href="edit_sale.php?id=<?php echo (int)$recent_sale['id']; ?>"><?php echo remove_junk(first_character($recent_sale['name'])); ?></a></td>
           <td><?php echo remove_junk(ucfirst($recent_sale['date'])); ?></td>
           <td><?php echo remove_junk(ucfirst($recent_sale['unit_name'])); ?></td>
           <td><?php echo remove_junk(ucfirst($recent_sale['user_name'])); ?></td>
           <td><?php echo remove_junk(first_character($recent_sale['qty'])); ?></td>
        </tr>

       <?php endforeach; ?>
       </tbody>
     </table>
    </div>
   </div>
  </div>
 </div>


<?php include_once('layouts/footer.php'); ?>
<script>
$(document).ready(function() {
    $('#ProductosList').DataTable( {
        dom: 'Bfrtip',
        buttons: ['csv', 'excel', 'pdf', 'print'],
        language: {url: "//cdn.datatables.net/plug-ins/1.10.21/i18n/Spanish.json"}
    } );
} );
</script>
