<body>
	<nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-main-collapse">
                    <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand page-scroll" href="home">
                    <i class="fa fa-play-circle"></i>  <span class="light">Start </span><?php echo $username ?>
                </a>
            </div>
             <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse navbar-right navbar-main-collapse">
                <ul class="nav navbar-nav">
                    <!-- Hidden li included to remove active class from about link when scrolled up past about section -->
                    <li class="hidden">
                        <a href="#page-top"></a>
                    </li>
                   
                    <li>
                        <?php echo anchor('user/profil', 'PROFIL'); ?>
                    </li>
                    <li>
                        <?php echo anchor('user/logout', 'LOG OUT'); ?> 	
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <section  class="container content-section text-center">
        <div class="row">
            <div class="col-lg-12 col-lg-offset-0">
            	<div class="panel panel-default">
                    <div class="panel-heading">
                        KEBUTUHAN USER
                    </div>
					<div class="panel-body">
	            		<div class="table-responsive">
		            		<table class="table table-striped table-bordered table-hover" id="dataTables-example">
							<thead>
								    <th></th>
								    <th>Kalori</th>
									<th>Protein</th>
									<th>Lemak</th>
									<th>Karbohidrat</th>	
							</thead>
							<tbody>
								<tr>
									<td>Batas Bawah</td>
									<td rowspan="2"><?php echo $kebutuhanUser['TEE'] ?></td>
									<td><?php echo $kebutuhanUser['protein_BB']?></td>
									<td><?php echo $kebutuhanUser['Fat_BB']?></td>
									<td><?php echo $kebutuhanUser['Carbohidrate_BB']?></td>
								</tr>

								<tr>
									<td>Batas atas</td>
									<td><?php echo $kebutuhanUser['protein_BA']?></td>
									<td><?php echo $kebutuhanUser['Fat_BA']?></td>
									<td><?php echo $kebutuhanUser['Carbohidrate_BA']?></td>	
								</tr>
							</tbody>
							</table>
						</div> 	
	            	</div>
	            </div>   
            </div>
        </div>
    </section>


    <section  class="container content-section text-center">
        <div class="row">
            <div class="col-lg-12 col-lg-offset-0">
            	<div class="panel panel-default">
                    <div class="panel-heading">
                        MAKANAN TERPILIH
                    </div>
					<div class="panel-body">
	            		<div class="table-responsive">
		            		<table class="table table-striped table-bordered table-hover" id="dataTables-example">
							<thead>
								<th>Id Makanan</th>
								<th>Nama Makanan</th>
								<th>Kalori</th>
								<th>Protein</th>
								<th>Karbohidrat</th>
								<th>Lemak</th>
								<th>Harga</th>
							</thead>
							<tbody>
							<?php for ($i=0; $i < $countMakanan; $i++) {  ?>
							<tr>
								<td><?php echo $getMakanan[$i]['id_makanan'] ;?></td> 
								<td><?php echo $getMakanan[$i]['nama_makanan'] ;?></td>
								<td><?php echo $getMakanan[$i]['kalori'] ;?></td>
								<td><?php echo $getMakanan[$i]['protein'] ;?></td>
								<td><?php echo $getMakanan[$i]['lemak'] ;?></td>
								<td><?php echo $getMakanan[$i]['karbohidrat'] ;?></td>
								<td><?php echo $getMakanan[$i]['harga'] ;?></td>
							</tr>
							<?php } ?>
							</tbody>
							</table> 
						</div>
					</div>
				</div>  
            </div>
        </div>
    </section>

    <section  class="container content-section text-center">
        <div class="row">
            <div class="col-lg-12 col-lg-offset-0">
            	
            	<div class="panel panel-default">
                    <div class="panel-heading">
                        FUNGSI TUJUAN 
                    </div>
					<div class="panel-body">
	            		<div class="table-responsive">
		            		<table class="table table-striped table-bordered table-hover" id="dataTables-example">
							<thead>
								<th>No</th>
								<th>Fungsi Tujuan</th>
							</thead>
							<tbody>
								<tr>
									<td>1</td>
									<td><?php echo "Z = ".$fungsiTujuan ; ?></td>
								</tr>
							</tbody>
							</table>
						</div>
					</div>
				</div>

				<div class="panel panel-default">
                    <div class="panel-heading">
                        FUNGSI KENDALA
                    </div>
					<div class="panel-body">
	            		<div class="table-responsive">
		            		<table class="table table-striped table-bordered table-hover" id="dataTables-example">
							<thead>
								<th>No</th>
								<th>Fungsi Kendala</th>
							</thead>
							<tbody>
							<?php 
							for ($i=0; $i < $countMakanan+$countNutrisi; $i++) { ?>
								<tr>
									<td><?php echo ($i+1)."." ; ?></td>
									<td><?php echo $fungsiKendala[$i]; ?></td>
								</tr>
							<?php } ?>
							</tbody>
							</table>
						</div>
					</div>
				</div>
            </div>
        </div>
    </section>

    <section  class="container content-section text-center">
        <div class="row">
            <div class="col-lg-12 col-lg-offset-0">
            	
            	<div class="panel panel-default">
                    <div class="panel-heading">
                        MODEL STANDAR FUNGSI TUJUAN 
                    </div>
					<div class="panel-body">
	            		<div class="table-responsive">
		            		<table class="table table-striped table-bordered table-hover" id="dataTables-example">
							<thead>
								<th>No</th>
								<th>Fungsi Tujuan</th>
							</thead>
							<tbody>
								<tr>
									<td>1</td>
									<td><?php echo "Z = ".$modelStandar_Tujuan ; ?></td>
								</tr>
							</tbody>
							</table>
						</div>
					</div>
				</div>

            	<div class="panel panel-default">
                    <div class="panel-heading">
                        MODEL STANDAR FUNGSI KENDALA
                    </div>
					<div class="panel-body">
	            		<div class="table-responsive">
		            		<table class="table table-striped table-bordered table-hover" id="dataTables-example">	
							<thead>
								<th>No</th>
								<th>Model Standar</th>
							</thead>
							<tbody>
							<?php for ($i=0; $i < $countMakanan+$countNutrisi; $i++) { ?>
								<tr>
									<td><?php echo ($i+1)."." ; ?></td>
									<td><?php echo $modelStandar_Kendala[$i]; ?></td>
								</tr>
							<?php } ?>
							</tbody>
							</table>
						</div>
					</div>
				</div>   
            </div>
        </div>
    </section>

    <section  class="container content-section text-center">
        <div class="row">
            <div class="col-lg-12 col-lg-offset-0">
				<div class="panel panel-default">
                    <div class="panel-heading">
                        MATRIKS AWAL
                    </div>
					<div class="panel-body">
	            		<div class="table-responsive">
		            		<table class="table table-striped table-bordered table-hover" id="dataTables-example">	
							<thead>
								<tr>
								
								<?php for ($i=-1; $i <= $Jum_Kolom; $i++) { ?>
									<th><?php echo $MATRIKS_AWAL[-1][$i] ?></th>
								<?php } ?>
								</tr>
							</thead>
							<tbody>
							<?php for ($i=0; $i <= $Jum_Baris; $i++) { ?>
								<tr>
								<?php for ($j=-1; $j <= $Jum_Kolom ; $j++) { ?>
									<td align="center"><?php echo $MATRIKS_AWAL[$i][$j] ; ?></td>
								<?php } ?>
								</tr>
							<?php } ?>
							</tbody>
							</table>
						</div>
					</div>
				</div>  
            </div>
        </div>
    </section>

   
   	<section  class="container content-section text-center">
        <div class="row">
            <div class="col-lg-12 col-lg-offset-0">
            	<div class="panel panel-default">
                    <div class="panel-heading">
                        MATRIKS AKHIR (iterasi ke- <?php echo $countIterasi ;?>)
                    </div>
					<div class="panel-body">
	            		<div class="table-responsive">
		            		<table class="table table-striped table-bordered table-hover" id="dataTables-example">	
							<thead>
								<tr>
								
								<?php for ($i=-1; $i <= $Jum_Kolom; $i++) { ?>
									<th><?php echo $MATRIKS[-1][$i] ?></th>
								<?php } ?>
								</tr>
							</thead>
							<tbody>
							<?php for ($i=0; $i <= $Jum_Baris; $i++) { ?>
								<tr>
								<?php for ($j=-1; $j <= $Jum_Kolom ; $j++) { 
									if($i>0 and $j>0){ ?>
									<td align="center"><?php echo round($MATRIKS[$i][$j],5) ; ?></td>
								<?php }
									else{ ?>
									<td align="center"><?php echo $MATRIKS[$i][$j] ; ?></td>
								<?php	}
								} ?>
								</tr>
							<?php } ?>
							</tbody>
							</table>
						</div>
					</div>
				</div>   
            </div>
        </div>
    </section>

    <section  class="container content-section text-center">
        <div class="row">
            <div class="col-lg-12 col-lg-offset-0">
            	<div class="panel panel-default">
                    <div class="panel-heading">
                        ZJ DAN CJ-ZJ
                    </div>
					<div class="panel-body">
	            		<div class="table-responsive">
		            		<table class="table table-striped table-bordered table-hover" id="dataTables-example">	
							<thead>
									<tr>
									<th></th>
									<?php for ($i=1; $i <= $Jum_Kolom; $i++) { ?>
										<th><?php echo $MATRIKS[-1][$i] ?></th>
									<?php } ?>
									</tr>
							</thead>
							<tbody>
								<tr>
								<td>Zj</td>
								<?php for ($i=1; $i <= $Jum_Kolom; $i++) { ?>
									<td><?php echo round($Zj[$i],5) ;?></td>			
								<?php } ?>
								</tr>
								<tr>
								<td>Cj-Zj</td>
								<?php for ($i=1; $i <= $Jum_Kolom; $i++) { ?>
									<td><?php echo round($CjZj[$i],5) ; ?></td>			
								<?php } ?>
								</tr>
							</tbody>
							</table>
						</div>
					</div>
				</div>  
            </div>
        </div>
    </section>

    <section  class="container content-section text-center">
        <div class="row">
            <div class="col-lg-12 col-lg-offset-0">
            	<div class="panel panel-default">
                    <div class="panel-heading">
                        TABEL RESULT
                    </div>
					<div class="panel-body">
	            		<div class="table-responsive">
		            		<table class="table table-striped table-bordered table-hover" id="dataTables-example">	
							<thead>
									<tr>
									<th>No</th>
									<th>Variabel</th>
									<th>Nama Makanan</th>
									<th>Jumlah</th>
									</tr>
							</thead>
							<tbody>
							<?php for ($i=0; $i < $countMakanan; $i++) { ?>
								<tr>
								
								<td><?php echo $i+1 ; ?></td>
								<td><?php echo $result[$i][0] ;?></td>			
								<td><?php echo $result[$i][1] ;?></td>
								<td><?php echo round($result[$i][2],5)." satuan   (".round(($result[$i][2]*150),5)." gram)" ;?></td>
								
								</tr>
								<?php } ?>
								<tr>
								<td colspan="3">TOTAL HARGA</td>
								<td><?php echo round($Zj[$Jum_Kolom],0)." Rupiah" ; ?></td>
								</tr>
							</tbody>
							</table>
						</div>

						<div class="panel-body">
						<?php echo validation_errors(); ?>
						<?php echo form_open('user/insertRekamKonsumsi'); ?>
							<form role="form" >
							<fieldset>
								<div class="form-group">
									<input class="form-control" type="hidden" name="harga" value="<?php echo round($Zj[$Jum_Kolom],0); ?>" />
								</div>
								<div class="form-group">
									<input class="form-control" type="hidden" name="gizi" value="<?php 
									for ($i=0; $i < $countMakanan; $i++) {
										echo $result[$i][1]." = ".round($result[$i][2]*150,5)." gram # " ;
										} ?>" />
								</div>
								<button type="submit" value="submit" class="btn btn-primary btn-lg">SIMPAN HASIL</button>	
							</fieldset>	
							</form>
						<?php form_close(); ?>
						</div>

					</div>
				</div>  
            </div>
        </div>
    </section>

</body>
