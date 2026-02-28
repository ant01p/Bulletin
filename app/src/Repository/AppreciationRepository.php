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
}