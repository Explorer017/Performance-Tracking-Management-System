<?php
$english = true;
include 'navbar.php';
include 'set_targets_function.php';

$section_number = $year = $target_amount = $highest_points = $lowest_points ="";
$section_number_error = $year_error = $target_amount_error = $highest_error = $lowest_error ="";
$valid_form = true;
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (empty($_POST["section_number"])) {
            $valid_form = false;
            $section_number_error = "Section number is required";
        } else {
            $section_number = $_POST["section_number"];
        }
        if (empty($_POST["year"])) {
            $valid_form = false;
            $year_error = "Year is required";
        } else {
            $year = $_POST["year"];
        }
        if (empty($_POST["target_amount"])) {
            $valid_form = false;
            $target_amount_error = "Target amount is required";
        } else {
            $target_amount = $_POST["target_amount"];
        }
        if (empty($_POST["lowest_points"])) {
            $valid_form = false;
            $lowest_error = "lowest points is required";
        } else {
            $lowest_points = $_POST["lowest_points"];
        }
        if (empty($_POST["highest_points"])) {
            $valid_form = false;
            $highest_error = "highest points is required";
        } else {
            $highest_points = $_POST["highest_points"];
        }

        if ($valid_form == true) {
            $done = set_targets($section_number, $year, $target_amount, $highest_points, $lowest_points);
            if ($done == true) {
                echo '<div class="alert alert-success" role="alert">Successfully added target</div>';
            }
            else{
                echo '<div class="alert alert-danger" role="alert">An error occurred while adding target</div>';
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
<body>
    <div class='container'>
        <h1>Set a target: </h1>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
            <div class="mb-3">
                <label for="targetSelect" class="form-label">Select Target: </label>
                <select class="form-select" aria-label="Default select example" name="section_number">
                    <option selected disabled>Select an option</option>
                    <option value="A">A6: Professional Affilliations/Membership (applicable to relevant fields and approved institutions)</option>
                    <option value="B">B: PROFESSIONAL ACHIEVEMENTS</option>
                    <option value="C1">C1: Lead New Research Proposal</option>
                    <option value="C2">C2: Research or Development Projects</option>
                    <option value="C3">C3: Research and Development Operations</option>
                    <option value="D">D: PROFESSIONAL CONSULTATIONS (Services to external parties with MIROS core functions)</option>
                    <option value="E1-2">E1 or E2: Guidelines/Manuals, Policy Papers, Products, Scientific Reports, Books and Proceedings</option>
                    <option value="E3-4-13">E3, E4 or E13: Journals, Patents, Copyrights and Trademarks</option>
                    <option value="E5-6">E5 or E6: Scientific and Technical Publications</option>
                    <option value="E7-8">E7 or E8: Papers in Proceedings of Conferences</option>
                    <option value="E9-10">E9 or E10: Research/Technical Articles in Bullatins/Magazines and Guidelines/Training Modules</option>
                    <option value="E11-12">E11 or E12: International Conference Presentations/National Conference/Seminar/Working Group Presentations/Technical Committee/ Meeting</option>
                    <option value="E14">E14: Knowledge Dissemination</option>
                    <option value="F3">F3: Research and Project Supervision </option>
                    <option value="F4">F4: Invited Speaker, Keynote Speaker, Session Chairman, Forum (Established External Events)</option>
                    <option value="F5">F5: Scientific and Technical Evaluation (including Research Proposal)</option>
                    <option value="F6">F6:Other Professional Recognition</option>
                    <option value="G">G: Services to Community</option>
                </select>
                <div><?php echo $section_number_error?></div>
            </div>
            <div class="mb-3">
                <label for="yearsInput" class="form-label">Year that Target should be applied to:</label>
                <input type="number" class="form-control" id="yearsInput" value="<?php echo date("Y"); ?>" name="year">
                <div><?php echo $year_error?></div>
            </div>
            <div class="mb-3">
                <label for="yearsInput" class="form-label">Target Amount:</label>
                <input type="number" class="form-control" id="yearsInput" value="1" name="target_amount">
            </div>
            <div class="mb-3">
                <label for="yearsInput" class="form-label">Lowest Points:</label>
                <input type="number" class="form-control" id="yearsInput" value="1" name="lowest_points">
            </div>
            <div class="mb-3">
                <label for="yearsInput" class="form-label">Highest Points:</label>
                <input type="number" class="form-control" id="yearsInput" value="1" name="highest_points">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</body>