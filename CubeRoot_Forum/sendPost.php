<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/sendPost.css">
  <title>Send Post</title>
</head>
<body>
  <div class="title">发布帖子</div>
  <div class="sendPostBoard">
    <form action="php/insertPassage.php" method="POST">
      <input type="text" name="passage_title" class="passageTitle" placeholder="请输入文章标题" title="文章标题"><br/>
      <textarea name="passage_text" class="passageText" placeholder="请输入文章内容" title="文章内容"></textarea>
      <input type="submit" value="发布" class="submit">
      <input type="hidden" name="current_user" value="1">
    </form>
  </div>
  <script src="js/sendPost.js"></script>
</body>
</html>