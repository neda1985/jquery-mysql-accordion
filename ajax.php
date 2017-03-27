<?php
  include 'class.uiFeatures.php';




    
if(isset($_POST['gettmasterName'])){
           $ui = new uiFeatures('localhost', 'root', '', 'onlineexam');
    $result=$ui->createAccordian(
        array('table' => $_POST['gettmasterName'], 'title' => $_POST['gettmasterField'], 'PK' =>  $_POST['gettmasterpk'])
       ,array('table' => $_POST['gettdetailName'], 'title' => $_POST['gettdetailField'], 'FK' => $_POST['gettdetailFK']));
    echo $result;
           
}


?>
