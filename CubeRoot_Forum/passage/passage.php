<?php
  $get_passage_id = $_GET['passage_id'];
  $real_passage_id = $get_passage_id + 1;

  $mysql_link = mysqli_connect('localhost', 'root', 'Justin-20071106');
  if (!$mysql_link) {
    exit('数据库连接失败');
  }
  mysqli_set_charset($mysql_link, 'utf8');
  mysqli_select_db($mysql_link, 'cuberoot_forum');
  $sql_passage = "SELECT * FROM `forum_passage` WHERE `passage_id` = ".$real_passage_id;
  $obj_passage = mysqli_query($mysql_link, $sql_passage);
  $row_passage = mysqli_fetch_assoc($obj_passage);

  $sql_user = "SELECT * FROM `forum_user` WHERE `user_id` = ".$row_passage['passage_writer_id'];
  $obj_user = mysqli_query($mysql_link, $sql_user);
  printf(mysqli_error($mysql_link));
  $row_user = mysqli_fetch_assoc($obj_user);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $row_passage['passage_title']; ?></title>
  <link rel="stylesheet" href="../css/passage.css">
</head>
<body>
  <div class="passageTitle">
    <?php echo $row_passage['passage_title']; ?>
  </div>
  <div class="passageWriter">
    作者: <?php echo $row_user['username']; ?>
  </div>
  <?php echo '<pre class="passageText">'.$row_passage['passage_text'].'</pre>'; ?>
</body>
</html>

<?php
  mysqli_close($mysql_link);
?>