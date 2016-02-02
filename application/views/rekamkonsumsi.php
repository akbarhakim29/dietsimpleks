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
                        DATA REKAM KONSUMSI 
                    </div>
	            	<div class="panel-body">
	            		<div class="table-responsive">
		            		<table class="table table-striped table-bordered table-hover" id="dataTables-example">
								<thead>
									<tr>
										<th> NO </th>
										<th> TANGGAL </th>
										<th> KONSUMSI </th>
										<th> TOTAL HARGA </th>
									</tr>
								</thead>
								<tbody>
								<?php
                                $no = 1 ;
                                foreach ($query as $row) {
								echo "<tr>
										<td>$no</td> 
										<td>$row->tanggal</td>
										<td>$row->takaran_konsumsi</td>
										<td>$row->total_harga</td>
									</tr>";
								$no++;	
								}	
								?>
								</tbody>
							</table>  	
	            		</div> 	
	            	</div>
	            </div>   
            </div>
        </div>
    </section>

	
</body>