<?php
class Library_model extends CI_Model {

    var $title   = '';
    var $content = '';
    var $date    = '';

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
    
  function search($keyword){
    $this->db->where("is_use", true);
    $this->db->like("name", $keyword);
    return $this->db->get("BOOK")->result_array();
  }
  function getAllBook(){
    return $this->db->get("BOOK")->result_array(); 
  }

  function getCategorys(){
    return $this->db->get("CATEGORY")->result_array();
  }

  function getCurrentSerialNum($idx){
    $this->db->where("category", $idx);
    $this->db->order_by("num", "desc");
    $this->db->limit(1);
    return $this->db->get("BOOK")->result_array();
  }

  function insertBook($insertData){
    return $this->db->insert("BOOK", $insertData);
  }

  function disableBook($num){
    $updateData = array(
        "is_use"    =>      false
        );
    $this->db->where("num", $num);
    return $this->db->update("BOOK", $updateData);
  }

  function usableBook($num){
    $updateData = array(
        "is_use"    =>      true
        );
    $this->db->where("num", $num);
    return $this->db->update("BOOK", $updateData);
  }

  function saveCode($num, $code){
    $updateData = array(
        "barcode"   =>  $code
    );
    $this->db->where("num", $num);
    return $this->db->update("BOOK", $updateData);
  }
  function editBook($num, $name, $author, $publish){
    $updateData = array(
        "name"      =>      $name,
        "author"    =>      $author,
        "publish"   =>      $publish
    );

    $this->db->where("num", $num);

    return $this->db->update("BOOK", $updateData);
  }

  function getPolicy() {
    $this->db->limit(1);
    $this->db->order_by("idx", "DESC");
    return $this->db->get("LIBRARY_POLICY")->result_array();
  }
  function insertPolicy($insertData){
    return $this->db->insert("LIBRARY_POLICY", $insertData);
  }
  function isExistBook($bookCode){
    $this->db->select("COUNT(*) as isExist");
    $this->db->where("num", $bookCode);
    return $this->db->get("BOOK")->result_array();
  }

  function isLentBook($bookCode){
    $this->db->select("if(COUNT(*) > 0, true, false) as isLent", FALSE);
    $this->db->from("LENT_BOOK AS A");
    $this->db->join("RETURN_LENT AS B", "A.idx = B.lent_num", "left outer");
    $this->db->where("A.book_code", $bookCode);
    $this->db->where("isnull(B.return_date)", true);

    return $this->db->get()->result_array();
  }
  function lentBook($bookCode, $lentDate, $memberIdx){
    $insertData = array(
        "book_code"     =>      $bookCode,
        "member_num"    =>      $memberIdx,
        "lent_date"     =>      $lentDate
    );
    return $this->db->insert("LENT_BOOK", $insertData);
  }
  function isLentBookByMember($bookCode, $memberIdx){
    $this->db->select("A.idx, A.lent_date, A.extend_cnt", FALSE);
    $this->db->from("LENT_BOOK AS A");
    $this->db->join("RETURN_LENT AS B", "A.idx = B.lent_num", "left outer");
    $this->db->where("A.book_code", $bookCode);
    $this->db->where("A.member_num", $memberIdx);
    $this->db->where("isnull(B.return_date)", true);

    return $this->db->get()->result_array();
  }
  function returnBook($lentIdx, $returnDate){
      $insertData = array(
          "lent_num"    =>      $lentIdx,
          "return_date" =>      $returnDate
      );
      return $this->db->insert("RETURN_LENT", $insertData);
  }

  function updatePenalty($memberIdx, $paneltyDay){
    $updateData = array(
        "penalty_date"      =>      $paneltyDay
    );
    $this->db->where("idx", $memberIdx);
    return $this->db->update("MEMBER", $updateData);
  }
  function getMyLentBookList($memberIdx, $extendDay, $lentDay){
    $DAY = 1000 * 60 * 60 * 24;
    $query = "SELECT B.num as book_code, B.name, B.author, B.publish, L.lent_date, (L.lent_date + ".($DAY * $lentDay)." + (".($DAY * $extendDay)." * L.extend_cnt)) AS expect_return_date FROM BOOK AS B LEFT OUTER JOIN LENT_BOOK AS L ON B.num = L.book_code WHERE L.idx NOT IN (SELECT LB.idx FROM LENT_BOOK AS LB LEFT OUTER JOIN RETURN_LENT AS RL ON LB.idx = RL.lent_num WHERE LB.member_num = ".$this->db->escape($memberIdx)." AND isnull(RL.return_date) = false)";

    return $this->db->query($query)->result_array();
  }
}
?>
