<?php

$title = $params['title'];
$description = $params['description'];
$button = $params['button'];


$categories = $params['categories'];

function compare_categories($a, $b) {
    return strcasecmp($a['title'], $b['title']);
}

// Use usort to sort the categories array
usort($categories, 'compare_categories');

?>

<section class="price-list py-4">
    <div class="container py-3 versailles">
        <?php if(!empty($title)) { ?>
            <div class="row">
                <div class="col-12 pb-4 d-flex align-items-center px-md-0">
                    <span class="span-line"></span>
                    <h2 class="pe-3">Cjenik</h2>
                    <div class="d-flex ms-auto">
                        <input type="text" id="categorySearch" class="form-control" placeholder="Pretraži">
                    </div>
                        
                </div>
            </div>
            <div class="row mb-3 button-row">
                <div class="col-6 col-md-2 px-2 px-md-0">
                    <?php if(!empty($button['label'])){ ?>
                        <div class="d-flex button-wrapper ms-auto">
                            <?php include THEME_DIR . '/templates/acf/button-show.php'; ?>
                        </div>
                    <?php } ?>
                </div>
            </div>
            
        <?php } ?>
        <div class="row justify-content-between">
            <div class="col-12 col-md-3 pb-3 category-column ps-md-0">
                
                <div class="accordion" id="categoryAccordion">
                    <div class="accordion-item">
                        <h3 class="accordion-header" id="headingCategories">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseCategories" aria-expanded="true" aria-controls="collapseCategories">
                                Kategorije
                            </button>
                        </h3>
                        <div id="collapseCategories" class="accordion-collapse collapse show" aria-labelledby="headingCategories" data-bs-parent="#categoryAccordion">
                            <div class="accordion-body">
                                <div class="row">
                                    <div class="col-12 mb-2">
                                        <?php foreach($categories as $index => $category): ?>
                                            <?php 
                                                $categoryTitle = htmlspecialchars($category['title']);
                                                $categoryTags = htmlspecialchars($category['tags']);
                                                $categoryId = 'category-' . $index;
                                            ?>
                                            <div class="category-checkbox me-3">
                                                <input type="checkbox" id="<?php echo $categoryId; ?>" name="category-filter" class="category-filter" value="<?php echo $categoryId; ?>" />
                                                <label for="<?php echo $categoryId; ?>"><?php echo $categoryTitle; ?></label>
                                            </div>
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="col-12 col-md-9">
                <?php foreach($params['categories'] as $index => $category): ?>
                    <?php 
                        $categoryId = 'category-' . $index; // Match this ID with the checkbox value
                        $categoryTags = htmlspecialchars($category['tags']); // Store tags as a space-delimited string
                    ?>
                    <div class="category-section" id="<?php echo $categoryId; ?>" data-title="<?php echo htmlspecialchars($category['title']); ?>" data-description="<?php echo htmlspecialchars($category['description']); ?>" data-tags="<?php echo $categoryTags; ?>">
                        <div class="category-row row">
                            <div class="category-title col-12 strong">
                            <?php if (!empty($category['category_link'])) { ?>
                                <?php 
                                    if (!empty($category['link_anchor'])) {
                                        $urlLink = $category['category_link'] . '#' . $category['link_anchor'];
                                    } else {
                                        $urlLink = $category['category_link'];
                                    }
                                ?>
                                
                                <a href="<?php echo htmlspecialchars($urlLink); ?>">
                                    <div class="category-title-text p-0">
                                        <?php echo htmlspecialchars($category['title']); ?>
                                    </div>
                                    <div class="category-description-text p-0">
                                        <?php echo $category['description']; ?>
                                    </div>
                                </a>
                            <?php } else { ?>
                            <?php echo htmlspecialchars($category['title']); ?>
                            <?php } ?>

                            </div>
                        </div>
                        <?php foreach($category['products'] as $product): ?>
                            <?php 
                                $productTags = htmlspecialchars($product['tags']); // Store tags as a space-delimited string
                            ?>
                            <div class="product-row row" data-title="<?php echo htmlspecialchars($product['title']); ?>" data-description="<?php echo htmlspecialchars($product['description']); ?>" data-tags="<?php echo $productTags; ?>">
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

<script>
// JavaScript to filter categories and products
document.addEventListener('DOMContentLoaded', function() {
    const checkboxes = document.querySelectorAll('.category-filter');
    const categorySections = document.querySelectorAll('.category-section');
    const searchInput = document.getElementById('categorySearch');

    // Normalize string for better matching
    const normalizeString = (str) => {
        return str.trim().toLowerCase().replace(/\s+/g, ' ');
    };

    const filterCategories = () => {
        const selectedCategories = Array.from(checkboxes).filter(cb => cb.checked).map(cb => cb.value.toLowerCase());
        const searchTerm = normalizeString(searchInput.value);

        categorySections.forEach(section => {
            const title = normalizeString(section.getAttribute('data-title'));
            const description = normalizeString(section.getAttribute('data-description'));
            const tags = normalizeString(section.getAttribute('data-tags'));

            // Check if the category matches the search term
            const categoryMatchesSearch = title.includes(searchTerm) || description.includes(searchTerm) || tags.includes(searchTerm);

            // Track whether any products match the search term
            let productMatchesSearch = false;
            const products = section.querySelectorAll('.product-row');

            // Filter products within the category
            products.forEach(product => {
                const productTitle = normalizeString(product.getAttribute('data-title'));
                const productDescription = normalizeString(product.getAttribute('data-description'));
                const productTags = normalizeString(product.getAttribute('data-tags'));
                
                // Show or hide each product based on the search term
                if (productTitle.includes(searchTerm) || productDescription.includes(searchTerm) || productTags.includes(searchTerm)) {
                    product.style.display = 'flex';
                    productMatchesSearch = true;
                } else {
                    product.style.display = 'none';
                }
            });

            // If no products match but the category matches, show all products
            if (categoryMatchesSearch && !productMatchesSearch) {
                products.forEach(product => {
                    product.style.display = 'block';
                });
            }

            // Determine if the category section should be shown based on the search and checkbox filter
            const matchesCategory = selectedCategories.length === 0 || selectedCategories.includes(section.id);
            if ((categoryMatchesSearch || productMatchesSearch) && matchesCategory) {
                section.style.display = 'block';
            } else {
                section.style.display = 'none';
            }
        });
    };

    checkboxes.forEach(checkbox => {
        checkbox.addEventListener('change', filterCategories);
    });

    searchInput.addEventListener('input', filterCategories);
});
</script>
