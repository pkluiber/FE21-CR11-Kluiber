<?php
session_start();
require_once 'components/db_connect.php';

// if adm will redirect to dashboard
if (isset($_SESSION['adm'])) {
    header("Location: dashboard.php");
    exit;
}
// if session is not set this will redirect to login page
if (!isset($_SESSION['adm']) && !isset($_SESSION['user'])) {
    header("Location: index.php");
    exit;
}

// select logged-in users details - procedural style
$res = mysqli_query($connect, "SELECT * FROM users WHERE id_user=" . $_SESSION['user']);
$row = mysqli_fetch_array($res, MYSQLI_ASSOC);


$tbody = ''; 
if ($result->num_rows > 0) {
    while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
        $tbody .= "<tr>
        <td>" . $row['first_name'] . " " . $row['last_name'] . "</td>
        <td>" . $row['email'] . "</td>
        <td>" . $row['phone'] . "</td>
        <td>" . $row['address'] . "</td>
        <td><img class='img-thumbnail rounded-circle' src='pictures/" . $row['picture'] . "' alt=" . $row['first_name'] . "></td>           
        <td><a href='update.php?id=" . $row['id_user'] . "'><button class='btn btn-primary btn-sm' type='button'>Edit</button></a>
        <a href='delete.php?id=" . $row['id_user'] . "'><button class='btn btn-danger btn-sm' type='button'>Delete</button></a></td>
     </tr>";
    }
} else {
    $tbody = "<tr><td colspan='5'><center>No Data Available </center></td></tr>";
}

mysqli_close($connect);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Welcome - <?php echo $row['first_name']; ?></title>
<?php require_once 'components/boot.php'?>
<style>
.userImage{
width: 200px;
height: 200px;
}
.hero {
    background: rgb(2,0,36);
    background: linear-gradient(24deg, rgba(2,0,36,1) 0%, rgba(0,212,255,1) 100%);   
}
</style>
</head>
<body>
<div class="container">
    <div class="hero">
        <img class="userImage" src="pictures/<?php echo $row['picture']; ?>" alt="<?php echo $row['first_name']; ?>">
        <p class="text-white" >Hi <?php echo $row['first_name']; ?></p>
    </div>
    <tbody>
            <?=$tbody?>
            </tbody>

    <a href="logout.php?logout">Sign Out</a>
    <a href="update.php?id=<?php echo $_SESSION['user'] ?>">Update your profile</a>
</div>
</body>
</html>