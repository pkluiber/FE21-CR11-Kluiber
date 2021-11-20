<?php
require_once '../components/db_connect.php';

if ($_GET['id_pet']) {
    $id_pet = $_GET['id_pet'];
    $sql = "SELECT * FROM pets WHERE id_pet = {$id_pet}";
    $result = mysqli_query($connect, $sql);
    if (mysqli_num_rows($result) == 1) {
        $data = mysqli_fetch_assoc($result);
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
<html>
    <head>
        <title>Edit Product</title>
        <?php require_once '../components/boot.php'?>
        <style type= "text/css">
            fieldset {
                margin: auto;
                margin-top: 100px;
                width: 60% ;
            }  
            .img-thumbnail{
                width: 70px !important;
                height: 70px !important;
            }     
        </style>
    </head>
    <body>
        <fieldset>
            <legend class='h2'>Update request <img class='img-thumbnail rounded-circle' src='pictures/<?php echo $pet_picture ?>' alt="<?php echo $animal_name ?>"></legend>
            <form action="actions/a_update.php"  method="post" enctype="multipart/form-data">
                <table class="table">
                    <tr>
                        <th>Name</th>
                        <td><input class="form-control" type="text"  name="animal_name" placeholder ="Name" value="<?php echo $animal_name ?>"  /></td>
                    </tr>
                    <tr>
                        <th>Picture</th>
                        <td><input class="form-control" type="file" name= "pet_picture" /></td>
                    </tr>
                    <tr>
                        <th>Address</th>
                        <td><input class="form-control" type="text"  name="address" placeholder ="Address" value="<?php echo $address ?>"  /></td>
                    </tr>
                    <tr>
                        <th>Description</th>
                        <td><input class="form-control" type="text"  name="desc" placeholder ="Description" value="<?php echo $desc ?>"  /></td>
                    </tr>
                    <tr>
                        <th>Age</th>
                        <td><input class="form-control" type="date"  name="age" placeholder ="Date" value="<?php echo $age ?>"  /></td>
                    </tr>
                    <tr>
                        <th>Hobby</th>
                        <td><input class="form-control" type="text"  name="hobby" placeholder ="Hobby" value="<?php echo $hobby ?>"  /></td>
                    </tr>
                    <tr>
                        <th>Breed</th>
                        <td><input class="form-control" type="text"  name="breed" placeholder ="Breed" value="<?php echo $breed ?>"  /></td>
                    </tr>
                    
                   
                    <tr>
                        <input type= "hidden" name= "id_pet" value= "<?php echo $data['id_pet'] ?>" />
                        <input type= "hidden" name= "pet_picture" value= "<?php echo $data['pet_picture'] ?>" />
                        <td><button class="btn btn-success" type= "submit">Save Changes</button></td>
                        <td><a href= "index.php"><button class="btn btn-warning" type="button">Back</button></a></td>
                    </tr>
                </table>
            </form>
        </fieldset>
    </body>
</html>