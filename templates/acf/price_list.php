<?php

$content = $params['content'];

?>

<section class="price-list py-4">
    <div class="container py-3 versailles">
        <div class="row">
            <div class="col-12 col-lg-2 pb-4">
                <h2>Cjenik</h2>
            </div>
            <div class="col-12 col-lg-10">
                <?php foreach($params['categories'] as $category): ?>
                    <div class="category-section">
                        <div class="category-row row">
                            <div class="category-title col-12 strong">
                                <?php echo htmlspecialchars($category['title']); ?>
                            </div>
                        </div>
                        <?php foreach($category['products'] as $product): ?>
                            <div class="product-row row">
                                <div class="col-6 product-title">
                                    <?php echo htmlspecialchars($product['title']); ?>
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
