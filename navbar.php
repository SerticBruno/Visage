<?php

$header = get_field('header', 'option');
$logo = $header['logo']['url']; 
$logo_scrolled = $header['logo_scrolled']['url']; 

?>

<nav class="navbar navbar-expand-lg navbar-dark">
    <div class="container d-flex justify-content-center">
        <div class="row w-100">
            <div class="col-12 text-center p-0">
                <div class="logo-wrapper">
                    <a class="navbar-brand" href="<?php echo get_home_url(); ?>">
                        <div class="logo-img-wrapper pt-2 d-flex justify-content-center align-items-center">
                            <img src="<?php echo $logo_scrolled ?>" alt="Visage Logo">
                        </div>
                        <div class="info">
                            <h2 class="h1 versailles">VISAGE</h2>
                            <h2 class="notoserifdisplay pt-2">studio</h2>
                        </div>
                    </a>
                </div>
            </div>
                
            <div class="col-12 d-flex justify-content-end">
                <div class="collapse navbar-collapse w-100" id="navbarSupportedContent">
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