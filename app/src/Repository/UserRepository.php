<?php

namespace Notes\App\Repository;

use Notes\App\Repository\Repository;
use Notes\App\Entity\User;


class UserRepository extends Repository
{
    public function findAll($user)
    {
        $sql = "SELECT id, firstname, lastname FROM user";
        $request = $this->pdo->prepare($sql);
        $request->execute();
        $users = $request->fetchAll(\PDO::FETCH_CLASS, User::class);

        return $users;
    }

    public function find($id)
    {
        $sql = "SELECT * FROM user WHERE id=:id";
        $request = $this->pdo->prepare($sql);
        $request->execute(['id' => $id]);
        $request->setFetchMode(\PDO::FETCH_CLASS, User::class);
        $user = $request->fetch();

        return $user;
    }
}
