<?php
class ConnDB {
  private $dbType = 'mysql';
  private $host = '127.0.0.1';
  private $db = 'u9991267_test';
  private $user = 'root';
  private $pass = 'Admin2@19';
  private $charset = 'utf8';
  private $dbPath = '';
  private $pdo = null;
  private $err = '';

  public function connect() {
    if ($this->pdo!=null) {
      return $this->pdo;
    }
    switch($this->dbType){
      case "mysql":
        $dbconn = "mysql:host=".$this->host.";dbname=".$this->db;
        break;
      case "sqlite":
        $dbconn = "sqlite:".$this->dbPath;
        break;
      case "postgresql":
        $dbconn = "pgsql:host=".$this->host." dbname=".$this->db;
        break;
      default:
        $this->err .= "no set db type. Set: mysql, sqlite, postgresql";
        return $this->pdo;
    }
    $dbconn .= ";charset=".$this->charset;
    $opt = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES => false,
           ];
    try {
      $this->pdo = new PDO($dbconn, $this->user, $this->pass, $opt);
    } catch (Exception $ex) {
      $this->pdo = null;
      $this->err .= $ex->getMessage();
    }
    return $this->pdo;
  }
  public function disconnect() {
    $this->pdo = null;
  }

  public function __construct() {}

  public function __destruct() {
    $this->pdo = null;
  }

  public function setDbType($dbType) {
    $this->dbType = trim($dbType);
  }

  public function getDbType() {
    return $this->dbType;
  }

  public function setHost($host) {
    $this->host = trim($host);
  }

  public function getHost() {
    return $this->host;
  }

  public function setDb($db) {
    $this->db = trim($db);
  }

  public function getDb() {
    return $this->db;
  }

  public function setUser($user) {
    $this->user = trim($user);
  }

  public function getUser() {
    return $this->user;
  }

  public function setPass($pass) {
    $this->pass = trim($pass);
  }

  public function getPass() {
    return $this->pass;
  }

  public function setCharset($charset) {
    $this->charset = trim($charset);
  }

  public function getCharset() {
    return $this->charset;
  }

  public function setDbPath($dbPath) {
    $this->dbPath = trim($dbPath);
  }

  public function getDbPath() {
    return $this->dbPath;
  }

  public function getPDO() {
    return $this->pdo;
  }

  public function getErr() {
    return $this->err;
  }
}
?>
