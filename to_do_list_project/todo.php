<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>To Do List</title>
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Source+Code+Pro:ital,wght@0,200..900;1,200..900&display=swap" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="script.js"></script>
    <script>
        $("body").on("click", "img[src='check.png']", function() {
            <?php
            $conn = mysqli_connect("localhost", "root", "", "to_do");
            $id_php = $_GET['js_dat'];
            if ($conn->connect_error) {
                die("Failed to connect to database: " . mysqli_connect_error());
            } else {
                $sql1 = "UPDATE `tasks` SET IsDone = 1 WHERE ID = '$id_php'";
                mysqli_query($conn, $sql1);
            }
            mysqli_close($conn);
            ?>
            window.location.reload();
        });
        $("body").on("click", 'img[src$="x.png"]', function() {
            <?php
            $conn = mysqli_connect("localhost", "root", "", "to_do");
            $id_php = $_GET['js_data'];
            if ($conn->connect_error) {
                die("Failed to connect to database: " . mysqli_connect_error());
            } else {
                $sql = "DELETE FROM `tasks` WHERE ID = '$id_php'";
                mysqli_query($conn, $sql);
            }
            mysqli_close($conn);
            ?>
            window.location.reload();
        });
    </script>
</head>

<body>
    <header>
        <h1>to do list</h1>
    </header>
    <section>
        <form action="" method="Post">
            <input class="input" name="namee" placeholder="task name..." type="text">
            <input class="input" name="datee" type="date">
            <input class="input" type="submit" value="add">
        </form>
        <?php
        if (isset($_POST["namee"]) && !empty($_POST["datee"])) {
            $conn = mysqli_connect("localhost", "root", "", "to_do");
            if ($conn->connect_error) {
                die("Failed to connect to database" . mysqli_connect_error());
            } else {
                $name = $_POST["namee"];
                $date = $_POST["datee"];
                $sql = "INSERT INTO `tasks`(`Name`, `Time`) VALUES('$name', '$date')";
                mysqli_query($conn, $sql);
                $sqlTime = "UPDATE `tasks` SET IsDone=0 WHERE Time < CURRENT_DATE";
                $result1 = mysqli_query($conn, $sqlTime);
            }
            mysqli_close($conn);
        }
        ?>
    </section>
    <main>
        <?php
        $conn = mysqli_connect("localhost", "root", "", "to_do");
        if ($conn->connect_error) {
            die("Failed to connect to database: " . mysqli_connect_error());
        } else {    
            $sql = "SELECT * FROM `tasks`";
            $result = mysqli_query($conn, $sql);
            $sqlTime = "UPDATE `tasks` SET IsDone=0 WHERE Time < CURRENT_DATE AND IsDone = NULL";
            $result1 = mysqli_query($conn, $sqlTime);
            echo "<ul>";
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<li id='" . $row["ID"] . "'><div class='container1'><p>" . $row["Name"] . "</p><p>" . $row["Time"] . "</p><p>";
                if ($row["IsDone"] == NULL) {
                    echo "Oczekuje";
                } else if ($row["IsDone"] == 0) {
                    echo "Zaległe";
                } else {
                    echo "Wykonane";
                }
                echo "</p></div><div class='container2'>";
                echo "<p><img src='check.png' alt='check'>";
                echo "<span class='nextP'>Mark as done</span></p>";
                echo "<p><img src='x.png' alt='delete'>";
                echo "<span class='nextP'>Delete</span></p>";
                echo "</div></li>";
            }
            echo "</ul>";
        }
        mysqli_close($conn);
        ?>
    </main>

</body>

</html>