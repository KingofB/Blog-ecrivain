<?php
class ArticleManager extends Manager
{
    public function getArticle(int $article_id)
    {
        $db = $this->dbConnect();
        // Récup de l'article :
        $query = "SELECT id, title, image, alt_image, summary, content FROM Article WHERE id = :id";
        $sth = $db->prepare($query);
        $sth->execute([':id' => $article_id]);
        $res = $sth->fetchAll()[0];

        return $res;
    }

    public function getThreeLastsArticles()
    {
        $db = $this->dbConnect();
        // Récup des 3 derniers articles :
        return $db->query('SELECT id, title, image, alt_image, summary FROM Article ORDER BY publication_date DESC LIMIT 0, 3')->fetchAll();
    }

    public function getLastArticlesFourToSix()
    {
        $db = $this->dbConnect();
        // Récup des derniers articles (4 à 6) :
        return $db->query('SELECT id, title, image, alt_image, summary FROM Article ORDER BY publication_date DESC LIMIT 3, 3')->fetchAll();
    }

    public function getArchives()
    {
        $db = $this->dbConnect();
        // requête pour compter le nbre d'articles :
        $countArticles = (int) $db->query('SELECT COUNT(id) FROM Article')->fetchColumn(0);
        $limit = $countArticles - 6;

        // Récup des plus vieux articles :
        return $db->query("SELECT id, title FROM Article ORDER BY publication_date DESC LIMIT 6, $limit")->fetchAll();
    }
}
