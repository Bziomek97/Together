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

            $date=$_POST['bdate'].' '.$_POST['btime'].':00';
            $date2=$_POST['edate'].' '.$_POST['etime'].':00';

            $eventArray = [
                'name' => $_POST['name'],
                'description' => $_POST['description'],
                'begindate' => $date,
                'enddate' => $date2,
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

    public function eventAction()
    {
        $mapper = new EventMapper();
        if($this->isPost()){
            if($_POST['action'] == 'delete'){
                $mapper->deleteEvent();
                $this->index();
            }
            else if($_POST['action'] == 'modify'){
                $event = $mapper->getEvent();
                $explodeBDate=explode(' ',$event->getBeginDate());
                $explodeEDate=explode(' ',$event->getEndDate());
                $eventArray = [
                    'name' => $event->getName(),
                    'description' => $event->getDescription(),
                    'begindate' => [
                        'date' => $explodeBDate[0],
                        'time' => $explodeBDate[1]
                    ],
                    'enddate' => [
                        'date' => $explodeEDate[0],
                        'time' => $explodeEDate[1]
                    ],
                    'place' => [
                        'name' => $event->getPlace(),
                        'street' => $event->getStreet(),
                        'number' => $event->getNumber(),
                        'city' => $event->getCity()
                    ]
                ];
                $this->render('edit',['event' => $eventArray]);
            }
            else{
                die("Invalid option!");
            }
        }
    }
}