<?php


$target_dir = "uploads/";
$uploadOk = 1;

$imageFileType=substr($_FILES["fileToUpload"]["name"],strrpos($_FILES["fileToUpload"]["name"],'.')+1,strlen($_FILES["fileToUpload"]["name"]));

$file_name = md5(time());
$file_name =substr($file_name, 0, 10).".".$imageFileType;

$target_file=$target_dir.$file_name;

    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }


if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}
if ($_FILES["fileToUpload"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
if($imageFileType !== "jpg" && $imageFileType !== "png" && $imageFileType !== "gif" && $imageFileType !== "jpeg"  ) {
    echo "Sorry, only jpg,png,gif,jpeg are allowed.";
    $uploadOk = 0;
}
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "The file $file_name  has been uploaded to ./uploads/";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
?>
