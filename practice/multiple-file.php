<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <form action="./upload-photos.php" method="post" enctype="multipart/form-data">
    <input type="file" name="photos[]" multiple accept="image/jpeg,image/png,image/webp">
    <br>
    <input type="submit">
  </form>
</body>
</html>