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
            $sql = "SELECT COUNT(eventName) AS num FROM event WHERE eventName = :name";
            $stmt = $this->database->connect()->prepare($sql);
            $stmt->bindValue(':name', $eventArray['name']);
            $stmt->execute();
            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($row['num'] > 0) {
                die('This event already exists!');
            }

            $sql = "SELECT COUNT(namePlace) AS num FROM place WHERE namePlace = :namePlace";
            $stmt = $this->database->connect()->prepare($sql);
            $stmt->bindValue(':namePlace', $eventArray['place']['name']);
            $stmt->execute();
            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($row['num'] == 0) {
                $sql = "INSERT INTO
                place(namePlace,street,numberPlace,city) values 
                (:namePlace,:street,:numberPlace,:city)";

                $stmt = $this->database->connect()->prepare($sql);
                $stmt->bindParam(':namePlace', $eventArray['place']['name']);
                $stmt->bindParam(':street', $eventArray['place']['street']);
                $stmt->bindParam(':numberPlace', $eventArray['place']['number']);
                $stmt->bindParam(':city', $eventArray['place']['city']);
                $stmt->execute();
            }

            $sql = "SELECT id AS place FROM place WHERE namePlace = :namePlace";
            $stmt = $this->database->connect()->prepare($sql);
            $stmt->bindValue(':namePlace', $eventArray['place']['name']);
            $stmt->execute();
            $row = $stmt->fetchAll(PDO::FETCH_ASSOC);

            $sql = "SELECT id AS usere FROM useraccount WHERE email = :email";
            $stmt = $this->database->connect()->prepare($sql);
            $stmt->bindValue(':email', $_SESSION['id']);
            $stmt->execute();
            $row2 = $stmt->fetchAll(PDO::FETCH_ASSOC);

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
        $sql = "SELECT * FROM event INNER JOIN place, useraccount WHERE email = :email";
        $stmt = $this->database->connect()->prepare($sql);
        $stmt->bindValue(':email', $_SESSION['id']);
        $stmt->execute();
        $result=$stmt->fetchAll(\PDO::FETCH_ASSOC);

        return $result;
    }
}