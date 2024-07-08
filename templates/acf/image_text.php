<?php
$uniqueTags = [];

// Iterate through each row to collect tags
foreach ($params['rows'] as $k => $row) {
    // Get the tags string from the row
    $rowTags = $row['category'];

    // Split the tags by '#'
    $tagsArray = explode('#', $rowTags);

    // Remove the first element which is empty (because the tags start with '#')
    if (empty($tagsArray[0])) {
        array_shift($tagsArray);
    }

    // Trim whitespace from each tag and add to uniqueTags array
    foreach ($tagsArray as $tag) {
        $trimmedTag = trim($tag);
        if (!empty($trimmedTag)) {
            // Add the tag with '#' to maintain its original format
            $uniqueTags[] = $trimmedTag;
        }
    }
}

// Remove duplicate tags
$uniqueTags = array_unique($uniqueTags);
?>

<section class="image-text" id="<?php echo $anchor ?>">
    <div class="container-fluid">
        <?php if ($params['is_search']) { ?>
            <div class="row justify-content-center dark-gray py-3">
                <div class="col-8 col-lg-8 col-md-10">
                    <div class="row">
                        <div class="col-12 col-md-6 col-lg-5">
                            <div class="accordion pb-3" id="categoryAccordion">
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
                                                    <?php foreach ($uniqueTags as $index => $tag): ?>
                                                        <?php $categoryId = $tag; ?>
                                                        <div class="category-checkbox me-3">
                                                            <input type="checkbox" id="<?php echo $categoryId; ?>" name="category-filter" class="category-filter" value="<?php echo $tag; ?>" />
                                                            <label for="<?php echo $categoryId; ?>"><?php echo htmlspecialchars($tag); ?></label>
                                                        </div>
                                                    <?php endforeach; ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-6 col-lg-7">
                            <div class="d-flex ms-auto">
                                <input type="text" id="categorySearch" class="form-control" placeholder="Pretraži">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>

        <?php foreach ($params['rows'] as $k => $v): ?>
            <?php
            $image = $v['image']['url'];
            $alt = $v['image']['alt'];
            $description = $v['description'];
            $title = $v['title'];
            $button = $v['button'];
            $anchor = $v['anchor'];
            $productTags = $v['category'];
            ?>

            <div class="row py-5 justify-content-center anchor-target <?php echo $k % 2 == 0 ? 'dark-gray' : 'gray'; ?>" id="<?php echo $anchor ?>" data-title="<?php echo htmlspecialchars($title); ?>" data-tags="<?php echo htmlspecialchars($v['category']); ?>">
                <div class="col-11 col-md-10 col-lg-8 d-flex">
                    <div class="row <?php echo $k % 2 == 1 ? 'flex-row-reverse' : ''; ?>" data-id="<?php echo htmlspecialchars($productTags); ?>">
                        <div class="col-md-8 col-12">
                            <div class="text">
                                <h2><?php echo $title ?></h2>
                                <?php echo $description ?>

                                <p class="pb-3"><strong><?php echo $v['tags'] ?></strong></p>
                                <?php if(!empty($v['price'])) { ?>
                                    <div class="price d-flex">
                                        <p><?php echo $v['price'] ?> €</p>
                                    </div>
                                <?php } ?>
                                
                                <?php if (!empty($button['label'])): ?>
                                    <div class="button-wrapper pt-3 pb-4 pb-lg-0">
                                        <?php include THEME_DIR . '/templates/acf/button-show.php'; ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="col-md-4 col-12">
                            <div class="img-wrapper">
                                <img src="<?php echo $image ?>" alt="<?php echo $alt ?>">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</section>

<script>
document.addEventListener("DOMContentLoaded", function() {
    // Select the search input field and checkboxes
    const searchInput = document.getElementById("categorySearch");
    const checkboxes = document.querySelectorAll(".category-filter");

    // Function to filter rows based on search query and selected categories
    function filterRows() {
        // Get the search query and convert to lower case for case insensitive search
        const query = searchInput.value.toLowerCase().trim();

        // Get the selected categories (tags prefixed with '#')
        const selectedCategories = Array.from(checkboxes)
            .filter(checkbox => checkbox.checked)
            .map(checkbox => checkbox.value);

        // Select all rows with the data-tags attribute
        const rows = document.querySelectorAll(".anchor-target");

        rows.forEach(row => {
            // Get the tags from data attribute and convert to lower case
            const tags = row.getAttribute("data-tags");

            // Check if the row matches selected categories
            const matchesCategory = selectedCategories.length === 0 || selectedCategories.some(category => tags.includes(category));

            // Show or hide the row based on the conditions
            if (matchesCategory && (query === '' || row.textContent.toLowerCase().includes(query))) {
                row.style.display = "flex"; // Show the row
            } else {
                row.style.display = "none"; // Hide the row
            }
        });
    }

    // Event listener for search input changes
    searchInput.addEventListener("input", filterRows);

    // Event listeners for checkbox changes
    checkboxes.forEach(checkbox => {
        checkbox.addEventListener("change", filterRows);
    });

    // Initial filter call to set the correct state on load
    filterRows();
});
</script>
