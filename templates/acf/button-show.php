<?php if( !empty($button['label']) ) { 
    $function = $button[strtolower($button['function'])];
	$function = ($button['function'] == 'Email' ? "mailto:{$button['email']}" : ($button['function'] == 'Document' ? $function['file'] : 
															  ((($button['function'] == 'Anchor' ? '#' . $button['anchor_name'] : $function)))));
?>

	<a href="<?php echo $function; ?>" target="<?php echo ($button['function'] == 'External' ? '_blank' : ''); ?>" class="btn <?php echo $button['color']; ?>" <?php echo ($button['function'] == 'Document' && $button['document']['download'] == 1 ? 'download' : ''); ?>><?php echo $button['label']; ?></a>
<?php } ?>