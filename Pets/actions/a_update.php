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
    $id_pet	 = $_POST['id_pet'];
    //variable for upload pictures errors is initialized
    $uploadError = '';

    $pet_picture = file_upload($_FILES['pet_picture']);//file_upload() called  
    if($pet_picture->error===0){
        ($_POST["pet_picture"]=="product.png")?: unlink("../pictures/$_POST[pet_picture]");     
        $sql = " UPDATE `pets` SET ,`animal_name`='$animal_name',`pet_picture`='$pet_picture->fileName',`address`=' $address',`desc`='$desc',`age`='$age',`hobby`='$age',`breed`='$breed' WHERE `id_pet = '$id_pet";
        
        // $sql = "UPDATE pets SET name = animal_name = $animal_name, address = $address, desc = $desc, age = $age, hobby = $hobby, breed = $breed, picture = '$picture->fileName' WHERE id_pet = {$id_pet	}";
    }else{
        $sql = " UPDATE `pets` SET ,`animal_name`='$animal_name',`address`=' $address',`desc`='$desc',`age`='$age',`hobby`='$age',`breed`='$breed' WHERE `id_pet = '$id_pet";
        // $sql = "UPDATE pets SET name = animal_name = $animal_name, address = $address, desc = $desc, age = $age, hobby = $hobby, breed = $breed WHERE id_pet = {$id_pet	}";
    }    

   


    if (mysqli_query($connect, $sql) === TRUE) {
        $class = "success";
        $message = "The record was successfully updated";
        $uploadError = ($pet_picture->error !=0)? $pet_picture->ErrorMessage :'';
    } else {
        $class = "danger";
        $message = "Error while updating record : <br>" . mysqli_connect_error();
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
                <h1>Update request response</h1>
            </div>
            <div class="alert alert-<?php echo $class;?>" role="alert">
                <p><?php echo ($message) ?? ''; ?></p>
                <p><?php echo ($uploadError) ?? ''; ?></p>
                <a href='../update.php?id_pet =<?=$id_pet;?>'><button class="btn btn-warning" type='button'>Back</button></a>
                <a href='../index.php'><button class="btn btn-success" type='button'>Home</button></a>
            </div>
        </div>
    </body>
</html>