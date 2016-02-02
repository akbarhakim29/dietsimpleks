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
                        DATA MENU MAKANAN 
                    </div>
	            	<div class="panel-body">
	            		<div class="table-responsive">
		            		<table class="table table-striped table-bordered table-hover" id="dataTables-example">
								<thead>
									<tr>
										<th> NO </th>
										<th> NAMA MAKANAN </th>
										<th> KALORI </th>
										<th> PROTEIN </th>
										<th> LEMAK </th>
										<th> KARBOHIDRAT </th>
										<th> HARGA </th>
										<th> PILIH </th>
									</tr>
								</thead>
								<tbody>
								<?php echo form_open('user/nutrisiuser');
									foreach ($makanan as $row) { ?>
										<tr>
											<td><?php echo $row->id_makanan ;?></td> 
											<td><?php echo $row->nama_makanan ;?></td>
											<td><?php echo $row->kalori ;?></td>
											<td><?php echo $row->protein ;?></td>
											<td><?php echo $row->lemak ;?></td>
											<td><?php echo $row->karbohidrat ;?></td>
											<td><?php echo $row->harga ;?></td>
											<td><input type="checkbox" name="pilihmakanan[]" value="<?php echo $row->id_makanan; ?>"/></td>
										</tr> 	
									<?php	
									}	?>
								</tbody>
							</table>
									<button type="submit" value="submit" class="btn btn-primary btn-lg">SUBMIT</button>
									<?php echo form_close(); ?>  	
	            		</div> 	
	            	</div>
	            </div>   
            </div>
        </div>
    </section>

</body>
