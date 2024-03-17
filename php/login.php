<?php

$is_invalid = false;

if ($_SERVER["REQUEST_METHOD"] === "POST"){

  $conn = require __DIR__ .  "/db_conn.php";

  $sql = sprintf("SELECT * FROM user
            WHERE email = '%s'",
            $conn->real_escape_string($_POST["email"]));

  $result = $conn->query($sql);
  $user = $result->fetch_assoc();

  if ($user){
    if (password_verify($_POST["password"], $user["password"])){
            
      session_start();
      session_regenerate_id();

      $_SESSION["user_id"] = $user["userID"];
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
    <link rel="shortcut icon" href="../img/miros-M.png" />
    <link rel="stylesheet" href="../css/style.css"/>
    <meta charset="utf-8">
</head>

<body>
    <form method="post">
        <div class="input-form-box">
        <h1 style="text-align: center";>Log In</h1>
          <div class="input-container">
            <input type="email" placeholder="Email" name="email" id="email" class="input-field"
                    value="<?= htmlspecialchars($_POST["email"] ?? "") ?>" required>

            <label for="input-field" class="input-label">Enter Your Email</label>
            <span class="input-highlight"></span>
          </div>
        
          <div class="input-container">
            <input type="password" placeholder="Password" name="password" id="password" class="input-field" required>

            <label for="input-field" class="input-label">Enter Your Password</label>
            <span class="input-highlight"></span>
          </div>

          <?php if ($is_invalid): ?>
            <em style="color:red";>Invalid login</em>
          <?php endif; ?>

          <div>
            <button type="submit" class="submit-btn";>Log In</button>
          </div>
        </div>

      </form>

</body>
</html>