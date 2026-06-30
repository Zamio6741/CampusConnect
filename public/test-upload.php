<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    echo "<pre>";
    var_dump($_FILES);
    echo "</pre>";
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>PHP Upload Test</title>
</head>
<body>

<form method="POST" enctype="multipart/form-data">
    <input type="file" name="pdf">
    <button type="submit">Upload</button>
</form>

</body>
</html>