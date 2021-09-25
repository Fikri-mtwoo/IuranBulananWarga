<!-- <?php var_dump($iuran)?> -->
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
             <p>Iuran/Bulan <span><?php if($iuran !== null) :?>: Rp. <?=number_format($iuran->TotalIuran)?><?php endif?></span></p>
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
                 <tbody>
                        <?php if($transaksi !== null) :?>
                            <?php foreach ($bulan as $bln) : ?>
                                <tr class="text-center">
                                    <td><?=$bln['IdBulanIuran']?></td>
                                    <td><?=$bln['NamaBulan']?></td>
                                        
                                        <?php if ($bln['IdBulanIuran'] == $bln['IdBulanIuran']) :?>
                                            <?php foreach ($transaksi as $tsk) : ?>
                                                <?php if($tsk['IdBulan'] == $bln['IdBulanIuran']) :?>
                                                    <?php if ($tsk['IdPetugas'] !== null) :?>
                                                        <?php if ($tsk['Keterangan'] == 'kosong') :?>
                                                            <td colspan="3" class="table-danger text-danger">KOSONG</td>
                                                        <?php endif?>
                                                        <?php if ($tsk['Keterangan'] == null) :?>
                                                            <td class="table-success"><?=$tsk['TanggalBayar']?></td>
                                                            <td class="table-success"><?=number_format($tsk['JmlBayar'])?></td>
                                                            <td class="table-success"><?=$tsk['NamaPetugas']?></td>
                                                        <?php endif?>
                                                    <?php endif?>
                                                    <?php if ($tsk['IdPetugas'] == null) :?>
                                                        <td colspan="3" class="table-danger">Belum Dibayar</td>
                                                    <?php endif?>
                                                <?php endif?>
                                            <?php endforeach?>
                                        <?php endif?>
                                </tr>
                            <?php endforeach?>
                            <?php $total = 0; foreach ($transaksi as $tsk) :?>
                                <?php $total += $tsk['JmlBayar']?>
                            <?php endforeach?>
                            <tr class="text-center">
                                <td colspan='4'>Total</td>    
                                <td><?=number_format($total)?></td>  
                            </tr>
                        <?php else :?>
                            <td colspan="5" class="table-warning text-center">Tidak Terdapat Data Transaksi</td>
                        <?php endif?>
                 </tbody>
             </table>
             <p>Rincian :</p>
             <?php if($iuran !== null) :?><p><?=$iuran->RincianIuran?></p><?php endif?>
             <p class="text-right"><strong>Bendahara RT 01</strong></p>
             <p class="text-right"><strong>Zaenal Mutaqin S</strong></p>
             <P><strong><em>Diharap Pembayaran Paling Lambat Tgl 5 setiap bulan</em></strong></P>
         </div>
         </div>
     </div>
</div>

</div>
<!-- /.container-fluid -->