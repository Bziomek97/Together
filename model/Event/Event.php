<?php
/**
 * Created by PhpStorm.
 * User: aurora
 * Date: 13.01.19
 * Time: 21:34
 */

class Event
{
    private $name;
    private $description;
    private $beginDate;
    private $endDate;
    private $place;
    private $street;
    private $number;
    private $city;

    /**
     * Event constructor.
     * @param $name
     * @param $description
     * @param $beginDate
     * @param $endDate
     * @param $place
     * @param $street
     * @param $number
     * @param $city
     */
    public function __construct($name, $description, $beginDate, $endDate, $place, $street, $number, $city)
    {
        $this->name = $name;
        $this->description = $description;
        $this->beginDate = $beginDate;
        $this->endDate = $endDate;
        $this->place = $place;
        $this->street = $street;
        $this->number = $number;
        $this->city = $city;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @return mixed
     */
    public function getBeginDate()
    {
        return $this->beginDate;
    }

    /**
     * @return mixed
     */
    public function getEndDate()
    {
        return $this->endDate;
    }

    /**
     * @return mixed
     */
    public function getPlace()
    {
        return $this->place;
    }

    /**
     * @return mixed
     */
    public function getStreet()
    {
        return $this->street;
    }

    /**
     * @return mixed
     */
    public function getNumber()
    {
        return $this->number;
    }

    /**
     * @return mixed
     */
    public function getCity()
    {
        return $this->city;
    }


}