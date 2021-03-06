<?php

require_once "AppController.php";

require_once __DIR__ . '/../model/User/User.php';
require_once __DIR__ . '/../model/User/UserMapper.php';
require_once __DIR__ . '/../model/Event/Event.php';
require_once __DIR__ . '/../model/Event/EventMapper.php';



class DefaultController extends AppController
{

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $mapper = new EventMapper();
        $this->render('index', ['event' => $mapper->getAllEvents()]);
    }

    public function login()
    {
        $mapper = new UserMapper();

        $user = null;

        if ($this->isPost()) {

            $user = $mapper->getUser($_POST['email']);

            if(!$user) {
                return $this->render('login', ['message' => ['Email not recognized']]);
            }

            if (!password_verify($_POST['password'],$user->getPassword())) {
                return $this->render('login', ['message' => ['Wrong password']]);
            } else {
                $_SESSION["id"] = $user->getEmail();
                $_SESSION["role"] = $user->getRole();
                $_SESSION['name'] = $user->getName();
                $_SESSION['surname'] = $user->getSurname();

                $url = "http://$_SERVER[HTTP_HOST]/";
                header("Location: {$url}?page=index");
                exit();
            }
        }

        $this->render('login');
    }

    public function logout()
    {
        session_unset();
        session_destroy();
        $mapper = new EventMapper();
        $this->render('index', ['event' => $mapper->getAllEvents()]);
    }

    public function edit()
    {
        if(($_POST['password'] !== $_POST['cpassword']) && $_POST['password'] != NULL ){
            echo('Not match passwords');
            exit();
        }

        $mapper = new UserMapper();
        if ($this->isPost()) {
            if(!empty($_POST['email'])) $mapper->setEmail($_POST['email']);
            if($_POST['password']!=NULL) $mapper->setPassword($_POST['password']);
        }

        $this->render('edit');
    }

    public function register()
    {
        if($_POST['password'] != $_POST['cpassword']){
            echo('Not match passwords');
            exit();
        }

        $mapper = new UserMapper();
        if ($this->isPost()) {
            $mapper->setUser($_POST['email'], $_POST['name'], $_POST['surname'], $_POST['password']);
        }

        $this->login();
        exit();
    }

    public function detail()
    {
        $mapper = new EventMapper();
        $name = $_GET['name'];
        $ok=$mapper->getGETEvent($name);
        $this->render('detail',['event' => $ok]);
    }
}