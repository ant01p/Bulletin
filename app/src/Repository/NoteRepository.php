<?php

namespace Notes\App\Repository;

use Notes\App\Entity\Note;
use PDO;

class NoteRepository extends Repository
{
    public function findByUser($id_user)
    {
        $sql = "SELECT * FROM note WHERE id_user=:id_user";
        $request = $this->pdo->prepare($sql);
        $request->execute(['id_user' => $id_user]);
        $notes = $request->fetchAll(PDO::FETCH_CLASS, Note::class);

        return $notes;
    }
}
