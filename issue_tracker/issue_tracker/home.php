
<h1 class="display-1">Welcome to Issue Tracking System</h1>
<h2 class="display-2"><code>Run Code</code></h2>
<form action="run_code.php" method="post" enctype="multipart/form-data">
  Select Code to upload:
  <input type="file" name="code" id="code" class="form-control">
  <input type="submit" class="btn btn-primary" value="Upload Code" name="submit">
  <?php
  // display the file contents which was uploaded
  if (isset($_POST['submit'])) {
    $file = $_FILES['code']['tmp_name'];
    $fileContents = file_get_contents($file);
    echo $fileContents;
  }
  ?>

</form>
</form><br>
<br>
<h2 class="display-2"><code>Code Editor</code></h2>
<form action="phpeditor.php" method="post">
  <input type="submit" value="PHP Editor" class="btn btn-primary btn-lg btn-dark" name="submit">
</form> 