	<!-- Intro Header -->
    <header class="intro">
        <div class="intro-body">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <h1 class="brand-heading">DIETSIMPLEKS</h1>
                        <p class="intro-text">Application for Diet Recommendation.<br>Created by AHP</p>
                        <a href="#about" class="btn btn-circle page-scroll">
                            <i class="fa fa-angle-double-down animated"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </header>
  
  <!-- About Section -->
    <section id="about" class="container content-section text-center">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2">
                <h2>About DietSimpleks</h2>
                <p>Aplikasi Dietsimpleks adalah aplikasi yang dipergunakan untuk menguji Optimasi biaya pemenuhan gizi dan nutrisi
                pada orang dewasa menggunakan metode Simpleks Big-M.</p>
                <p>Metode Simpleks Big-M adalah salah satu metode dalam Sistem Pendukung Keputusan dimana memiliki prosedur 
                matematika berulang/Iterasi untuk menemukan penyelesaian optimal pada persoalan
                linear programming dengan cara menguji titik-titik sudutnya,Big-M sendiri adalah nilai uji yang nilainya 
                sangat besar.</p>
                
            </div>
        </div>
    </section>

    <!-- Download Section -->
    <section id="signIn" class="content-section text-center">
        <div class="download-section">
            <div class="container">
                <div class="col-md-5 col-lg-offset-4">
				    <h2>SIGN IN</h2>			  	
						<?php echo validation_errors(); ?>
						<?php echo form_open('user/set_login'); ?>
						<form role="form" >
							<fieldset>
								
								<div class="form-group">
									<input class="form-control" placeholder="Username" type="text" name="username" required/>
								</div>
								<div class="form-group">
									<input class="form-control" placeholder="Password" type="password" name="password" required/>
								</div>
								
								<button type="submit" value="submit" class="btn btn-primary btn-lg">SIGN IN</button>
								
							</fieldset>
						</form>
						<?php form_close(); ?>
				<br>
				<h5>Belum punya akun? <?php echo anchor('user/signup', 'Sign up !'); ?></h5>
				
                    
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section id="contact" class="container content-section text-center">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2">
                <h2>Contact Person</h2>
                <p>Feel free to email me to provide some feedback on my program,give some criticism and suggestion or to just say hello!</p>
                
                <p><a href="mailto:akhapr777@gmail.com">akhapr777@gmail.com</a>
                </p>
                <ul class="list-inline banner-social-buttons">
                    <li>
                        <a href="https://twitter.com/akbar_kim" class="btn btn-default btn-lg"><i class="fa fa-twitter fa-fw"></i> <span class="network-name">Twitter</span></a>
                    </li>
                    <li>
                        <a href="https://plus.google.com/u/0/100978420344838358667" class="btn btn-default btn-lg"><i class="fa fa-google-plus fa-fw"></i> <span class="network-name">Google+</span></a>
                    </li>
                </ul>
            </div>
        </div>
    </section>

 
