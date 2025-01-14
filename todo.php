<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>To Do List</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <h1>To do list</h1>
    </header>
    <section>
        <form action="" method="Post">
            <label for="namee">
                <input type="text" name="namee" placeholder="Task name">
            </label>
            <label for="datee">
                <input type="date" name="datee">
            </label>
            <input type="submit" value="Add">
        </form>
        <?php
            if(isset($_POST["namee"]) && !empty($_POST["datee"])){
                $conn = mysqli_connect("localhost", "root", "", "to_do");
                if(mysqli_connect_error()){
                    die("Failed to connect to database" . mysqli_connect_error());
                }
                else{
                    $name = $_POST["namee"];
                    $date = $_POST["datee"];
                    $sql = "INSERT INTO `tasks`(`Name`, `Time`) VALUES('$name', '$date')";
                    mysqli_query($conn, $sql);
                }
                mysqli_close($conn);
            }else{
                echo "<script>
                alert('Błędne dane w formularzu');
                </script>";
            }
        ?>
    </section>
    <main>

    </main>
</body>
</html>