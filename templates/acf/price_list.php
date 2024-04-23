<?php

$title = $params['title'];

?>

<section class="price-list py-4">
    <div class="container py-3 versailles">
        <?php if(!empty($title)) { ?>
            <div class="row">
                <div class="col-12 pb-4 d-flex">
                    <span class="h2">----------</span>
                    <h2 class="line">Cjenik</h2>
                </div>
            </div>
        <?php } ?>
        <div class="row justify-content-center">
            <div class="col-12 col-lg-10">
                <?php foreach($params['categories'] as $category): ?>
                    <div class="category-section">
                        <div class="category-row row">
                            <div class="category-title col-12 strong">
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
                                    <?php echo htmlspecialchars($category['title']); ?>
                                </a>

                            </div>
                        </div>
                        <?php foreach($category['products'] as $product): ?>
                            <div class="product-row row">
                                <div class="col-6 product-title">
                                    <?php echo htmlspecialchars($product['title']); ?><br>
                                    <span class="product-description notoserifdisplay">
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
