// 发帖超链接
function sendPostHref() {
  window.location.href = "sendPost.html";
}

// 菜单显示设置
document.getElementsByClassName('page')[0].setAttribute('style','display: block;');
function checkPage() {
  for (let j = 0; j <= document.getElementsByClassName('pageChoices').length - 1; j ++) {
    document.getElementsByClassName('page')[j].removeAttribute('style');
    if (document.getElementsByClassName('pageChoices')[j].hasAttribute('style','background-color: white')) {
      document.getElementsByClassName('page')[j].setAttribute('style','display: block');
    }
  }
}

// 文章超链接
function passageHref(l) {
  window.location.href = "passage/passage.php?passage_id=" + l;
}

// 选择热门文章的那几个点
var colors = ['red','orange','yellow','aqua','purple'];
document.getElementsByClassName('divChoosePictures')[0].setAttribute('style','background-color: blue;');
document.getElementsByClassName('hotPosts')[0].setAttribute('style','background-color: red;')
function hotPost(n) {
  for (let i = 0; i <= document.getElementsByClassName('divChoosePictures').length - 1; i ++) {
    if (document.getElementsByClassName('divChoosePictures')[i].hasAttribute('style','background-color: blue;')) {
      document.getElementsByClassName('divChoosePictures')[i].removeAttribute('style');
    }
    document.getElementsByClassName('divChoosePictures')[n].setAttribute('style','background-color: blue;');
    if (document.getElementsByClassName('divChoosePictures')[i].hasAttribute('style','background-color: blue;')) {
      document.getElementsByClassName('hotPosts')[0].removeAttribute('style');
      document.getElementsByClassName('hotPosts')[0].setAttribute('style','background-color: ' + colors[i] + ';');
    }
  }
}

// 菜单栏选择
document.getElementsByClassName('pageChoices')[0].setAttribute('style','background-color: white;');
function choosePage(m) {
  for (let j = 0; j <= document.getElementsByClassName('pageChoices').length - 1; j ++) {
    if (document.getElementsByClassName('pageChoices')[j].hasAttribute('style','background-color: white;')) {
      document.getElementsByClassName('pageChoices')[j].removeAttribute('style');
    }
    document.getElementsByClassName('pageChoices')[m].setAttribute('style','background-color: white;');
    if (document.getElementsByClassName('pageChoices')[j].hasAttribute('style','background-color: white;')) {
      // 显示不同页面
    }
  }
}