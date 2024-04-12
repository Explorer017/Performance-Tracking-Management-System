<?php
    $english = true;
    include 'navbar.php';
    include 'edit_user_function.php';

    $userid = $_GET['userid'];
    if(isset($userid)){
        $user = getUser($userid);
    }
    $user_access_level = $user['user_access_level'];
    if ($user_access_level == 0) {
        $higher_users = getSupervisors();
    } else if ($user_access_level == 1) {
        $higher_users = getManagers();
    }

    $valid_form = true;
    $first_name = $middle_name = $last_name = $access_level = $email = $higher_user_id = "";
    $first_name_error = $middle_name_error = $last_name_error = $access_level_error = $email_error = $higher_user_id_error = "";
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (empty($_POST["first_name"])) {
            $valid_form = false;
            $first_name_error = "First Name is required";
        } else {
            $first_name = htmlspecialchars($_POST["first_name"]);
        }
        // middle name is not required
        if (empty($_POST["last_name"])) {
            $valid_form = false;
            $last_name_error = "Last Name is required";
        } else {
            $last_name = htmlspecialchars($_POST["last_name"]);
        }
        // access level cannot be empty
        /*
        if (empty($_POST["access_level"])) {
            $valid_form = false;
            $access_level_error = "Access Level is required";
        } else { */
            $access_level = htmlspecialchars($_POST["access_level"]);
        /*} */
        if (empty($_POST["email"])) {
            $valid_form = false;
            $email_error = "Email is required";
        } else {
            $email = htmlspecialchars($_POST["email"]);
        }
        // higher user id can be null
        $higher_user_id = htmlspecialchars($_POST["higher_user"]);
        if ($valid_form) {
            $done = editUser($userid, $first_name, $middle_name, $last_name, $access_level, $email, $higher_user_id);
            $user = getUser($userid);
            if ($done) {
                echo '<div class="alert alert-success" role="alert">Successfully edited user</div>';
            } else {
                echo '<div class="alert alert-danger" role="alert">An error occurred while editing user</div>';

            }
        }
    }
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href= "../css/style.css">
    <title>Set targets</title>
</head>
<?php if (isset($userid)):?>
    <body>
    <div class='container'>
        <h1>Modify a user: </h1>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]).'?userid='.$_GET['userid'];?>" method="post">
            <div class="mb-3">
                <label for="first_name" class="form-label">First Name: </label>
                <input type="text" class="form-control" id="first_name" name="first_name" placeholder="First Name" value="<?php echo $user['first_name']?>"/>
                <div><?php echo $first_name_error?></div>
            </div>
            <div class="mb-3">
                <label for="middle_name" class="form-label">Middle Name: </label>
                <input type="text" class="form-control" id="middle_name" name="middle_name" placeholder="Middle Name" value="<?php echo $user['middle_name']?>"/>
                <div><?php echo $middle_name_error?></div>
            </div>
            <div class="mb-3">
                <label for="last_name" class="form-label">Last Name: </label>
                <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Last Name" value="<?php echo $user['last_name']?>"/>
                <div><?php echo $last_name_error?></div>
            </div>
            <div class="mb-3">
                <label for="access_level" class="form-label">Access Level: </label>
                <select class="form-select" id="access_level" name="access_level">
                    <?php if ($user['user_access_level'] == 1): ?>
                        <option value="0">Research Officer</option>
                        <option value="1" selected>Supervisor</option>
                        <option value="2">Manager</option>
                        <option value="3">Admin</option>
                    <?php elseif ($user['user_access_level'] == 2): ?>
                        <option value="0">Research Officer</option>
                        <option value="1">Supervisor</option>
                        <option value="2" selected>Manager</option>
                        <option value="3">Admin</option>
                    <?php elseif ($user['user_access_level'] == 3): ?>
                        <option value="0">Research Officer</option>
                        <option value="1">Supervisor</option>
                        <option value="2">Manager</option>
                        <option value="3" selected>Admin</option>
                    <?php else: ?>
                    <option value="0" selected>Research Officer</option>
                    <option value="1">Supervisor</option>
                    <option value="2">Manager</option>
                    <option value="3">Admin</option>
                    <?php endif;?>
                </select>
                <div><?php echo $access_level_error?></div>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email: </label>
                <input type="text" class="form-control" id="email" name="email" placeholder="Email" value="<?php echo $user['email']?>"/>
                <div><?php echo $email_error?></div>
            </div>
            <?php if ($user_access_level == 0): ?>
            <div class="mb-3">
                <label for="email" class="form-label">Supervisor: </label>
                    <select class="form-select" id="higher_user" name="higher_user">
                        <?php foreach($higher_users as $higher_user){
                            if ($user['higher_user_id'] == $higher_user['user_id']){?>
                                <option value="<?php echo $higher_user['user_id']?>" selected><?php echo $higher_user['first_name'] ?> <?php echo $higher_user['last_name'] ?> (<?php echo $higher_user['email'] ?>)</option>
                            <?php } else{?>
                                <option value="<?php echo $higher_user['user_id']?>"><?php echo $higher_user['first_name'] ?> <?php echo $higher_user['last_name'] ?> (<?php echo $higher_user['email'] ?>)</option>
                        <?php }?>
                        <?php }?>
                    </select>
                <div><?php echo $email_error?></div>
            </div>

            <?php elseif ($user_access_level == 1): ?>
            <?php elseif ($user_access_level == 2): ?>
            <?php elseif ($user_access_level == 3): ?>
            <input type="hidden" name="higher_user_id" value="<?php echo $user['higher_user_id']?>"/>
            <?php endif;?>


            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
    </body>
<?php else:?>
    <body>
    <div class="container">
        no user
    </div>
    </body>
<?php endif; ?>
