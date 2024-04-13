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
<div class = "centre">
<div style="margin: 10px;">
      <div>
      <?php if ($lang == 'en'):?>
      <h2><u>Your Details</u></h2>
      <h3>Name: <?php echo $user["first_name"] . " " . $user["last_name"]?></h3>
      <h3>Email: <?php echo $user["email"]?></h3>
      <h3>Account type: <?php echo get_access_level($user["user_access_level"])?></h3>
      <br><br>
      <h2><u>Your Points:</u></h2>
      <?php echo $user["points"]?>

      <?php else: ?>
      <h2><u>Butiran Anda</u></h2>
      <h3>Nama: <?php echo $user["first_name"] . $user["last_name"]?></h3>
      <h3>Emel: <?php echo $user["email"]?></h3>
      <h3>Jenis Akaun: <?php echo get_access_level_bm($user["user_access_level"])?></h3>
      <br><br>
      <h2><u>Mata Anda:</u></h2>
      <?php echo $user["points"]?>
      <?php endif; ?>        
      </div>
<div>

<div id="logout-footer">
<a href = "logout.php<?php echo '?lang='.$lang; ?>">
    <button class="Btn">
    
    <div class="sign"><svg viewBox="0 0 512 512"><path d="M377.9 105.9L500.7 228.7c7.2 7.2 11.3 17.1 11.3 27.3s-4.1 20.1-11.3 27.3L377.9 406.1c-6.4 6.4-15 9.9-24 9.9c-18.7 0-33.9-15.2-33.9-33.9l0-62.1-128 0c-17.7 0-32-14.3-32-32l0-64c0-17.7 14.3-32 32-32l128 0 0-62.1c0-18.7 15.2-33.9 33.9-33.9c9 0 17.6 3.6 24 9.9zM160 96L96 96c-17.7 0-32 14.3-32 32l0 256c0 17.7 14.3 32 32 32l64 0c17.7 0 32 14.3 32 32s-14.3 32-32 32l-64 0c-53 0-96-43-96-96L0 128C0 75 43 32 96 32l64 0c17.7 0 32 14.3 32 32s-14.3 32-32 32z"></path></svg></div>
    <?php if ($lang == 'en'): ?>
        <div class="text">Logout</div>
    <?php else: ?>
        <div class="text">Log keluar</div>
    <?php endif ?>
    </button>
</a>
</div>
</div>

</body>

