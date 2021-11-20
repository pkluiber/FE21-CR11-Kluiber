<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <?php require_once '../components/boot.php'?>
        <title>PHP CRUD  |  Add Pet</title>
        <style>
            fieldset {
                margin: auto;
                margin-top: 100px;
                width: 60% ;
            }       
        </style>
    </head>
    <body>
        <fieldset>
            <legend class='h2'>Add Pet</legend>
            <form action="actions/a_create.php" method= "post" enctype="multipart/form-data">
                <table class='table'>
                    <tr>
                        <th>Name</th>
                        <td><input class='form-control' type="text" name="animal_name"  placeholder="Name" /></td>
                    </tr>  
                    <tr>
                        <th>Picture</th>
                        <td><input class='form-control' type="file" name="pet_picture" /></td>
                    </tr>
                    <tr>
                        <th>Address</th>
                        <td><input class='form-control' type="text" name="address"  placeholder="address" /></td>
                    </tr>  
                    <tr>
                        <th>Description</th>
                        <td><input class='form-control' type="text" name="desc"  placeholder="Description" /></td>
                    </tr>  
                    <tr>
                        <th>Age</th>
                        <td><input class='form-control' type="date" name="age"/></td>
                    </tr>  
                    <tr>
                        <th>Hobby</th>
                        <td><input class='form-control' type="text" name="hobby"  placeholder="Hobby" /></td>
                    </tr>  
                    <tr>
                        <th>Breed</th>
                        <td><input class='form-control' type="text" name="breed"  placeholder="Breed" /></td>
                    </tr>    
                
                   
                    <tr>
                        <td><button class='btn btn-success' type="submit">Insert Product</button></td>
                        <td><a href="index.php"><button class='btn btn-warning' type="button">Home</button></a></td>
                    </tr>
                </table>
            </form>
        </fieldset>
    </body>
</html>