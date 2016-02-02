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
                
                <ul class="list-inline banner-link-buttons">
                    <li>
                        <a href="pilihmakanan" class="btn btn_edit btn-default btn-lg"> <span class="network-name"><p>Hitung Diet Simpleks</p></span></a>
                    </li>
                    <li>
                        <a href="rekamkonsumsi" class="btn btn_edit btn-default btn-lg"><span class="network-name"><p>rekam konsumsi</p></span></a>
                    </li>
                    <li>
                        <a href="menumakanan" class="btn btn_edit btn-default btn-lg"> <span class="network-name"><p>menu makanan</p></span></a>
                    </li>
                   
                </ul>
            </div>
        </div>
    </section>

	
</body>
