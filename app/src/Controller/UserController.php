<?php
namespace Notes\App\Controller;

use Notes\App\Repository\UserRepository;
use Notes\App\Repository\NoteRepository;
use Notes\App\Repository\AppreciationRepository;

class UserController 
{
    private UserRepository $userRepo;

    public function __construct()
    {
        $this->userRepo = new UserRepository();
    }

    public function index()
    {
        $user = isset($_GET['firstname']) ? $_GET['lastname'] : NULL;

        $users = $this->userRepo->findAll($user);  

        require ('src/view/index.phtml');
    }
    
    public function show()
    {
        $id = $_GET['id'];

        $user = $this->userRepo->find($id);

        $noteRepo = new NoteRepository;
        $notes = $noteRepo->findByUser($id);

        $appRepo = new AppreciationRepository;
        $appreciation = $appRepo->findByUser($id);

        require('src/view/show.phtml');
    }
}