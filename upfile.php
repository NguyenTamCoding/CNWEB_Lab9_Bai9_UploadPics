<!-- Student: Nguyen Van Thien Tam-25IT176-->
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Upload file</title>
<link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
    <div class="container">
        <h1>Upload File (jpg, gif, png, jpeg, webp)</h1>
<form action="" method="post" enctype="multipart/form-data" name="form1" id="form1">
<input type="hidden" name="MAX_FILE_SIZE" value="5000000"> <!-- maximum file size 5MB -->
<label>Upload
<input type="file" name="ufile" id="ufile" />
</label>
<p>
<input type="submit" name="upload" id="upload" value="Upload" />

</p>
</form>
    

<?php 
// folder upload
$target_path = "uploadPics/";

if(isset($_FILES['ufile']))
{
$target_path = $target_path . basename( $_FILES['ufile']['name']); 

//file type check
if ( !preg_match('/\.(jpg|gif|png|jpeg|webp)$/i',basename($_FILES['ufile']['name'] )) )
{ echo "Not an image file!";}
else 
// xu ly trung ten
	if (file_exists($target_path))
      {
      echo basename( $_FILES['ufile']['name']) . " already exists. ";}
	else 
if(move_uploaded_file($_FILES['ufile']['tmp_name'], $target_path)) {
    echo "The file ".  basename( $_FILES['ufile']['name']). " has been uploaded<br>";
    echo "File size: " . $_FILES['ufile']['size'] . " bytes<br>";
    echo "File type: " . $_FILES['ufile']['type'] . "<br>";
    //show upload image
    echo "<br><img src='" . $target_path . "' width='200' alt='Ảnh vừa upload' style='border: 1px solid #ccc; padding: 5px;'>";
    
}
	
} else{
    echo "There was an error uploading the file, please try again!";
}

?>
</div>

</body>
</html>
