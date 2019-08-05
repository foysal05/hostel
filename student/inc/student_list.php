 <div class="row">

    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="card">
            <h5 class="card-header">Student List</h5>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example" class="table table-striped table-bordered first">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Photo</th>
                                <th>Name</th>
                                <th>Father</th>
                                <th>Mother</th>
                                <th>Profile</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $query="SELECT * FROM student";
                            $result=mysqli_query($con,$query);
                            if(mysqli_num_rows($result)>0){
                                while($row=mysqli_fetch_array($result, MYSQLI_ASSOC)){


                                    ?>
                                    <tr>
                                        <td><?php echo $row['v_id']; ?></td>
                                        <td><img src="db/<?php echo $row['photo']; ?>" width="100" height="100"></td>
                                        <td><?php echo $row['fullname']; ?></td>
                                        <td><?php echo $row['father_name']; ?></td>
                                        <td><?php echo $row['mother_name']; ?></td>
                                        <td><a href="profile.php?id=<?php echo $row['v_id']; ?>" class="btn btn-info">Profile</a></td>

                                    </tr>
                                    <?php   
                                }
                            }
                            ?>
                        </tbody>
                        <tfoot>
                            <tr>

                                <th>ID</th>
                                <th>Photo</th>
                                <th>Name</th>
                                <th>Father</th>
                                <th>Mother</th>
                                <th>Profile</th>
                            </tr>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- ============================================================== -->
<!-- end basic table  -->
<!-- ============================================================== -->
</div>