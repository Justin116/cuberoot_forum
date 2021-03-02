<!--连接数据库-->
<?php
  $mysql_link = mysqli_connect('localhost', 'root', 'Justin-20071106');
  if (!$mysql_link) {
    exit('数据库连接失败');
  }
  mysqli_set_charset($mysql_link, 'utf8');
  mysqli_select_db($mysql_link, 'cuberoot_forum');
  $sql_passage = "SELECT * FROM `forum_passage`;";
  $obj_passage = mysqli_query($mysql_link, $sql_passage);
  $sql_user = "SELECT * FROM `forum_user`;";
  $obj_user = mysqli_query($mysql_link, $sql_user);

  $rows_users = [];
  while ($row_user = mysqli_fetch_assoc($obj_user)) {
    $row_user_keys = array_keys($row_user);
    $row_user_array = [];
    for ($i = 0; $i <= count($row_user_keys) - 1; $i ++) {
      $row_user_array[$row_user_keys[$i]] = $row_user[$row_user_keys[$i]];
    }
    array_push($rows_users, $row_user_array);
  }
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CubeRoot Forum</title>
    <link rel="stylesheet" href="css/index.css">
  </head>
  <body>
    <div class="sendPost" onclick="sendPostHref()">发布帖子</div>
    <div class="hotPosts">
      <ul class="choosePictures">
        <div class="divChoosePictures" onclick="hotPost(0)"></div>
        <div class="divChoosePictures" onclick="hotPost(1)"></div>
        <div class="divChoosePictures" onclick="hotPost(2)"></div>
        <div class="divChoosePictures" onclick="hotPost(3)"></div>
        <div class="divChoosePictures" onclick="hotPost(4)"></div>
      </ul>
    </div>
    <header>
      <div class="insideHeaderBlank" onclick="checkPage()">
        <div class="pageChoices" onclick="choosePage(0)">主页</div>
        <div class="pageChoices" onclick="choosePage(1)">消息</div>
        <div class="pageChoices" onclick="choosePage(2)">我</div>
      </div>
    </header>
    <div class="page">
      <div class="passages">
        <?php
          $count = 0;
          while ($row_passage = mysqli_fetch_assoc($obj_passage)) {
            echo '<div class="passage">';
                echo '<div class="passageTitle" onclick="passageHref('.$count.')">'.$row_passage['passage_title'].'</div>';
                echo '<div class="passageWriter">发布人: '.$rows_users[$row_passage['passage_writer_id'] - 1]['username'].'</div>';
              echo '<div class="passageInfos">';
                echo '<div class="passageTime">发布时间: '.$row_passage['passage_time'].'</div>';
                echo '<div class="passageViews">查看数: '.$row_passage['passage_views'].'</div>';
                echo '<div class="passageLikes">点赞数: '.$row_passage['passage_likes'].'</div>';
                echo '<div class="passageComments">评论数: '.$row_passage['passage_comments'].'</div>';
                echo '<div class="passageShares">转发数: '.$row_passage['passage_shares'].'</div>';
              echo '</div>';
            echo '</div>';
            $count ++;
          }
        ?>
      </div>
    </div>
    <div class="page">
      消息页
    </div>
    <div class="page">
      我页
    </div>
    <script src="js/index.js"></script>
  </body>
</html>

<?php
  mysqli_close($mysql_link);
?>
