<?php
session_start();
require_once 'db.php';
$id=$_SESSION['idprof'];
if(isset($_POST['submit'])){
  $file=$_FILES['file'];

  $fileName=$_FILES['file']['name'];
  $fileTmpName=$_FILES['file']['tmp_name'];
  $fileSize=$_FILES['file']['size'];
  $fileError=$_FILES['file']['error'];
  $fileType=$_FILES['file']['type'];

  $fileExt=pathinfo($fileName,PATHINFO_EXTENSION);
  $fileActualExt= strtolower($fileExt);

  $allowed= array('jpg','jpeg','png');
  if(in_array($fileActualExt,$allowed)){
    if($fileError === 0){
      if($fileSize<1000000){
        
        $filNameNew="profile".$id.".".$fileActualExt;
        $path='uploads/'.$filNameNew;
        $fileDestination='../uploads/'.$filNameNew;
        move_uploaded_file($fileTmpName,$fileDestination);
        $sql= "UPDATE `file` SET `path`= ? , `status`='0' WHERE id=? ;";
        $stmt= mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt,$sql)){
          header("Location: ../prof_ens.php?error=sqlerror");
          exit();
        }
        else {
          mysqli_stmt_bind_param($stmt, "ss",$path, $id);
          mysqli_stmt_execute($stmt);
          header('Location: ../prof_ens.php?uploadedsuccess='.$id);
        }
       
      }else{
        echo "Votre fichier est tres volumineux";
        header('Location: ../prof.php?error=size');
      }
    }else{
      echo "Il y a un erreur lors de l'importation de votre fichier";
    }
  }else{
    echo "Vous ne pouvez pas ajouter des fichiers de ce type!";
  }
}

if(isset($_POST['modifSup'])){
  $file=$_FILES['doc'];

  $fileName=$_FILES['doc']['name'];
  $fileTmpName=$_FILES['doc']['tmp_name'];
  $fileSize=$_FILES['doc']['size'];
  $fileError=$_FILES['doc']['error'];
  $fileType=$_FILES['doc']['type'];

  $fileExt=pathinfo($fileName,PATHINFO_EXTENSION);
  $fileActualExt= strtolower($fileExt);

  $allowed= array('doc','docx','pdf','odt','jpg','jpeg','png','pps','ppt','rar','zip','xls','xlsx');
  if(in_array($fileActualExt,$allowed)){
    if($fileError === 0){
      if($fileSize<1000000){
        
        $filNameNew="documentProfile".$id.".".$fileActualExt;
        $path='files/'.$filNameNew;
        $fileDestination='../files/'.$filNameNew;
        move_uploaded_file($fileTmpName,$fileDestination);
        $sql= "INSERT INTO `file` (mail,`status`,`type`,`path`) VALUES (?,0,'documentProfile',?) ;";
        $stmt= mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt,$sql)){
          header("Location: ../prof.php?error=sqlerror");
          exit();
        }
        else {
          mysqli_stmt_bind_param($stmt, "ss",$_SESSION['user'],$path);
          mysqli_stmt_execute($stmt);
          header('Location: ../prof.php?uploadDocSuccess='.$id);
        }
      }else{
        echo "Votre fichier est tres volumineux";
        header('Location: ../prof.php?error=size');
      }
    }else{
      echo "Il y a un erreur lors de l'importation de votre fichier";
    }
  }else{
    echo "Vous ne pouvez pas ajouter des fichiers de ce type!";
  }
}