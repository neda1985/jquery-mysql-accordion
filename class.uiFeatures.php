<?php
class uiFeatures
{
    protected
        
        $masterTable
       ,$detailTable
       
       ,$connection
    ;
    private
        $dbPass
       ,$dbHost 
       ,$dbUser
       ,$dbName
       
       
    ; 
    public function __construct($host, $user, $pass,$dbName)
    {
        $this->dbPass = $pass;
        $this->dbName = $dbName;
        $this->dbHost = $host;
        $this->dbUser = $user;
        
        
        $this->connection = $this->connectToDB();
        
    }
    private function connectToDB()
    {
       $connection = mysql_connect($this->dbHost, $this->dbUser, $this->dbPass);
       mysql_select_db($this->dbName, $connection);
       mysql_query("SET NAMES UTF8");
       return $connection;
    }
    
    //$masterTable = array('table' => 'cateories', 'title' => 'title', 'pk' => 'id')
    public function createAccordian($masterTable, $detailTable)
    {
        $this->masterTable = $masterTable;
        $this->detailTable = $detailTable;
        $masterQuery = 
            "SELECT " 
            .$this->masterTable['title'] 
            .", "
            .$this->masterTable['PK'] 
            ." FROM "
            .$this->masterTable['table'];
        $titles = mysql_query($masterQuery, $this->connection);
        
        $acc = '<div id="accordion">';
       
        while($titleBody = mysql_fetch_assoc($titles))
        {
           $text = $masterTable['title'];
            $acc .= "<div class='group'>
                    <h3>$titleBody[$text]</h3>
                    <div>";
           $detailQuery = 
            "SELECT " 
            .$this->detailTable['title'] 
            ." FROM "
            .$this->detailTable['table']
            ." WHERE  "
            .$this->detailTable['FK']
            ." = "
            .$titleBody['id'];
            
            $detail = mysql_query($detailQuery, $this->connection);
            while($detailBody = mysql_fetch_assoc($detail))    
            {
                $detailText = $detailTable['title'];
                $acc.= "<p>$detailBody[$detailText]</p>";
            }
                    
           $acc .='</div></div>';
        }
        
       return $acc.='</div>
           <script>
            $(function() {
                $( "#accordion" )
                .accordion({
                    header: "> div > h3"
                })
                .sortable({
                    axis: "y",
                    handle: "h3",
                    stop: function( event, ui ) {
                       
                       
                        ui.item.children( "h3" ).triggerHandler( "focusout" );
                       
                        $( this ).accordion( "refresh" );
                    }
                });
            });
        </script>';
        
        
    }
    
    
    
    public function __destruct()
    {
        $this->connection = null;
    }
}
?>