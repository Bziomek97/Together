<?php
/**
 * Created by PhpStorm.
 * User: aurora
 * Date: 10.01.19
 * Time: 23:33
 */

require_once 'AppController.php';
require_once __DIR__ . '/../model/Event/Event.php';
require_once __DIR__ . '/../model/Event/EventMapper.php';


class EventController extends AppController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index(): void
    {
        $mapper = new EventMapper();
        $result = $mapper->getEvents();
        $this->render('index',['event' => $result]);
    }

    public function add(): void
    {
        $mapper = new EventMapper();

        if($this->isPost()) {

            $eventArray = [
                'name' => $_POST['name'],
                'description' => $_POST['description'],
                'begindate' => [
                    'date' => $_POST['bdate'],
                    'time' => $_POST['btime']
                ],
                'enddate' => [
                    'date' => $_POST['edate'],
                    'time' => $_POST['etime']
                ],
                'place' => [
                    'name' => $_POST['place'],
                    'street' => $_POST['street'],
                    'number' => $_POST['number'],
                    'city' => $_POST['city']
                ]
            ];

            $mapper->setEvent($eventArray);
        }

        $this->render('add');
    }
}