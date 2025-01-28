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

// Delete code:
if(isset($_GET['studentID'])){
    $id = $_GET['studentID'];
    $delete = mysqli_query($conn, "DELETE FROM students WHERE studentID='$id'");
}

echo "Connected successfully";
// Variables for user input data
$name = isset($_GET['name']) ? $_GET['name'] : '';
$email = isset($_GET['email']) ? $_GET['email'] : '';
$password = isset($_GET['password']) ? $_GET['password'] : '';

// Inserting data in the datbase

// This If Statement is very useful, because when you DELETE a row 
// the page refereshes so it automatically inserts an empty row
// With this if statement we prevent it from happening.

// Inserting can work normally without this if statement 
// but when you add the delete functionalty it adds a new row 
// unintentionally which causes confusion. 
if(!empty($name)&& !empty($email)&& !empty($password)){

    $sql = "INSERT INTO students(name,email,password)
        VALUES ('$name','$email','$password')";

    if(mysqli_query($conn, $sql)) {
        echo"New record created successfully";
    }else{
        echo"Error: ". $sql."<br>". mysqli_error($conn);
    }
}


echo "<br>";
// View Data from DB

$sql = "SELECT * FROM students";
$result = mysqli_query($conn, $sql);
if(mysqli_num_rows($result)>0){

    echo "<table border = 'solid'>";
    echo "<tr>
        <th>ID</th>
        <th>Name</th>
        <th>Email</th>
        <th>Delete</th>
        <th>Update</th>
    </tr>";
    
    while ($row = mysqli_fetch_assoc($result)) {
        # code...
        // echo "id =".$row['studentID']. 
        // " Student Name = ".$row['name'].
        // " Student Email = ".$row['email'] ."<br>";

       
        echo"<tr>";
        echo"<td>".$row['studentID']."</td>";
        echo"<td>".$row['name']."</td>";
        echo"<td>".$row['email']."</td>";
        echo"<td>"."<a href = 'data.php?studentID=".$row['studentID']."'>
        Delete</a>"."</td>";
        echo"<td>"."<a href = 'update.php?studentID=".$row['studentID']."'>
        Update</a>"."</td>";
       

        echo"</tr>";
    }
    echo"</table>";
}else{
    echo "DB empty";
}
mysqli_close($conn);
?>


