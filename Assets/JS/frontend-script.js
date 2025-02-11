jQuery(document).ready(function () {

  jQuery(document).ready(function ($) {
    $('.quick-add-to-cart-shop-page').on('click', function (e) {
      e.preventDefault();

      var button = $(this);

      // Avoid adding another spinner if one is already present
      if (!button.hasClass('loading')) {
        // Add loading state
        button.addClass('loading');

        // Add spinner dynamically
        button.append('<span class="spinner"><i class="fa fa-spinner fa-spin"></i></span>');

        // Simulate the end of loading (remove this part when adding actual AJAX functionality)
        setTimeout(function() {
          button.removeClass('loading');
          button.find('.spinner').remove(); // Remove spinner after loading
        }, 2000); // Adjust delay as needed
      }
    });
  });

  jQuery(document).ready(function ($) {
    $('.image-shop-page').each(function () {
      var div = $(this);

      // Get the attributes from the div
      var src = div.attr('src');
      var alt = div.attr('alt');
      var style = div.attr('style');
      var className = div.attr('class');

      // Create an <img> element with the same attributes
      var img = $('<img>', {
        src: src,
        alt: alt,
        style: style,
        class: className.replace('image-shop-page', '').trim() // Remove "image-shop-page" class if not needed
      });

      // Replace the <div> with the <img>
      div.replaceWith(img);
    });
  });


  // This  section just for single product page. Start

  jQuery(document).ready(function ($) {
    let selectedAttributes = {};
    let firstAttributeSelected = null;
    let attributeSelectionOrder = [];
    let secondAttributeSelected = null;
    let thirdAttributeSelected = null;
    let firstAttributeSelectedd = null;
    let variations = $('form.variations_form').data('product_variations');

    $('.custom-color-button, .custom-image-button, .custom-button, input[type="radio"]').on('click change', function () {

      if ($(this).closest('.variations-display').length) {
        return;
      }

      if ($(this).closest('.variations-display-redirecting-single-product').length){
        return;
      }

      const selectedVariations = $(this).attr('data-available-variations');
      const selectedAttribute = $(this).attr('data-variation-name');
      const selectedValue = $(this).attr('data-value');

      let selectedAttribute1 = $(this).data('variation-name') || $(this).attr('name');

      // Filter variations based on the selected attribute
      let filteredVariations = variations.filter(function (variation) {
        let attributeValue = variation.attributes[selectedAttribute1];
        // Match exact value OR if "Any" is set, allow all values
        return attributeValue === selectedValue || attributeValue === '' || attributeValue.startsWith('any');
      });


      // Check if the button is already selected
      if ($(this).hasClass('selected')) {

        delete selectedAttributes[selectedAttribute];

        // Remove the attribute from the selection order
        attributeSelectionOrder = attributeSelectionOrder.filter(attr => attr !== selectedAttribute);

        // Reset the variables if necessary
        if (firstAttributeSelected === selectedAttribute) {
          firstAttributeSelected = null;
        }
        if (secondAttributeSelected === "second" && attributeSelectionOrder.length < 2) {
          secondAttributeSelected = null;
        }
        if (thirdAttributeSelected === "third" && attributeSelectionOrder.length < 3) {
          thirdAttributeSelected = null;
        }

        // Re-enable all buttons if nothing is selected
        if (Object.keys(selectedAttributes).length === 0) {
          $('.custom-color-button, .custom-image-button, .custom-button, input[type="radio"]').prop('disabled', false).css('opacity', '1').removeClass('disabled-option');
        }

        return; // Exit early since we're deselecting
      }

      // Update selected attributes
      selectedAttributes[selectedAttribute] = selectedValue;

      if (firstAttributeSelected === null ) {
        // Allow free selection of color buttons until a non-color attribute is selected
      } else {
        // Lock in the first attribute group selected
        if (firstAttributeSelected === null) {
          firstAttributeSelected = selectedAttribute;
        }
      }


      // Update attribute selection order if not already in the list
      if (!attributeSelectionOrder.includes(selectedAttribute)) {
        attributeSelectionOrder.push(selectedAttribute);
      }

      const clickedAttribute = $(this).attr('data-variation-name');

      // Check if the attribute is already in the selection order
      if (!attributeSelectionOrder.includes(clickedAttribute)) {
        attributeSelectionOrder.push(clickedAttribute);
      }

      // Determine which attribute was selected and log appropriately
      if (attributeSelectionOrder[0] === clickedAttribute) {
        firstAttributeSelectedd = "first";
        secondAttributeSelected = "second1";
      } else if (attributeSelectionOrder[1] === clickedAttribute) {
        secondAttributeSelected = "second";
      } else if (attributeSelectionOrder[2] === clickedAttribute) {
        thirdAttributeSelected = "third";
        secondAttributeSelected = "second1";
      }


      if (selectedAttribute1) {
        try {
          // const parsedVariations = JSON.parse(selectedVariations);
          let availableCombinations = [];

          // Keep all buttons in the current (color) group enabled if it's the first selection
          if (firstAttributeSelected === selectedAttribute ) {
            $(`[data-variation-name="${selectedAttribute}"]`).each(function () {
              $(this).prop('disabled', false).css('opacity', '1').removeClass('disabled-option');
            });
          } else {
            // Disable other attribute buttons if they don't match the available variations
            $('.custom-color-button, .custom-image-button, .custom-button, input[type="radio"]').each(function () {

              if ($(this).closest('.variations-display').length) {
                return;
              }

              if ($(this).closest('.variations-display-redirecting-single-product').length){
                return;
              }

              const buttonAttribute = $(this).attr('data-variation-name');
              const buttonValue = $(this).attr('data-value');
              const termOrderData = $(this).attr('data-term-order');
              let termOrder;

              if (termOrderData) {
                try {
                  termOrder = JSON.parse(termOrderData);
                } catch (error) {
                  console.error('Error parsing termOrder JSON:', error);
                }
              } else {
                console.warn('No termOrder data found for this button.');
              }
              // Skip the current attribute group
              if (buttonAttribute !== selectedAttribute) {

                let isAvailable = false;

                if (secondAttributeSelected === "second") {
                  if (attributeSelectionOrder.length > 0) {
                    let firstSelectedAttr = attributeSelectionOrder[0];
                    let attrKey           = firstSelectedAttr.replace('attribute_', '');

                    // Narrow down termOrder to terms for the first selected attribute
                    let firstAttrTermOrder = termOrder && termOrder[attrKey] ? termOrder[attrKey] : null;

                    if (!firstAttrTermOrder) {
                      return;
                    }

                    let selectedTermNumbers = {};

                    filteredVariations = filteredVariations.filter(function (variation) {
                      let attrValue = variation.attributes[firstSelectedAttr];
                      let termNumber;

                      if (!attrValue || attrValue.toLowerCase().includes('any')) {
                        Object.keys(firstAttrTermOrder).forEach(key => {
                          selectedTermNumbers[key] = firstAttrTermOrder[key];
                        });
                        return true;
                      } else {
                        termNumber = firstAttrTermOrder[attrValue];
                      }

                      if (termNumber !== undefined) {
                        selectedTermNumbers[attrValue] = termNumber;
                        return true;
                      } else if (attrValue === '' || attrValue.startsWith('any')) {
                        return true;
                      } else {
                        console.warn(`Invalid attrValue or key missing in termOrder: ${attrValue}`);
                        return false;
                      }
                    });

                    $('.custom-color-button, .custom-image-button, .custom-button, input[type="radio"]').each(function () {

                      if ($(this).closest('.variations-display').length) {
                        return;
                      }

                      if ($(this).closest('.variations-display-redirecting-single-product').length){
                        return;
                      }

                      const buttonAttribute = $(this).attr('data-variation-name');
                      const buttonValue = $(this).attr('data-value');

                      if (buttonAttribute !== firstSelectedAttr) {
                        return;
                      }

                      const attrValue = buttonValue;
                      const termNumber = selectedTermNumbers[attrValue];

                      if (termNumber !== undefined) {
                        $(this).prop('disabled', false).css('opacity', '1').removeClass('disabled-option');
                      } else {
                        $(this).prop('disabled', true).css('opacity', '0.5').addClass('disabled-option');
                      }
                    });
                  }
                }else if (thirdAttributeSelected === "third") {

                  // let firstSelectedAttr = attributeSelectionOrder[0];
                  // let secondSelectedAttr = attributeSelectionOrder[1];

                  // Filter variations based on selected attributes
                  filteredVariations.forEach(function (variation) {
                    let match = true;
                    Object.keys(selectedAttributes).forEach(function (key) {
                      if (variation.attributes[key] !== selectedAttributes[key] && variation.attributes[key] !== '') {
                        match = false;
                      }
                    });
                    if (match) {
                      availableCombinations.push(variation);
                    }
                  });

                  // if (buttonAttribute === firstSelectedAttr) {
                  //   return;
                  // }
                  // if (buttonAttribute === secondSelectedAttr) {
                  //   return;
                  // }


                  availableCombinations.forEach(function (variation) {
                    if (
                        variation.attributes[buttonAttribute] === buttonValue ||
                        variation.attributes[buttonAttribute] === '' ||
                        variation.attributes[buttonAttribute].startsWith('any')
                    ) {
                      isAvailable = true;
                    }
                  });


                  if (!isAvailable) {
                    $(this).prop('disabled', true).css('opacity', '0.5').addClass('disabled-option');
                  } else {
                    $(this).prop('disabled', false).css('opacity', '1').removeClass('disabled-option');
                  }
                }else if (firstAttributeSelectedd === "first") {

                  let isAvailable = false;

                  filteredVariations.forEach(function (variation) {
                    if (
                        variation.attributes[buttonAttribute] === buttonValue ||
                        variation.attributes[buttonAttribute] === '' ||  // Allow empty attributes
                        variation.attributes[buttonAttribute].startsWith('any')  // Allow 'any' attributes
                    ) {
                      isAvailable = true;
                    }
                  });

                  if (!isAvailable) {
                    $(this).prop('disabled', true).css('opacity', '0.5').addClass('disabled-option');
                  } else {
                    $(this).prop('disabled', false).css('opacity', '1').removeClass('disabled-option');
                  }
                }else{

                  // Filter variations based on selected attributes
                  filteredVariations.forEach(function (variation) {
                    let match = true;
                    Object.keys(selectedAttributes).forEach(function (key) {
                      if (variation.attributes[key] !== selectedAttributes[key] && variation.attributes[key] !== '') {
                        match = false;
                      }
                    });
                    if (match) {
                      availableCombinations.push(variation);
                    }
                  });


                  availableCombinations.forEach(function (variation) {
                    if (
                        variation.attributes[buttonAttribute] === buttonValue ||
                        variation.attributes[buttonAttribute] === '' ||
                        variation.attributes[buttonAttribute].startsWith('any')
                    ) {
                      isAvailable = true;
                    }
                  });


                  if (!isAvailable) {
                    $(this).prop('disabled', true).css('opacity', '0.5').addClass('disabled-option');
                  } else {
                    $(this).prop('disabled', false).css('opacity', '1').removeClass('disabled-option');
                  }
                }
              }
            });
          }
        } catch (error) {
          console.error('Error parsing JSON:', error, selectedVariations);
        }
      } else {
        console.log('No variations available for this selection.');
      }
    });
  });


  (function ($) {
    $(document).ready(function () {
      // Handle the click event on the "Clear" link
      $(document).on('click', '.reset_variations', function (e) {
        e.preventDefault();  // Prevent default WooCommerce behavior

        // Clear the selected state of custom buttons, radios, and images
        $('.custom-button, .custom-image-button, .custom-color-button, input[type="radio"]').removeClass('selected');
        $('.custom-button, .custom-image-button, .custom-color-button, input[type="radio"]').prop('checked', false);

        // Enable all buttons and radios after reset
        $('.custom-button, .custom-image-button, .custom-color-button, input[type="radio"]')
            .prop('disabled', false)
            .css('opacity', '1')
            .removeClass('disabled-option');

        // Reset WooCommerce variation form
        $('form.variations_form')[0].reset();

        // Reset the label text to "Choose an option"
        $('.label').each(function () {
          let labelText = $(this).text().split(':')[0];  // Extract the attribute name
          $(this).text(labelText + ' ');  // Reset the label
        });

        // Trigger WooCommerce events to ensure proper reset
        $('form.variations_form')
            .trigger('reset_data')
            .trigger('woocommerce_variation_has_reset');
      });
    });
  })(jQuery);


  // Label show dynamically into single product page.
  (function ($) {
    $(document).ready(function () {
      // Handle button clicks and update label dynamically
      $(document).on('click', '.custom-button, .custom-image-button, .custom-color-button', function () {
        const button = $(this);
        const container = button.closest('tr');
        const variationName = button.data('variation-name');
        const value = button.data('value');
        const labelName = button.data('label-name');

        // Locate the label using the `for` attribute
        const label = container.find('.label');

        if (button.hasClass('selected')) {
          if (label.length) {
            // Update the label text with the selected value
            const attributeName = label.text().split(':')[0].trim();
            // const tooltipText = button.data('tooltip');
            label.text(attributeName + ': ' + (labelName));
          }

          // Update WooCommerce select box
          const selectBox = $('select[name="' + variationName + '"]');
          if (selectBox.length) {
            selectBox.val(value).trigger('change');
          }
        }else{
          if (label.length) {
            // Update the label text with the selected value
            const attributeName = label.text().split(':')[0].trim();
            // const tooltipText = button.data('tooltip');
            label.text(attributeName + ' ' );
          }
        }



        // Trigger WooCommerce events
        $('form.variations_form')
            .trigger('woocommerce_variation_select_change')
            .trigger('check_variations');
      });
    });
  })(jQuery);


  // Show tooltip into single product page by select variation
  (function ($) {
    $(document).ready(function () {
      // Create a tooltip element
      const tooltip = $('<div class="custom-tooltip"></div>').appendTo('body').hide();

      // Show tooltip on hover
      $(document).on('mouseenter', '.custom-button, .custom-image-button, .custom-color-button', function () {
        const tooltipText = $(this).data('tooltip');
        const tooltipLabel = $(this).data('tooltip-label');
        const tooltipBackGroundColor = $(this).data('tooltip-bg-color');
        const tooltipTextColor = $(this).data('tooltip-text-color');

        if (tooltipText) {
          const finalTooltipText = tooltipLabel
              ? `${tooltipLabel} : ${tooltipText}`
              : tooltipText;

          tooltip
              .text(finalTooltipText)
              .css({
                'background-color': tooltipBackGroundColor,
                'color': tooltipTextColor
              })
              .fadeIn(0);
        }
      }).on('mousemove', '.custom-button, .custom-image-button, .custom-color-button', function (e) {
        tooltip.css({
          top: e.pageY + 10,
          left: e.pageX + 10
        });
      }).on('mouseleave', '.custom-button, .custom-image-button, .custom-color-button', function () {
        tooltip.fadeOut(0);
      });
    });
  })(jQuery);

  // Radio

  (function ($) {
    $(document).ready(function () {
      let selectedAttributes = {};

      const customVariations = document.getElementsByClassName('custom-wc-variations');
      if (customVariations.length > 0) {
        Array.from(customVariations).forEach(function (variation) {
          const radios = variation.querySelectorAll('input[type=radio]');

          radios.forEach(function (radio) {
            radio.addEventListener('click', function (e) {
              e.preventDefault()
              const variationName = radio.getAttribute('data-variation-name');
              const selectBox = document.querySelector('select[name=' + variationName + ']');
              const selectedValue = radio.getAttribute('data-value');

              // Toggle logic for deselection
              if (radio.classList.contains('selected')) {
                radio.classList.remove('selected');
                selectBox.value = '';
                delete selectedAttributes[variationName];  // Remove attribute
              } else {
                // Deselect all other radios and select the clicked one
                radios.forEach(el => el.classList.remove('selected'));
                radio.classList.add('selected');
                selectBox.value = selectedValue;
                selectedAttributes[variationName] = selectedValue;
              }

              // Trigger WooCommerce events
              $(selectBox).trigger('change');
              $('form.variations_form').trigger('woocommerce_variation_select_change');
              $('form.variations_form').trigger('check_variations');
            });
          });
        });
      }
    });
  })(jQuery);


  // Color , Images and Button

  (function ($) {
    $(document).ready(function () {
      const selectors = ['.custom-wc-buttons', '.custom-wc-images', '.custom-wc-colors'];

      selectors.forEach(selector => {
        const containers = document.querySelectorAll(selector);
        containers.forEach(container => {
          const elements = container.querySelectorAll('button');
          elements.forEach(element => {
            element.addEventListener('click', function () {

              const variationName = element.getAttribute('data-variation-name');
              const value = element.getAttribute('data-value');
              const selectBox = document.querySelector('select[name="' + variationName + '"]');

              if ($(this).hasClass('selected')){
                elements.forEach(el => el.classList.remove('selected'));
                selectBox.value = '';
                $(selectBox).trigger('change');
              }else {
                elements.forEach(el => el.classList.remove('selected'));
                element.classList.add('selected');
                if (selectBox) {
                  selectBox.value = value;
                  $(selectBox).trigger('change');
                }
              }

              // Trigger WooCommerce events
              $('form.variations_form').trigger('woocommerce_variation_select_change');
              $('form.variations_form').trigger('check_variations');
            });
          });
        });
      });
    });
  })(jQuery);

  // Variation Swatches End


  // Variable slide/slick script
  var $tooltip = jQuery(".quick-variable-tooltip");
  var maxQuantity;
  var variationData;
  let autoPlay = jQuery(".quick-variable-slide").data("autoplay");

  jQuery(".quick-variable-slide").slick({
    slidesToShow: 3,
    slidesToScroll: 1,
    autoplay: autoPlay,
    autoplaySpeed: 2000,
    arrows: true,
    prevArrow:
        '<button type="button" class="slick-custom-arrow slick-prev"><i class="fa fa-angle-left" aria-hidden="true"></i></button>',
    nextArrow:
        '<button type="button" class="slick-custom-arrow slick-next"><i class="fa fa-angle-right" aria-hidden="true"></i></button>',
  });

  // Variable Tooltip script
  // Tooltip Hide
  jQuery(window).on("click", function (e) {
    if (
        !jQuery(e.target).closest($tooltip).length &&
        !jQuery(e.target).closest(".quick-slide-variable").length
    ) {
      $tooltip.addClass("quick-hidden");
    }
  });

  jQuery(".quick-variable-tooltip .closebtn").on("click", function () {
    $tooltip.addClass("quick-hidden");
  });


  //Variable Carousel
  jQuery(".quick-slide-variable").each(function () {
    var $this = jQuery(this);
    variationData = JSON.parse($this.attr("data-variation"));
    let hoverClick = variationData.variableClickHover;

    if (hoverClick === "variable-click") {
      $this.off("click touchstart").on("click touchstart", function (e) {
        e.preventDefault();
        quickVariableDetails($this);
      });
    } else {
      if (!("ontouchstart" in window)) {
        $this.off("mouseenter").on("mouseenter", function () {
          quickVariableDetails($this);
        });
      } else {
        $this.off("touchstart").on("touchstart", function () {
          quickVariableDetails($this);
        });
      }
    }


    function quickVariableDetails($element) {
      variationData = JSON.parse($element.attr("data-variation"));

      const variationId  = variationData.variationId;
      const variationURL = variationData.variationURL;

      // Update the button's data attribute
      // jQuery(".quick-add-to-cart-shop-page").attr("data-variationId", variationId);


      const $cartButton = $element.closest(".quick-variable-slide").siblings(".quick-variable-tooltip").find(".quick-add-to-cart-shop-page");

      $cartButton.attr("data-variationId", variationId);
      // if ($cartButton.length > 0) {
      //   $cartButton.attr("data-variationId", variationId);
      //   console.log("Updated variationId:", variationId);
      // }

      // Add to cart start
      variationMaxQuantity = variationData.variationQuantity;
      globalMaxQuantity    = variationData.globalStockQuantity;

      maxQuantity = 99;
      if (variationMaxQuantity) {
        maxQuantity = variationMaxQuantity;
      } else if (globalMaxQuantity) {
        maxQuantity = globalMaxQuantity;
      }
      // maxQuantity = null;
      StockManage                 = variationData.variationStockManage;
      maxQuantityforCart          = 1
      globalQuantityforOutofStock = 1
      globalStockManage           = variationData.globalStockManagement;
      if (true === StockManage){
        maxQuantityforCart = variationData.variationQuantity;
      }
      if (true === globalStockManage){
        globalQuantityforOutofStock = variationData.globalStockQuantity;
      }
      out_of_stock_show = maxQuantityforCart ? maxQuantityforCart : globalQuantityforOutofStock;
      // Add to cart end
      let cartButton        = jQuery(".quick-variable-tooltip .quick-add-to-cart-shop-page");
      let stockNotification = jQuery(".quick-variable-tooltip .quick-cart-notification");
      let toolTip           = jQuery(".quick-variable-tooltip");

      if ( 0 === out_of_stock_show) {
        cartButton.addClass("quick-hidden");
        stockNotification.removeClass("quick-hidden");
        stockNotification.text("Out Of Stock");
      } else {
        cartButton.removeClass("quick-hidden");
        stockNotification.addClass("quick-hidden");
        stockNotification.text(" ");
      }
      // Set other tooltip information
      const quickVariableImage = $element.find("img").attr("src");
      const variations = JSON.parse($element.attr("data-variationsList"));
      let variationsOutput = "";

      Object.entries(variations).forEach(([key, data]) => {
        const options = data.options;
        const label = data.label; // Access label_name directly from PHP

        const attributeValue = variationData.variation_set_attribute && variationData.variation_set_attribute.hasOwnProperty(key)
            ? variationData.variation_set_attribute[key]
            : "";

        if (!attributeValue) {
          variationsOutput += `<p><strong>${label}:</strong> <select class='quick-attribute-select' name='attribute_${key}' data-attribute-name='attribute_${key}'>`;
          options.forEach(option => {
            variationsOutput += `<option value="${option}">${option}</option>`;
          });
          variationsOutput += `</select></p>`;
        } else {
          variationsOutput += `<p><strong>${label}:</strong> <span class='quick-variable-title quick-attribute-text' name='attribute_${key}'>${attributeValue}</span></p>`;
        }
      });


      document.querySelector("#variable-product-variations").innerHTML = variationsOutput;
      jQuery(document).ready(function ($) {
        // Assuming `variationURL` is dynamically available from your logic
        $('.dynamic-variation-url').attr('href', variationData.variationURL || '#');
      });

      toolTip.attr("data-productId", variationData.product_id);
      toolTip.attr("data-variationId", variationData.variationId);
      toolTip.find("input.quick-quantity-input").attr("data-max", maxQuantity);
      toolTip.find("h4").text(variationData.name);
      toolTip.find("p.variable-sku").text(variationData.sku);
      toolTip.find("p.variation_id").text(variationData.variationId);
      toolTip.find("p.variable-short-desc").text(variationData.excerpt);
      toolTip.find("img").attr("src", quickVariableImage);
      toolTip.find("span#variable-product-price").html(variationData.variationPrice);
      toolTip.find("div#variable-product-variations").html(variationsOutput);

      jQuery(".quick-variable-tooltip ").addClass("quick-hidden");

      $element.closest(".quick-variable-slide").siblings($tooltip).removeClass("quick-hidden");
    }
  });


  //  Quantity decrease.

  jQuery(".quick-quantity-decrease").on("click", function () {
    let currentValue = parseInt(
        jQuery(this).siblings(".quick-quantity-input").val(),
        10
    );

    if (currentValue > 1) {
      // Prevent going below 1
      jQuery(this)
          .siblings(".quick-quantity-input")
          .val(currentValue - 1);
      jQuery(".quick-cart-notification").text("");
    }
  });


  // Quantity increase.

  jQuery(".quick-quantity-increase").on("click", function () {

    maxQuantity = jQuery(this)
        .siblings(".quick-quantity-input")
        .attr("data-max");
    let currentValue = parseInt(
        jQuery(this).siblings(".quick-quantity-input").val(),
        10
    );

    if (currentValue < maxQuantity) {
      // Prevent exceeding max limit
      jQuery(this)
          .siblings(".quick-quantity-input")
          .val(currentValue + 1);
      jQuery(".quick-cart-notification").text("");
    }
  });


  // Quantity input.

  jQuery(".quick-quantity-input").on("input", function () {
    maxQuantity = jQuery(this).attr("data-max");
    let inputValue = parseInt(jQuery(this).val());
    let quantityNotification = jQuery(this)
        .closest(".quick-quantity-container")
        .siblings(".quick-cart-notification");
    if (isNaN(inputValue) || inputValue < 1) {
      jQuery(this).val(1);
      quantityNotification.text("Quantity cannot be less than 1.");
      quantityNotification.removeClass("quick-hidden");
    } else if (inputValue > maxQuantity) {
      jQuery(this).val(maxQuantity);
      quantityNotification.text(`Quantity cannot exceed ${maxQuantity}.`);
      quantityNotification.removeClass("quick-hidden");
    } else {
      quantityNotification.addClass("quick-hidden");
    }
  });


  // Add to cart option. All add to cart here for table data.

  jQuery(document).ready(function($) {
    $('.quick-add-to-cart').on('click', function() {
      // e.preventDefault();

      function isMobile() {
        return /Mobi|Android|iPhone|iPad|iPod|BlackBerry|Windows Phone/i.test(navigator.userAgent);
      }

      var $button = $(this);
      var productId = $button.data('productid');
      var variationId = $button.data('variationid');
      var quantity;

      if (!$button.hasClass('loading')) {
        // Add loading state
        $button.addClass('loading');

        // Add spinner dynamically
        $button.append('<span class="spinner"><i class="fa fa-spinner fa-spin"></i></span>');

        // Simulate the end of loading (remove this part when adding actual AJAX functionality)
        setTimeout(function() {
          $button.removeClass('loading');
          $button.find('.spinner').remove(); // Remove spinner after loading
        }, 2000); // Adjust delay as needed
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


      // Disable button and show loading state
      $button.prop('disabled', true);
      $button.find('i, span').hide();

      // Perform the AJAX request
      $.post(quick_front_ajax_obj.ajax_url, data, function(response) {

        if (response.success) {
          $button.append('<span class="updated-check-add-to-cart"><i class="fa fa-check"></i></span>');

          // Show success message and reset button after 3 seconds
          setTimeout(function() {
            $button.find('.updated-check-add-to-cart').remove();
            $button.prop('disabled', false);
            $button.find('i, span').show(); // Show icon and text
          }, 3000);

          // Update cart totals and item count
          $( document.body).trigger('wc_fragment_refresh');

        } else {
          console.error('Failed to add product: ', response);
          $button.prop('disabled', false);
          $button.find('i, span').show(); // Show icon and text
        }
      });
    });
  });


  // Add to cart option. All add to cart here for shop page.

  jQuery(document).ready(function($) {
    $('.quick-add-to-cart-shop-page').on('click', function(e) {
      e.preventDefault();

      var $button = $(this);
      var productId = $button.data('productid');
      var variationId = $button.attr('data-variationid');
      var quantity = $button.closest('.quick-quantity-container').find(".quick-quantity-input").val();
      var selectedAttributes = {};

      if (!variationId || variationId === "") {
        alert("Please select a product variation.");
        return;
      }

      // Collect selected attributes, including dropdowns and static text spans
      $button.closest('.quick-variable-tooltip').find('.quick-attribute-select, .quick-attribute-text').each(function() {
        var attributeKey = $(this).attr('name'); // Get attribute name

        // If it's a dropdown, get the selected value; otherwise, get the text from the span
        var attributeValue = $(this).is('select') ? $(this).val() : $(this).text().trim();

        if (attributeValue && attributeKey) {
          selectedAttributes[attributeKey] = attributeValue;
        }
      });

      // Verify all required attributes are selected
      var allAttributesSelected = true;
      $.each(selectedAttributes, function(key, value) {
        if (value === "") {
          allAttributesSelected = false;
          alert(`Please select a value for ${key}`);
        }
      });
      if (!allAttributesSelected) return;

      // Data for AJAX request
      const data = {
        action: 'woocommerce_ajax_add_to_cart',
        product_id: productId,
        quantity: quantity,
        variation_id: variationId,  // Pass correct variation ID
        variation: selectedAttributes,
        _wpnonce: quick_front_ajax_obj.nonce, // Add the nonce here

      };

      // Disable button and show loading state
      $button.prop('disabled', true);
      $button.find('i, span').hide();
      // Perform AJAX request
      $.post(quick_front_ajax_obj.ajax_url, data, function(response) {
        if (response.success) {
          $('.shop-page-show-success-message').html(`
                    <div class="success-message" style="color: ${response.color}">
                        <p>${response.message}</p>
                    </div>
                `).fadeIn();

          // Hide the message after 3 seconds
          setTimeout(function () {
            $('.shop-page-show-success-message').fadeOut();
            $button.prop('disabled', false);
            $button.find('i, span').show(); // Show icon and text
          }, 1000);

          // Update cart totals and item count
          $( document.body).trigger('wc_fragment_refresh');
        } else {
          $('.shop-page-show-failed-message').html(`
                    <div class="failed-message" style="color: ${response.color}">
                        <p>${response.message}</p>
                    </div>
                `).fadeIn();

          // Hide the message after 3 seconds
          setTimeout(function () {
            $('.shop-page-show-failed-message').fadeOut();
            $button.prop('disabled', false);
            $button.find('i, span').show();
          }, 1000);
        }
      });
    });
  });


//   Table 1


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