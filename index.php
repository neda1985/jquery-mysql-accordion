<html lang="en">
<head>
<meta charset="utf-8">
<title>jQuery UI Tabs - Default functionality</title>
  <link rel="stylesheet" href="http://code.jquery.com/ui/1.11.0/themes/smoothness/jquery-ui.css">
        <script src="http://code.jquery.com/jquery-1.10.2.js"></script>
        <script src="http://code.jquery.com/ui/1.11.0/jquery-ui.js"></script>
 <script src="jquery-2.0.0.min.js"></script>
 
<style>
            /* IE has layout issues when sorting (see #5413) */
            .group { zoom: 1 }
            
        </style>

</head>
<body>
             <script>
                  
                     function displayaccordion(masterName,masterField,masterpk,detailName,detailField,detailFK){
                 $.post(
                        'ajax.php'
                       ,{gettmasterName:masterName,
                       gettmasterField:masterField,
                       gettmasterpk:masterpk,
                       gettdetailName:detailName,
                       gettdetailField:detailField,
                       gettdetailFK:detailFK} 
                       ,function(data)
                        {
                            
   
       $('#disp').html(data) 

                           
                        }
         )    
                     }
                 
 
                 </script>
             
                        
        <h1>Welcome to jquery ui class</h1>
         <h2>To create your desired  Accordion based on your database table please fill the form below:</h2>
         <p>That is so easy and user friendly </p>
        <p style="color:red;">NOT: Database details are protected and must be customized through class.uiFeatures File</p>
        <input type="text" id="txtMastertableName" placeholder="Master Table Name" style="width:200px;">
        <input type="text" id="txtMasterField" placeholder="Master Field to be displayed" style="width:200px;">
        <input type="text" id="txtMasterTablePrimaryKey" placeholder="Master Table Primary Key" style="width:200px;">
        
        <input type="text" id="txtDetailseName" placeholder="Details Table Name" style="width:200px;">
         <input type="text" id="txtDetailseField" placeholder="Details Table Field to be displayed" style="width:250px;">
         <input type="text" id="txtDetailseFK" placeholder="Details Table Foreign Key" style="width:200px;">
        
        

<ul>
<li>
<button onclick="displayaccordion($('#txtMastertableName').val(),
                                           $('#txtMasterField').val(),
                                           $('#txtMasterTablePrimaryKey').val(),
                                           $('#txtDetailseName').val(),
                                           $('#txtDetailseField').val(),
                                           $('#txtDetailseFK').val()
                                            );" >accordion demo</button>
        
    </li>

</ul>

<div id="disp">

</div>
    

<?php


?>
</body>
</html>