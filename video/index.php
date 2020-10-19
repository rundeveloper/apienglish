<?php
  include("config.php");
  if (isset($_POST["upload"])){
    $userdir = "mp3/songs/";
    for($i=0; $i<count($_FILES['mp3']['name']); $i++) {
      $target_file = $userdir . basename($_FILES["mp3"]["name"][$i]);
      $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
      if(!file_exists($userdir)){
        mkdir($userdir, 0777, true);
        }

      $tmp_name = $_FILES["mp3"]["tmp_name"][$i];
      $name = basename($_FILES["mp3"]["name"][$i]);

      if (move_uploaded_file($tmp_name, $target_file)) {
      // your mysql connect code or you have to be included external file with $connect variable or just rename it
        $song = $_FILES["mp3"]["name"][0];
        $ubi = $target_file;
        $sql = sprintf("INSERT INTO videos (mp3,location) VALUES ('%s','%s')", mysqli_escape_string($con, $song),mysqli_escape_string($con, $ubi));
        $res = mysqli_query($con,$sql);

        echo "The file  has been uploaded.\n";
      } else {
        echo "Sorry, there was an error uploading your file.\n";
      }
  }
}
?>
<!DOCTYPE html>
<html>
  <head> </head>
  <body>
  <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post" enctype="multipart/form-data">
      <input type="file" name="mp3[]" multiple="true" >
      <input type="submit" name="upload" value="upload">
  </form>
  </body>
</html>
