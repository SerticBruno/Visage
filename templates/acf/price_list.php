<?php

$title = $params['title'];
$button = $params['button'];

?>

<section class="price-list py-4">
    <div class="container py-3 versailles">
        <?php if(!empty($title)) { ?>
            <div class="row">
                <div class="col-12 pb-4 d-flex align-items-center">
                    <span class="span-line"></span>
                    <h2>Cjenik</h2>
                        
                    <?php if(!empty($button['label'])){ ?>
                        <div class="button-wrapper ms-auto">
                            <?php include THEME_DIR . '/templates/acf/button-show.php'; ?>
                        </div>
                    <?php } ?>
                </div>
            </div>
        <?php } ?>
        <div class="row justify-content-center">
            <div class="col-12 col-lg-10">
                <?php foreach($params['categories'] as $category): ?>
                    <div class="category-section">
                        <div class="category-row row">
                            <div class="category-title col-12 strong">
                            <?php if (!empty($category['category_link'])) { ?>
                                <?php 
                                    // Check if a link anchor is provided and not empty
                                    if (!empty($category['link_anchor'])) {
                                        // Append the anchor to the URL
                                        $urlLink = $category['category_link'] . '#' . $category['link_anchor'];
                                    } else {
                                        // Use the basic URL without an anchor
                                        $urlLink = $category['category_link'];
                                    }
                                ?>
                                
                                <!-- Create the anchor tag with the URL -->
                                <a href="<?php echo htmlspecialchars($urlLink); ?>">
                                    <div class="category-title-text p-0">
                                        <?php echo htmlspecialchars($category['title']); ?>
                                    </div>
                                    <div class="category-description-text p-0">
                                        <?php echo $category['description']; ?>
                                    </div>
                                </a>
                            <?php } else { ?>
                            <?php 
                                // Check if a link anchor is provided and not empty
                                if (!empty($category['link_anchor'])) {
                                    // Append the anchor to the URL
                                    $urlLink = $category['category_link'] . '#' . $category['link_anchor'];
                                } else {
                                    // Use the basic URL without an anchor
                                    $urlLink = $category['category_link'];
                                }
                            ?>
                            <?php echo htmlspecialchars($category['title']); ?>
                            <?php } ?>

                            </div>
                        </div>
                        <?php foreach($category['products'] as $product): ?>
                            <div class="product-row row">
                                <div class="col-6 product-title">
                                    <?php echo htmlspecialchars($product['title']); ?>
                                    <?php if (!empty($product['title'])) {?>
                                    <br>
                                    <?php } ?>
                                    <span class="product-description montserrat">
                                        <?php echo htmlspecialchars($product['description']); ?>
                                    </span>
                                </div>
                                <div class="col-6 product-price">
                                    <?php echo htmlspecialchars($product['price']); ?> EUR
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</section>
