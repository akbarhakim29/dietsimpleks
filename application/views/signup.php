
		<nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-main-collapse">
                    <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand page-scroll" href="index">
                    <i class="fa fa-play-circle"></i>  <span class="light">Start </span>DIETSIMPLEKS
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
                        
                    </li>
                    <li>
                        	
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
 	

 	<section  class="content-section text-center">
        <div class="row">
        	<div class="container">
	            <div class="col-lg-5 col-lg-offset-0">
	                
                    	<div class="panel-heading">
                        <h3>SIGN UP </h3>
                    	</div>
                    		<div class="panel-body">
						<?php echo validation_errors(); ?>
						<?php echo form_open('user/getsignup'); ?>
							<form role="form" >
							<fieldset>
								<div class="form-group">
									<input class="form-control" placeholder="Username" type="text" name="username" required/>
								</div>
								
								<div class="form-group">
									<input class="form-control" placeholder="Password" type="password" name="password" size="30" required/>
								</div>
							
								<div class="form-group">
									<input class="form-control" placeholder="Nama Lengkap" type="text" name="nama" size="30" required/>
								</div>
								
								<div class="form-group">
									<input class="form-control" placeholder="Usia ( >14 th)" type="text" name="usia" size="30" required/>
								</div>
								
								<div class="form-group">
									<label><b>JENIS KELAMIN  : </b></label>
									<div class="radio-inline">
										<label>
										<input type="radio" name="jk" value="Laki-laki" <?php echo set_radio('jk','Laki-laki',TRUE); ?> /><b>Laki-laki</b>
										</label>	
									</div>
									<div class="radio-inline">
										<label>
										<input type="radio" name="jk" value="Perempuan" <?php echo set_radio('jk','Perempuan'); ?> /><b>Perempuan</b>
										</label>
											
									</div>									
								</div>
								
								<div class="form-group">
									<input class="form-control" placeholder="Berat Badan (kg)" type="text" name="berat" size="30" required/>
								</div>

								<div class="form-group">
									<input class="form-control" placeholder="Tinggi Badan (cm)" type="text" name="tinggi" size="30" required/>
								</div>
								
								<div class="form-group">
									<label>AKTIFITAS</label>
									<select class="form-control" name="aktifitas" >
										<?php foreach ($query as $row) {
											echo "<option value=$row->id_aktifitas>$row->aktifitas</option>"; 
										}?>
									</select>
								</div>
								
								<button type="submit" value="submit" class="btn btn-primary btn-lg">DAFTAR !</button>
								
							</fieldset>	
							</form>
						<?php form_close(); ?>
						</div>
					
	            </div>
	            	<div class="col-lg-6 col-lg-offset-1">
	            		<table border="3px" >
							<caption><p> Deskripsi Aktifitas</p></caption>
							<?php
							foreach ($query as $row) {
								echo "<tr><td><b>$row->aktifitas</b></td><td><b>$row->deskripsi</b></td></tr>";
							}
						?>	
						</table>
					</div>
            </div>
        </div>
    </section>


</body>

