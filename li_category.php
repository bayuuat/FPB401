<h1 class="h3 mb-2 text-gray-800">Tables Category</h1>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header">
        <div class="row m-0">
            <h6 class="m-0 font-weight-bold text-primary align-self-center">DataTables</h6>
            <a class="btn btn-dark btn-sm ml-auto" href="form_category.php" class="tombol-action">+
                Tambah Category</a>
        </div>
    </div>
    <div class="card-body">

        <?php
        $query = mysqli_query($koneksi, "SELECT * FROM kategori");
        
        if(mysqli_num_rows($query) == 0){
            echo "<h3>Saat ini belum ada barang di dalam table barang</h3>";
        }else{	
            echo "<div class='table-responsive'>";
            echo "<table class='table table-bordered' id='dataTable' width='100%' cellspacing='0'>";
            
            echo "<thead>
                    <tr>    
                        <th>ID</th>
                        <th>Category</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>";            
            while($row=mysqli_fetch_assoc($query)){
                
                echo "<tr>
                        <td>$row[id_kategori]</td>
                        <td>$row[kategori]</td>
                        <td>$row[status]</td>
                        <td>
                            <a href='form_barang'>Edit</a>
                        </td>
                    </tr>";
            }
            
            echo "</table>";
            echo "</div>";
        
        }
        ?>
    </div>
</div>