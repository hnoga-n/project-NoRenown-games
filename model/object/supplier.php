<?php
class supplier
{
  private $suppID;
  private $suppName;
  private $suppMail;
  private $suppTel;

  public function __construct($id = null, $name = null, $mail = null, $tel = null)
  {
    $this->suppID = $id;
    $this->suppName = $name;
    $this->suppMail = $mail;
    $this->suppTel = $tel;
  }

  public static function __construct2(supplier $otherSupp)
  {
    return new self($otherSupp->suppID, $otherSupp->suppName, $otherSupp->suppMail, $otherSupp->suppTel);
  }

  public function getSuppID()
  {
    return $this->suppID;
  }
  public function getSuppName()
  {
    return $this->suppName;
  }
  public function getSuppMail()
  {
    return $this->suppMail;
  }
  public function getSuppTel()
  {
    return $this->suppTel;
  }


  public static function getSupp($id)
  {
    include "../model/connect.php";
    $suppTmp = null;
    $sql = "SELECT * FROM supplier WHERE suppID = $id";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
      $row = $result->fetch_assoc();
      $suppTmp = new supplier($row['suppID'], $row['suppName'], $row['suppMail'], $row['suppTel'],);
    }
    return $suppTmp;
  }
}
