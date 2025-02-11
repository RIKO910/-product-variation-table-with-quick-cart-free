<?php
if ( ! defined( 'ABSPATH' ) ) exit;

global $product;
global $post;
if (isset($product) && $product->is_type("variable")) {
    $product_id                     = $product->get_id();
    $enable_global_stock_management = $product->get_manage_stock();
    $global_stock_quantity          = $enable_global_stock_management ? $product->get_stock_quantity() : null;
    $all_attributes                 = $product->get_attributes();
    $variableSetting                = get_option('variable_all_checked', array());
    $quickTableOnOff                = isset($variableSetting['quickTableOnOff']) ? $variableSetting['quickTableOnOff'] : '';
    $bulkSelectionHideShow          = isset($variableSetting['bulkSelectionHideShow']) ? $variableSetting['bulkSelectionHideShow'] : 'true';
    $imageHideShow                  = isset($variableSetting['imageHideShow']) ? $variableSetting['imageHideShow'] : 'true';
    $skuHideShow                    = isset($variableSetting['skuHideShow']) ? $variableSetting['skuHideShow'] : 'true';
    $allAttributeHideShow           = isset($variableSetting['allAttributeHideShow']) ? $variableSetting['allAttributeHideShow'] : 'true';
    $priceHideShow                  = isset($variableSetting['priceHideShow']) ? $variableSetting['priceHideShow'] : 'true';
    $quantityHideShow               = isset($variableSetting['quantityHideShow']) ? $variableSetting['quantityHideShow'] : 'true';
    $actionHideShow                 = isset($variableSetting['actionHideShow']) ? $variableSetting['actionHideShow'] : 'true';
    $onSaleHideShow                 = isset($variableSetting['onSaleHideShow']) ? $variableSetting['onSaleHideShow'] : 'true';
    $searchOptionHideShow           = isset($variableSetting['searchOptionHideShow']) ? $variableSetting['searchOptionHideShow'] : 'true';
    $bulkAddToCartPosition          = isset($variableSetting['bulkAddToCartPosition']) ? $variableSetting['bulkAddToCartPosition'] : 'after';
    $designSingleProductPageMobile  = isset($variableSetting['designSingleProductPageMobile']) ? $variableSetting['designSingleProductPageMobile'] : 'template_1';
    $cartButtonText                 = isset($variableSetting['cartButtonText']) ? $variableSetting['cartButtonText'] : 'Add-to-cart';
    $onSaleNameChange               = isset($variableSetting['onSaleNameChange']) ? $variableSetting['onSaleNameChange'] : 'On Sale';
    $searchOptionTextChange         = isset($variableSetting['searchOptionTextChange']) ? $variableSetting['searchOptionTextChange'] : 'Search...';
    $showPopUpImage                 = isset($variableSetting['showPopUpImage']) ? $variableSetting['showPopUpImage'] : 'true';
    $variationGalleryOnOff          = isset($variableSetting['variationGalleryOnOff']) ? $variableSetting['variationGalleryOnOff'] : '';
    $popUPImageShow                 = isset($variableSetting['popUPImageShow']) ? $variableSetting['popUPImageShow'] : 'default';
    $titleHideShow                  = isset($variableSetting['titleHideShow']) ? $variableSetting['titleHideShow'] : 'true';
    $descriptionHideShow            = isset($variableSetting['descriptionHideShow']) ? $variableSetting['descriptionHideShow'] : 'true';
    $weightDimensionsHideShow       = isset($variableSetting['weightDimensionsHideShow']) ? $variableSetting['weightDimensionsHideShow'] : 'true';
    $designAddCartTableTemplate2    = isset($variableSetting['designAddCartTableTemplate2']) ? $variableSetting['designAddCartTableTemplate2'] : 'template_1';
    $selectAllNameChange            = isset($variableSetting['selectAllNameChange']) ? $variableSetting['selectAllNameChange'] : 'Select All';
    $showDoublePrice                = isset($variableSetting['showDoublePrice']) ? $variableSetting['showDoublePrice'] : 'true';
    $stockStatusHideShow            = isset($variableSetting['stockStatusHideShow']) ? $variableSetting['stockStatusHideShow'] : 'true';
    $variationTableTemplate         = isset($variableSetting['variationTableTemplate']) ? $variableSetting['variationTableTemplate'] : 'template_1';
    $variationTableMeta             = get_post_meta($post->ID, '_variation_table_meta', true);
    $metaVariableTableTemplate      = get_post_meta($post->ID, '_variation_table_template', true);
    $metaTableTemplate2CartStyle    = get_post_meta($post->ID, '_table_template2_cart_section_style_template', true);


    if ($quickTableOnOff == 'true') {
        include plugin_dir_path(__FILE__) . '../table-template/table-template1.php';
    }
}

?>
<style>
    .modal {
        display: none;
        position: fixed;
        z-index: 9999999999999999999999;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        overflow: auto;
        background-color: rgba(0, 0, 0, 0.7);
        justify-content: center;
        align-items: center;
    }

    .modal-content {
        background-color: white;
        padding: 20px;
        border-radius: 10px;
        max-width: 600px;
        text-align: center;
        margin: auto;
        position: relative;
        margin-top: 10%;
    }

    .close-modal {
        position: absolute;
        top: 1px;
        right: 8px;
        font-size: 30px;
        cursor: pointer;
    }

    .load-more-description {
        color: #0071a1;
        text-decoration: underline;
        cursor: pointer;
    }

    .description-container {
        max-width: 400px; /* Adjust width to your layout */
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
        display: block;
        line-height: 1.5em;
    }

    .load-more-description {
        color: #0071a1;
        text-decoration: underline;
        cursor: pointer;
    }


</style>


<script>


    // Pagination for table 1

    jQuery(document).ready(function ($) {
        var rowsPerPage = 5; // Number of rows to show per page
        var $table = $("#quick-variable-table");
        var rows = $table.find("tr:gt(0)"); // Select all rows except the first (header row)
        var totalRows = rows.length;
        var totalPages = Math.ceil(totalRows / rowsPerPage);
        var currentPage = 1;

        // Function to show the correct page
        function showPage(page) {
            var start = (page - 1) * rowsPerPage;
            var end = start + rowsPerPage;

            // Hide all rows first
            rows.hide();

            // Show only the required rows
            rows.slice(start, end).show();

            // Update pagination info
            $("#pageInfo").text("Page " + page + " of " + totalPages);

            // Enable/Disable buttons
            $("#prevPage").prop("disabled", page === 1);
            $("#nextPage").prop("disabled", page === totalPages);
        }

        // Pagination Button Clicks
        $("#prevPage").click(function () {
            if (currentPage > 1) {
                currentPage--;
                showPage(currentPage);
            }
        });

        $("#nextPage").click(function () {
            if (currentPage < totalPages) {
                currentPage++;
                showPage(currentPage);
            }
        });

        // Initially hide all rows and show only the first page (first 5 rows)
        rows.hide();
        showPage(currentPage); // Show the first 5 rows by default

    });






    //    Pagination for table 2
    jQuery(document).ready(function($) {
        const rowsPerPage = 5;
        let currentPage = 1;

        const table = $('#quick-variable-table');
        const rows = table.find('tbody tr.variation-row');
        const totalRows = rows.length;
        const totalPages = Math.ceil(totalRows / rowsPerPage);

        function toggleAddToCartButton() {
            const visibleRows = rows.slice((currentPage - 1) * rowsPerPage, currentPage * rowsPerPage);
            if (visibleRows.find('.bulk_cart:checked').length > 0) {
                $('.bulk-add-to-cart').show();
            } else {
                $('.bulk-add-to-cart').hide();
            }
        }

        // Initial check to ensure button state is correct
        toggleAddToCartButton();

        // Reset checkboxes when changing page
        function resetCheckboxes() {
            $('#bulk_checkbox_select_all').prop('checked', false); // Uncheck 'Select All'
            $('.bulk_cart').prop('checked', false); // Uncheck all individual checkboxes
            toggleAddToCartButton(); // Update the Add to Cart button visibility
        }

        // Change pagination logic to only affect visible rows
        $('#prev-btn').on('click', function() {
            if (currentPage > 1) {
                currentPage--;
                showPage(currentPage);
                resetCheckboxes(); // Reset checkboxes on page change
            }
        });

        $('#next-btn').on('click', function() {
            if (currentPage < totalPages) {
                currentPage++;
                showPage(currentPage);
                resetCheckboxes(); // Reset checkboxes on page change
            }
        });

        // Select all checkboxes for the current page
        $('#bulk_checkbox_select_all').on('change', function() {
            var isChecked = $(this).prop('checked');
            const visibleRows = rows.slice((currentPage - 1) * rowsPerPage, currentPage * rowsPerPage);
            visibleRows.find('.bulk_cart').prop('checked', isChecked);
            toggleAddToCartButton();
        });

        // Ensure that selecting/unselecting individual checkboxes reflects on 'Select All'
        $('.bulk_cart').on('change', function() {
            var allChecked = rows.slice((currentPage - 1) * rowsPerPage, currentPage * rowsPerPage)
                .find('.bulk_cart').length === rows.slice((currentPage - 1) * rowsPerPage, currentPage * rowsPerPage)
                .find('.bulk_cart:checked').length;
            $('#bulk_checkbox_select_all').prop('checked', allChecked);
            toggleAddToCartButton();
        });

        function showPage(page) {
            const startIndex = (page - 1) * rowsPerPage;
            const endIndex = startIndex + rowsPerPage;

            rows.each(function(index, row) {
                if (index >= startIndex && index < endIndex) {
                    $(row).css({
                        'opacity': '1',
                        'visibility': 'visible',
                        'position': 'relative'
                    });
                } else {
                    $(row).css({
                        'opacity': '0',
                        'visibility': 'hidden',
                        'position': 'absolute'
                    });
                }
            });

            toggleAddToCartButton();

            $('#prev-btn').prop('disabled', page === 1);
            $('#next-btn').prop('disabled', page === totalPages);
        }

        // Ensure the first page is displayed properly
        showPage(currentPage);
    });






    document.addEventListener('DOMContentLoaded', function() {
        const modal = document.getElementById('descriptionModal');
        const fullDescriptionContent = document.getElementById('fullDescriptionContent');
        const closeModal = document.querySelector('.close-modal');

        document.querySelectorAll('.load-more-description').forEach(function(link) {
            link.addEventListener('click', function(e) {
                e.preventDefault();
                const description = this.getAttribute('data-description');
                fullDescriptionContent.textContent = description;
                modal.style.display = 'block';
            });
        });

        if (closeModal){
            closeModal.addEventListener('click', function() {
                modal.style.display = 'none';
            });
        }

        window.addEventListener('click', function(event) {
            if (event.target === modal) {
                modal.style.display = 'none';
            }
        });
    });

    //   Template two sorting
    document.addEventListener('DOMContentLoaded', function() {
        const sortSelect = document.getElementById('sort-options');
        const table = document.getElementById("quick-variable-table");
        if(!table){
            return;
        }
        const rows = Array.from(table.querySelectorAll(".variation-row"));


        if (sortSelect){
            sortSelect.addEventListener('change', function() {
                const selectedOption = this.value;

                if (selectedOption) {
                    const [type, direction] = selectedOption.split('-');
                    sortTable(type, direction);
                }
            });
        }

        // Function to sort the table
        function sortTable(type, direction) {
            rows.sort((a, b) => {
                let valueA, valueB;

                if (type === 'sku') {
                    valueA = a.querySelector('.variable-sku div').textContent.trim();
                    valueB = b.querySelector('.variable-sku div').textContent.trim();
                } else if (type === 'price') {
                    valueA = parseFloat(a.querySelector('.variable-price').textContent.replace(/[^0-9.]/g, ''));
                    valueB = parseFloat(b.querySelector('.variable-price').textContent.replace(/[^0-9.]/g, ''));
                } else {
                    // Attribute sorting
                    valueA = a.querySelector(`[data-attribute-name="${type}"]`)?.textContent.trim() || "";
                    valueB = b.querySelector(`[data-attribute-name="${type}"]`)?.textContent.trim() || "";
                }

                if (direction === 'asc') {
                    return valueA > valueB ? 1 : -1;
                } else {
                    return valueA < valueB ? 1 : -1;
                }
            });

            // Reorder rows in the table
            rows.forEach(row => table.appendChild(row));
        }
    });



    document.addEventListener('DOMContentLoaded', () => {
        // Select the popup-content div
        const popupContentDiv = document.querySelector('.popup-content');

        // Check if the div exists
        if (popupContentDiv) {
            const imgElement = document.createElement('img');
            imgElement.id = 'popupImage';
            imgElement.alt = 'Popup Image';
            imgElement.style.objectFit = 'contain';


            // let popUPImageShow = 'default';
            // let imagePopupHeight = 500;
            // let imagePopupWidth = '100%';
            //
            // if (popUPImageShow === 'default') {
            //     imgElement.style.maxHeight = `${imagePopupHeight}px`;
            //     imgElement.style.maxWidth = imagePopupWidth;
            // } else {
            //     imgElement.style.height = `${imagePopupHeight}px`;
            //     imgElement.style.width = `${imagePopupWidth}px`;
            // }

            // Append the img element to the popup-content div
            popupContentDiv.appendChild(imgElement);
        }
    });


    // Bulk checkbox select
    jQuery(document).ready(function($) {
        function toggleAddToCartButton() {
            if ($('.bulk_cart:checked').length > 0) {
                $('.bulk-add-to-cart').show();
            } else {
                $('.bulk-add-to-cart').hide();
                // $('.search_option').css('margin-top', '100px');
            }
        }

        // Initial check to ensure button state is correct
        toggleAddToCartButton();

        $('.bulk_cart').on('change', function() {
            if ($(this).closest('.template-two-table').length) {
                return;
            }
            toggleAddToCartButton();
        });

        $('#bulk_checkbox_select_all').on('change', function() {
            if ($(this).closest('.template-two-table').length) {
                return;
            }
            var isChecked = $(this).prop('checked');
            $('.bulk_cart').prop('checked', isChecked);
            toggleAddToCartButton();
        });
    });


    // Bulk checkbox all checkbox is checked.
    jQuery(document).ready(function($) {
        $('#bulk_checkbox_select_all').on('change', function() {
            if ($(this).closest('.template-two-table').length) {
                return;
            }
            var isChecked = $(this).prop('checked');
            $('.bulk_cart').prop('checked', isChecked);
        });

        $('.bulk_cart').on('change', function() {
            if ($(this).closest('.template-two-table').length) {
                return;
            }
            var allChecked = $('.bulk_cart').length === $('.bulk_cart:checked').length;
            $('#bulk_checkbox_select_all').prop('checked', allChecked);
        });

    });


    // Attribute, SKU and Price Sorting.
    document.addEventListener("DOMContentLoaded", function () {
        const table = document.getElementById("quick-variable-table");
        if (!table){
            return
        }
        const rows = Array.from(table.querySelectorAll(".variation-row"));

        // Initialize sorting state for each th
        const headers = table.querySelectorAll("th");
        headers.forEach(header => header.setAttribute("data-sort", "none"));

        // Default sort by SKU ascending on load
        const skuSortArrows = document.getElementById("sku-sort-arrows");
        if (!skuSortArrows){
            return;
        }
        const skuHeader = document.querySelector("#sku-sort-arrows").closest("th");
        sortByColumn("sku", "asc");
        setActiveHeader(skuHeader, "asc");

        // Attach click event to each th
        headers.forEach(header => {
            header.addEventListener("click", function () {
                const column = getColumn(header);
                let currentSort = header.getAttribute("data-sort");

                // Reset all headers
                headers.forEach(h => resetHeader(h));

                // Cycle through asc -> desc -> none
                if (currentSort === "asc") {
                    sortByColumn(column, "desc");
                    setActiveHeader(header, "desc");
                } else if (currentSort === "desc") {
                    resetSortOrder();
                } else {
                    sortByColumn(column, "asc");
                    setActiveHeader(header, "asc");
                }
            });
        });

        // Sort by column function
        function sortByColumn(column, order) {
            rows.sort((a, b) => {
                let cellA, cellB;

                if (column === "sku") {
                    // SKU sorting (handle alphanumeric values)
                    cellA = a.querySelector(".variable-sku").textContent.trim();
                    cellB = b.querySelector(".variable-sku").textContent.trim();
                    return order === "asc" ? cellA.localeCompare(cellB, undefined, { numeric: true }) : cellB.localeCompare(cellA, undefined, { numeric: true });
                } else if (column === "price") {
                    // Price sorting (handle numeric values)
                    cellA = parseFloat(a.querySelector(".variable-price").textContent.replace(/[^0-9.-]+/g, "")) || 0;
                    cellB = parseFloat(b.querySelector(".variable-price").textContent.replace(/[^0-9.-]+/g, "")) || 0;
                    return order === "asc" ? cellA - cellB : cellB - cellA;
                } else {
                    // Attribute sorting
                    cellA = a.querySelector(`[data-attribute-name="${column}"]`)?.textContent.trim() || "";
                    cellB = b.querySelector(`[data-attribute-name="${column}"]`)?.textContent.trim() || "";
                    return order === "asc" ? cellA.localeCompare(cellB) : cellB.localeCompare(cellA);
                }
            });
            rows.forEach(row => table.appendChild(row));
        }

        // Reset to initial sort order (by SKU)
        function resetSortOrder() {
            sortByColumn("sku", "asc");
            setActiveHeader(skuHeader, "asc");
        }

        // Get the column name for the clicked header
        function getColumn(header) {
            const attributeSort = header.querySelector("[data-attribute]")?.getAttribute("data-attribute");
            if (attributeSort) {
                return attributeSort;
            }
            if (header.contains(document.querySelector("#sku-sort-arrows"))) {
                return "sku";
            }
            if (header.contains(document.querySelector("#price-sort-arrows"))) {
                return "price";
            }
        }

        // Set the active header for sorting
        function setActiveHeader(header, order) {
            resetAllHeaders();
            header.setAttribute("data-sort", order);
            const arrows = header.querySelectorAll(".dashicons");
            arrows.forEach(arrow => arrow.style.color = "#B2B2B2");

            if (order === "asc") {
                arrows[0].style.color = "#B2B2B2";  // Ascending arrow active
                arrows[1].style.color = "#E5E5E5";  // Descending arrow inactive
            } else {
                arrows[1].style.color = "#B2B2B2";  // Descending arrow active
                arrows[0].style.color = "#E5E5E5";  // Ascending arrow inactive
            }
        }

        // Reset all header arrows to inactive (white)
        function resetAllHeaders() {
            headers.forEach(header => {
                const arrows = header.querySelectorAll(".dashicons");
                arrows.forEach(arrow => arrow.style.color = "#E5E5E5");
                header.setAttribute("data-sort", "none");
            });
        }

        // Reset individual header (to 'none' state)
        function resetHeader(header) {
            header.setAttribute("data-sort", "none");
            const arrows = header.querySelectorAll(".dashicons");
            arrows.forEach(arrow => arrow.style.color = "#E5E5E5");
        }
    });




    // Popup image on the table.
    document.addEventListener('DOMContentLoaded', () => {
        const images = document.querySelectorAll('.gallery-trigger');
        const popup = document.getElementById('imagePopup');
        const popupImage = document.getElementById('popupImage');
        const closeBtn = document.querySelector('.close-btn');
        const nextImage = document.getElementById('nextImage');
        const prevImage = document.getElementById('prevImage');
        let gallery = [];
        let currentIndex = 0;

        // Function to load an image into the popup
        function loadImage(index) {
            if (index < 0 || index >= gallery.length) return; // Avoid index out of bounds
            currentIndex = index;
            popupImage.src = gallery[currentIndex];
            updateNavigationButtons();
        }

        // Update navigation buttons visibility
        function updateNavigationButtons() {
            if (gallery.length <= 1) {
                nextImage.style.display = 'none';
                prevImage.style.display = 'none';
            } else {
                nextImage.style.display = currentIndex < gallery.length - 1 ? 'block' : 'none';
                prevImage.style.display = currentIndex > 0 ? 'block' : 'none';
            }
        }

        // Event listener for each image in the table
        images.forEach(image => {
            image.addEventListener('click', () => {
                const galleryImages = JSON.parse(image.getAttribute('data-gallery')) || [];
                const galleryOnOff  = image.getAttribute('data-gallery-onoff');

                if (galleryImages.length > 0 && galleryOnOff == 'true') {
                    gallery = galleryImages; // Set gallery images
                    loadImage(0); // Load the first image
                } else {
                    // If no gallery, just show the clicked image
                    gallery = [image.src];
                    loadImage(0);
                }
                popup.style.display = 'flex'; // Show the popup
            });
        });

        // Close popup when close button is clicked
        if (closeBtn){
            closeBtn.addEventListener('click', () => {
                popup.style.display = 'none';
            });
        }

        // Close popup when clicking outside the popup content
        if (popup){
            popup.addEventListener('click', (event) => {
                if (event.target === popup) {
                    popup.style.display = 'none';
                }
            });
        }


        // Navigate to the next image
        if (nextImage){
            nextImage.addEventListener('click', () => {
                loadImage(currentIndex + 1);
            });
        }


        // Navigate to the previous image
        if (prevImage){
            prevImage.addEventListener('click', () => {
                loadImage(currentIndex - 1);
            });
        }

    });



    // Issue for On Sale Checked and Unchecked
    jQuery(document).ready(function($) {
        var removedRows = [];

        // $('.variation-row').show();

        $('#stock_status').on('change', function () {
            var isChecked = $(this).prop('checked');

            $('.variation-row').each(function () {
                var stockStatus = $(this).data('stock-status');

                if (isChecked && stockStatus === 1) {
                    $(this).show();
                    // $(this).find('.quick-add-to-cart').css('min-width', '140px');
                } else if (!isChecked) {
                    $(this).show();
                } else {
                    if (stockStatus !== 'instock') {
                        removedRows.push($(this).detach());
                    }
                }
            });

            if (!isChecked) {
                for (var i = 0; i < removedRows.length; i++) {
                    $('#quick-variable-table').append(removedRows[i].addClass('re-added'));
                    // $(this).find('.quick-add-to-cart').css('min-width', '140px');
                }

                removedRows = [];

                $('.re-added').each(function () {
                    bindAddToCart($(this));
                    $(this).removeClass('re-added');
                });

                bindQuantityButtons();
            }
        });

        // Add to cart for On Sale unchecked portion
        function bindAddToCart(row) {
            row.find('.quick-add-to-cart').off('click').on('click', function () {

                function isMobile() {
                    return /Mobi|Android|iPhone|iPad|iPod|BlackBerry|Windows Phone/i.test(navigator.userAgent);
                }

                var $button = $(this);
                var productId = $button.data('productid');
                var variationId = $button.data('variationid');
                var quantity = row.find(".quick-quantity-input").val();

                if (!$button.hasClass('loading')) {

                    $button.addClass('loading');

                    $button.append('<span class="spinner"><i class="fa fa-spinner fa-spin"></i></span>');

                    setTimeout(function() {
                        $button.removeClass('loading');
                        $button.find('.spinner').remove();
                    }, 2000);
                }

                if (isMobile()) {
                    quantity = $button.closest('.mobile-variation-card').find('.quick-quantity-input').val();
                } else {
                    quantity = $button.closest('tr').find(".quick-quantity-input").val();
                }

                var selectedAttributes = {};
                var $container = isMobile()
                    ? $button.closest('.mobile-variation-card')
                    : $button.closest('tr');

                $container.find('.quick-attribute-select, .quick-attribute-text').each(function () {
                    var attributeKey = $(this).attr('name');
                    var attributeValue;

                    if ($(this).is('select')) {
                        attributeValue = $(this).val();
                    } else {
                        attributeValue = $(this).text().trim();
                    }

                    if (attributeValue && attributeKey) {
                        selectedAttributes[attributeKey] = attributeValue;
                    }
                });

                const data = {
                    'action': 'woocommerce_ajax_add_to_cart',
                    'product_id': productId,
                    'quantity': quantity,
                    'variation_id': variationId,
                    'variation': selectedAttributes,
                    "_wpnonce": quick_front_ajax_obj.nonce, // Add the nonce here
                };


                $button.prop('disabled', true);
                $button.find('i, span').hide();

                $.post(quick_front_ajax_obj.ajax_url, data, function(response) {

                    if (response.success) {
                        $button.append('<span class="updated-check-add-to-cart"><i class="fa fa-check"></i></span>');

                        setTimeout(function() {
                            $button.find('.updated-check-add-to-cart').remove();
                            $button.prop('disabled', false);
                            $button.find('i, span').show();
                        }, 3000);

                        $( document.body).trigger('wc_fragment_refresh');

                    } else {
                        console.error('Failed to add product: ', response);
                        $button.prop('disabled', false);
                        $button.find('i, span').show();
                    }
                });
            });
        }


        // Add search functionality (filter by SKU or attribute)
        $('#variation-search').on('input', function () {
            var searchTerm = $(this).val().toLowerCase();

            $('.variation-row').each(function () {
                var rowContent = $(this).text().toLowerCase();
                if (rowContent.includes(searchTerm)) {
                    $(this).show();
                } else {
                    $(this).hide();
                }
            });
        });

        // Function to bind quantity buttons
        function bindQuantityButtons() {
            $(".quick-quantity-decrease").off("click").on("click", function () {
                let currentValue = parseInt(
                    $(this).siblings(".quick-quantity-input").val(),
                    10
                );

                if (currentValue > 1) {
                    // Prevent going below 1
                    $(this)
                        .siblings(".quick-quantity-input")
                        .val(currentValue - 1);
                    $(".quick-cart-notification").text("");
                }
            });

            $(".quick-quantity-increase").off("click").on("click", function () {
                console.log("increase");
                maxQuantity = $(this)
                    .siblings(".quick-quantity-input")
                    .attr("data-max");
                let currentValue = parseInt(
                    $(this).siblings(".quick-quantity-input").val(),
                    10
                );

                if (currentValue < maxQuantity) {
                    // Prevent exceeding max limit
                    $(this)
                        .siblings(".quick-quantity-input")
                        .val(currentValue + 1);
                    $(".quick-cart-notification").text("");
                }
            });
        }
    });

</script>


<style>

    .dashicons {
        transition: color 0.2s ease-in-out;
    }

    /* Popup container */
    .popup-container {
        display: none;
        position: fixed;
        z-index: 999999;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.8);
        justify-content: center;
        align-items: center;
    }

    /* Popup content (image wrapper) */
    .popup-content {
        position: relative;
        max-width: 90%;
        max-height: 90%;
        border: 5px solid white;
        border-radius: 10px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.5);
        display: flex;
        justify-content: center;
        align-items: center;
        overflow: hidden;
    }

    /* Close button */
    .close-btn {
        position: absolute;
        top: 0;
        right: 0;
        color: white;
        font-size: 25px;
        font-weight: bold;
        background-color: rgba(0, 0, 0, 0.5);
        border: none;
        border-radius: 50%;
        width: 30px;
        height: 30px;
        text-align: center;
        line-height: 30px;
        cursor: pointer;
        z-index: 1010;
    }

    .close-btn:hover{
        background-color: #d5d5d5;
        border-color: #d5d5d5;
        color: #333333;
    }

    .quick-add-to-cart.loading .fa-cart-plus,
    .quick-add-to-cart.loading span {
        display: none;
    }


    .lightbox-nav {
        position: absolute;
        top: 50%;
        transform: translateY(-50%);
        background: rgba(0, 0, 0, 0.5);
        border: none;
        color: white;
        font-size: 2rem;
        padding: 10px;
        cursor: pointer;
        z-index: 1000;
    }

    .lightbox-nav:hover {
        background-color: #d5d5d5;
        border-color: #d5d5d5;
        color: #333333;
    }

    .lightbox-nav.prev {
        left: 10px;
    }

    .lightbox-nav.next {
        right: 10px;
    }

</style>