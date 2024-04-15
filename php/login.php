<?php

include_once("get_language.php");

$lang = GetLanguage();
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

      $_SESSION["user_id"] = $user["user_id"];
      $_SESSION["email"] = $user["email"];
      $_SESSION["permission"] = $user["user_access_level"];

      if($user["user_access_level"] == 0){
        header("Location:  researchdashboard.php");
      } else if($user["user_access_level"] == 1){
        header("Location:  supervisordashboard.php");
      } else if($user["user_access_level"] == 2){
        header("Location:  index.php");
      } else if($user["user_access_level"] == 3){
        header("Location:  admindashboard.php");
      } else{
        header("Location:  index.php");
      }

    }
    else{
      $is_invalid = true;
      $error_msg_en = "Wrong Password";
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

    <div class="input-form-box">
      <form method="post">
        <?php if($lang == 'en'):?>
          <h1 style="padding-top: 120px; padding-bottom: 80px;" class="input-form-title";>Log In</h1>
        <?php else: ?>
          <h1 style="padding-top: 120px; padding-bottom: 80px;" class="input-form-title";>Log Masuk</h1>
        <?php endif ?>
          <div class="input-container">
            <input type="email" <?php if($lang == 'en'):?>placeholder="Email"<?php else:?>placeholder="E-mel"<?php endif;?> name="email" id="email" class="input-field"
                    value="<?= htmlspecialchars($_POST["email"] ?? "") ?>" required>
            <?php if($lang == 'en'):?>
                <label for="input-field" class="input-label">Enter Your Email</label>
            <?php elseif($lang == 'bm'):?>
                <label for="input-field" class="input-label">Masukkan Emel Anda</label>
            <?php endif;?>
            <span class="input-highlight"></span>
          </div>
        
          <div class="input-container" style="padding-top: 50px;">
            <input type="password" <?php if($lang == 'en'):?>placeholder="Password"<?php else:?>placeholder="Kata Laluan"<?php endif;?> name="password" id="password" class="input-field" required>
            <?php if($lang == 'en'):?>
                <label for="input-field" style="padding-top: 50px" class="input-label">Enter Your Password</label>
            <?php elseif($lang == 'bm'):?>
                <label for="input-field" class="input-label">Masukkan Kata Laluan Anda</label>
            <?php endif;?>
            <span class="input-highlight"></span>
          </div>

          <?php if ($is_invalid): ?>
            <?php if($lang == 'en'):?>
                <em style="color:red; margin-left: 45%;";><?php $error_msg_en ?></em>
            <?php elseif($lang == 'bm'):?>
                <em style="color:red; margin-left: 45%;";>Log masuk tidak sah</em>
            <?php endif; ?>
          <?php endif; ?>

          <div>
            <button type="submit" class="submit-btn" style="margin-top: 50px;">
                <?php if($lang == 'en'):?>Log In<?php else:?>Log Masuk<?php endif;?></button>
          </div>
      </form>

      <div style="margin-top: 80px; text-align: center; color: white;">
        <?php if($lang == 'en'):?>
            <p style="display:inline;">Don't have an account? <a href="register.php<?php echo '?lang='.$lang; ?>" style="color: #de9b1f">Register</a></p>
        <?php elseif($lang == 'bm'):?>
            <p style="display:inline;">Tiada akaun? <a href="register.php<?php echo '?lang='.$lang; ?>" style="color: #de9b1f">Daftar</a></p>
        <?php endif; ?>
        </div>
    </div>
</div>
</body>
</html>