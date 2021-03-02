<?php
  $POST_info = $_POST;

  $mysql_link = mysqli_connect('localhost', 'root', 'Justin-20071106');
  if (!$mysql_link) {
    exit('数据库连接失败');
  }
  mysqli_set_charset($mysql_link, 'utf8');
  mysqli_select_db($mysql_link, 'cuberoot_forum');
  $sql = "INSERT INTO `forum_passage` (passage_title, passage_writer_id, passage_time, passage_text) VALUES ('".$POST_info['passage_title']."', ".$POST_info['current_user'].", '".date('Y-m-d H:i:s')."', '".$POST_info['passage_text']."');";
  $obj = mysqli_query($mysql_link, $sql);

  if ($obj && mysqli_affected_rows($mysql_link)) {
    echo '<h3>发布成功!</h3><br/><a href="../index.php">返回主页</a>';
  }
  else {
    echo '<h3>发布失败<h3><br/><a href="../index.php">返回主页</a>';
  }
?>

<?php
  mysqli_close($mysql_link);
?>