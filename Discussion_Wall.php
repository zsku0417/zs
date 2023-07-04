<?PHP 
include('Header_Login.php');
include('Footer.php');
include('Hoverable_Nav.php');
include('conn.php');
?>

<!DOCTYPE html>
<html>
<head>
<title>Community Forum</title>
<link rel="stylesheet" href="Discussion_Wall.css">
</head>
<body>

<div class="form-container">
  <form action="insert_forum.php" method="post" enctype="multipart/form-data">

  <h1>Drop Your Query Here</h1>

    <label for="fileToUpload">Select a file to upload:</label>
    <input type="file" name="fileToUpload" id="fileToUpload">

    <label for="query">Question:</label>
    <input type="text" name="question" id="question" placeholder='Type your Query Here' required>


    <input type="submit" value="Submit" name="submit">
  </form>
</div>

<div class='title'>
<h1>Forum</h1>
</div>

<div class="comment">
  <?php
  $sql = "SELECT forum_id, p_id, p_name, file_name, question, answer, a_name FROM forum";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
      echo '<div class="forum-container">';
      
      // check if file_name has a value
      if ($row["file_name"]) {
        echo '<div class="image">';
        echo '<img src="' . $row["file_name"] . '" alt="Image">';
        echo '</div>';
      }
      
      echo '<div class="detail">';
      echo '<h2>Forum ID: ' . $row["forum_id"] . '</h2>';
      echo '<div class="question">';
      echo '<h2>Question</h2>';
      echo '<p>' . $row["question"] . '</p>';
      echo '</div>';
      echo '<div class="answer">';
      echo '<h2>Answer</h2>';
      if ($row["a_name"]) {
        echo '<p><span>' . $row["a_name"] . ':</span> ' . $row["answer"] . '</p>';
      } else {
        echo '<p>Not any answer yet</p>';
      }
      echo '</div>';
      echo '<p>Asked by ' . $row["p_name"] . '</p>';
      echo '</div>';
      echo '</div>';
    }
  } else {
    echo "No any forum yet.";
  }
  $conn->close();
  ?>
</div>


</body>
</html>
