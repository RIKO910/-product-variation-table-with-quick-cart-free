;(function($) {
    $(document).ready(function() {

        $(document).ready(function() {

            // Initialize the WooCommerce gallery with default product images without ajax call
            function initializeGallery() {
                var galleryContainer = $('.woocommerce-product-gallery');
                var mainImage = galleryContainer.find('img.wp-post-image').first();
                var galleryImages = galleryContainer.find('.woocommerce-product-gallery__image img').not(mainImage);
                var allImages = [];

                if (mainImage.length) {
                    allImages.push({
                        src: mainImage.attr('data-large_image') || mainImage.attr('src'), // Use large image if available
                        thumb: mainImage.attr('src'),
                        w: 1200,
                        h: 1200
                    });
                }

                galleryImages.each(function () {
                    allImages.push({
                        src: $(this).attr('data-large_image') || $(this).attr('src'), // Use large image if available
                        thumb: $(this).attr('src'),
                        w: 1200,
                        h: 1200
                    });
                });

                var sliderHtml = '<div class="variation-gallery-slider-single-product-page">';

                allImages.forEach(function (image, index) {
                        sliderHtml += `<div class="gallery-slide-single-product-page">
                                <a href="${image.src}" data-index="${index}" data-lightbox="product-gallery">
                                    <img src="${image.thumb}" alt="Product Image">
                                </a>
                            </div>`;
                    }
                );

                sliderHtml += '</div>';
                galleryContainer.html(sliderHtml);

                slickSlider();
                reinitializeWooCommerceLightbox(allImages);
            }

            // After ajax call gallery show and woocommerce lightbox show
            function ajaxCallGallery(allImages){
                var galleryContainer = $('.woocommerce-product-gallery');
                var afterAllImages = [];

                allImages.forEach(function(image) {
                    afterAllImages.push({
                        src: image.src,
                        thumb: image.thumb,
                        w: 1200,
                        h: 1200
                    });
                });

                var sliderHtml = '<div class="variation-gallery-slider-single-product-page">';

                afterAllImages.forEach(function (image, index) {

                        sliderHtml += `<div class="gallery-slide-single-product-page">
                                <a href="${image.src}" data-index="${index}" data-lightbox="product-gallery">
                                    <img src="${image.src}" alt="Product Image">
                                </a>
                            </div>`;
                    }
                );

                sliderHtml += '</div>';
                galleryContainer.html(sliderHtml);

                slickSlider();
                reinitializeWooCommerceLightbox(afterAllImages);
            }

            // Slick Slider
            function slickSlider(){
                $('.variation-gallery-slider-single-product-page').slick({
                    dots: false,
                    arrows: true,
                    prevArrow: '<button type="button" class="slick-prev"><i class="fa fa-chevron-left"></i></button>',
                    nextArrow: '<button type="button" class="slick-next"><i class="fa fa-chevron-right"></i></button>',
                    infinite: true,
                    speed: 300,
                    slidesToShow: 1,
                    slidesToScroll: 1
                });
            }

            // Woocommerce default lightbox.
            function reinitializeWooCommerceLightbox(galleryHtml) {

                // $('.woocommerce-product-gallery').each(function() {
                //     $(this).wc_product_gallery(); // Reinitialize WooCommerce lightbox
                // });
                // Reinitialize WooCommerce lightbox after the AJAX update
                if (typeof wc_product_gallery !== 'undefined') {
                    $('.woocommerce-product-gallery').wc_product_gallery();
                }

                // Initialize PhotoSwipe for new images
                $('.variation-gallery-slider-single-product-page a').on('click', function(event) {
                    event.preventDefault();
                    var pswpElement = document.querySelectorAll('.pswp')[0];
                    var index = $(this).data('index');
                    var options = {
                        index: index,
                        bgOpacity: 0.7,
                        showHideOpacity: true,
                        closeOnScroll: false,
                        getThumbBoundsFn: function(index) {
                            var thumbnail = document.querySelectorAll('.variation-gallery-slider-single-product-page img')[index];
                            var pageYScroll = window.pageYOffset || document.documentElement.scrollTop;
                            var rect = thumbnail.getBoundingClientRect();
                            return {x: rect.left, y: rect.top + pageYScroll, w: rect.width};
                        }
                    };
                    var gallery = new PhotoSwipe(pswpElement, PhotoSwipeUI_Default, galleryHtml, options);
                    gallery.init();
                });
            }

            // Listen for changes in the variation select fields
            $('form.variations_form').on('change', 'select', function() {
                var form = $(this).closest('form.variations_form');
                var variation_id = form.find('input.variation_id').val();
                var productId = $('input[name="product_id"]').val()

                $('.woocommerce-product-gallery').append('<div class="loading-spinner"></div>')


                // Check if any attribute is selected
                var allAttributesDeselected = true;
                var selectedAttributes = {};

                form.find('select').each(function() {
                    var attributeName = $(this).attr('name');
                    var selectedTermName = $(this).val();
                    if (selectedTermName) {
                        allAttributesDeselected = false;
                        selectedAttributes[attributeName] = selectedTermName;
                    }
                });

                if (allAttributesDeselected) {
                    // No attribute is selected with default product images ajax call.
                    $.ajax({
                        url: wc_add_to_cart_params.ajax_url,
                        type: 'POST',
                        data: {
                            action: 'get_default_gallery',
                            product_id: productId,
                        },
                        success: function(response) {
                            if (response.success) {
                                ajaxCallGallery(response.data.gallery_data)
                            }
                        },
                        error: function(xhr, status, error) {
                            console.error("AJAX Error:", error);
                        },
                        complete: function() {
                            $('.loading-spinner').remove(); // Remove spinner when done
                        }
                    });

                } else {
                    if (variation_id) {
                        $.ajax({
                            url: wc_add_to_cart_params.ajax_url,
                            type: 'POST',
                            data: {
                                action: 'get_variation_gallery',
                                variation_id: variation_id,
                                product_id: productId,
                            },
                            success: function(response) {
                                if (response.success) {
                                    ajaxCallGallery(response.data.gallery_data)
                                }
                            },
                            error: function(xhr, status, error) {
                                console.error("AJAX Error:", error);
                            },
                            complete: function() {
                                $('.loading-spinner').remove(); // Remove spinner when done
                            }
                        });
                    } else {

                        $.each(selectedAttributes, function(attributeName, termName) {
                            let product_id = $('input[name="product_id"]').val()

                            if (termName){
                                $.ajax({
                                    url: wc_add_to_cart_params.ajax_url,
                                    type: 'POST',
                                    data: {
                                        action: 'get_attribute_term',
                                        attribute_name: attributeName,
                                        term_name: termName,
                                        product_id: product_id,
                                    },
                                    success: function (response){
                                        if(response.success){
                                            ajaxCallGallery(response.data.gallery_data)
                                        }
                                    },
                                    error: function(xhr, status, error) {
                                        console.error("AJAX Error:", error);
                                    },
                                    complete: function() {
                                        $('.loading-spinner').remove(); // Remove spinner when done
                                    }
                                })
                            }
                        });
                    }
                }
            });

            initializeGallery();
        });

    });
})(jQuery);