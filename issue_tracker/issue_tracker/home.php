<h1>Welcome to Issue Tracker System</h1>
<h2>!!!This is in beta stage<h2>
<h2>Run Code</h2>
<form action="run_code.php" method="post" enctype="multipart/form-data">
  Select Code to upload:
  <input type="file" name="code" id="code" class="form-control">
  <input type="submit" value="Upload Code" name="submit">
  <?php
  // display the file contents which was uploaded
  if (isset($_POST['submit'])) {
    $file = $_FILES['code']['tmp_name'];
    $fileContents = file_get_contents($file);
    echo $fileContents;
  }
  ?>

</form>
</form>
<form action="phpeditor.php" method="post">
  <input type="submit" value="PHP Editor" name="submit">
</form>