<?php
/**
 * Created by PhpStorm.
 * User: aurora
 * Date: 13.01.19
 * Time: 21:44
 */

require_once 'Event.php';
require_once __DIR__ . '/../../Database.php';

class EventMapper
{
    private $database;

    public function __construct()
    {
        $this->database = new Database();
    }

    public function setEvent($eventArray)
    {
        if($eventArray != NULL) {
            $sql = "SELECT COUNT(eventName) AS num FROM event WHERE eventName = :named";
            $stmt = $this->database->connect()->prepare($sql);
            $stmt->bindParam(':named', $eventArray['name']);
            $stmt->execute();
            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($row['num'] > 0) {
                die('This event already exists!');
            }

            $sql = "SELECT COUNT(id) AS num2 FROM place WHERE namePlace = :namePlace";
            $stmt = $this->database->connect()->prepare($sql);
            $stmt->bindParam(':namePlace', $eventArray['place']['name']);
            $stmt->execute();
            $row2 = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($row2['num2'] == 0) {

                $sql = "INSERT INTO place(namePlace,street,numberPlace,city) values 
                        (:namePlace,:street,:numberPlace,:city)";

                $stmt = $this->database->connect()->prepare($sql);
                $stmt->bindParam(':namePlace', $eventArray['place']['name'], PDO::PARAM_STR);
                $stmt->bindParam(':street', $eventArray['place']['street'], PDO::PARAM_STR);
                $stmt->bindParam(':numberPlace', $eventArray['place']['number'], PDO::PARAM_STR);
                $stmt->bindParam(':city', $eventArray['place']['city'], PDO::PARAM_STR);
                $stmt->execute();
            }

            $sql = "SELECT id AS place FROM place WHERE namePlace = :namePlace";
            $stmt = $this->database->connect()->prepare($sql);
            $stmt->bindParam(':namePlace', $eventArray['place']['name']);
            $stmt->execute();
            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            $sql = "SELECT id AS usere FROM useraccount WHERE email = :email";
            $stmt = $this->database->connect()->prepare($sql);
            $stmt->bindParam(':email', $_SESSION['id']);
            $stmt->execute();
            $row2 = $stmt->fetch(PDO::FETCH_ASSOC);

            $sql = "INSERT INTO
                event(eventName,description,beginDate,endDate,idUser,idPlace) values 
                (:name,:description,:beginDate,:endDate,:idUser,:idPlace)";
            $stmt = $this->database->connect()->prepare($sql);

            $stmt->bindParam(":name", $eventArray['name']);
            $stmt->bindParam(":description", $eventArray['description']);

            $date=$eventArray['begindate']['date'].' '.$eventArray['begindate']['time'].':00';
            $stmt->bindParam(':beginDate', $date, PDO::PARAM_STR);

            $date2=$eventArray['enddate']['date'].' '.$eventArray['enddate']['time'].':00';
            $stmt->bindParam(':endDate', $date2, PDO::PARAM_STR);

            $stmt->bindParam(":idUser", $row2['usere']);
            $stmt->bindParam(":idPlace", $row['place']);
            $stmt->execute();
        }
    }

    public function getEvents()
    {
        $sql = "SELECT * FROM event as ev INNER JOIN place ON place.id=ev.idPlace INNER JOIN useraccount ON ev.idUser=useraccount.id WHERE email = :email";
        $stmt = $this->database->connect()->prepare($sql);
        $stmt->bindParam(':email', $_SESSION['id']);
        $stmt->execute();
        $result=$stmt->fetchAll(\PDO::FETCH_ASSOC);

        return $result;
    }

    public function deleteEvent()
    {
        /*
         * 1. Szukanie id miejsca
         * 2. Gdy znajdziemy to szukamy czy to miejsce jest wykorzystywane TYLKO 1!!!
         * 4. Tak: DELETE Nie: SKIP
         * 3. Delete Event
         * POMIJANIE ANOMALII USUWANIA!!!
         */

        $sql="SELECT COUNT(idPlace) as num from event where eventName= :named";
        $stmt = $this->database->connect()->prepare($sql);
        $stmt->bindParam(":named",$_POST['event']);
        $stmt->execute();
        $result=$stmt->fetch(PDO::FETCH_ASSOC);

        if($result['num'] == 1){
            $sql="SELECT idPlace as num from event where eventName= :named";
            $stmt = $this->database->connect()->prepare($sql);
            $stmt->bindParam(":named",$_POST['event']);
            $stmt->execute();
            $result=$stmt->fetch(PDO::FETCH_ASSOC);
            $id=$result['num'];
        }

        $sql="DELETE FROM event where eventName = :name";
        $stmt = $this->database->connect()->prepare($sql);
        $stmt->bindParam(":name",$_POST['event']);
        $stmt->execute();

        if($id != NULL){
            $sql="DELETE FROM place where id = :id";
            $stmt = $this->database->connect()->prepare($sql);
            $stmt->bindParam(":id",$id);
            $stmt->execute();
        }

    }

}