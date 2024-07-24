<?php 
    include 'dbconfig.php';
    include 'coach_admin_dash.php';
    ?>
    <button style="border-radius: 10px;" class="btn btn-success" onclick="window.print()">Print PDF</button>
    <?php
    if(isset($_GET['search'])){
        $filtervalues=$_GET['search'];
        $query="SELECT * FROM repairschedule WHERE status='Repaired' AND CONCAT(coachid,date) LIKE '%$filtervalues%'";
        $query_run=mysqli_query($conn,$query);
        if(mysqli_num_rows($query_run)>0){
            echo "
            <div class='container-xxl'>
	        <div class='table-responsive'>
		    <div class='table-wrapper'>
            <table class='table table-striped table-hover table-bordered'>
            <tr class='bg-primary'>
            <th>Coach ID</th>
            <th>Schedule date</th>
            <th>Repair type</th>
            <th>Comments</th>
            </tr>
            </div>
            </div>
            </div>";
            foreach($query_run as $items){
                ?>
                <tr>
                    <td><?= $items['coachid'];?></td>
                    <td><?= $items['date'];?></td>
                    <td><?= $items['type'];?></td>
                    <td><?= $items['comments'];?></td>
                </tr>
                <?php
            }
        }
        else{
            ?>
            <tr>
                    <td colspan="10">No Record Found</td>
                </tr>
            <?php 
        }
    }
?>
</table>