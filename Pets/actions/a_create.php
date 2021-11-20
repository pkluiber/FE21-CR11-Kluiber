<?php
require_once '../../components/db_connect.php';
require_once '../../components/file_upload.php';

if ($_POST) {   
    $animal_name = $_POST['animal_name'];
    $address = $_POST['address'];
    $desc = $_POST['desc'];
    $age = $_POST['age'];
    $hobby = $_POST['hobby'];
    $breed = $_POST['breed'];
  
    $uploadError = '';
    //this function exists in the service file upload.
    $pet_picture = file_upload($_FILES['pet_picture']);  
   
   $sql = "INSERT INTO `pets`(`animal_name`, `pet_picture`, `address`, `desc`, `age`, `hobby`, `breed`) VALUES ('$animal_name','$pet_picture->fileName','$address', '$desc', '$age', '$hobby','$breed')";


    if (mysqli_query($connect, $sql) === true) {
        $class = "success";
        $message = "The entry below was successfully created <br>
            <table class='table w-50'><tr>
            <td> $animal_name </td>
            <td> $address </td>
            <td> $desc </td>
            <td> $age </td>
            <td> $hobby </td>
            <td> $breed </td>
            </tr></table><hr>";
        $uploadError = ($pet_picture->error !=0)? $pet_picture->ErrorMessage :'';
    } else {
        $class = "danger";
        $message = "Error while creating record. Try again: <br>" . $connect->error;
        $uploadError = ($pet_picture->error !=0)? $pet_picture->ErrorMessage :'';
    }
    mysqli_close($connect);
} else {
    header("location: ../error.php");
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Update</title>
        <?php require_once '../../components/boot.php'?>
    </head>
    <body>
        <div class="container">
            <div class="mt-3 mb-3">
                <h1>Create request response</h1>
            </div>
            <div class="alert alert-<?=$class;?>" role="alert">
                <p><?php echo ($message) ?? ''; ?></p>
                <p><?php echo ($uploadError) ?? ''; ?></p>
                <a href='../index.php'><button class="btn btn-primary" type='button'>Home</button></a>
            </div>
        </div>
    </body>
</html>