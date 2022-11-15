<!-- get code data and execute it in gcc -->
<link rel="stylesheet" href="css/bootstrap.min.css">
<a type="button" class="btn btn-primary text-right" href="index.php">Go Back</a><br><br>
<h2>File Status</h2>
<?php
// save the code locally
$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["code"]["name"]);
$uploadOk = 1;
$codeFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check file size
if ($_FILES["code"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
if($codeFileType != "c" && $codeFileType != "cpp" && $codeFileType != "py" && $codeFileType != "java" ) {
    echo "Sorry, only C, C++, Python and Java files are allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["code"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["code"]["name"]). " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
// execute the code
if ($codeFileType == "c") {
    $output = shell_exec("gcc uploads/".$_FILES["code"]["name"]." -o uploads/".$_FILES["code"]["name"].".out && uploads/".$_FILES["code"]["name"].".out");
    $error=shell_exec("gcc uploads/".$_FILES["code"]["name"]." -o uploads/".$_FILES["code"]["name"].".out 2>&1");
    echo "<h1>Output</h1>";
    echo "<h2><code>$output</code></h2>";
    echo "<h1>Error</h1>";
    echo "<h2><code>$error</code></h2>";
}
if ($codeFileType == "cpp") {
    $output = shell_exec("g++ uploads/".$_FILES["code"]["name"]." -o uploads/".$_FILES["code"]["name"].".out && uploads/".$_FILES["code"]["name"].".out");
    $error = shell_exec("g++ uploads/".$_FILES["code"]["name"]." -o uploads/".$_FILES["code"]["name"].".out 2>&1");
    echo "<h1>Output</h1>";
    echo "<h2><code>$output</code></h2>";
    echo "<h1>Error</h1>";
    echo "<h2><code>$error</code></h2>";
}
if ($codeFileType == "py") {
    $output = shell_exec("python3 uploads/".$_FILES["code"]["name"]);
    if ($output == "") {
        $output = "No Output";
    }
    $error=shell_exec("python3 uploads/".$_FILES["code"]["name"]." 2>&1");
    if ($error == "") {
        $error = "No Error";
    }
    echo "<h1>Output</h1>";
    echo "<h2><code>$output</code></h2>";
    echo "<h1>Error</h1>";
    echo "<h2><code>$error</code></h2>";
}

?>