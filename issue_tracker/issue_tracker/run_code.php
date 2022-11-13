<!-- get code data and execute it in gcc -->
<?php
// save the code locally
$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["code"]["name"]);
$uploadOk = 1;
$codeFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
print($codeFileType);
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
    echo "<h1>Output</h1>";
    echo "<pre>$output</pre>";
}
if ($codeFileType == "cpp") {
    $output = shell_exec("g++ uploads/".$_FILES["code"]["name"]." -o uploads/".$_FILES["code"]["name"].".out && uploads/".$_FILES["code"]["name"].".out");
    echo "<h1>Output</h1>";
    echo "<pre>$output</pre>";
}
if ($codeFileType == "py") {
    $output = shell_exec("python uploads/".$_FILES["code"]["name"]);
    echo "<h1>Output</h1>";
    echo "<pre>$output</pre>";
}
?>