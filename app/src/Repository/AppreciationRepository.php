<?php

namespace Notes\App\Repository;

use Notes\App\Entity\Appreciation;
use PDO;

class AppreciationRepository extends Repository
{
    public function add(Appreciation $appreciation)
    {
        $sql = "INSERT INTO appreciation(comment, mention, id_user) VALUES (:comment, :mention, :id_user)";
        $request = $this->pdo->prepare($sql);
        $request->execute([
            'comment' => $appreciation->getComment(),
            'mention' => $appreciation->getMention(),
            'id_user' => $appreciation->getId_user()
        ]);
    }

    public function findByUser($id_user)
    {
        $sql = "SELECT * FROM appreciation WHERE id_user=:id_user";
        $request = $this->pdo->prepare($sql);
        $request->execute(['id_user' => $id_user]);
        $request->setFetchMode(PDO::FETCH_CLASS, Appreciation::class);
        $appreciation = $request->fetch();

        return $appreciation;
    }

    public function delete($id_user)
    {
        $sql = "DELETE FROM appreciation WHERE id_user=:id_user";
        $request = $this->pdo->prepare($sql);
        $request->execute(['id_user' => $id_user]);
    }

    public function update(Appreciation $appreciation)
    {
        $sql = "UPDATE appreciation SET comment=:comment, mention=:mention WHERE id_user=:id_user";
        $request = $this->pdo->prepare($sql);
        $request->execute([
            'comment' => $appreciation->getComment(),
            'mention' => $appreciation->getMention(),
            'id_user' => $appreciation->getId_user()
        ]);
    }
}