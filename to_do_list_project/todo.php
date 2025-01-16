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
            if(isset($_POST["namee"]) && !empty($_POST["datee"])){
                $conn = mysqli_connect("localhost", "root", "", "to_do");
                if($conn -> connect_error){
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
          <?php
              $conn = mysqli_connect("localhost", "root", "", "to_do");
              if($conn -> connect_error){
                  die("Failed to connect to database: " . mysqli_connect_error());
              }
              else{
                  $sql = "SELECT * FROM `tasks`";
                  $result = mysqli_query($conn, $sql);
                  echo "<ul>";
                  while($row = mysqli_fetch_assoc($result)){
                      echo "<li><div class='container1'><p>" . $row["Name"] . "</p><p>" . $row["Time"] . "</p><p>";
                      if($row["IsDone"] == NULL){
                          echo "Oczekuje";
                      }
                      else if($row["IsDone"] == 0){
                          echo "Zaległe";
                      }
                      else{
                          echo "Wykonane";
                      }
                      echo "</p></div><div class='container2'>";
                      echo "<p><img src='check.png' alt='check'></p>";
                      echo "<p class='nextP'>Mark as done</p>";
                      echo "<p><img src='x.png' alt='delete'></p>";
                      echo "<p class='nextP'>Delete</p>";
                      echo "</div></li>";
                  }
                  echo "</ul>";
              }
          ?>
    </main>
</body>
</html>
