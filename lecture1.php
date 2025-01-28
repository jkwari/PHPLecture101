<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>THis is the first page</title>
</head>
<body>
    <h1>THis is the first page </h1>

    <?php
    echo "Hello Class 101";
    echo "<br>";
    echo "<br>";
    print "Hello Form Print";
    $number = 10;
    $name = "Khalid";
    echo"<br>";
    var_dump($number);
    echo"<br>";
    echo"<br>";

    $number = 11;

    echo $number." ".$name;
    echo"<br>";
    var_dump($name);
    $list  = array("10", 12);
    echo"<br>";
    echo var_dump($list[0]);
    // mcdkmfvkdsnvck
    /*
    kcmdskvmc
    mdkcdkc
    */
    ?>

<form action="data.php" method = "GET">
        <label for="name">First Name</label>
        <input type="text" name="name" id="">
        <label for="name">Email</label>
        <input type="text" name="email" id="">
        <label for="name">Password</label>
        <input type="password" name="password" id="">

        <input type="submit" value="Submit">



    </form>
</body>
</html>