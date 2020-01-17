<?php
namespace dblanchet\proj4\model;

class CommentManager extends Manager
{
    public function getComments(int $article_id)
    {
        $db = $this->dbConnect();
        // Récup des commentaires d'un article :
        $comments = $db->prepare('SELECT Comment.id, Member.pseudo AS pseudo, content, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS comment_date_fr
        FROM Comment
        INNER JOIN Member ON Comment.author_id = Member.id
        WHERE article_id = ? ORDER BY comment_date DESC');
        $comments->execute([$article_id]);

        return $comments->fetchAll();
    }

    public function addComment(int $article_id, int $author_id, string $content)
    {
        $db = $this->dbConnect();
        // Ajout d'un commentaire sur un article :
        $query = $db->prepare('INSERT INTO comment(id, article_id, author_id, content, comment_date)
        VALUES (null, ?, ?, ?, NOW())');

        return $query->execute([$article_id, $author_id, $content]);
    }
}
