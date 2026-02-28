<?php
namespace Notes\App\Controller;
use Notes\App\Repository\UserRepository;
use Notes\App\Repository\AppreciationRepository;
use Notes\App\Entity\Appreciation;

class NoteController
{
    private $userRepo;
    private $appRepo;

    public function __construct()
    {
        $this->appRepo = new AppreciationRepository;
        $this->userRepo = new UserRepository;
    }

    public function add()
    {
        $id = $_GET['id'];

        $user = $this->userRepo->find($id);

        if(!empty($_POST)) {
            $appreciation = new Appreciation;
            $appreciation->setComment($_POST['comment'])
            ->setMention($_POST['mention'])
            ->setId_user($id);

            $this->appRepo->add($appreciation);

            header('Location: index.php?route=show&id=' . $id);
            exit;
        }

        require('src/view/add.phtml');
    }

    public function delete()
    {
        $id = $_GET['id'];

        $this->appRepo->delete($id);

        header('Location: index.php?route=show&id=' . $id);
        exit;
    }

    public function update()
    {
        $id = $_GET['id'];

        $user = $this->userRepo->find($id);

        $appreciation = $this->appRepo->findByUser($id);

        if(!empty($_POST)) {
            $appreciation = new Appreciation;
            $appreciation->setComment($_POST['comment'])
            ->setMention($_POST['mention'])
            ->setId_user($id);

            $this->appRepo->update($appreciation);

            header('Location: index.php?route=show&id=' . $id);
            exit;
        }

        require('src/view/update.phtml');
    }
}
