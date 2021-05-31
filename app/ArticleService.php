<?php
class APP__ArticleService {
  private APP__ArticleRepository $articleRepository;

  public function __construct() {
    $this->articleRepository = new APP__ArticleRepository();
  }

  public function getForPrintArticles(): array {
    return $this->articleRepository->getForPrintArticles();
  }

  public function getForPrintArticleById(int $id): array {
    return $this->articleRepository->getForPrintArticleById($id);
  }
}