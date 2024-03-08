<?php

$is_invalid = false;

if ($_SERVER["REQUEST_METHOD"] === "POST"){

  $conn = require __DIR__ .  "/SQL/db_conn.php";

  $sql = sprintf("SELECT * FROM user
            WHERE userID = '%s'",
            $conn->real_escape_string($_POST["email"]));

  $result = $conn->query($sql);

  $user = $result->fetch_assoc();

  if ($user){

    if (password_verify($_POST["password"], $user["password"])){
            
      session_start();

      session_regenerate_id();

      $_SESSION["user_id"] = $user["profileid"];
      $_SESSION["email"] = $user["email"];



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
<link rel="shortcut icon" href="" />
<link rel="stylesheet" href="style.css" />
<meta charset="utf-8">
</head>

<body>

    <h1>Log In</h1>

    <form method="post">
        <div>
          <div>
            <input type="email" placeholder="Email" name="email" id="email" 
                    value="<?= htmlspecialchars($_POST["email"] ?? "") ?>" required>
          </div>
        
          <div>
            <input type="password" placeholder="Password" name="password" id="password" required>
          </div>

          <?php if ($is_invalid): ?>
            <em style="color:red";>Invalid login</em>
          <?php endif; ?>

          <div style="text-align: center;">
          <button type="submit" style="background-color: rgb(21, 135, 192)";>Log In</button>
        </div>

      </form>

</body>
</html>