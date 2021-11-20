<?php 
require_once '../components/db_connect.php';

if ($_GET['id_pet']) {
    $id_pet = $_GET['id_pet'];
    $sql = "SELECT * FROM pets WHERE id_pet = {$id_pet}" ;
    $result = mysqli_query($connect, $sql);
    $data = mysqli_fetch_assoc($result);
    if (mysqli_num_rows($result) == 1) {
        $animal_name = $data['animal_name'];
        $address = $data['address'];
        $desc = $data['desc'];
        $age = $data['age'];
        $hobby = $data['hobby'] ;   
        $breed = $data['breed'];
        $pet_picture = $data['pet_picture'];
    } else {
        header("location: error.php");
    }
    mysqli_close($connect);
} else {
    header("location: error.php");
}  
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Delete Product</title>
        <?php require_once '../components/boot.php'?>
        <style type= "text/css">
            fieldset {
                margin: auto;
                margin-top: 100px;
                width: 70% ;
            }     
            .img-thumbnail{
                width: 70px !important;
                height: 70px !important;
            }    
        </style>
    </head>
    <body>
        <fieldset>
            <legend class='h2 mb-3'>Delete request <img class='img-thumbnail rounded-circle' src='pictures/<?php echo $pet_picture ?>' alt="<?php echo $animal_name?>"></legend>
            <h5>You have selected the data below:</h5>
            <table class="table w-75 mt-3">
                <tr>
                    <td><?php echo $animal_name?></td>
                </tr>
            </table>

            <h3 class="mb-4">Do you really want to delete this product?</h3>
            <form action ="actions/a_delete.php" method="post">
                <input type="hidden" name="id_pet" value="<?php echo $id_pet ?>" />
                <input type="hidden" name="pet_picture" value="<?php echo $pet_picture ?>" />
                <button class="btn btn-danger" type="submit">Yes, delete it!</button>
                <a href="index.php"><button class="btn btn-warning" type="button">No, go back!</button></a>
            </form>
        </fieldset>
    </body>
</html>