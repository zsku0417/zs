<!DOCTYPE html>
<html>
<head>
<title>Community Forum</title>
<link rel="stylesheet" href="answer.css">
</head>
<body>

<?php
include('conn.php');
include('Header_Admin.php');
include('Footer.php');

$forum_id = $_GET['forum_id'];

$sql = "SELECT forum_id, p_id, p_name, file_name, question, answer FROM forum WHERE forum_id = $forum_id";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
?>

<div class="forum-container">

    <?php
    if($row['file_name'] != null) {
      echo '<div class="image">';
      echo '<img src="'.$row['file_name'].'" alt="Image">';
      echo '</div>';
    }
    ?>

  <div class="detail">

    <h2>Forum ID: <?php echo $row['forum_id']; ?></h2><br>
    <h2>Asked By: <?php echo $row['p_name'] . ' , Patient ID->' . $row['p_id']; ?></h2><br>

    <div class="question">
      <h2>Question:</h2>
      <p><?php echo $row['question']; ?></p>
    </div>

    <form action="insert_answer.php" method="post">
      <input type="hidden" name="forum_id" value="<?php echo $row['forum_id']; ?>">
      <label for="answer">Answer:</label>
      <textarea id="answer" name="answer" placeholder="Type here to answer this question" required><?php echo isset($row['answer']) ? $row['answer'] : ''; ?></textarea>
      <button type="submit">Submit Answer</button>
    </form>

  </div>
  
</div>

<?php
$conn->close();
?>

</body>
</html>