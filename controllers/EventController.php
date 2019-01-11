<?php
/**
 * Created by PhpStorm.
 * User: aurora
 * Date: 10.01.19
 * Time: 23:33
 */

require_once 'AppController.php';

class EventController extends AppController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index(): void
    {
        $text = 'Hello there 👋';
        $this->render('index', ['text' => $text]);
    }

    public function add(): void
    {
        $text = 'Hello there 👋';
        $this->render('add', ['text' => $text]);
    }
}