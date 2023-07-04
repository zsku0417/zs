<?php
include('Header_Login.php');
include('conn.php');

if (isset($_POST["submit"])) {
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    $uploaderid = $user_id;
    $uploaderName = $username;
    $question = $_POST["question"];

    // Check if a file has been uploaded
    if(!empty($_FILES["fileToUpload"]["tmp_name"])) {
        $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
        if($check === false) {
            echo'<script>alert("File is not an image.");
            window.location.href = "Discussion_Wall.php";
            </script>';
            $uploadOk = 0;
        }

        if (file_exists($target_file)) {
            echo'<script>alert("Sorry, file already exists.");
            window.location.href = "Discussion_Wall.php";
            </script>';
            $uploadOk = 0;
        }

        if ($_FILES["fileToUpload"]["size"] > 500000) {
            echo'<script>alert("Sorry, your file is too large.");
            window.location.href = "Discussion_Wall.php";
            </script>';
            $uploadOk = 0;
        }

        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            && $imageFileType != "gif" ) {
            echo'<script>alert("Sorry, only JPG, JPEG, PNG & GIF files are allowed.");
            window.location.href = "Discussion_Wall.php";
            </script>';
            $uploadOk = 0;
        }
    }

    if ($uploadOk == 0) {
        echo'<script>alert("Error! Please Try Again");
        window.location.href = "Discussion_Wall.php";
        </script>';
    } else {
        if (!empty($_FILES["fileToUpload"]["tmp_name"]) && move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
            $sql = "INSERT INTO forum (p_id, p_name, file_name, question) VALUES ('$uploaderid', '$uploaderName', '$target_file', '$question')";
            if ($conn->query($sql) === TRUE) {
                echo "<script>alert('Question Updated! Please Wait our doctor to reply you.'); window.location.href = 'Discussion_Wall.php';</script>";
            } else {
                echo'<script>alert("Error! Please Try Again");
                window.location.href = "Discussion_Wall.php";
                </script>';
            }
        } else {
            // If no file has been uploaded or if there was an error uploading the file
            $sql = "INSERT INTO forum (p_id, p_name, question) VALUES ('$uploaderid', '$uploaderName', '$question')";
            if ($conn->query($sql) === TRUE) {
                echo "<script>alert('Question Updated! Please Wait our doctor to reply you.'); window.location.href = 'Discussion_Wall.php';</script>";
            } else {
                echo'<script>alert("Error! Please Try Again");
                window.location.href = "Discussion_Wall.php";
                </script>';
            }
        }
    }
}
?>


