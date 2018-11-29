<?php
class DB {
        private $pdo;
        public function __construct() {
                $host = "us-cdbr-iron-east-01.cleardb.net";
                $dbname = "heroku_7bb338c5d45ddfd";
                $username = "ba50e2945cf767";
                $password = "5e7f2066";
                $pdo = new PDO('mysql:host='.$host.';dbname='.$dbname.';charset=utf8', $username, $password);
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $this->pdo = $pdo;
        }
        public function query($query, $params = array()) {
                $statement = $this->pdo->prepare($query);
                $statement->execute($params);
                if (explode(' ', $query)[0] == 'SELECT') {
                $data = $statement->fetchAll(PDO::FETCH_ASSOC);
                
                return $data;
                }
        }
}