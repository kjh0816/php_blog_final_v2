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
}