<?php
$pageTitleIcon = '<i class="fas fa-pen"></i>';
$pageTitle = "게시물 작성";
?>
<?php require_once __DIR__ . "/../head.php"; ?>

<section class="secion-article-write">
  <div class="container mx-auto">
    <div class="con-pad">
      <script>
      let ArticleDoWrite__submitFormDone = false;
      function ArticleDoWrite__submitForm(form) {
        if ( ArticleDoWrite__submitFormDone ) {
          return;
        }

        form.title.value = form.title.value.trim();

        if ( form.title.value.length == 0 ) {
          alert('제목을 입력해주세요.');
          form.title.focus();

          return;
        }

        if ( form.body.value.length == 0 ) {
          alert('내용을 입력해주세요.');
          form.body.focus();

          return;
        }

        form.submit();
        ArticleDoWrite__submitFormDone = true;
      }
      </script>
      <form action="doWrite" method="POST" onsubmit="ArticleDoWrite__submitForm(this); return false;">
        <div>
          <span>제목</span>
          <input placeholder="제목을 입력해주세요." type="text" name="title"> 
        </div>
        <div>
          <span>내용</span>
          <textarea class="w-full p-4 h-96" placeholder="내용을 입력해주세요." name="body"></textarea>
        </div>
        <div>
          <input type="submit" value="글작성">
        </div>
      </form>
    </div>
  </div>
</div>

<?php require_once __DIR__ . "/../foot.php"; ?>