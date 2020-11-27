<h1 class="h3 mb-2 text-gray-800">Tables Users</h1>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header">
        <div class="row m-0">
            <h6 class="m-0 font-weight-bold text-primary align-self-center">DataTables</h6>
            <a class="btn btn-dark btn-sm ml-auto" href="form_users.php" class="tombol-action">+
                Tambah Admin</a>
        </div>
    </div>
    <div class="card-body">

        <?php
        $query = mysqli_query($koneksi, "SELECT * FROM user");
        
        if(mysqli_num_rows($query) == 0){
            echo "<h3>Saat ini belum ada barang di dalam table barang</h3>";
        }else{	
            echo "<div class='table-responsive'>";
            echo "<table class='table table-bordered' id='dataTable' width='100%' cellspacing='0'>";
            
            echo "<thead>
                    <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Level</th>
                        <th>Status</th>
                        <th>Action</th>
                        
                    </tr>
                </thead>";
                
            $no=1;
            while($row=mysqli_fetch_assoc($query)){
                
                echo "<tr>
                        <td>$no</td>
                        <td>$row[nama]</td>
                        <td>$row[email]</td>
                        <td>$row[level]</td>
                        <td>$row[status]</td>
                        <td>
                            <a href='dashboard.php?page=user&action=form&id_user=$row[id_user]' class='btn btn-dark btn-sm'>Edit</a>
                            <a href='sys_user.php?id_user=$row[id_user]' class='btn btn-danger btn-sm'>Delete</a>
                        </td>
                    </tr>";
                    
                $no++;
            }
            
            echo "</table>";
            echo "</div>";
        
        }
        ?>
    </div>
</div>