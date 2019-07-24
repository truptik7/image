<!DOCTYPE html>
<html>
<form action="" method="post" enctype="multipart/form-data">
    Select file:
    <input type="file" name="userfile"/>
    <input type="submit" value="Uploads"/>
</form>
</html>

<?php
if(isset($_FILES['userfile'])){
  $errors= array();
  $file_name = $_FILES['userfile']['name'];
  $file_size = $_FILES['userfile']['size'];
  $file_tmp = $_FILES['userfile']['tmp_name'];
  $file_type = $_FILES['userfile']['type'];

  $file_ext=strtolower(end(explode('.',$_FILES['userfile']['name'])));

  $extentions=array("jpeg","jpg","png");

  if(in_array($file_ext,$extentions)=== false){
    $errors[]="File must be JPEG or PNG.";
  }
  if($file_size > 2097152){
    $errors[]='File size must be extactly 2MB';
  }

  if(empty($errors)==true){
    move_uploaded_file($file_tmp,"./uploads/".$file_name);
    echo "success";
  }else{
    print_r($errors);
  }
}

?>
