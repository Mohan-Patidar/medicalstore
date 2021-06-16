<?php 

 include "header.php";

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>

   
    <div class="box">
        <div class="container">
            <div class="img-left">
                <img src="./assets/images/Repeat Grid 2.png" width="100px" alt="">
            </div>
            <div class="img-right">
                <img src="./assets/images/Repeat Grid 1.png" width="120px" alt="">
            </div>
        </div>
    </div>
    <div class="container">
        <div class="dashboard">
            <div style="margin-bottom: 20px;">
                <h3>
                    Transcation history
                </h3>
            </div>
            <table id="example" class="table table-striped" style="width:100%;">

                <thead style="border: none;">
                    <tr class="text-center">
                        <th style="display: none;"></th>
                        <th style="display: none;"></th>
                        
                    </tr>
                </thead>
                <tbody>
                    <?php
                       $select = $conn->prepare("SELECT * FROM customers ORDER BY id ASC");
                       $select->execute();
            
                    while ($row = $select->fetch(PDO::FETCH_OBJ)) {
                        $a = $row->name;
                        $b = $row->lname;
                        $n = $a[0];
                        $l = $b[0];
                       
                    ?>
                    
                    <tr>
                        <td>
                            <div class="d-flex align-items-center">
                                <span class="user-img">
                                    <h3><?php echo $n . '' . $l; ?></h3>
                                </span>
                                <span>
                                    <p class="user-name"><a href="customerd.php?id=<?php echo $row->id;?>&name=<?php echo $row->name ?>"><?php echo $row->name . ' ' . $row->lname; ?></p>
                                </span> 
                            </div>
                        </td>
                      
                        <td>
                            <span class="mr-2"> 
                            
                            </span>
                             <span><?php if($row->price<0){?>
                                <span class="minus">-</span>
                                 <span>&#8377</span>
                                <?php  echo - $row->price; 
                                }else{?>
                              
                                    <span class="plas">+</span>
                                    <span>&#8377</span>
                                    <?php echo $row->price;
                                }?></span>
                        </td>
                    </tr>
                     <?php    }    ?>
                </tbody>
            </table>
        </div>
    </div>
        
    
    <?php include "footer.php"; ?>
    <script>
        $(document).ready(function() {
            $('#example').DataTable({
                responsive: true,
                scrollY: 460
            });
        });
    </script>


   
</body>
</html>
    