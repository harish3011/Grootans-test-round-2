<?php
define('DB_SERVER','localhost');
define('DB_USERNAME','root');
define('DB_PASSWORD','');
define('DB_NAME','grootan');

class dbConfig{
    public $db;

    public function __construct(){
        $this->db = new mysqli(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_NAME);
    }

    public function Select($table,$columns,$join=null,$where=null){
        $sql= 'SELECT ';
        $sql.= $columns;
        $sql.= ' FROM '.$table;
        if($join!=null){
            $sql.=' JOIN '.$join;
        }
        if($where!=null){
            $sql.=' WHERE '.$where;
        }
        echo $sql;
        $result=$this->db->query($sql);
        if($result) {
            while($output = $result->fetch_assoc()) {
                $array[] = $output;
            }
        }
        if(!empty($array)) {
            return $array;
        }
        else {
            return false; 
        }
    }

    public function Insert($table,$columns,$values) {
    //$sql = "INSERT INTO users(username,password,user_email) VALUES('".$UserName."','".$password."','".$email."')";
    $sql = "INSERT INTO ".$table;
    $sql.= "(".$columns.") ";
    $sql.="VALUES(".$values.")";
    echo $sql;
    $result = $this->db->query($sql);
    if($result) {
        return $result;
    } else {
        return false;
    }
    }

    // public function generateOrderNumber($num){
    //     // $nextNum = $num+1;    
    //      echo "A".str_pad($num, 4, '0', STR_PAD_LEFT);
    // }

     public function generateOrderNumber($where){
        //$where = "(TABLE_NAME = 'ordermaster')"
       $result = $this->Select('information_schema.TABLES','AUTO_INCREMENT',null,$where);
       return $result[0]['AUTO_INCREMENT'];
     }

     
      public function sumtot()
     {
         $orderid1="SELECT orderId FROM ordermaster
                              ORDER BY orderId DESC LIMIT 1";
                     $order1=$dbconfig->query($orderid1);
                     $order=$order1->fetch_assoc();
                     $id=$order['orderId'];
 
             $total="SELECT SUM(amount) AS totalAmount FROM orderdetail  WHERE orderId=$id AND isDeleted=0";
             $total1=$dbconfig->query($total);
                     $total2=$total1->fetch_assoc();
                     $amt=$total2['totalAmount'];
 
                     return $amt;
     }

     public function Update($table,$columns,$where) {
        // $sqlquery = "UPDATE users SET username ='".$userName."',user_email='".$userEmail."' WHERE user_id =".$userId;
        $sqlquery = "UPDATE ".$table;
        $sqlquery.= " SET ".$columns;
        $sqlquery.= " WHERE ".$where;
        // echo $sqlquery;
        $res = $this->db->query($sqlquery);
        if($res) {
            return true;
        }
        else {
            return false; 
        }
    }


    public function Delete($table,$where) {
        // $sql = "DELETE FROM users WHERE user_id =".$userId;
        $sql = "DELETE FROM ";
        $sql.=$table;
        $sql.=" WHERE ";
        $sql.= $where;
        // echo $sql;
        $result = $this->db->query($sql);
        if($result) {
            return $result;
        }
        else {
            return false;
        }
    }

}
// $db = new dbConfig();
// $values = '"rahul","d@c.com"';
// $ins=$db->Insert('grootan',"name,email",$values);
// if($ins){
//     echo 'yes';
// }else{
//     echo 'no';
// }
// Select($table,$columns,$join=null,$where=null)
// $where = "(TABLE_NAME = 'ordermaster')";
// $db1->generateOrderNumber($where);
// $db1->Select('users','users.userId,product.productId','product ON users.userId=product.productId','userId=1');
// $password = md5('user1');
// $values= "'user1','".$password."','user1@gmail.com'";
// $db1->Insert('users','userName,password,userEmail',$values);
?>