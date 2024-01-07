<?php

$header = get_field('header', 'option');
$logo = $header['logo']['url']; 
$logo_scrolled = $header['logo_scrolled']['url']; 

?>

<nav class="navbar navbar-expand-lg navbar-dark">
    <div class="container d-flex justify-content-center">
        <div class="row w-100">
            <div class="col-12 text-center">
                <div class="logo-wrapper">
                    <a class="navbar-brand" href="<?php echo get_home_url(); ?>">
                        <!-- <img src="<?php echo $logo ?>" alt="Visage Logo"> -->
                        <!-- <img src="<?php echo $logo_scrolled ?>" class="second-image" alt="Visage Logo" style="background: transparent; scale: 1.5;"> -->
                        <h1 class="versailles">VISAGE</h1>
                        <h2 class="gildadisplay pt-3">studio</h2>
                    </a>
                </div>
            </div>
            <hr>

                
            <div class="col-12 d-flex justify-content-end">
                <div class="collapse navbar-collapse w-100 py-1" id="navbarSupportedContent">
                    <?php wp_nav_menu( array( 
                        'theme_location' => 'primary', 
                        'depth' => 2,
                        'menu_class' => 'navbar-nav ',
                        'fallback_cb'   => false,
                        'add_li_class'  => '',
                    ) ); ?>
                </div>
                
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <div class="navbar-toggler-icon">
                        <span class="navbar-toggler-icon-line"></span>
                        <span class="navbar-toggler-icon-line"></span>
                        <span class="navbar-toggler-icon-line"></span>
                    </div>
                </button>
            </div>
        </div>
    </div>
</nav>