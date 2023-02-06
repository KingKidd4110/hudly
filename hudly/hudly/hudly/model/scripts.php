<?php
class Scripts {
    private $db;

    
    public function __construct($db) {
        $this->db = $db;
    }


    public function products($page){
        $result_per_page = 12;
        $sql = "SELECT * FROM products";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        $no_of_result =  $stmt->rowCount();
        $stmt = null;
        $number_of_pages = ceil($no_of_result/$result_per_page);
        $page_first_result = ($page - 1)*$result_per_page;
        $sql = "SELECT * FROM products ORDER BY id DESC LIMIT ". $page_first_result.','. $result_per_page;
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        if($stmt){
            return $stmt;
        } else {
            return false;
        }
        $stmt = null;

    }


    public function clearCart($uid) {
        $sql = "DELETE FROM cart WHERE userid =  ?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute(array($uid));
        if($stmt){
            return true;
        } else {
            return false;
        }
        $stmt = null;
    }

    public function inCart($uid, $pid) {
        $sql = "SELECT * FROM cart WHERE userid = ? AND product_id = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute(array($uid, $pid));
        if($stmt->rowCount() > 0){
            return true;
        } else {
            return false;
        }
        $stmt = null;
    }
    
    public function addToCart($uid, $pid): bool {
        $sql = "INSERT INTO cart (userid, product_id) VALUES (?, ?)";
        $stmt = $this->db->prepare($sql);
        $stmt->execute(array($uid, $pid));
        if($stmt){
            return true;
        } else {
            return false;
        }
        $stmt = null;
    }

    public function checkIfProductRated($userid, $pid){
        $sql = "SELECT * FROM prating WHERE userid = ? AND pid = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute(array($userid, $pid));
        if($stmt->rowCount() > 0){
            return true;
        } else {
            return false;
        }
        $stmt = null;
    }


    public function updateProductRated($rateId, $rate){
        $sql = "UPDATE prating SET rate = ? WHERE id = ? LIMIT 1";
        $stmt = $this->db->prepare($sql);
        if($stmt->execute(array($rate, $rateId))){
            return true;
        } else {
            return false;
        }
        $stmt = null;
    }

    public function rateProduct($uid, $pid, $rate){
        $sql = "INSERT INTO prating (userid, pid, rate) VALUES (?, ?, ?)";
        $stmt = $this->db->prepare($sql);
        $stmt->execute(array($uid, $pid, $rate));
        if($stmt->rowCount() > 0){
            return true;
        } else {
            return false;
        }
        $stmt = null;
    }

    public function getProductRated($userid, $pid){
        $sql = "SELECT * FROM prating WHERE userid = ? AND pid = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute(array($userid, $pid));
        $result = $stmt->fetch(PDO:: FETCH_ASSOC);
        return $result['id'];
        $stmt = null;
    }

    public function getProductRating($userid, $pid){
        $sql = "SELECT * FROM prating WHERE userid = ? AND pid = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute(array($userid, $pid));
        $result = $stmt->fetch(PDO:: FETCH_ASSOC);
        return $result['id'];
        $stmt = null;
    }

    public function getProductSaved($userid, $pid){
        $sql = "SELECT * FROM saved WHERE userid = ? AND product_id = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute(array($userid, $pid));
        if ($stmt->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
        $stmt = null;
    }


    public function getSavedProduct($userid, $pid){
        $sql = "SELECT * FROM saved WHERE userid = ? AND product_id = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute(array($userid, $pid));
        if ($stmt->rowCount() > 0) {
            return $stmt;
        } else {
            return false;
        }
        $stmt = null;
    }

    public function saveProduct($userid, $pid){
        $sql = "INSERT INTO saved (userid, product_id) VALUES (?, ?)";
        $stmt = $this->db->prepare($sql);
        $stmt->execute(array($userid, $pid));
        if ($stmt) {
            return true;
        } else {
            return false;
        }
        $stmt = null;
    }


    public function getCart($userid){
        $sql = "SELECT * FROM cart WHERE userid = ? ORDER BY id DESC";
        $stmt = $this->db->prepare($sql);
        $stmt->execute(array($userid));
        if ($stmt) {
            return $stmt;
        } else {
            return false;
        }
        $stmt = null;
    }

    public function getAllSaved($userid){
        $sql = "SELECT * FROM saved WHERE userid = ? ORDER BY id DESC";
        $stmt = $this->db->prepare($sql);
        $stmt->execute(array($userid));
        if ($stmt->rowCount() > 0) {
            return $stmt;
        } else {
            return false;
        }
        $stmt = null;
    }


    public function removeSavedItem($id){
        $sql = "DELETE FROM saved WHERE id = ? LIMIT 1";
        $stmt = $this->db->prepare($sql);
        $stmt->execute(array($id));
        if ($stmt) {
            return true;
        } else {
            return false;
        }
        $stmt = null;
    }

    public function removeCartItem($id){
        $sql = "DELETE FROM cart WHERE id = ? LIMIT 1";
        $stmt = $this->db->prepare($sql);
        $stmt->execute(array($id));
        if ($stmt) {
            return true;
        } else {
            return false;
        }
        $stmt = null;
    }


    public function getProduct($pid){
        $sql = "SELECT * FROM products WHERE id = ? ORDER BY id DESC";
        $stmt = $this->db->prepare($sql);
        $stmt->execute(array($pid));
        if ($stmt) {
            return $stmt;
        } else {
            return false;
        }
        $stmt = null;
    }


    public function getCartSum($userid){
        $sql = "SELECT * FROM cart WHERE userid = ? ORDER BY id DESC";
        $stmt = $this->db->prepare($sql);
        $stmt->execute(array($userid));
        if ($stmt) {
            return $stmt;
        } else {
            return false;
        }
        $stmt = null;
    }

    public function productPagination(){
        $result_per_page = 12;
        $sql = "SELECT * FROM products";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        $no_of_result =  $stmt->rowCount();
        $stmt = null;
        $number_of_pages = ceil($no_of_result/$result_per_page);
        return $number_of_pages;
    }

    public function securePass($pass) {
        return md5(md5(md5(md5($pass))));
    }

    public function login($email, $password) {
        $sql = "SELECT * FROM users WHERE email = ? AND password = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute(array($email, $password));
        return $stmt;
    }

    public function store_login($email, $password) {
        $sql = "SELECT * FROM store WHERE semail = ? AND password = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute(array($email, $password));
        if($stmt->rowCount() == 1) {
            return $stmt;
        } else {
            return false;
        }
        $stmt = null;
        
    }

    public function search($s) {
        $sql = "SELECT * FROM products WHERE product_category LIKE ? OR product_name LIKE ? OR product_description LIKE ? OR store LIKE ? ORDER BY id DESC";
        $stmt = $this->db->prepare($sql);
        $stmt->execute(array('%'.$s.'%', '%'.$s.'%', '%'.$s.'%', '%'.$s.'%'));
        if($stmt->rowCount() > 0) {
            return $stmt;
        } else {
            return false;
        }
        $stmt = null;
        
    }

    public function search_category($s) {
        $sql = "SELECT * FROM products WHERE product_category LIKE ? ORDER BY id DESC";
        $stmt = $this->db->prepare($sql);
        $stmt->execute(array('%'.$s.'%'));
        if($stmt->rowCount() > 0) {
            return $stmt;
        } else {
            return false;
        }
        $stmt = null;
        
    }

    public function clearProductSaved($uid) {
        $sql = "DELETE FROM saved WHERE userid = ? ORDER BY id DESC";
        $stmt = $this->db->prepare($sql);
        $stmt->execute(array($uid));
        if($stmt) {
            return true;
        } else {
            return false;
        }
        $stmt = null;
        
    }

    //STORE SCRIPTS HERE

    public function checkStore($name) {
        $sql = "SELECT * FROM store WHERE sname = ? ORDER BY id DESC LIMIT 1";
        $stmt = $this->db->prepare($sql);
        $stmt->execute(array($name));
        if($stmt->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
        $stmt = null;
        
    }

    public function checkStoreTotal($sname, $semail, $sphone) {
        $sql = "SELECT * FROM store WHERE sname = ? OR semail = ? OR sphone = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute(array($sname, $semail, $sphone));
        if($stmt->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
        $stmt = null;
        
    }

    public function checkStoreEmail($email) {
        $sql = "SELECT * FROM store WHERE semail = ? ORDER BY id DESC LIMIT 1";
        $stmt = $this->db->prepare($sql);
        $stmt->execute(array($email));
        if($stmt->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
        $stmt = null;
        
    }

    public function checkUserEmail($email) {
        $sql = "SELECT * FROM users WHERE email = ? ORDER BY id DESC LIMIT 1";
        $stmt = $this->db->prepare($sql);
        $stmt->execute(array($email));
        if($stmt->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
        $stmt = null;
        
    }

    public function createStore($sname, $sphone, $semail, $slink, $password) {
        $sql = "INSERT INTO store (sname, sphone, semail, slink, password) VALUES (?, ?, ?, ?, ?)";
        $stmt = $this->db->prepare($sql);
        $stmt->execute(array($sname, $sphone, $semail, $slink, $password));
        if($stmt) {
            return true;
        } else {
            return false;
        }
        $stmt = null;
        
    }

    public function createUser($fname, $lname, $email, $pass) {
        $sql = "INSERT INTO users (fname, lname, email, password) VALUES (?, ?, ?, ?)";
        $stmt = $this->db->prepare($sql);
        $stmt->execute(array($fname, $lname, $email, $pass));
        if($stmt) {
            return true;
        } else {
            return false;
        }
        $stmt = null;
        
    }

    public function isSubscribed($email) {
        $sql = "SELECT * FROM newsletter WHERE email = ? ORDER BY id DESC LIMIT 1";
        $stmt = $this->db->prepare($sql);
        $stmt->execute(array($email));
        if($stmt->rowCount() == 1) {
            return true;
        } else {
            return false;
        }
        $stmt = null;
        
    }


    public function subscribe($email) {
        $sql = "INSERT INTO newsletter(email, status) VALUES(?, ?)";
        $stmt = $this->db->prepare($sql);
        $stmt->execute(array($email, 'subscribed'));
        if($stmt) {
            return true;
        } else {
            return false;
        }
        $stmt = null;
        
    }

    public function updateSubscribed($email, $status) {
        $sql = "UPDATE newsletter SET status = ? WHERE email = ? ORDER BY id DESC LIMIT 1";
        $stmt = $this->db->prepare($sql);
        $stmt->execute(array($status, $email));
        if($stmt) {
            return true;
        } else {
            return false;
        }
        $stmt = null;
        
    }

}