<?php
$fullname = $_POST['fullname'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$education = $_POST['education'];
$experience = $_POST['experience'];
$skills = $_POST['skills'];

// Upload image
$targetDir = "uploads/";
$photoName = basename($_FILES["photo"]["name"]);
$targetFile = $targetDir . $photoName;
move_uploaded_file($_FILES["photo"]["tmp_name"], $targetFile);

// Skills processing
$skillsArray = explode(",", $skills);
?>

<!DOCTYPE html>
<html>
<head>
    <title>CV</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="cv">

    <!-- LEFT -->
    <div class="left">
        <img src="<?php echo $targetFile; ?>" class="profile">
        <h1><?php echo $fullname; ?></h1>

        <p><?php echo $phone; ?></p>
        <p><?php echo $email; ?></p>
    </div>

    <!-- MIDDLE -->
    <div class="middle">
        <h2>Skills</h2>

        <?php
        foreach($skillsArray as $skill){
            $parts = explode(":", $skill);
            $name = trim($parts[0]);
            $percent = isset($parts[1]) ? $parts[1] : 50;
        ?>

        <div class="skill">
            <span><?php echo $name; ?></span>
            <div class="bar">
                <div class="fill" style="width: <?php echo $percent; ?>%"></div>
            </div>
        </div>

        <?php } ?>

        <h2>Education</h2>
        <p><?php echo nl2br($education); ?></p>
    </div>

    <!-- RIGHT -->
    <div class="right">
        <h2>Job Experience</h2>
        <p><?php echo nl2br($experience); ?></p>
    </div>

</div>

</body>
</html>