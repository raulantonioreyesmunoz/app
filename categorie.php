<?php
  $page_title = 'Lista de categorías';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
  page_require_level(1);

  $all_categories = find_all('categories')
?>
<?php
 if(isset($_POST['add_cat'])){
   $req_field = array('categorie-name');
   validate_fields($req_field);
   $cat_name = remove_junk($db->escape($_POST['categorie-name']));
   if(empty($errors)){
      $sql  = "INSERT INTO categories (name)";
      $sql .= " VALUES ('{$cat_name}')";
      if($db->query($sql)){
        $session->msg("s", "Categoría agregada exitosamente.");
        redirect('categorie.php',false);
      } else {
        $session->msg("d", "Lo siento, registro falló");
        redirect('categorie.php',false);
      }
   } else {
     $session->msg("d", $errors);
     redirect('categorie.php',false);
   }
 }
?>
<?php include_once('layouts/header.php'); ?>

  <div class="row">
     <div class="col-md-12">
       <?php echo display_msg($msg); ?>
     </div>
  </div>
   <div class="row">
    <div class="col-md-12">
      <div class="panel panel-default">
        <div class="panel-heading">
          <strong>
            <span class="fa fa-th"></span>
            <span>Agregar categoría</span>
         </strong>
        </div>
        <div class="panel-body">
          <form method="post" action="categorie">
            <div class="form-group">
              <input type="text" class="form-control" name="categorie-name" placeholder="Nombre de la categoría" required>
            </div>
            <span class="float-right"><button type="submit" name="add_cat" class="btn btn-outline-primary btn-sm">Agregar categoría</button></span>
        </form>
        </div>
      </div>
    </div>
    <div class="col-md-12">
    <div class="panel panel-default">
      <div class="panel-heading">
        <strong>
          <span class="fa fa-th"></span>
          <span>Lista de categorías</span>
       </strong>
      </div>
        <div class="panel-body table-responsive">
          <table id="MyDataTable" class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th class="text-center" style="width: 50px;">#</th>
                    <th>Categorías</th>
                    <th class="text-center" style="width: 100px;">Acciones</th>
                </tr>
            </thead>
            <tbody>
              <?php foreach ($all_categories as $cat):?>
                <tr>
                    <td class="text-center"><?php echo count_id();?></td>
                    <td><?php echo remove_junk(ucfirst($cat['name'])); ?></td>
                    <td class="text-center">
                      <div class="btn-group">
                        <a href="edit_categorie.php?id=<?php echo (int)$cat['id'];?>"  class="btn btn-xs btn-warning" data-toggle="tooltip" title="Editar">
                          <span class="fa fa-edit"></span>
                        </a>
                        <a href="delete_categorie.php?id=<?php echo (int)$cat['id'];?>"  class="btn btn-xs btn-danger" data-toggle="tooltip" title="Eliminar">
                          <span class="fa fa-trash"></span>
                        </a>
                      </div>
                    </td>

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
      $('#MyDataTable').DataTable( {
          dom: 'Bfrtip',
          buttons: ['csv', 'excel', 'pdf', 'print'],
          language: {url: "//cdn.datatables.net/plug-ins/1.10.21/i18n/Spanish.json"}
      } );
  } );
  </script>
