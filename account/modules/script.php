<?php
class User{
  private $con;
  public $email;
  public $password;
  public $sender;
  public $sender_address;
  public $sender_country;
  public $receiver_name;
  public $receiver_address;
  public $package_content;
  public $dispatch_form;
  public $delivery_country;
  public $delivery_type;
  public $dispatch_date;
  public $arrival_date;
  public $crsf;
  public $tracking_number;
  public $date;
  public $id;
  public $details;
  public $other_details;
  public $progress;

    // constructor
    public function __construct($db){
        $this->con = $db;
    }
    //login account
    public function AdminLogin(){
        $stmt  = $this->con->prepare("select email,password,admin_id from admin where email=:email");
        $stmt->bindParam(":email",$this->email);
        $stmt->execute(); 

        if($stmt->rowCount() > 0){
            $result = $stmt->fetch(PDO::FETCH_OBJ);
                if($result->password == $this->password){
                    $_SESSION['email'] = $result->email;
                    $_SESSION['admin_id'] = $result->admin_id;

                    return 'true';
            }else{
                   return 'invalid password';
            }

         }else{
             return 'not found';
         }
    }

    public function addClient(){ // addclient shipping information
        if($this->checkCsrf()){
            return 1;
        }else{
            $stmt = $this->con->prepare("insert into tracking(crsf,sender,sender_address,sender_country,receiver_name,receiver_address,package_content,dispatch_form,delivery_country,delivery_type,dispatch_date,arrival_date,tracking_number)values(:crsf, :sender, :sender_address,:sender_country, :receiver_name,:receiver_address, :package_content,:dispatch_form,:delivery_country, :delivery_type, :dispatch_date, :arrival_date, :tracking_number)");
            $stmt->bindParam(":crsf",$this->crsf);
            $stmt->bindParam(":sender",$this->sender);
            $stmt->bindParam(":sender_address",$this->sender_address);
            $stmt->bindParam(":sender_country",$this->sender_country);
            $stmt->bindParam(":receiver_name",$this->receiver_name);
            $stmt->bindParam(":receiver_address",$this->receiver_address);
            $stmt->bindParam(":package_content",$this->package_content);
            $stmt->bindParam(":dispatch_form",$this->dispatch_form);
            $stmt->bindParam(":delivery_country",$this->delivery_country);
            $stmt->bindParam(":delivery_type",$this->delivery_type);
            $stmt->bindParam(":dispatch_date",$this->dispatch_date);
            $stmt->bindParam(":arrival_date",$this->arrival_date);
            $stmt->bindParam(":tracking_number",$this->tracking_number);

            if($stmt->execute()){
                return "inserted";
            }else{
                echo $this->con->error;
            }
        }
    }
    private function checkCsrf(){ // check for crsf
        $stmt = $this->con->prepare("select crsf from tracking where crsf=:crsf");
        $stmt->bindParam(":crsf",$this->crsf);
        $stmt->execute();

        if($stmt->rowCount() > 0){
            return true;
        }
    }

    public function getClientRowCount($table){ // get all client Count
        $stmt = $this->con->prepare("select * from $table");
        $stmt->execute();

        if($stmt->rowCount() > 0){
            return $stmt->rowCount();
        }else{
            return "0";
        }
    }
    public function getRecodesWithPagination($table,$where=null, $wheres =null, $equal= null, $data= null){ // get all client
      $per_page = 7;
      if(isset($_GET['page'])){
          $page = $_GET['page'];
      }else{
          $page = 1;
      }

      $start_from = ($page -1) * $per_page;

      $stmt = $this->con->prepare("select * from $table $where $wheres $equal $data order by 1 desc limit $start_from, $per_page ");
      $stmt->execute();

      if($stmt->rowCount() > 0){
           $result = $stmt->fetchALL(PDO::FETCH_OBJ);

           return $result;
       }else{
           return "nill";
       }
    }

    public function pagination($table){ // client pagination
        if(isset($_GET['page'])){
          $page = $_GET['page'];
        }else{
            $page = 1;
        }
        $per_page = 7;
        $stmt = $this->con->prepare("select * from $table");
        $stmt->execute();
        $total_records =  $stmt->rowCount();
        $total_pages = ceil($total_records/$per_page);

        $pagination ="<ul class='pagination'>";
        if($page > 1 ){
              $pagination .= "<li class='page-item active'> <a class='page-link' href='../account/home?client=true&page=".($page-1)."'>Prevous</a><span class='sr-only'>(current)</span> </a>  </li>";
             $pagination .= "<li class='page-item disabled'> <a class='page-link' href=#>Next</a><span class='sr-only'>(current)</span> </a></li>";
                    
         }
        for($i = 1; $i < $total_pages; $i++):
        endfor;
        if($i > $page){
            $pagination .= "<li class='page-item disabled'><a class='page-link' href=#>Previous</a><span class='sr-only'>(current)</span> </a></li>";
            $pagination .= "<li class='page-item active'><a class='page-link' href='../account/home?client=true&page=".($page+1)."'>Next</a><span class='sr-only'>(current)</span> </a></li>";               
        }
        $pagination .=   "</ul>";

        echo $pagination; 
    }
        public function paginationfOR($table,$id){ // client pagination
        if(isset($_GET['page'])){
          $page = $_GET['page'];
        }else{
            $page = 1;
        }
        $per_page = 7;
        $stmt = $this->con->prepare("select * from $table");
        $stmt->execute();
        $total_records =  $stmt->rowCount();
        $total_pages = ceil($total_records/$per_page);

        $pagination ="<ul class='pagination'>";
        if($page > 1 ){
              $pagination .= "<li class='page-item active'> <a class='page-link' href='../account/home?view=$id&page=".($page-1)."'>Prevous</a><span class='sr-only'>(current)</span> </a>  </li>";
             $pagination .= "<li class='page-item disabled'> <a class='page-link' href=#>Next</a><span class='sr-only'>(current)</span> </a></li>";
                    
         }
        for($i = 1; $i < $total_pages; $i++):
        endfor;
        if($i > $page){
            $pagination .= "<li class='page-item disabled'><a class='page-link' href=#>Previous</a><span class='sr-only'>(current)</span> </a></li>";
            $pagination .= "<li class='page-item active'><a class='page-link' href='../account/home?view=$id&page=".($page+1)."'>Next</a><span class='sr-only'>(current)</span> </a></li>";               
        }
        $pagination .=   "</ul>";

        echo $pagination; 
    }


    public function singleClient($table,$id){ // get single client details
        $stmt  = $this->con->prepare("select * from $table where id=$id");
        $stmt->execute(); 

         if($stmt->rowCount() > 0){
             $result = $stmt->fetch(PDO::FETCH_OBJ);

             return $result;
         }else{
             return 'not found';
         }
    }
    public function deleteClient($table,$id){ // delete clients
        $stmt  = $this->con->prepare("delete from $table where id='$id'");
        $stmt->execute(); 

        return true;
    }

    public function editClientsInfo($id){ // edit clients details 
        $stmt  = $this->con->prepare("UPDATE `tracking` 
        SET 
        `sender` =:sender,
        `sender_address` =:sender_address,
        `sender_country` =:sender_country,
        `receiver_name`  =:receiver_name,
        `receiver_address`  =:receiver_address,

        `package_content`=:package_content,
        `dispatch_form`  =:dispatch_form,
        `delivery_country`=:delivery_country,
        `delivery_type`  =:delivery_type,
        `dispatch_date`  =:dispatch_date,
        `arrival_date`   =:arrival_date,
        `progress`       =:progress

         WHERE id        =$id");

        $stmt->bindParam(":sender",$this->sender);
        $stmt->bindParam(":sender_address",$this->sender_address);
        $stmt->bindParam(":sender_country",$this->sender_country);
        $stmt->bindParam(":receiver_name",$this->receiver_name);
        $stmt->bindParam(":receiver_address",$this->receiver_address);

        $stmt->bindParam(":package_content",$this->package_content);
        $stmt->bindParam(":dispatch_form",$this->dispatch_form);
        $stmt->bindParam(":delivery_country",$this->delivery_country);
        $stmt->bindParam(":delivery_type",$this->delivery_type);
        $stmt->bindParam(":dispatch_date",$this->dispatch_date);
        $stmt->bindParam(":arrival_date",$this->arrival_date);
        $stmt->bindParam(":progress",$this->progress);

        
        $stmt->execute();

        return true;
    }
    public function addShippingHistory(){ // addclient shipping history
     
        $stmt = $this->con->prepare("insert into shipping_history(client_id,location,tracking_number,details,other_details)values(:client_id,:location,:tracking_number,:details,:other_details)");
        $stmt->bindParam(":client_id",$this->id);
        $stmt->bindParam(":location",$this->delivery_country);

        $stmt->bindParam(":tracking_number",$this->tracking_number);
        $stmt->bindParam(":details",$this->details);
        $stmt->bindParam(":other_details",$this->other_details);
    
        if($stmt->execute()){
            return "inserted";
        }else{
            echo $this->con->error;
        }
    }

    public function editShippingDetails($id){ //edit shipping history
        $stmt = $this->con->prepare("UPDATE `shipping_history` SET
        `details` =:details
        WHERE id= $id");

        $stmt->bindParam(':details',$this->details);
        if($stmt->execute()){
             return "updated";
        }
    }

    public function getShippingHistory($table,$data){ // get shipping history on track
        $stmt  = $this->con->prepare("select * from $table where tracking_number =:tracking_number order by 1 desc limit 7");
        $stmt->bindParam(':tracking_number',$data);
        $stmt->execute(); 

         if($stmt->rowCount() > 0){
             $result = $stmt->fetchAll(PDO::FETCH_OBJ);

             return $result;
         }else{
             return 'not found';
         }
    }

     public function singleClientTrack($table,$num){ // get single client tracking info
        $stmt  = $this->con->prepare("select * from $table where tracking_number=:tracking_number");
        $stmt->bindParam(":tracking_number",$num);
        $stmt->execute(); 

         if($stmt->rowCount() > 0){
             $result = $stmt->fetch(PDO::FETCH_OBJ);

             return $result;
         }else{
             return 'not found';
         }
    }
       
    public function __destruct(){
        $this->con  = null;
    }

    // escape strings
    private function cleanString($data){
       $data = htmlspecialchars($data);
       $data = trim($data);
       $data = stripslashes($data);
       $data = strip_tags($data);

       return $data;
    }
}

?>