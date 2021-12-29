<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="display.css"> 

</head>
<body>
    <center>
    <div id="header" align="center"> Credit Entries</div>
        <div class="center-div">
            <div class="table-responsive">
                <table>
                    <thead>
                        <tr>
                            <th>reason</th>
                            <th>date</th>
                            <th>time</th>
                            <th>amount</th>
                            <th>Recieve</th>
                            <th>animal</th> 
                            <!-- <th colspan="2">Operation</th> -->
                        </tr>

                    </thead>

                    <tbody>
                    <?php

                        include "connect.php";

                        $per_page_record = 6;  
                        if (isset($_GET["page"])) {    
                            $page  = $_GET["page"];    
                        }    
                        else {    
                          $page=1;    
                        }   
                        $start_from = ($page-1) * $per_page_record;


                        $select = "SELECT * from cow LIMIT $start_from, $per_page_record";


                        // $select = "SELECT * from cow";

                        $query = mysqli_query($conn,$select);

                        $nums = mysqli_num_rows($query); 
                        while($res = mysqli_fetch_array($query)){
                           ?>
                            <tr>
                            <td><?php echo $res['reason']?></td>
                            <td><?php echo $res['date']?></td>
                            <td><?php echo $res['time']?></td>
                            <td><?php echo $res['amount']?></td>
                            <td><?php echo $res['Recieve']?></td>
                            <td><?php echo $res['animal']?></td>
                            <!-- <td><i class="fa fa-edit"></i></td>
                            <td><i class="fa fa-trash"></i></td> -->
                        </tr>
                            
                    <?php  
    
                        }
                    ?>  
                    </tbody>
                </table>
            </div>
        </div> 

    <div class="pagination">    
      <?php  
        $select = "SELECT COUNT(*) FROM cow";     
        $query = mysqli_query($conn, $select);     
        $row = mysqli_fetch_row($query);     
        $total_records = $row[0];     
          
        echo "</br>";     
        // Number of pages required.   
        $total_pages = ceil($total_records / $per_page_record);
        $pagLink = "";       
      
        if($page>=2){   
            echo "<a href='display.php?page=".($page-1)."'>  Prev </a>";   
        }       
                   
        for ($i=1; $i<=$total_pages; $i++) {   
          if ($i == $page) {   
              $pagLink .= "<a class = 'active' href='display.php?page="  
                                                .$i."'>".$i." </a>";   
          }               
          else  {   
              $pagLink .= "<a href='display.php?page=".$i."'>   
                                                ".$i." </a>";     
          }   
        };     
        echo $pagLink;   
  
        if($page<$total_pages){   
            echo "<a href='display.php?page=".($page+1)."'>  Next </a>";   
        }   
  
      ?>    
      
    
    </div>  
     
</center>

  
</body>
</html>




