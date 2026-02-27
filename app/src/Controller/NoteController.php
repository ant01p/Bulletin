<?php
namespace Notes\App\Controller;
use Notes\App\Repository\UserRepository;

class NoteController
{
    private $userRepo;

    public function __construct()
    {
        $this->userRepo = new UserRepository;
    }
}