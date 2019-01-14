<?php

require_once 'User.php';
require_once __DIR__ . '/../../Database.php';

class UserMapper
{
    private $database;

    public function __construct()
    {
        $this->database = new Database();
    }

    public function getUser(
        string $email
    ):User {
        try {
            $stmt = $this->database->connect()->prepare('SELECT * FROM useraccount INNER JOIN role ON useraccount.idRole = role.id WHERE email = :email;');
            $stmt->bindParam(':email', $email, PDO::PARAM_STR);
            $stmt->execute();

            $user = $stmt->fetch(PDO::FETCH_ASSOC);
            $newuser = new User($user['name'], $user['surname'], $user['email'], $user['password'],$user['Role']);
            return $newuser;
        }
        catch(PDOException $e) {
            echo('Error: ' . $e->getMessage());
            exit();
        }
    }

    public function getUsers()
    {
        try {
            $stmt = $this->database->connect()->prepare('SELECT * FROM useraccount WHERE email != :email;');
            $stmt->bindParam(':email', $_SESSION['id'], PDO::PARAM_STR);
            $stmt->execute();

            $user = $stmt->fetchAll(\PDO::FETCH_ASSOC);
            return $user;
        }
        catch(PDOException $e) {
            die();
        }
    }

    public function setUser(string $email, string $name, string $surname, string $password): void
    {
        $sql = "SELECT COUNT(email) AS num FROM useraccount WHERE email = :email";
        $stmt = $this->database->connect()->prepare($sql);
        $stmt->bindValue(':email', $email);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if($row['num'] > 0){
            die('That username already exists!');
        }

        $passwordHash = password_hash($password, PASSWORD_ARGON2I);

        $stmt = $this->database->connect()->prepare(
            'INSERT INTO useraccount(email,name,surname,idRole,password) 
                       values (:email,:name,:surname,:idRole,:password)'
        );

        $role=1;
        $stmt->bindParam(':email',$email);
        $stmt->bindParam(':name',$name);
        $stmt->bindParam(':idRole',$role);
        $stmt->bindParam(':surname',$surname);
        $stmt->bindParam(':password',$passwordHash);

        $stmt->execute();
    }

    public function delete(int $id): void
    {
        try {
            $stmt = $this->database->connect()->prepare('DELETE FROM useraccount WHERE id = :id;');
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
        }
        catch(PDOException $e) {
            die();
        }
    }

    public function setEmail($email) : void
    {
        $sql = "SELECT COUNT(email) AS num FROM useraccount WHERE email = :email";
        $stmt = $this->database->connect()->prepare($sql);
        $stmt->bindValue(':email', $email);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if($row['num'] > 0){
            die('That username already exists!');
        }

        try {
            $stmt = $this->database->connect()->prepare('UPDATE useraccount SET email=:email where email=:session');
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':session',$_SESSION['id']);
            $stmt->execute();
        }
        catch(PDOException $e) {
            die();
        }
    }

    public function setPassword($password) : void
    {
        try {
            $passwordHash = password_hash($password, PASSWORD_ARGON2I);

            $stmt = $this->database->connect()->prepare('UPDATE useraccount SET password=:password where email=:session');
            $stmt->bindParam(':password', $passwordHash);
            $stmt->bindParam(':session',$_SESSION['id']);
            $stmt->execute();
        }
        catch(PDOException $e) {
            die();
        }
    }
}