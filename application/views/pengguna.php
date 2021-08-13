<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">Kartu Warga</h1>

 <!-- Content Row -->
 <div class="row justify-content-md-center">
     <div class="col-xl-6 col-md-auto">
         <div class="card">
         <div class="card-body">
             <p class="text-center">VILLA MUTIARA SETU</p>
             <P class="text-center">RT 01 / RW 17, DESA CIJENGKOL</P>
             <P class="text-center">KECAMATAN SETU, KABUPATEN BEKASI</P>
             <p class="text-center">SEKRETARIS : Blok B-29 RT 01 / RW 17</p>
             <hr>
             <p>KARTU IURAN WARGA RT 01 / RW 17</p>
             <p>Nama        <span>: </span><?=$warga->Nama?></p>
             <p>No. Rumah   <span>: </span>
                <?php foreach ($rumah as $rmh) : ?>
                    <?=$rmh['NoRumah']?>
                <?php endforeach?>
             </p>
             <p>Iuran/Bulan <span>: Rp. <?=number_format($iuran->TotalIuran)?></span></p>
             <table class="table table-bordered">
                 <thead>
                     <tr>
                         <th>No.</th>
                         <th>Bulan</th>
                         <th>Tanggal</th>
                         <th>Bayar</th>
                         <th>Paraf</th>
                     </tr>
                 </thead>
                 <!-- <tbody>
                        <?php 
                        $no = 1;
                        foreach ($pengguna as $p) {
                            echo "<tr>";
                            echo "<td>".$no++."</td>";    
                            echo "<td>".$p['NamaBulan']."</td>";    
                            echo "<td>".$p['TanggalBayar']."</td>";    
                            echo "<td>".$p['JmlBayar']."</td>";    
                            echo "<td>".$p['NamaPetugas']."</td>";    
                            echo "</tr>";    
                        }
                        echo "<tr>";
                        echo "<td colspan='4'>Total</td>";    
                        echo "<td>".$total->JmlBayar."</td>";  
                        echo "</tr>"; 
                     ?>
                 </tbody> -->
             </table>
             <p>Rincian :</p>
             <p><?=$iuran->RincianIuran?></p>
             <p class="text-right"><strong>Bendahara RT 01</strong></p>
             <p class="text-right"><strong>Zaenal Mutaqin S</strong></p>
             <P><strong><em>Diharap Pembayaran Paling Lambat Tgl 5 setiap bulan</em></strong></P>
         </div>
         </div>
     </div>
</div>

</div>
<!-- /.container-fluid -->