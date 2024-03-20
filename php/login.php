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
      header("Location:  home.php");
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

<div style="display: flex; height:100%";>
    <img src="../img/miros-logo.png" alt="Logo"
        style="width: 450px; height:150px; margin-left: 75px; margin-top: 75px;">

    <div class="input-form-box shadow">
      <form method="post">
        <h1 style="padding-top: 120px; padding-bottom: 80px;" class="input-form-title";>Log In</h1>
          <div class="input-container">
            <input type="email" placeholder="Email" name="email" id="email" class="input-field"
                    value="<?= htmlspecialchars($_POST["email"] ?? "") ?>" required>

            <label for="input-field" class="input-label">Enter Your Email</label>
            <span class="input-highlight"></span>
          </div>
        
          <div class="input-container" style="padding-top: 50px;">
            <input type="password" placeholder="Password" name="password" id="password" class="input-field" required>

            <label for="input-field" style="padding-top: 50px" class="input-label">Enter Your Password</label>
            <span class="input-highlight"></span>
          </div>

          <?php if ($is_invalid): ?>
            <em style="color:red";>Invalid login</em>
          <?php endif; ?>

          <div>
            <button type="submit" class="submit-btn" style="margin-top: 50px;">Log In</button>
          </div>
      </form>

      <div style="margin-top: 80px; text-align: center; color: white;">
            <p style="display:inline;">Don't have an account? <a href="register.php" style="color: #de9b1f">Register</a></p>
      </div>
    </div>
</div>
</body>
</html>