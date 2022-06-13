<?php
    include_once "../config/db.php";
    include_once "script.php";

    // instantiate database
    $database = new Database();
    $db = $database->connect();

    //instantiate user object
    $user = new User($db);

    if(isset($_POST['client'])){
        $post = filter_var_array($_POST,FILTER_SANITIZE_STRING);
        $id                     = $post['id'];
        $user->sender           = $post['name'];
        $user->sender_address   = $post['sender'];
        $user->sender_country   = $post['country'];
        $user->receiver_name    = $post['receiver_name'];
        $user->package_content  = $post['package_content'];
        $user->dispatch_form    = $post['dispatch_form'];
        $user->receiver_address = $post['receiver_address'];
        $user->delivery_country = $post['delivery_country'];
        $user->delivery_type    = $post['delivery_type'];
        $user->dispatch_date    = $post['dispatch_date'];
        $user->arrival_date     = $post['arrival_date'];
        $user->progress         = $post['progress'];


        $user->editClientsInfo($id); 

         header("location:../home?account=edit");
    }

?>