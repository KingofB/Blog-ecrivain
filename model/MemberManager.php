<?php
namespace dblanchet\proj4\model;

class MemberManager extends Manager
{
    public function addMember(string $pseudo, string $email, string $password)
    {
        $db = $this->dbConnect();
        $query = $db->prepare('INSERT INTO member(id, pseudo, email, passw)
        VALUES (null, ?, ?, ?)');

        return $query->execute([$pseudo, $email, $password]);
    }

    public function getMember(string $pseudo)
    {
        $db = $this->dbConnect();
        $req = $db->query("SELECT id, pseudo, email, passw FROM Member WHERE LOWER(pseudo)='$pseudo'");

        return $req->fetchAll()[0];
    }

    public function pseudoExists(string $pseudo): int
    {
        $db = $this->dbConnect();
        $req = $db->query("SELECT COUNT(pseudo) FROM Member WHERE LOWER(pseudo)='$pseudo'");

        return (int) $req->fetchColumn();
    }

    public function pseudoId(string $pseudo): int
    {
        $db = $this->dbConnect();
        $author_id = $db->query("SELECT id FROM Member WHERE LOWER(pseudo)='$pseudo'")->fetchColumn();

        return (int) $author_id;
    }
}
