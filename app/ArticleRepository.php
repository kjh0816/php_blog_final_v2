<?php
class APP__ArticleRepository {
  public function getForPrintArticles(): array {
    $sql = DB__secSql();
    $sql->add("SELECT *");
    $sql->add("FROM article AS A");
    $sql->add("ORDER BY A.id DESC");
    return DB__getRows($sql);
  }

  public function getForPrintArticleById(int $id): array {
    $sql = DB__secSql();
    $sql->add("SELECT *");
    $sql->add("FROM article AS A");
    $sql->add("WHERE id = ?", $id);
    return DB__getRow($sql);
  }
}