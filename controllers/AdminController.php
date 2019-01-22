<?php
require_once 'AppController.php';

require_once __DIR__ . '/../model/User/User.php';
require_once __DIR__ . '/../model/User/UserMapper.php';

class AdminController extends AppController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index(): void
    {
        if($_SESSION['role'] == 'admin') {
            $user = new UserMapper();
            $this->render('index', ['user' => $user->getUser($_SESSION['id'])]);
        }

    }

    public function users(): void
    {
        $user = new UserMapper();

        header('Content-type: application/json');
        http_response_code(200);

        echo $user->getUsers() ? json_encode($user->getUsers()) : '';
    }

    public function userDelete(): void
    {
        if (!isset($_POST['id'])) {
            http_response_code(404);
            return;
        }

        $events = new EventMapper();
        $events -> deleteEvents($_POST['id']);

        $user = new UserMapper();
        $user->delete($_POST['id']);

        http_response_code(200);
    }
}