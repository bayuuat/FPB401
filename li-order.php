<h1 class="h3 mb-2 text-gray-800">Tables Order</h1>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header">
        <div class="row m-0">
            <h6 class="m-0 font-weight-bold text-primary align-self-center">DataTables</h6>
        </div>
    </div>
    <div class="card-body">

        <?php
        $query = mysqli_query($koneksi, "SELECT pesanan.*, user.nama, SUM(quantity) as total_barang FROM pesanan JOIN user ON pesanan.id_user=user.id_user JOIN pesanan_det ON pesanan.id_pesanan=pesanan_det.id_pesanan GROUP BY pesanan_det.id_pesanan ORDER BY pesanan.waktu_pesan ASC");
        
        if(mysqli_num_rows($query) == 0){
            echo "<h3>Saat ini belum ada barang di dalam table barang</h3>";
        }else{	
            echo "<div class='table-responsive'>";
            echo "<table class='table table-bordered' id='dataTable' width='100%' cellspacing='0'>";
            
            echo "<thead>
                    <tr>
                        <th>Tanggal</th>
                        <th>Nomor</th>
                        <th>Nama</th>
                        <th>Jumlah Barang</th>
                        <th>Total</th>
                        <th>Status</th>
                        <th>Action</th>
                        
                    </tr>
                </thead>";
                
            $no=1;

            $queryDet = mysqli_query($koneksi, "SELECT * FROM pesanan_det GROUP BY pesanan_det.id_pesanan");
            $rowdet=mysqli_fetch_assoc($queryDet);


            while($row=mysqli_fetch_assoc($query)){
                $status = $row['status'];
                foreach($arrayStatusPesanan AS $key => $value){
                    if($status == $key){
                        
                    }}
                echo "<tr>
                        <td>$row[waktu_pesan]</td>
                        <td>$row[id_pesanan]</td>
                        <td>$row[nama]</td>
                        <td>$row[total_barang]</td>
                        <td>$row[nama]</td>
                        <td>$row[nama]</td>
                        <td>
                            <a class='btn btn-dark' href='dashboard.php?page=order&action=detail&id_pesanan=$row[id_pesanan]'>Detail Pesanan</a>
                            <a class='btn btn-secondary' href='dashboard.php?page=order&action=form&id_pesanan=$row[id_pesanan]'>Update Status</a>
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