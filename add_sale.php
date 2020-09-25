<?php
  $page_title = 'Agregar solicitud';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
   page_require_level(3);
?>
<?php

  if(isset($_POST['add_sale'])){
    $req_fields = array('s_id','quantity','price','total', 'date' );
    validate_fields($req_fields);
        if(empty($errors)){
          $p_id      = $db->escape((int)$_POST['s_id']);
          $s_qty     = $db->escape((int)$_POST['quantity']);
          $s_total   = $db->escape($_POST['total']);
          $date      = $db->escape($_POST['date']);
          $s_date    = make_date();
          $u_id      = $db->escape($_SESSION['user_id']);

          $sql  = "INSERT INTO sales (";
          $sql .= " product_id,qty,price,date,user_id";
          $sql .= ") VALUES (";
          $sql .= "'{$p_id}','{$s_qty}','{$s_total}','{$s_date}','{$u_id}'";
          $sql .= ")";

                if($db->query($sql)){
                  update_product_qty($s_qty,$p_id);
                  $session->msg('s',"Solicitud realizada con éxito! ");
                  redirect('add_sale.php', false);
                } else {
                  $session->msg('d','Lo siento, registro falló.');
                  redirect('add_sale.php', false);
                }
        } else {
           $session->msg("d", $errors);
           redirect('add_sale.php',false);
        }
  }

?>
<?php include_once('layouts/header.php'); ?>
<div class="row">
  <div class="col-md-6">
    <?php echo display_msg($msg); ?>
    <form method="post" action="ajax" autocomplete="on" id="sug-form">
        <div class="form-group">
          <div class="input-group">

            <div class="input-group-prepend">
              <button type="submit" class="btn btn-outline-primary btn-sm">Búsqueda</button>
            </div>
            <input type="text" id="sug_input" class="form-control" name="title"  placeholder="Buscar por el nombre del producto">
         </div>
         <div id="result" class="list-group"></div>
        </div>
    </form>
  </div>
</div>
<div class="row">

  <div class="col-md-12">
    <div class="panel panel-default">
      <div class="panel-heading clearfix">
        <strong>
          <span class="fa fa-th"></span>
          <span>Editar solicitud</span>
       </strong>
      </div>
      <div class="panel-body">
        <form method="post" action="add_sale">
          <div class="table-responsive">
           <table id="MyDataTable" class="table table-bordered">
             <thead>
              <th> Producto </th>
              <th> Precio </th>
              <th> Cantidad </th>
              <th> Total </th>
              <th> Agregado</th>
              <th> Acciones</th>
             </thead>
               <tbody  id="product_info"> </tbody>
           </table>
          </div>
       </form>
      </div>
    </div>
  </div>

</div>

<?php include_once('layouts/footer.php'); ?>
<script>
$(document).ready(function() {
    $('#MyDataTable').DataTable( {
        dom: 'Bfrtip',
        buttons: ['csv', 'excel', 'pdf', 'print'],
        language: {url: "//cdn.datatables.net/plug-ins/1.10.21/i18n/Spanish.json"}
    } );
} );
</script>