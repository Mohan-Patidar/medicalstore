<?php include "header.php"; ?>

    
<div class="customer-bg">
    <div class="container">
        <div>
            <div class="cstm-heading">
                <div>
                    <h3>
                        Customer's List
                    </h3>
                </div>
            <table id="example" class="display" style="width:100%">
                <thead>
                    <tr>
                        <th>s.no.</th>
                        <th>Customer name</th> 
                    </tr>
                <thead>
                <tbody>
                    <?php
                     $select = $conn->prepare("SELECT * FROM customers ORDER BY id ASC");
                     $select->execute();
                     $i=0;
                   
                    while($row = $select->fetch(PDO::FETCH_OBJ)){
                    ?>
                    
                        <tr>  
                            <td><?php echo $row->id;?></td>
                            <td><a href="customerd.php?id=<?php echo $row->id;?>&name=<?php echo $row->name ?>"><?php echo $row->name; ?></td>
                        </tr>
                    
                    <?php
                    }
                    ?>
                </tbody>   
            </table>
        </div>
        
    </div>
</div>

<?php include "footer.php"; ?>