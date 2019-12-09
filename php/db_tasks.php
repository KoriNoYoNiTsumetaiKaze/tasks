<?php
class db_tasks extends connDB {
  public function selectAll() {
    $pdo = $this->connect();
    if ($pdo==null) {
      return false;
    }
    $stmt = $pdo->query('SELECT user,email,task,status FROM tasks');
    $result = array();
    while ($row = $stmt->fetch()) {
      $result[] = $row;
    }
    return $result;
  }
}
?>
