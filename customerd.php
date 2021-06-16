<?php include "header.php"; ?>
<div class="container">
<?php

$id = $_GET['id'];
$select = $conn->prepare("SELECT * FROM customers WHERE id=$id");
$select->execute();

$row = $select->fetch(PDO::FETCH_OBJ); 
$select1 = $conn->prepare("SELECT * FROM customer_detail WHERE customer_id=$id");  
$select1->execute();  
// $rows = $select1->fetch(PDO::FETCH_OBJ); 

$a = $row->name;
$b = $row->lname;
$n = $a[0];
$l = $b[0];  
?>

      

<div class="mt-4">
    <div class="bg-white ">
      <div class="d-flex align-items-center justify-content-between box-padding">
        <div class="d-flex align-items-center">
          <div class="name-icon">
            <h3><?php  echo $n.''.$l ;?></h3>
          </div>
          <div>
            <p class="user-name">
              <?php  echo $row->name.' '. $row->lname ;?>
            </p>
            <p class="user-no">
            <?php echo $row->phone;?>
            </p>
          </div>
        </div>
        <div>
          <p class="user-name text-right">
            total balance
          </p>
          <div>
            <span class="f-color">&#8377 <?php echo $row->price; ?></span>
            <span class="m-0" style="color: #4D4D57;">You will give</span>
          </div>
        </div>
      </div>
      <div class="b-bottom"></div>
      <div class="box-padding">
        <?php
        
          echo '<table  class="display" style="width:100%">
          <thead>
              <tr>
                  <th>Entries</th>
                  <th>Details</th>
                 
                  <th>you gave </th>
                  <th>you got</th> 
              </tr>
          </thead>';
          $count = 0;
          
        ?>

        <tbody>
       <?php while($rows = $select1->fetch(PDO::FETCH_OBJ)){
                    ?>
                    
            <tr>
              <td><?php echo $rows->date; ?> </td>
              <td class="text-capitalize"><?php echo $rows->details; ?> </td>
            
              <td class="you-gave">&#8377 <?php echo $rows->gave_price; ?></td>
              <td class="you-got">&#8377 <?php echo $rows->take_price; ?></td>
              
              <td>
                
              </td>
        </tbody>
        <?php
       }
          echo "</table>";
        ?>
        <ul class="gave-got-button">
          <li>
            <button  data-toggle="modal" data-target="#mModal<?php echo $count; ?>">You Got</button>
            
          </li>
          <div class="modal" id="mModal<?php echo $count; ?>">
              <div class="modal-dialog">
                <div class="modal-content">
                  <!-- Modal Header -->
                  <div class="modal-header">
                    <h4 class="modal-title">You Got &#8377 </h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                  </div>  
                  <!-- Modal body -->
                  <div class="modal-body">
                    <input type="hidden" id="old_price" value="<?php echo $row->price; ?>" >
                    <input type="hidden" id="id" value="<?php echo $row->id; ?>" >
                    <form action="javascript:void(0)" method="Post" class="text-left" >
                      <label>Enter Amount</label>
                      <input type="number" name="sprice" id="sprice" class="add" autocomplete="off" required>
                      <div style="display: none;" class="pop">
                        <label>Enter Details</label>
                        <input type="text" name="sdetail" id="sdetail" required>
                        <label>When did you got?</label>
                        <input type="date" name="date" id="sdate" required>
                        <input type="submit" id="sub" class="open pop-submit-button" value="Got" />
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          
        
          <li>
            <button  data-toggle="modal" data-target="#myModal<?php echo $count; ?>">You Gave</button>
          </li>
          <div class="modal" id="myModal<?php echo $count; ?>">
              <div class="modal-dialog">
                <div class="modal-content">
                
                  <!-- Modal Header -->
                  <div class="modal-header">
                    <h4 class="modal-title">You Gave &#8377 </h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                  </div>
                  
                  <!-- Modal body -->
                  <div class="modal-body">
                  <input type="hidden" id="old_price" value="<?php echo $row->price; ?>" >
                  <input type="hidden" id="id" value="<?php echo $row->id; ?>" >
                
                  <form action="javascript:void(0)" method="Post" class="text-left" >
                    <label>Enter Amount</label>
                    <input type="number" name="price" id="price" class="add" autocomplete="off" required>
                    <div style="display: none;" class="pop">
                        <label>Enter Details</label>
                        <input type="text" name="detail" id="detail" autocomplete="off" required>
                        <label>When did you give?</label>
                        <input type="date" name="date" id="date" required>
                      
                        <input type="submit" id="send" class="open pop-submit-button" value="Gave" />
                    </div>
                  </form>
                  
                  </div>
                </div>
              </div>
            </div>
        </ul>
           
      </div>
</div>



<?php include "footer.php"; ?>





