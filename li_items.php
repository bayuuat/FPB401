<h1 class="h3 mb-2 text-gray-800">Tables Items</h1>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header">
        <div class="row m-0">
            <h6 class="m-0 font-weight-bold text-primary align-self-center">DataTables</h6>
            <a class="btn btn-dark btn-sm ml-auto" href="form_users.php" class="tombol-action">+
                Tambah Item</a>
        </div>
    </div>
    <div class="card-body">

        <?php
        $query = mysqli_query($koneksi, "SELECT barang.*, kategori.kategori FROM barang JOIN kategori ON barang.id_kategori=kategori.id_kategori");
        
        if(mysqli_num_rows($query) == 0){
            echo "<h3>Saat ini belum ada barang di dalam table barang</h3>";
        }else{	
            echo "<div class='table-responsive'>";
            echo "<table class='table table-bordered' id='dataTable' width='100%' cellspacing='0'>";
            
            echo "<thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Barang</th>
                        <th>Kategori</th>
                        <th>Detail</th>
                        <th>Harga</th>
                        <th>Stok</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>";
                
            $no=1;
            while($row=mysqli_fetch_assoc($query)){
                
                echo "<tr>
                        <td>$no</td>
                        <td>$row[nama_barang]</td>
                        <td>$row[kategori]</td>
                        <td>$row[detail_barang]</td>
                        <td>$row[harga_barang]</td>
                        <td>$row[stok_barang]</td>
                        <td>$row[status]</td>
                        <td>
                            <a href='form_barang'>Edit</a>
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