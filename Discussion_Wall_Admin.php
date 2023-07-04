<?PHP 
include('Header_Admin.php');
include('Footer.php');
include('conn.php');
?>

<!DOCTYPE html>
<html>
<head>
<title>Community Forum</title><link rel="stylesheet" href="Discussion_Wall_Ad.css">
</head>
<body>

<div class='title'>
<h1>Forum</h1>
</div>

<div class="search">
  <form method="post">
    <label for="answer-status">Filter by Answer Status:</label>
    <select name="answer-status" id="answer-status">
      <option value="all">All Questions</option>
      <option value="unanswered">Unanswered Questions</option>
      <option value="answered">Answered Questions</option>
    </select>
    <button type="submit" name="search">Search</button>
  </form>
</div>

<div class="comment">
  <?php


function generateActionLinks($row) {
  $deleteLink = '<a class=\'delete\' href="delete_forum.php?forum_id=' . $row['forum_id'] . '" onClick="return confirm(\'Delete Forum ID->' . $row['forum_id'] . '\npatient name-> '. $row['p_name'] . '\npatient id-> '. $row['p_id'] . '\nforum?\');">Delete</a>';
  return $deleteLink;
}

  if (isset($_POST['search'])) {
    $answerStatus = $_POST['answer-status'];

    if ($answerStatus === 'unanswered') {
      $sql = "SELECT forum_id, p_id, p_name, file_name, question, answer, a_name FROM forum WHERE answer IS NULL";
    } else if ($answerStatus === 'answered') {
      $sql = "SELECT forum_id, p_id, p_name, file_name, question, answer, a_name FROM forum WHERE answer IS NOT NULL";
    } else {
      $sql = "SELECT forum_id, p_id, p_name, file_name, question, answer, a_name FROM forum";
    }
  } else {
    $sql = "SELECT forum_id, p_id, p_name, file_name, question, answer, a_name FROM forum";
  }

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
      echo '<div class="actions-container">';
      echo '<a class="action-btn" href="answer.php?forum_id=' . $row['forum_id'] . '">Answer</a>';
      echo '<p>' . generateActionLinks($row) . '</p>';
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