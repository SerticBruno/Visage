<?php 
if( !empty($button['label']) ) { 
    $function = $button[strtolower($button['function'])];

    // Determine the URL or action based on the button function
    if ($button['function'] == 'Email') {
        $function = "mailto:{$button['email']}";
    } elseif ($button['function'] == 'Document') {
        $function = $function['file'];
    } elseif ($button['function'] == 'Anchor') {
        $function = '#' . $button['anchor'];
    } elseif ($button['function'] == 'Internal') {
        // Check if there's an anchor for internal links
        $function = $function;
        if (!empty($button['anchor'])) {
            $function .= '#' . $button['anchor'];
        }
    } else {
        // Default action for other cases
        $function = $function;
    }
    ?>

    <a href="<?php echo $function; ?>" 
       target="<?php echo ($button['function'] == 'External' ? '_blank' : ''); ?>" 
       class="btn <?php echo $button['color']; ?>" 
       <?php echo ($button['function'] == 'Document' && $button['document']['download'] == 1 ? 'download' : ''); ?>>
        <?php echo $button['label']; ?>
    </a>

<?php 
} 
?>
