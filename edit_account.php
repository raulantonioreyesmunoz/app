<?php
  $page_title = 'Editar Cuenta';
  require_once('includes/load.php');
   page_require_level(3);
?>
<?php
//update user image
  if(isset($_POST['submit'])) {
  $photo = new Media();
  $user_id = (int)$_POST['user_id'];
  $photo->upload($_FILES['file_upload']);
  if($photo->process_user($user_id)){
    $session->msg('s','La foto fue subida al servidor.');
    redirect('edit_account');
    } else{
      $session->msg('d',join($photo->errors));
      redirect('edit_account');
    }
  }
?>
<?php
 //update user other info
  if(isset($_POST['update'])){
    $req_fields = array('name','username' );
    validate_fields($req_fields);
    if(empty($errors)){
             $id = (int)$_SESSION['user_id'];
           $name = remove_junk($db->escape($_POST['name']));
       $username = remove_junk($db->escape($_POST['username']));
            $sql = "UPDATE users SET name ='{$name}', username ='{$username}' WHERE id='{$id}'";
    $result = $db->query($sql);
          if($result && $db->affected_rows() === 1){
            $session->msg('s',"Cuenta actualizada. ");
            redirect('edit_account', false);
          } else {
            $session->msg('d',' Lo siento, actualización falló.');
            redirect('edit_account', false);
          }
    } else {
      $session->msg("d", $errors);
      redirect('edit_account',false);
    }
  }
?>
<?php include_once('layouts/header.php'); ?>
<div class="row">
  <div class="col-md-12">
    <?php echo display_msg($msg); ?>
  </div>
  <div class="col-md-6">
      <div class="panel panel-default">
        <div class="panel-heading">
          <div class="panel-heading clearfix">
            <span class="fa fa-camera"></span>
            <span>Cambiar mi foto</span>
          </div>
        </div>
        <div class="panel-body">
          <div class="row">
            <div class="col-md-4">
                <img class="img-circle figure-img img-fluid" src="uploads/users/<?php echo $user['image'];?>" alt="">
            </div>
            <div class="col-md-8">
              <form class="form" action="edit_account" method="POST" enctype="multipart/form-data">
              <div class="form-group">
                <input type="file" name="file_upload" multiple="multiple" class="btn btn-default btn-file"/>
              </div>
              <div class="form-group">
                <input type="hidden" name="user_id" value="<?php echo $user['id'];?>">
                 <button type="submit" name="submit" class="btn btn-warning">Cambiar</button>
              </div>
             </form>
            </div>
          </div>
        </div>
      </div>
  </div>
  <div class="col-md-6">
    <div class="panel panel-default">
      <div class="panel-heading clearfix">
        <span class="fa fa-edit"></span>
        <span>Editar mi cuenta</span>
      </div>
      <div class="panel-body">
          <form method="post" action="edit_account?id=<?php echo (int)$user['id'];?>" class="clearfix">
            <div class="form-group">
                  <label for="name" class="control-label">Nombres</label>
                  <input type="name" class="form-control" name="name" value="<?php echo remove_junk(ucwords($user['name'])); ?>">
            </div>
            <div class="form-group">
                  <label for="username" class="control-label">Usuario</label>
                  <input type="text" class="form-control" name="username" value="<?php echo remove_junk(ucwords($user['username'])); ?>">
            </div>
            <div class="form-group clearfix">
                    <a href="change_password.php" title="change password" class="btn btn-danger pull-right">Cambiar contraseña</a>
                    <button type="submit" name="update" class="btn btn-outline-info">Actualizar</button>
            </div>
        </form>
      </div>
    </div>
  </div>

<div class="row">
  <ul id="themecolors">
      <li><b>Light sidebar</b></li>

      <li><a href="javascript:void(0)" data-theme="default" class="default-theme">1</a></li>
      <li><a href="javascript:void(0)" data-theme="green" class="green-theme">2</a></li>
      <li><a href="javascript:void(0)" data-theme="red" class="red-theme">3</a></li>
      <li><a href="javascript:void(0)" data-theme="blue" class="blue-theme working">4</a></li>
      <li><a href="javascript:void(0)" data-theme="purple" class="purple-theme">5</a></li>
      <li><a href="javascript:void(0)" data-theme="megna" class="megna-theme">6</a></li>

      <li class="d-block m-t-30"><b>Dark sidebar</b></li>

      <li><a href="javascript:void(0)" data-theme="default-dark" class="default-dark-theme">7</a></li>
      <li><a href="javascript:void(0)" data-theme="green-dark" class="green-dark-theme">8</a></li>
      <li><a href="javascript:void(0)" data-theme="red-dark" class="red-dark-theme">9</a></li>
      <li><a href="javascript:void(0)" data-theme="blue-dark" class="blue-dark-theme">10</a></li>
      <li><a href="javascript:void(0)" data-theme="purple-dark" class="purple-dark-theme">11</a></li>
      <li><a href="javascript:void(0)" data-theme="megna-dark" class="megna-dark-theme ">12</a></li>

  </ul>
</div>
</div>


<?php include_once('layouts/footer.php'); ?>
