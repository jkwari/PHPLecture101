
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "student";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if(isset($_GET['studentID'])){
    $id = $_GET['studentID'];
    $sql = "SELECT * FROM students WHERE studentID='$id'";
    $result = mysqli_query($conn, $sql);
    // var_dump($result);
    $row = mysqli_fetch_assoc($result);
    // var_dump($row);
}

?>

<?php
if(isset($_POST['update'])){

    if(isset($_GET['studentID'])){
        $id = $_GET['studentID'];
    }

    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "UPDATE students SET name = '$name', email = '$email',
    password = '$password' WHERE studentID = '$id'";

    $result = mysqli_query($conn, $sql);

    if($result == true){
        echo "Update Successfully";
    }else{
        echo "Error";
    }

}
?>


<form action="update.php?studentID= <?php echo $id; ?>" method = "POST">
        <label for="name">First Name</label>
        <input type="text" name="name" id="" value = <?php echo isset($row['name'])?  $row['name']: ''?>>
        <label for="name">Email</label>
        <input type="text" name="email" id="" value = <?php echo isset($row['email'])?  $row['email']: '' ?>>
        <label for="name">Password</label>
        <input type="password" name="password" id="" value = <?php echo isset($row['password'])?  $row['password']: ''   ?>>
        <input type="submit" value="Update" name = "update">
    </form>
