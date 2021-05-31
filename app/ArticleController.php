<?php
class APP__UsrArticleController {
  private APP__ArticleService $articleService;

  public static function getViewPath($viewName) {
    return $_SERVER['DOCUMENT_ROOT'] . '/' . $viewName . '.view.php';
  }

  public function __construct() {
    $this->articleService = new APP__ArticleService();
  }

  public function actionShowWrite() {
    require_once static::getViewPath("usr/article/write");
  }

  public function actionDoWrite() {
    $title = getStrValueOr($_GET['title'], "");
    $body = getStrValueOr($_GET['body'], "");

    if ( !$title ) {
      jsHistoryBackExit("제목을 입력해주세요.");
    }

    if ( !$body ) {
      jsHistoryBackExit("내용을 입력해주세요.");
    }

    $id = $this->articleService->writeArticle($title, $body);

    jsLocationReplaceExit("detail.php?id=${id}", "${id}번 게시물이 생성되었습니다.");
  }

  public function actionShowList() {
    $articles = $this->articleService->getForPrintArticles();

    require_once static::getViewPath("usr/article/list");
  }

  public function actionShowDetail() {
    $id = getIntValueOr($_GET['id'], 0);

    if ( $id == 0 ) {
      jsHistoryBackExit("번호를 입력해주세요.");
    }
    
    $article = $this->articleService->getForPrintArticleById($id);

    if ( $article == null ) {
      jsHistoryBackExit("${id}번 게시물은 존재하지 않습니다.");
    }

    require_once static::getViewPath("usr/article/detail");
  }

  public function actionShowModify() {
    $id = getIntValueOr($_GET['id'], 0);

    if ( $id == 0 ) {
      jsHistoryBackExit("번호를 입력해주세요.");
    }

    $article = $this->articleService->getForPrintArticleById($id);

    if ( $article == null ) {
      jsHistoryBackExit("${id}번 게시물은 존재하지 않습니다.");
    }

    require_once static::getViewPath("usr/article/modify");
  }
}