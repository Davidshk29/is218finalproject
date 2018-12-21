<?php
  class Db {
    private static $instance = NULL;

    private function __construct() {}

    private function __clone() {}

    public static function getInstance() {
      if (!isset(self::$instance)) {
        $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
        self::$instance = new PDO('mysql:host=sql1.njit.edu;dbname=shk29', 'shk29', 'nAfD00f0J', $pdo_options);
      }
      return self::$instance;
    }
  }
?> 