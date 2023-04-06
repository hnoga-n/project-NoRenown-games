<?php
class games
{
  private $gid;
  private $gname;
  private $gcategory;
  private $gprice;
  private $gdiscount;
  private $gimg;
  private $gquantity;



  public function __construct($id = null, $name = null, $category = null, $price = null, $discount = null, $img = null, $quantity = null)
  {
    $this->gid = $id;
    $this->gname = $name;
    $this->gcategory = $category;
    $this->gprice = $price;
    $this->gdiscount = $discount;
    $this->gimg = $img;
    $this->gquantity = $quantity;
  }

  public static function __construct2(games $othergame)
  {
    return new self($othergame->gid, $othergame->gname, $othergame->gcategory, $othergame->gprice, $othergame->gdiscount, $othergame->gimg, $othergame->gquantity);
  }
  public function getGameid()
  {
    return $this->gid;
  }

  public function getGameName()
  {
    return $this->gname;
  }

  public function getGameCategory()
  {
    return $this->gcategory;
  }

  public function getGamePrice()
  {
    return $this->gprice;
  }

  public function getGameDiscount()
  {
    return $this->gdiscount;
  }

  public function getGameImg()
  {
    return $this->gimg;
  }

  public function getGameQuantity()
  {
    return $this->gquantity;
  }

  public function toString()
  {
    echo $this->gid . $this->gname . $this->gcategory . $this->gprice . $this->gdiscount . $this->gquantity;
  }


  public static function getGame($gid)
  {
    include "../model/connect.php";
    $gameTmp = null;
    $sql = "SELECT * FROM games WHERE gid = $gid";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
      $row = $result->fetch_assoc();
      $gameTmp = new games($row['gid'], $row['gname'], $row['gcategory'], $row['gprice'], $row['gdiscount'], $row['gimg'], $row['gquantity']);
    }
    return $gameTmp;
  }
}

/* $game1 = new games(1, "sadas");
$game2 = new games();
$game2 = games::__construct2($game1);
$game2->toString();
 */