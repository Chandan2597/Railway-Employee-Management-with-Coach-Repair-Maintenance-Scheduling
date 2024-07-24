<?php 
    include 'dbconfig.php';
    include 'admin_dash.php';
    ?>
    <?php
    if(isset($_GET['search'])){
        $filtervalues=$_GET['search'];
        $query="SELECT * FROM employee WHERE empid LIKE '%$filtervalues%' OR fname LIKE '%$filtervalues%' OR lname LIKE '%$filtervalues%'";
        $query_run=mysqli_query($conn,$query);
        if(mysqli_num_rows($query_run)>0){
            echo "
            <div class='container-xxl'>
	        <div class='table-responsive'>
		    <div class='table-wrapper'>
            <table class='table table-striped table-hover table-bordered'>
			<thead>
				<tr class='bg-primary'>
					<th>Employee ID</th>
					<th>Name</th>
					<th>Designation</th>
					<th>DOB</th>
					<th>Gender</th>
					<th>Date of Joining</th>
					<th>Blood Group</th>
					<th>Email</th>
					<th>Phone</th>
					<th>Address</th>
				</tr>
			</thead>
			<tbody>
            </div>
            </div>
            </div>";
            foreach($query_run as $items){
                ?>
                <tr>
					<td><?php echo $items['empid']; ?></td>
					<td><?php echo $items['fname']; ?>&nbsp;<?php echo $items['mname']; ?><br><?php echo $items['lname']; ?></td>
					<td><?php echo $items['designation']; ?></td>
					<td><?php echo $items['dob']; ?></td>
					<td><?php echo $items['gender']; ?></td>
					<td><?php echo $items['doj']; ?></td>
					<td><?php echo $items['bgroup']; ?></td>
					<td><?php echo $items['email']; ?></td>
					<td><?php echo $items['contact']; ?></td>
					<td><?php echo $items['address']; ?><br><?php echo $items['district']; ?>&#x2c;<?php echo $items['state']; ?><br><?php echo $items['country']; ?>&#x2c;<?php echo $items['pin']; ?></td>
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