jQuery(document).ready(function ($) {

    // Attribute Section Start

    jQuery(document).ready(function ($) {

        var previewDiv = $('#term_image_preview_render_from_js');
        var imageUrl = previewDiv.data('image-url');

        if (imageUrl){
            previewDiv.html('<img id="term_image_preview" src="' + imageUrl + '" alt="Selected Image" style="max-width: 70px; height: auto; display: block; margin-bottom: 10px; border: 1px solid lightgrey; border-radius: 5px">');
        }

        // Remove Image
        $(document).on('click', '#upload_image_button_remove', function (e) {
            e.preventDefault();

            $('#term_image').val('');

            $('#term_image_preview').attr('src', '').hide();
        });

        // Upload Image
        $('#upload_image_button').on('click', function (e) {
            e.preventDefault();
            var image = wp.media({
                title: 'Upload Image',
                multiple: false
            }).open()
                .on('select', function () {
                    var uploaded_image = image.state().get('selection').first().toJSON();
                    var image_url = uploaded_image.url;

                    // Update the hidden input value
                    $('#term_image').val(image_url);

                    // Update or show the preview image
                    var previewDiv = $('#term_image_preview_render_from_js');
                    previewDiv.html('<img id="term_image_preview" src="' + image_url + '" alt="Selected Image" style="max-width: 70px; height: auto; display: block; margin-bottom: 10px; border: 1px solid lightgrey; border-radius: 5px">');

                });
        });
    });


    jQuery(document).ready(function ($) {
        $('#upload_image_button_add_new').on('click', function (e) {
            e.preventDefault();
            var image = wp.media({
                title: 'Upload Image',
                multiple: false
            }).open()
                .on('select', function () {
                    var uploaded_image = image.state().get('selection').first().toJSON();
                    var image_url      = uploaded_image.url;

                    $('#term_image_add_new').val(image_url);

                    // Update or show the preview image
                    var previewDiv = $('#term_image_preview_add_new_render_from_js');
                    previewDiv.html('<img src="' + image_url + '" alt="Selected Image" style="max-width: 70px; height: auto; border: 1px solid lightgrey; border-radius: 5px;">');
                });
        });
    });

    // Attribute Section End

    jQuery(document).ready(function ($) {
        if ($('.wvs-color-picker').length) {
            $('.wvs-color-picker').wpColorPicker();
        } else {

        }
    });

//     Admin dashboard start

    jQuery(document).ready(function ($) {
        let imageDivCart      = $("#add-to-cart-icon-image-dashboard");
        let imageDivListFirst = $("#variation-list-dashboard-first-image");
        let imageDivListSecond = $("#variation-list-dashboard-second-image");
        let imageDivVariationGallery = $("#variation-gallery-dashboard");
        let imageDivAttributeGallery = $("#attribute-gallery-dashboard");
        let imageDivArchivePageOption = $("#archive-page-option-section");
        let imageUrlCart = imageDivCart.data("image");
        let imageUrlListFirst = imageDivListFirst.data("image");
        let imageUrlListSecond = imageDivListSecond.data("image");
        let imageUrlVariationGallery = imageDivVariationGallery.data("image");
        let imageUrlAttributeGallery = imageDivAttributeGallery.data("image");
        let imageUrlArchivePageOption = imageDivArchivePageOption.data("image");

        if (imageUrlCart) {
            let imgTag = $("<img>", {
                src: imageUrlCart,
                alt: "Add to Cart Icon",
                css: {
                    height: "100%"
                }
            });

            imageDivCart.append(imgTag);
        }

        if (imageUrlListFirst){
            let imgTag = $("<img>", {
                src: imageUrlListFirst,
                alt: "Add to Cart Icon",
                css: {
                    height: "100%"
                }
            });

            imageDivListFirst.append(imgTag);
        }

        if (imageUrlListSecond){
            let imgTag = $("<img>", {
                src: imageUrlListSecond,
                alt: "Add to Cart Icon",
                css: {
                    height: "100%"
                }
            });

            imageDivListSecond.append(imgTag);
        }

        if (imageUrlVariationGallery){
            let imgTag = $("<img>", {
                src: imageUrlVariationGallery,
                alt: "Add to Cart Icon",
                css: {
                    height: "100%"
                }
            });

            imageDivVariationGallery.append(imgTag);
        }

        if (imageUrlAttributeGallery){
            let imgTag = $("<img>", {
                src: imageUrlAttributeGallery,
                alt: "Add to Cart Icon",
                css: {
                    height: "100%"
                }
            });

            imageDivAttributeGallery.append(imgTag);
        }

        if (imageUrlArchivePageOption){
            let imgTag = $("<img>", {
                src: imageUrlArchivePageOption,
                alt: "Add to Cart Icon",
                css: {
                    height: "100%"
                }
            });

            imageDivArchivePageOption.append(imgTag);
        }
    });


    // Ajax notice start

    jQuery(document).ready(function($) {
        $('.qvt-dismiss-btn').on('click', function() {
            const data = {
                action: 'quick_variable_review_dismissed_ajax',
                _nonce: qvt_notice_obj.nonce
            };
            const ajaxURL = qvt_notice_obj.ajax_url;
            $.post(ajaxURL, data, function(response) {
                console.log("response",response)
                if (response.success) {
                    console.log("work");
                    $('#qvt-review-notice').hide(); // Hide the review notice
                } else {
                    console.log(response.data);
                }
            });
        });

        var imgURL = qvt_notice_obj.logo_url;
        // Check if the target .logo span exists before appending
        if ($("#qvt-review-notice .logo").length > 0) {
            // Create an <img> element
            var imgElement = $("<img>", {
                src: imgURL,
                alt: "Plugin Logo",
                class: "custom-logo", // Add your custom class if needed
            });

            // Append the image to the .logo span inside the admin notice
            $("#qvt-review-notice .logo").append(imgElement);
        }
    });

    //  Ajax notice end

});

document.addEventListener('DOMContentLoaded', function() {
    var helpButton         = document.querySelector('.help-button-carousel');
    var helpImageContainer = document.querySelector('.help-image');
    var popup              = document.getElementById('popup-container');
    var imageSrc    = popup.getAttribute('value');
    var closeBtn           = document.querySelector('.close');

    helpButton.addEventListener('click', function() {
        // Clear existing content to avoid duplicating the image
        helpImageContainer.innerHTML = '';

        // Dynamically create and insert the image
        var img = document.createElement('img');
        img.src = imageSrc;
        img.alt = "Quick Cart Help Image";

        helpImageContainer.appendChild(img);
        popup.style.display = 'flex'; // Show the popup

    });

    closeBtn.addEventListener('click', function() {
        popup.style.display = 'none'; // Hide the popup
    });

    // Close popup when clicking outside of it
    window.addEventListener('click', function(event) {
        if (event.target === popup) {
            popup.style.display = 'none'; // Hide the popup
        }
    });
});


function openCity(evt, cityName) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }
    document.getElementById(cityName).style.display = "block";
    evt.currentTarget.className += " active";
}



document.addEventListener("DOMContentLoaded", function () {
    const selectElement = document.getElementById('select-design');
    const designTemplateContainer = document.getElementById('show-template-image');
    const closeButtons = document.querySelectorAll('.close-design');
    const designTemplates = document.querySelectorAll('.design-template');

    // Template image paths
    const templateImages = {
        template_1: designTemplateContainer.dataset.imageTemplate1,
        template_2: designTemplateContainer.dataset.imageTemplate2,
        template_3: designTemplateContainer.dataset.imageTemplate3,
        template_4: designTemplateContainer.dataset.imageTemplate4
    };

    // Function to dynamically create and display the selected template image
    function updateImageDisplay() {
        const selectedValue = selectElement.value;

        // Clear any existing image inside the design template container
        designTemplateContainer.innerHTML = `
            <div class="design-template">
                <div style="display: flex; justify-content: end">
                    <span class="close-design">&times;</span>
                </div>
            </div>
        `;

        // Create the image element dynamically
        if (templateImages[selectedValue]) {
            const img = document.createElement('img');
            img.src = templateImages[selectedValue];
            img.alt = `${selectedValue} image`;
            img.style.display = 'block';

            // Customize styles for specific templates (if needed)
            if (selectedValue === 'template_3') {
                img.style.height = '200px';
                img.style.width = '400px';
            }

            // Append the image to the design template container
            const designTemplate = designTemplateContainer.querySelector('.design-template');
            designTemplate.appendChild(img);

            // Add close functionality to the new close button
            const closeButton = designTemplate.querySelector('.close-design');
            closeButton.addEventListener('click', function () {
                designTemplate.style.display = 'none';
            });
        }
    }

    // Initial update
    updateImageDisplay();

    // Listen for changes in the select dropdown
    selectElement.addEventListener('change', updateImageDisplay);
});