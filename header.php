<!DOCTYPE html>
<html lang="hr" translate="no" <?php visage_schema_type(); ?>>
	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>" />
		<meta name="viewport" content="width=device-width" />
		<meta name="description" content="<?php if ( is_single() ) { echo wp_strip_all_tags( get_the_excerpt(), true ); } else { bloginfo( 'description' ); } ?>" />
		<meta name="keywords" content="<?php echo implode( ', ', wp_get_post_tags( get_the_ID(), array( 'fields' => 'names' ) ) ); ?>" />
		<meta property="og:image" content="<?php if ( is_single() && has_post_thumbnail() ) { the_post_thumbnail_url( 'full' ); } elseif ( has_site_icon() ) { echo get_site_icon_url(); } ?>" />
		<meta name="twitter:card" content="photo" />
		<meta name="twitter:site" content="<?php bloginfo( 'name' ); ?>" />
		<meta name="twitter:title" content="<?php if ( is_single() ) { the_title(); } else { bloginfo( 'name' ); } ?>" />
		<meta name="twitter:description" content="<?php if ( is_single() ) { echo wp_strip_all_tags( get_the_excerpt(), true ); } else { bloginfo( 'description' ); } ?>" />
		<meta name="twitter:image" content="<?php if ( is_single() && has_post_thumbnail() ) { the_post_thumbnail_url( 'full' ); } elseif ( has_site_icon() ) { echo get_site_icon_url(); } ?>" />
		<meta name="twitter:url" content="<?php if ( is_single() ) { esc_url( the_permalink() ); } else { echo esc_url( home_url() ) . '/'; } ?>" />
		<meta name="twitter:widgets:theme" content="light" />
		<meta name="twitter:widgets:link-color" content="blue" />
		<meta name="twitter:widgets:border-color" content="#fff" />
		<link rel="canonical" href="https://<?php echo $_SERVER["HTTP_HOST"]; ?><?php echo parse_url( $_SERVER['REQUEST_URI'], PHP_URL_PATH ); ?>" />
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
		<script type="application/ld+json">
		{
		"@context": "https://www.schema.org/",
		"@type": "WebSite",
		"name": "<?php bloginfo( 'name' ); ?>",
		"url": "<?php echo esc_url( home_url() ); ?>/"
		}
		</script>
		<script type="application/ld+json">
		{
		"@context": "https://www.schema.org/",
		"@type": "Organization",
		"name": "<?php bloginfo( 'name' ); ?>",
		"url": "<?php echo esc_url( home_url() ); ?>/",
		"logo": "<?php if ( has_custom_logo() ) { $custom_logo_id = get_theme_mod( 'custom_logo' ); $logo = wp_get_attachment_image_src( $custom_logo_id , 'full' ); echo esc_url( $logo[0] ); } ?>",
		"image": "<?php if ( has_site_icon() ) { echo get_site_icon_url(); } ?>",
		"description": "<?php bloginfo( 'description' ); ?>"
		}
		</script>
		<?php wp_head(); ?>
	</head>
	<body <?php body_class(); ?>>
		<div id="wrapper" class="hfeed">

			<?php
			?>

			<header class="">
				<?php include THEME_DIR . '/navbar.php';  ?>
			</header>
		<div id="container">