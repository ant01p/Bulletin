<?php
namespace Notes\App\Controller;

use Notes\App\Repository\UserRepository;

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

    }
}