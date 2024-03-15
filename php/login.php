<?php

$is_invalid = false;

if ($_SERVER["REQUEST_METHOD"] === "POST"){

  $conn = require __DIR__ .  "/SQL/db_conn.php";

  $sql = sprintf("SELECT * FROM user
            WHERE userID = '%s'",
            $conn->real_escape_string($_POST["username"]));

  $result = $conn->query($sql);
  $user = $result->fetch_assoc();

  if ($user){
    if (password_verify($_POST["password"], $user["password"])){
            
      session_start();
      session_regenerate_id();

      $_SESSION["user_id"] = $user["userID"];
      $_SESSION["username"] = $user["username"];

      header("Location:  homepage.php");

      exit;

    }
    else{
      $is_invalid = true;
    }
  }
  
  else{
    $is_invalid = true;
  }
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>MIROS - Log In</title>
    <link rel="shortcut icon" href="img/miros-M.png" />
    <link rel="stylesheet" href="style.css" />
    <meta charset="utf-8">
</head>

<body>

    <h1>Log In</h1>

    <form method="post">
        <div>
          <div>
            <input type="text" placeholder="Username" name="username" id="username" 
                    value="<?= htmlspecialchars($_POST["username"] ?? "") ?>" required>
          </div>
        
          <div>
            <input type="password" placeholder="Password" name="password" id="password" required>
          </div>

          <?php if ($is_invalid): ?>
            <em style="color:red";>Invalid login</em>
          <?php endif; ?>

          <div>
            <button type="submit";>Log In</button>
          </div>
        </div>

      </form>

</body>
</html>