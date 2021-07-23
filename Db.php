<?php

require_once 'functions.php';

class Db
{
    protected $conn;

    public function __construct()
    {
        $db = [
            'host' => 'localhost',
            'user' => 'root',
            'password' => 'root',
            'dbname' => 'teams'
        ];
        $this->conn = new mysqli($db['host'], $db['user'], $db['password'], $db['dbname']);
    }

    public function query()
    {

//        $sql = "CREATE TABLE IF NOT EXISTS `Team` (
//            `teamID` INT(11) NOT NULL AUTO_INCREMENT,
//            `name` VARCHAR(255) NOT NULL,
//            `country` VARCHAR(255),
//            PRIMARY KEY (`teamID`))
//            ENGINE=InnoDB";
//
//
//        $sql = "CREATE TABLE IF NOT EXISTS `Group` (
//            `groupID` INT(11) NOT NULL AUTO_INCREMENT,
//            `name` VARCHAR(255),
//            PRIMARY KEY (`groupID`))
//            ENGINE=InnoDB";
//
//        $sql = "CREATE TABLE `Team_Group` (
//              `team_id` INT (11) NOT NULL,
//              `group_id` INT (11) NOT NULL,
//              PRIMARY KEY (`team_id`, `group_id`),
//              INDEX `team_id` (`team_id`),
//              INDEX `group_id` (`group_id`),
//              CONSTRAINT `FK_Group` FOREIGN KEY (`group_id`)
//                REFERENCES `Group` (`groupID`) ON DELETE CASCADE,
//              CONSTRAINT `FK_Team` FOREIGN KEY (`team_id`)
//                REFERENCES `Team` (`teamID`) ON DELETE CASCADE)
//        ENGINE=InnoDB";
//
//        $sql = "INSERT INTO `team` (`name`) VALUES
//                ('Team 1'),
//                ('Team 2'),
//                ('Team 3'),
//                ('Team 4'),
//                ('Team 5')";
//
//        $sql = "INSERT INTO `group` (`name`) VALUES
//                ('Group A'),
//                ('Group B'),
//                ('Group C')";
//
//        $sql = "INSERT INTO `team_group` VALUES
//                (1, 1),
//                (2, 1),
//                (1, 2),
//                (2, 2),
//                (3, 2),
//                (3, 3),
//                (4, 3),
//                (5, 3)
//";

        $sql = "SELECT `group`.name AS 'Группа',
                `team`.name AS 'Команда'
                FROM `team_group`
                LEFT JOIN `group` ON (`group`.groupID = `team_group`.group_id)
                LEFT JOIN `team` ON (`team`.teamID = `team_group`.team_id)
        ";

        if ($this->conn->query($sql) === TRUE) {
            echo "Запрос успешно выполнен";
        } else {
            echo "Ошибка" . $this->conn->error;
        }

        $this->conn->close();
    }
}

//$db = new Db();
//$db->query();
