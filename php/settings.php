<?php include ("NavBar.php");
 include ("function.php");

 $userid = $_SESSION["user_id"];
 $conn = require __DIR__ .  "/db_conn.php";

 $sql = sprintf("SELECT * FROM user
           WHERE user_id = $userid");
 $result = $conn->query($sql);

 $user = $result->fetch_assoc();
?>

<head>
<link rel='stylesheet' href='../css/style.css' />
</head>

<body>
<div style="margin: 10px;">
      <div>
      <?php if ($lang == 'en'):?>
      <h2><u>Your Details</u></h2>
      <h3>Name: <?php echo $user["first_name"] . $user["last_name"]?></h3>
      <h3>Email: <?php echo $user["email"]?></h3>
      <h3>Account type: <?php echo get_access_level($user["user_access_level"])?></h3>
      <?php else: ?>
      <h2><u>Butiran Anda</u></h2>
      <h3>Nama: <?php echo $user["first_name"] . $user["last_name"]?></h3>
      <h3>Emel: <?php echo $user["email"]?></h3>
      <h3>Jenis Akaun: <?php echo get_access_level($user["user_access_level"])?></h3>
      <?php endif; ?>        
      </div>
<div>
    