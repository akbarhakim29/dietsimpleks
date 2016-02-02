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
            <div class="col-lg-8 col-lg-offset-0">
            	<div class="panel panel-default">
                    <div class="panel-heading">
                        DATA PROFIL
                    </div>
	            	<div class="panel-body">
	            		<div class="table-responsive">
		            		<table class="table table-striped table-bordered table-hover" id="dataTables-example">
								
								<tbody>
								<?php echo validation_errors(); ?>
								<?php echo form_open('user/getUpdateProfil'); ?>
								<form role="form" >
								<fieldset>
								<?php foreach ($query as $row) {
								echo "
										<tr><td>USERNAME</td>
												<td>$row->username</td></<tr> 
										<tr><td>PASSWORD</td>
											<td>$row->password</td></tr>
										<tr><td>NAMA LENGKAP</td>
											<td><div class='form-group'>
												<input class='form-control' type='text' name='nama' value='$row->nama' required/>
												</div></td></td></tr>
										<tr><td>USIA</td>
											<td><div class='form-group'>
												<input class='form-control' type='text' name='usia' value='$row->usia' required/>
												</div></td></tr>
										<tr><td>JENIS KELAMIN</td>
											<td><div class='form-group'>
												<input class='form-control' type='text' name='jk' value='$row->jenis_kelamin' required/>
												</div></td></tr>
										<tr><td>BERAT BADAN</td>
											<td><div class='form-group'>
												<input class='form-control' type='text' name='berat' value='$row->berat_badan' required/>
												</div></td></tr>
										<tr><td>TINGGI BADAN</td>
											<td><div class='form-group'>
												<input class='form-control' type='text' name='tinggi' value='$row->tinggi_badan' required/>
												</div></td></tr>";
										}
										?>
										<tr><td>AKTIFITAS</td>
											<td><div class='form-group'>
												<select class='form-control' name='aktifitas' >
													<?php foreach ($query1 as $row) {
													echo "<option value=$row->id_aktifitas>$row->aktifitas</option>"; 
													}?>
												</select>
												</div></td></tr>
												
								<tr><td><button type="submit" value="submit" class="btn btn-primary btn-lg">EDIT</button></td></tr>
								</tbody>

								</fieldset>
								</form>
								<?php form_close(); ?>
							</table>  	
	            		</div> 	
	            	</div>
	            </div>   
            </div>

            <div class="col-lg-6 col-lg-offset-1">
	            		<table border="3px" >
							<caption><p> Deskripsi Aktifitas</p></caption>
							<?php
							foreach ($query1 as $row) {
								echo "<tr><td><b>$row->aktifitas</b></td><td><b>$row->deskripsi</b></td></tr>";
							}
						?>	
						</table>
			</div>
        </div>
    </section>
						

</body>