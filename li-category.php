<?php
    $id_kategori = isset($_GET['id_kategori']) ? $_GET['id_kategori'] : false;
	
	$kategori = "";
	$status = "";
	$button = "Add";
	
	if($id_kategori){
		$queryKategori = mysqli_query($koneksi, "SELECT * FROM kategori WHERE id_kategori='$id_kategori'");
		$row = mysqli_fetch_assoc($queryKategori);
		
		$kategori = $row['kategori'];
		$status = $row['status'];
		$button = "Update";
	}

?>

<h1 class="h3 mb-2 text-gray-800">Tables Category</h1>

<div class="card shadow mb-4">
    <div class="card-header">
        <div class="row m-0">
            <h6 class="m-0 font-weight-bold text-primary align-self-center">DataTables</h6>
            <a href="dashboard.php?page=category&action=form" class="btn btn-dark btn-sm ml-auto"
                class="tombol-action">+
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
                        <th>No</th>                        
                        <th>Category</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>";   
                $no=1;         
            while($row=mysqli_fetch_assoc($query)){
                
                echo "<tr>
                        <td>$no</td>
                        <td>$row[kategori]</td>
                        <td>$row[status]</td>
                        <td>
                            <a href='dashboard.php?page=category&action=form&id_kategori=$row[id_kategori]' class='btn btn-dark btn-sm'>Edit</a>
                            <a href='sys_category.php?delete=$row[id_kategori]' method='POST' name='button' value='delete' class='btn btn-danger btn-sm' >Delete</a>
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