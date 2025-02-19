jQuery(document).ready(function () {
  //Variable hover/click option Checkboxes Click
  var quickHoverClick = jQuery('.quick-hover-click input[type="checkbox"]');
  var showAttributeSwatchesArchive = jQuery('.show-attribute-swatches-archive input[type="checkbox"]');
  var quickBoxPosition = jQuery(
    '.quick-box-position-click input[type="checkbox"]'
  );
  var quickBoxPositionFieldWrapper = jQuery(".quick-box-position-click");
  var quickAdminAlert = jQuery(".quick-variable-dashboard .alert.adminAlert");
  var quickActivateAlert = jQuery(
    ".quick-variable-dashboard .alert.activateAlert"
  );
  var quickAdminButton = jQuery(".quick-variable-dashboard .buttonload");
  var quickCartIcon = jQuery('.quick-add-to-cart-icon input[type="checkbox"]');
  var quickSelections = jQuery(".quick-selections");
  var quickCarouselAutoplay = jQuery(
    '.quick-carousel-autoplay input[type="checkbox"]'
  );

  var showDoublePrice = jQuery(
    '.show-double-price input[type="checkbox"]'
  );

  var nameImageRedirect = jQuery(
      '.name-image-redirect input[type="checkbox"]'
  );

  var quickTableBorder = jQuery('.quick-table-border input[type="checkbox"]');
  var showPopUpImage = jQuery('.show-popup-image input[type="checkbox"]');
  var showGalleyImageIntoPopup = jQuery('.show-gallery-image-into-popup input[type="checkbox"]');
  var quickCarouselOnOff = jQuery(
    '.quick-carousel-on-off input[type="checkbox"]'
  );

  var quickTableOnOff       = jQuery('.quick-table-on-off input[type="checkbox"]');
  var tableTemplateTwoEnable       = jQuery('.table-template-two-enable input[type="checkbox"]');
  var variationGalleryOnOff = jQuery('.variation-gallery-on-off input[type="checkbox"]');
  var attributeGalleryOnOff = jQuery('.attribute-gallery-on-off input[type="checkbox"]');
  var selectVariationTemplateOnOff = jQuery('.select-variation-template-on-off input[type="checkbox"]');
  var listLabelOnOff = jQuery('.list-label-show-on-off input[type="checkbox"]');
  var listSkuOnOff = jQuery('.list-sku-show-on-off input[type="checkbox"]');
  var listPriceOnOff = jQuery('.list-price-show-on-off input[type="checkbox"]');
  var listQuantityOnOff = jQuery('.list-quantity-show-on-off input[type="checkbox"]');
  var listBadgeShowOnOff = jQuery('.list-badge-show-on-off input[type="checkbox"]');
  var listAttributeShow = jQuery('.list-attribute-show input[type="checkbox"]');
  var listTitleShow = jQuery('.list-title-show input[type="checkbox"]');
  var listBadgeShowRight = jQuery('.list-badge-show-right input[type="checkbox"]');
  var listBadgeDiscountFlatPrice = jQuery('.list-badge-discount-flat-price input[type="checkbox"]');
  var globallyTooltipOnOff  = jQuery('.globally-tooltip-on-off input[type="checkbox"]');
  var variationSelectOnOff  = jQuery('.variation-select-on-off input[type="checkbox"]');
  var bulkSelectionHideShow = jQuery('.bulk-selection-hide-show input[type="checkbox"]');
  var imageHideShow         = jQuery('.image-hide-show input[type="checkbox"]');
  var skuHideShow           = jQuery('.sku-hide-show input[type="checkbox"]');
  var titleHideShow           = jQuery('.title-hide-show input[type="checkbox"]');
  var descriptionHideShow           = jQuery('.description-hide-show input[type="checkbox"]');
  var weightDimensionsHideShow           = jQuery('.weight-dimension-hide-show input[type="checkbox"]');
  var allAttributeHideShow  = jQuery('.all-attribute-hide-show input[type="checkbox"]');
  var priceHideShow         = jQuery('.price-hide-show input[type="checkbox"]');
  var quantityHideShow      = jQuery('.quantity-hide-show input[type="checkbox"]');
  var stockStatusHideShow   = jQuery('.stock-status-hide-show input[type="checkbox"]');
  var actionHideShow        = jQuery('.action-hide-show input[type="checkbox"]');
  var onSaleHideShow        = jQuery('.on-sale-hide-show input[type="checkbox"]');
  var searchOptionHideShow  = jQuery('.search-option-hide-show input[type="checkbox"]');

  var quickCartExcerpt = jQuery(
    '.quick-box-content-click:nth-child(3) input[type="checkbox"]'
  );

  // Lock Pro Features
  if (quick_ajax_obj.pro_key != "1") {

    jQuery("[name=gallery-navigation-button-icon-color]").prop("disabled", true);
    jQuery("#gallery-navigation-button-icon-color").removeAttr("id");

    jQuery("[name=gallery-navigation-button-icon-hover-color]").prop("disabled", true);
    jQuery("#gallery-navigation-button-icon-hover-color").removeAttr("id");

    jQuery("[name=gallery-navigation-button-background-color]").prop("disabled", true);
    jQuery("#gallery-navigation-button-background-color").removeAttr("id");

    jQuery("[name=gallery-navigation-button-background-hover-color]").prop("disabled", true);
    jQuery("#gallery-navigation-button-background-hover-color").removeAttr("id");

    jQuery("[name=template2-table-bg-color]").prop("disabled", true);
    jQuery("#template2-table-bg-color").removeAttr("id");

    jQuery("[name=template2-details-section-bg-color]").prop("disabled", true);
    jQuery("#template2-details-section-bg-color").removeAttr("id");

    jQuery("[name=template2-cart-section-bg-color]").prop("disabled", true);
    jQuery("#template2-cart-section-bg-color").removeAttr("id");

    jQuery("[name=bulk-add-cart-bg-color]").prop("disabled", true);
    jQuery("#bulk-add-cart-bg-color").removeAttr("id");

    jQuery("[name=bulk-add-cart-hover-bg-color]").prop("disabled", true);
    jQuery("#bulk-add-cart-hover-bg-color").removeAttr("id");

    jQuery("[name=bulk-add-cart-hover-text-color]").prop("disabled", true);
    jQuery("#bulk-add-cart-hover-text-color").removeAttr("id");

    jQuery("[name=bulk-add-cart-text-color]").prop("disabled", true);
    jQuery("#bulk-add-cart-text-color").removeAttr("id");

    jQuery("[name=list-badge-bg-color]").prop("disabled", true);
    jQuery("#list-badge-bg-color").removeAttr("id");

    jQuery("[name=list-badge-text-color]").prop("disabled", true);
    jQuery("#list-badge-text-color").removeAttr("id");

    jQuery("[name=quick-carousel-autoplay]").prop("disabled", true);
    jQuery("[name=quick-carousel-autoplay]").prop("checked", false);
    jQuery(".quick-carousel-autoplay").removeClass("quick-carousel-autoplay");


    jQuery("[name=name-image-redirect]").prop("disabled", true);
    jQuery("[name=name-image-redirect]").prop("checked", false);
    jQuery(".name-image-redirect").removeClass("name-image-redirect");

    jQuery("[name=table-template-two-enable]").prop("disabled", true);
    jQuery("[name=table-template-two-enable]").prop("checked", false);
    jQuery(".table-template-two-enable").removeClass("table-template-two-enable");

    jQuery("[name=variation-gallery-on-off]").prop("disabled", true);
    jQuery("[name=variation-gallery-on-off]").prop("checked", false);
    jQuery(".variation-gallery-on-off").removeClass("variation-gallery-on-off");

    jQuery("[name=attribute-gallery-on-off]").prop("disabled", true);
    jQuery("[name=attribute-gallery-on-off]").prop("checked", false);
    jQuery(".attribute-gallery-on-off").removeClass("attribute-gallery-on-off");

    jQuery("[name=select-variation-template-on-off]").prop("disabled", true);
    jQuery("[name=select-variation-template-on-off]").prop("checked", false);
    jQuery(".select-variation-template-on-off").removeClass("select-variation-template-on-off");

    jQuery("[name=list-sku-show-on-off]").prop("disabled", true);
    jQuery("[name=list-sku-show-on-off]").prop("checked", false);
    jQuery(".list-sku-show-on-off").removeClass("list-sku-show-on-off");

    jQuery("[name=list-price-show-on-off]").prop("disabled", true);
    jQuery("[name=list-price-show-on-off]").prop("checked", false);
    jQuery(".list-price-show-on-off").removeClass("list-sku-show-on-off");

    jQuery("[name=list-label-show-on-off]").prop("disabled", true);
    jQuery("[name=list-label-show-on-off]").prop("checked", false);
    jQuery(".list-label-show-on-off").removeClass("list-label-show-on-off");

    jQuery("[name=list-quantity-show-on-off]").prop("disabled", true);
    jQuery("[name=list-quantity-show-on-off]").prop("checked", false);
    jQuery(".list-quantity-show-on-off").removeClass("list-quantity-show-on-off");

    jQuery("[name=list-badge-show-on-off]").prop("disabled", true);
    jQuery("[name=list-badge-show-on-off]").prop("checked", false);
    jQuery(".list-badge-show-on-off").removeClass("list-badge-show-on-off");

    jQuery("[name=list-attribute-show]").prop("disabled", true);
    jQuery("[name=list-attribute-show]").prop("checked", false);
    jQuery(".list-attribute-show").removeClass("list-attribute-show");

    jQuery("[name=list-title-show]").prop("disabled", true);
    jQuery("[name=list-title-show]").prop("checked", false);
    jQuery(".list-title-show").removeClass("list-title-show");

    jQuery("[name=list-badge-show-right]").prop("disabled", true);
    jQuery("[name=list-badge-show-right]").prop("checked", false);
    jQuery(".list-badge-show-right").removeClass("list-badge-show-right");

    jQuery("[name=list-badge-discount-flat-price]").prop("disabled", true);
    jQuery("[name=list-badge-discount-flat-price]").prop("checked", false);
    jQuery(".list-badge-discount-flat-price").removeClass("list-badge-discount-flat-price");

    jQuery("[name=show-popup-image]").prop("disabled", true);
    jQuery("[name=show-popup-image]").prop("checked", false);
    jQuery(".show-popup-image").removeClass("quick-table-border");

    jQuery("[name=show-gallery-image-into-popup]").prop("disabled", true);
    jQuery("[name=show-gallery-image-into-popup]").prop("checked", false);
    jQuery(".show-gallery-image-into-popup").removeClass("quick-table-border");

    jQuery("[name=on-sale-name-change]").prop("disabled", true);
    jQuery("#on-sale-name-change").removeAttr("id");

    jQuery("[name=select-all-name-change]").prop("disabled", true);
    jQuery("#select-all-name-change").removeAttr("id");

    jQuery("[name=list-pagination]").prop("disabled", true);
    jQuery("#list-pagination").removeAttr("id");

    jQuery("[name=search-option-text-change]").prop("disabled", true);
    jQuery("#search-option-text-change").removeAttr("id");

    jQuery("[name=list-badge-height]").prop("disabled", true);
    jQuery("#list-badge-height").removeAttr("id");

    jQuery("[name=list-badge-width]").prop("disabled", true);
    jQuery("#list-badge-width").removeAttr("id");

    jQuery("[name=list-for-percent]").prop("disabled", true);
    jQuery("#list-for-percent").removeAttr("id");

    jQuery("[name=list-for-flat]").prop("disabled", true);
    jQuery("#list-for-flat").removeAttr("id");

    jQuery("[name=bulk-selection-hide-show]").prop("disabled", true);
    jQuery("[name=bulk-selection-hide-show]").prop("checked", false);
    jQuery(".bulk-selection-hide-show").removeClass("quick-table-border");

    jQuery("[name=title-hide-show]").prop("disabled", true);
    jQuery("[name=title-hide-show]").prop("checked", false);
    jQuery(".title-hide-show").removeClass("quick-table-border");

    jQuery("[name=description-hide-show]").prop("disabled", true);
    jQuery("[name=description-hide-show]").prop("checked", false);
    jQuery(".description-hide-show").removeClass("quick-table-border");

    jQuery("[name=weight-dimension-hide-show]").prop("disabled", true);
    jQuery("[name=weight-dimension-hide-show]").prop("checked", false);
    jQuery(".weight-dimension-hide-show").removeClass("quick-table-border");

    jQuery("[name=stock-status-hide-show]").prop("disabled", true);
    jQuery("[name=stock-status-hide-show]").prop("checked", false);
    jQuery(".stock-status-hide-show").removeClass("quick-table-border");

    jQuery("[name=on-sale-hide-show]").prop("disabled", true);
    jQuery("[name=on-sale-hide-show]").prop("checked", false);
    jQuery(".on-sale-hide-show").removeClass("on-sale-hide-show");

    jQuery("[name=search-option-hide-show]").prop("disabled", true);
    jQuery("[name=search-option-hide-show]").prop("checked", false);
    jQuery(".search-option-hide-show").removeClass("search-option-hide-show");


    quickCartIcon.prop("disabled", true);
    quickCartIcon.prop("checked", false);
    quickCartIcon.removeAttr("name");

    quickCartExcerpt.prop("disabled", true);
    quickCartExcerpt.prop("checked", false);
    quickCartExcerpt.removeAttr("value");

    // Correct way using variable without template strings


    jQuery("input[value|='variable-click']").prop("disabled", true);
    jQuery("input[value|='variable-click']").removeAttr("value");


    quickSelections.find("select.pop-up-image-show").prop("disabled", true);
    quickSelections
        .find("select.pop-up-image-show")
        .removeClass("pop-up-image-show");

    quickSelections.find("select.list-image-show").prop("disabled", true);
    quickSelections
        .find("select.list-image-show")
        .removeClass("list-image-show");

    quickSelections.find("select.gallery-image-show").prop("disabled", true);
    quickSelections
        .find("select.gallery-image-show")
        .removeClass("gallery-image-show");

    quickSelections.find("select.attribute-gallery-image-show").prop("disabled", true);
    quickSelections
        .find("select.attribute-gallery-image-show")
        .removeClass("attribute-gallery-image-show");

    quickSelections.find("select.bulk-add-to-cart-position").prop("disabled", true);
    quickSelections
      .find("select.bulk-add-to-cart-position")
      .removeClass("bulk-add-to-cart-position");

    quickSelections.find("select.design-single-product-page-mobile").prop("disabled", true);
    quickSelections
        .find("select.design-single-product-page-mobile")
        .removeClass("design-single-product-page-mobile");

    quickSelections.find("select.design-add-cart-table-template2").prop("disabled", true);
    quickSelections
        .find("select.design-add-cart-table-template2")
        .removeClass("design-add-cart-table-template2");

    quickSelections.find("select.variation-table-template").prop("disabled", true);
    quickSelections
        .find("select.variation-table-template")
        .removeClass("variation-table-template");

    quickSelections.find("select.variation-list-template").prop("disabled", true);
    quickSelections
        .find("select.variation-list-template")
        .removeClass("variation-list-template");

  }
  // Lock Pro Features End

  if (jQuery("input[value|='variable-click']").length) {
    quickHoverClick.on("change", function () {

      if (jQuery(this).is(":checked")) {
        quickHoverClick.prop("checked", true);
        quickHoverClick.not(this).prop("checked", false);
      } else {
        quickHoverClick.prop("checked", false);
        quickHoverClick.not(this).prop("checked", true);
      }
    });
  }

  if (jQuery("input[value|='attribute-archive']").length) {
    showAttributeSwatchesArchive.on("change", function () {

      if (jQuery(this).is(":checked")) {
        showAttributeSwatchesArchive.prop("checked", true);
        showAttributeSwatchesArchive.not(this).prop("checked", false);
      } else {
        showAttributeSwatchesArchive.prop("checked", false);
        showAttributeSwatchesArchive.not(this).prop("checked", true);
      }
    });
  }

  if (jQuery("input[value|='attribute-swatches']").length) {
    showAttributeSwatchesArchive.on("change", function () {

      if (jQuery(this).is(":checked")) {
        showAttributeSwatchesArchive.prop("checked", true);
        showAttributeSwatchesArchive.not(this).prop("checked", false);
      } else {
        showAttributeSwatchesArchive.prop("checked", false);
        showAttributeSwatchesArchive.not(this).prop("checked", true);
      }
    });
  }
  //Variable Details Box Position Checkboxes Click
  if (
    jQuery("input[value|='quick-tooltip-position-left']").length &&
    jQuery("input[value|='quick-tooltip-position-right']").length
  ) {
    quickBoxPosition.on("change", function () {
      if (jQuery(this).is(":checked")) {
        quickBoxPosition.prop("checked", true);
        quickBoxPosition.not(this).prop("checked", false);
      } else {
        jQuery(".quick-box-position-click");
        jQuery(".quick-box-position-click")
          .first()
          .find('input[type="checkbox"]')
          .prop("checked", true);
      }
    });
  }

  // On click Setting Save button Collect all checked fields Of variable
  quickAdminButton.on("click", function () {
    //Save button Spinner
    quickAdminButton.html(
      '<span><i class="fa fa-refresh fa-spin"></i></span>Loading...'
    );

    //Get Checked Fields Values
    let variableAllChecked = {};

    if (jQuery("input[value|='variable-click']").length) {
      variableAllChecked.hoverClickValue = jQuery(
        '.quick-hover-click input[type="checkbox"]:checked'
      )
        .map(function () {
          return jQuery(this).val();
        })
        .get();
    }

    if (jQuery("input[value|='variable-hover']").length) {
      variableAllChecked.hoverClickValue = jQuery(
          '.quick-hover-click input[type="checkbox"]:checked'
      )
          .map(function () {
            return jQuery(this).val();
          })
          .get();
    }

    if (jQuery("input[value|='attribute-archive']").length) {
      variableAllChecked.showAttributeSwatchesArchive = jQuery(
          '.show-attribute-swatches-archive input[type="checkbox"]:checked'
      )
          .map(function () {
            return jQuery(this).val();
          })
          .get();
    }

    if (jQuery("input[value|='attribute-swatches']").length) {
      variableAllChecked.showAttributeSwatchesArchive = jQuery(
          '.show-attribute-swatches-archive input[type="checkbox"]:checked'
      )
          .map(function () {
            return jQuery(this).val();
          })
          .get();
    }

    if (
      jQuery("input[value|='quick-tooltip-position-left']").length &&
      jQuery("input[value|='quick-tooltip-position-right']").length
    ) {
      variableAllChecked.boxPositionValue = jQuery(
        '.quick-box-position-click input[type="checkbox"]:checked'
      )
        .map(function () {
          return jQuery(this).val();
        })
        .get();
    }

    variableAllChecked.variableDetailsTitle = jQuery(
      '.quick-box-content-click:nth-child(1) input[type="checkbox"]:checked'
    )
      .map(function () {
        return jQuery(this).val();
      })
      .get();

    variableAllChecked.variableDetailsImage = jQuery(
      '.quick-box-content-click:nth-child(2) input[type="checkbox"]:checked'
    )
      .map(function () {
        return jQuery(this).val();
      })
      .get();

    if (quickCartExcerpt.attr("value")) {
      variableAllChecked.variableDetailsExcerpt = jQuery(
        '.quick-box-content-click:nth-child(3) input[type="checkbox"]:checked'
      )
        .map(function () {
          return jQuery(this).val();
        })
        .get();
    }



    // SKU Start

    variableAllChecked.variableDetailsSKU = jQuery(
        '.quick-box-content-click:nth-child(4) input[type="checkbox"]:checked'
    )
        .map(function () {
          return jQuery(this).val();
        })
        .get();

    // SKU end

    // Id Start

    // variableAllChecked.variableID = jQuery(
    //     '.quick-box-content-click:nth-child(5) input[type="checkbox"]:checked'
    // )
    //     .map(function () {
    //       return jQuery(this).val();
    //     })
    //     .get();

    // ID end

    // Carousel Autoplay On/Off
    if (quickCarouselAutoplay.is(":checked")) {
      variableAllChecked.quickCarouselAutoplay = "true";
    } else {
      variableAllChecked.quickCarouselAutoplay = "false";
    }

    if (showDoublePrice.is(":checked")) {
      variableAllChecked.showDoublePrice = "true";
    } else {
      variableAllChecked.showDoublePrice = "false";
    }

    // Carousel Autoplay On/Off
    if (nameImageRedirect.is(":checked")) {
      variableAllChecked.nameImageRedirect = "true";
    } else {
      variableAllChecked.nameImageRedirect = "false";
    }

    // Table Border Hide/Show
    if (quickTableBorder.is(":checked")) {
      variableAllChecked.quickTableBorder = "true";
    } else {
      variableAllChecked.quickTableBorder = "false";
    }

    if (showPopUpImage.is(":checked")) {
      variableAllChecked.showPopUpImage = "true";
    } else {
      variableAllChecked.showPopUpImage = "false";
    }

    if (showGalleyImageIntoPopup.is(":checked")) {
      variableAllChecked.showGalleyImageIntoPopup = "true";
    } else {
      variableAllChecked.showGalleyImageIntoPopup = "false";
    }

    // Quick Carousel Hide/Show
    if (quickCarouselOnOff.is(":checked")) {
      variableAllChecked.quickCarouselOnOff = "true";
    } else {
      variableAllChecked.quickCarouselOnOff = "false";
    }


    // Quick Table Hide/Show
    if (quickTableOnOff.is(":checked")) {
      variableAllChecked.quickTableOnOff = "true";
    } else {
      variableAllChecked.quickTableOnOff = "false";
    }

    if (tableTemplateTwoEnable.is(":checked")) {
      variableAllChecked.tableTemplateTwoEnable = "true";
    } else {
      variableAllChecked.tableTemplateTwoEnable = "false";
    }


    // Quick Variation Gallery
    // Hide/Show
    if (variationGalleryOnOff.is(":checked")) {
      variableAllChecked.variationGalleryOnOff = "true";
    } else {
      variableAllChecked.variationGalleryOnOff = "false";
    }

    if (attributeGalleryOnOff.is(":checked")) {
      variableAllChecked.attributeGalleryOnOff = "true";
    } else {
      variableAllChecked.attributeGalleryOnOff = "false";
    }

    if (selectVariationTemplateOnOff.is(":checked")) {
      variableAllChecked.selectVariationTemplateOnOff = "true";
    } else {
      variableAllChecked.selectVariationTemplateOnOff = "false";
    }

    if (listLabelOnOff.is(":checked")) {
      variableAllChecked.listLabelOnOff = "true";
    } else {
      variableAllChecked.listLabelOnOff = "false";
    }

    if (listSkuOnOff.is(":checked")) {
      variableAllChecked.listSkuOnOff = "true";
    } else {
      variableAllChecked.listSkuOnOff = "false";
    }

    if (listPriceOnOff.is(":checked")) {
      variableAllChecked.listPriceOnOff = "true";
    } else {
      variableAllChecked.listPriceOnOff = "false";
    }

    if (listQuantityOnOff.is(":checked")) {
      variableAllChecked.listQuantityOnOff = "true";
    } else {
      variableAllChecked.listQuantityOnOff = "false";
    }

    if (listBadgeShowOnOff.is(":checked")) {
      variableAllChecked.listBadgeShowOnOff = "true";
    } else {
      variableAllChecked.listBadgeShowOnOff = "false";
    }

    if (listAttributeShow.is(":checked")) {
      variableAllChecked.listAttributeShow = "true";
    } else {
      variableAllChecked.listAttributeShow = "false";
    }

    if (listTitleShow.is(":checked")) {
      variableAllChecked.listTitleShow = "true";
    } else {
      variableAllChecked.listTitleShow = "false";
    }

    if (listBadgeShowRight.is(":checked")) {
      variableAllChecked.listBadgeShowRight = "true";
    } else {
      variableAllChecked.listBadgeShowRight = "false";
    }

    if (listBadgeDiscountFlatPrice.is(":checked")) {
      variableAllChecked.listBadgeDiscountFlatPrice = "true";
    } else {
      variableAllChecked.listBadgeDiscountFlatPrice = "false";
    }

    if (globallyTooltipOnOff.is(":checked")) {
      variableAllChecked.globallyTooltipOnOff = "true";
    } else {
      variableAllChecked.globallyTooltipOnOff = "false";
    }

    if (variationSelectOnOff.is(":checked")) {
      variableAllChecked.variationSelectOnOff = "true";
    } else {
      variableAllChecked.variationSelectOnOff = "false";
    }

    // Bulk Selection Hide/Show
    if (bulkSelectionHideShow.is(":checked")) {
      variableAllChecked.bulkSelectionHideShow = "true";
    } else {
      variableAllChecked.bulkSelectionHideShow = "false";
    }

    // image Hide/Show
    if (imageHideShow.is(":checked")) {
      variableAllChecked.imageHideShow = "true";
    } else {
      variableAllChecked.imageHideShow = "false";
    }

    // SKU Hide/Show
    if (skuHideShow.is(":checked")) {
      variableAllChecked.skuHideShow = "true";
    } else {
      variableAllChecked.skuHideShow = "false";
    }

    // Title Hide/Show
    if (titleHideShow.is(":checked")) {
      variableAllChecked.titleHideShow = "true";
    } else {
      variableAllChecked.titleHideShow = "false";
    }

    // Description Hide/Show
    if (descriptionHideShow.is(":checked")) {
      variableAllChecked.descriptionHideShow = "true";
    } else {
      variableAllChecked.descriptionHideShow = "false";
    }

    // Weight & Dimension Hide/Show
    if (weightDimensionsHideShow.is(":checked")) {
      variableAllChecked.weightDimensionsHideShow = "true";
    } else {
      variableAllChecked.weightDimensionsHideShow = "false";
    }

    // Attribute Hide/Show
    if (allAttributeHideShow.is(":checked")) {
      variableAllChecked.allAttributeHideShow = "true";
    } else {
      variableAllChecked.allAttributeHideShow = "false";
    }

    // Price Hide/Show
    if (priceHideShow.is(":checked")) {
      variableAllChecked.priceHideShow = "true";
    } else {
      variableAllChecked.priceHideShow = "false";
    }

    // Quantity Hide/Show
    if (quantityHideShow.is(":checked")) {
      variableAllChecked.quantityHideShow = "true";
    } else {
      variableAllChecked.quantityHideShow = "false";
    }

    // Stock Status Hide/Show
    if (stockStatusHideShow.is(":checked")) {
      variableAllChecked.stockStatusHideShow = "true";
    } else {
      variableAllChecked.stockStatusHideShow = "false";
    }

    // Action Hide/Show
    if (actionHideShow.is(":checked")) {
      variableAllChecked.actionHideShow = "true";
    } else {
      variableAllChecked.actionHideShow = "false";
    }

    // On Sale Hide/Show
    if (onSaleHideShow.is(":checked")) {
      variableAllChecked.onSaleHideShow = "true";
    } else {
      variableAllChecked.onSaleHideShow = "false";
    }

    // Search Option Hide/Show
    if (searchOptionHideShow.is(":checked")) {
      variableAllChecked.searchOptionHideShow = "true";
    } else {
      variableAllChecked.searchOptionHideShow = "false";
    }


    variableAllChecked.quickCartIcon = jQuery(
        'input.quick-cart-icon[type="radio"]:checked'
    ).val();

    variableAllChecked.quickCartIconImageLink = jQuery(
      'input.quick-cart-icon-image-link[type="text"]'
    ).val();

    variableAllChecked.cartButtonText = jQuery(
      'input.quick-add-to-cart-text[type="text"]'
    ).val();

    variableAllChecked.addToCartSuccessMessage = jQuery(
      'input.add-to-cart-success-message[type="text"]'
    ).val();

    //Popup Colors Check
    variableAllChecked.cartButtonBg = quickSelections
      .find("input#add-to-cart-bg")
      .val();
    variableAllChecked.cartButtonBgHover = quickSelections
      .find("input#add-to-cart-bg-hover")
      .val();
    variableAllChecked.cartButtonTextColor = quickSelections
      .find("input#add-to-cart-text")
      .val();
    variableAllChecked.cartButtonTextHoverColor = quickSelections
        .find("input#add-to-cart-text-hover-color")
        .val();

    variableAllChecked.tooltipBg = quickSelections
      .find("input#tooltip-bg")
      .val();

    variableAllChecked.tooltipTextColor = quickSelections
      .find("input#tooltip-text")
      .val();

    variableAllChecked.addToCartSuccessColor = quickSelections
        .find("input#add-to-cart-success-color")
        .val();

    variableAllChecked.addToCartErrorColor = quickSelections
        .find("input#add-to-cart-error-color")
        .val();

    variableAllChecked.quantityBg = quickSelections
      .find("input#quantity-bg-color")
      .val();
    variableAllChecked.quantityBgColorHover = quickSelections
      .find("input#quantity-bg-color-hover")
      .val();
    variableAllChecked.quantityBorderColor = quickSelections
      .find("input#quantity-border-color")
      .val();
    variableAllChecked.quantityTextColor = quickSelections
      .find("input#quantity-text-color")
      .val();
    variableAllChecked.quantityTextHoverColor = quickSelections
      .find("input#quantity-text-hover-color")
      .val();
    variableAllChecked.CarouselButtonBg = quickSelections
      .find("input#quick-carousel-button-bg-color")
      .val();
    variableAllChecked.CarouselButtonIconColor = quickSelections
      .find("input#quick-carousel-button-icon-color")
      .val();

    variableAllChecked.galleryNavigationButtonIconColor = quickSelections
      .find("input#gallery-navigation-button-icon-color")
      .val();
    variableAllChecked.galleryNavigationButtonIconHoverColor = quickSelections
      .find("input#gallery-navigation-button-icon-hover-color")
      .val();

    variableAllChecked.galleryNavigationButtonBgColor = quickSelections
      .find("input#gallery-navigation-button-background-color")
      .val();

    variableAllChecked.galleryNavigationButtonBgHoverColor = quickSelections
      .find("input#gallery-navigation-button-background-hover-color")
      .val();

    variableAllChecked.paginationButtonBgColor = quickSelections
      .find("input#pagination-button-bg-color")
      .val();

    variableAllChecked.paginationButtonHoverBgColor = quickSelections
      .find("input#pagination-button-hover-bg-color")
      .val();

    variableAllChecked.paginationButtonTextColor = quickSelections
      .find("input#pagination-button-text-color")
      .val();

    variableAllChecked.paginationButtonTextHoverColor = quickSelections
      .find("input#pagination-button-text-hover-color")
      .val();

    variableAllChecked.tableHeadBgColor = quickSelections
      .find("input#quick-table-head-bg-color")
      .val();

   variableAllChecked.template2TableBgColor = quickSelections
        .find("input#template2-table-bg-color")
        .val();
   variableAllChecked.template2DetailsSectionBgColor = quickSelections
        .find("input#template2-details-section-bg-color")
        .val();
   variableAllChecked.template2CartSectionBgColor = quickSelections
        .find("input#template2-cart-section-bg-color")
        .val();

    variableAllChecked.bulkAddCartBgColor = quickSelections
      .find("input#bulk-add-cart-bg-color")
      .val();

    variableAllChecked.bulkAddCartTextColor = quickSelections
      .find("input#bulk-add-cart-text-color")
      .val();

    variableAllChecked.bulkAddCartHoverBgColor = quickSelections
      .find("input#bulk-add-cart-hover-bg-color")
      .val();

    variableAllChecked.bulkAddCartHoverTextColor = quickSelections
      .find("input#bulk-add-cart-hover-text-color")
      .val();

    variableAllChecked.selectVariationTooltipBgColor = quickSelections
        .find("input#select-variation-tooltip-bg-color")
        .val();
    variableAllChecked.listBadgeBgColor = quickSelections
        .find("input#list-badge-bg-color")
        .val();
    variableAllChecked.listBadgeTextColor = quickSelections
        .find("input#list-badge-text-color")
        .val();

    variableAllChecked.selectVariationTooltipTextColor = quickSelections
        .find("input#select-variation-tooltip-text-color")
        .val()
    variableAllChecked.selectVariationButtonBgColor = quickSelections
        .find("input#select-variation-button-bg-color")
        .val();
    variableAllChecked.selectVariationButtonTextColor = quickSelections
        .find("input#select-variation-button-text-color")
        .val();

    variableAllChecked.swatchesButtonBorderColor = quickSelections
        .find("input#swatches-button-border-color")
        .val();

    variableAllChecked.selectedVariationButtonBorderColor = quickSelections
        .find("input#selected-variation-button-border-color")
        .val();

    variableAllChecked.tableHeadTextColor = quickSelections
      .find("input#quick-table-head-text-color")
      .val();
    variableAllChecked.tableVariableTitleColor = quickSelections
      .find("input#quick-table-variable-title-color")
      .val();
    variableAllChecked.tableBorderColor = quickSelections
      .find("input#quick-table-border-color")
      .val();
    variableAllChecked.tableBgColorOdd = quickSelections
      .find("input#quick-table-variable-bg-color-odd")
      .val();
    variableAllChecked.tableBgColorEven = quickSelections
      .find("input#quick-table-variable-bg-color-even")
      .val();
    variableAllChecked.tableBgColorHover = quickSelections
      .find("input#quick-table-variable-hover-color")
      .val();

    variableAllChecked.onSaleNameChange = jQuery(
        'input.on-sale-name-change[type="text"]'
    ).val();

    variableAllChecked.selectAllNameChange = jQuery(
        'input.select-all-name-change[type="text"]'
    ).val();

    variableAllChecked.tableRowPagination = jQuery(
        'input.table-row-pagination[type="number"]'
    ).val();

    variableAllChecked.listPagination = jQuery(
        'input.list-pagination[type="number"]'
    ).val();

    variableAllChecked.searchOptionTextChange = jQuery(
        'input.search-option-text-change[type="text"]'
    ).val();

    variableAllChecked.imageColorWidth = jQuery(
        'input.image-color-width[type="text"]'
    ).val();

    variableAllChecked.imageColorHeight = jQuery(
        'input.image-color-height[type="text"]'
    ).val();

    variableAllChecked.imageColorBorderRadius = jQuery(
        'input.image-color-border-radius[type="text"]'
    ).val();

    variableAllChecked.buttonHeight = jQuery(
        'input.button-height[type="text"]'
    ).val();

    variableAllChecked.listBadgeHeight = jQuery(
        'input.list-badge-height[type="text"]'
    ).val();

    variableAllChecked.listBadgeWidth = jQuery(
        'input.list-badge-width[type="text"]'
    ).val();

    variableAllChecked.listForPercent = jQuery(
        'input.list-for-percent[type="text"]'
    ).val();

    variableAllChecked.listForFlat = jQuery(
        'input.list-for-flat[type="text"]'
    ).val();

    variableAllChecked.buttonWidth = jQuery(
        'input.button-width[type="text"]'
    ).val();

    variableAllChecked.buttonBorderRadius = jQuery(
        'input.button-border-radius[type="text"]'
    ).val();

    variableAllChecked.quickCarouselPosition = jQuery(
      ".quick-carousel-position"
    ).val();
    variableAllChecked.quickTablePosition = jQuery(
      ".quick-table-position"
    ).val();

    variableAllChecked.popUPImageShow = jQuery(
        ".pop-up-image-show"
    ).val();

    variableAllChecked.listImageShow = jQuery(
        ".list-image-show"
    ).val();

    variableAllChecked.galleryImageShow = jQuery(
        ".gallery-image-show"
    ).val();

    variableAllChecked.attributeGalleryImageShow = jQuery(
        ".attribute-gallery-image-show"
    ).val();

    variableAllChecked.carouselImageSize = jQuery(
        ".carousel-image-size"
    ).val();

    variableAllChecked.bulkAddToCartPosition = jQuery(
        ".bulk-add-to-cart-position"
    ).val();

    variableAllChecked.designSingleProductPageMobile = jQuery(
        ".design-single-product-page-mobile"
    ).val();

    variableAllChecked.designAddCartTableTemplate2 = jQuery(
        ".design-add-cart-table-template2"
    ).val();

    variableAllChecked.variationTableTemplate = jQuery(
        ".variation-table-template"
    ).val();

    variableAllChecked.variationListTemplate = jQuery(
        ".variation-list-template"
    ).val();

    var quickAdminNonce = jQuery('input[name="quick_admin_nonce"]').val();

    //Store variable Field Settings in DB
    let jsonData = JSON.stringify(variableAllChecked);

    jQuery.ajax({
      url: quick_ajax_obj.ajax_url,
      type: "POST",
      data: {
        action: "quickAdminAjaxHandler",
        variable_data: jsonData,
        nonce: quickAdminNonce,
        identifier: "adminSetting",
      },
      success: function (response) {
        quickAdminAlert.fadeIn();

        // if (response.trim() === "true") {
        //   quickAdminAlert.css("background-color", "#4CAF50");
        //
        //   quickAdminAlert.html(
        //     "<span class='closebtn'>&times;</span><strong>Success!</strong> Product Variations Table With Quick Cart plugins item saved successfully."
        //   );
        // } else {
        //   quickAdminAlert.css("background-color", "#f44336");
        //
        //   quickAdminAlert.html(
        //     "<span class='closebtn'>&times;</span>You need to change at least one input field."
        //   );
        // }

        quickAdminAlert.css("background-color", "#4CAF50");

        quickAdminAlert.html(
            "<span class='closebtn'>&times;</span><strong>Success!</strong> Product Variations Table With Quick Cart plugins item saved successfully."
        );

        jQuery(".quick-variable-dashboard .buttonload span").addClass(
          "quick-hidden"
        );

        quickAdminButton.text("Save");

        setTimeout(function () {
          quickAdminAlert.fadeOut();
        }, 5000);
      },
    });

    //On Click Notification Cross Icon
    quickAdminAlert.on("click", ".closebtn", function () {
      quickAdminAlert.fadeOut();
    });
  });

  // License Pro
  jQuery("#quickAuthenticateWrapper input[type='submit']").on(
    "click",
    function (event) {
      event.preventDefault();

      var quickAdminNonce = jQuery('input[name="quick_admin_nonce"]').val();
      var activationKey = jQuery("#quickSecretKey").val();

      if (activationKey == "") {
        quickActivateAlert.fadeIn();
        quickActivateAlert.css("background-color", "#f44336");
        quickActivateAlert.html(
          "<span class='closebtn'>&times;</span><strong>Danger!! </strong>Please Insert Activation Key and Try Again."
        );
        return;
      }

      jQuery.ajax({
        url: quick_ajax_obj.ajax_url,
        type: "POST",
        data: {
          action: "quickAdminAjaxHandler",
          activation_key: activationKey,
          nonce: quickAdminNonce,
          identifier: "activationKey",
        },
        success: function (response) {
          var response = JSON.parse(response);
          quickActivateAlert.fadeIn();
          if (response.status == "ok") {
            quickActivateAlert.css("background-color", "#4CAF50");
            quickActivateAlert.html(
              "<span class='closebtn'>&times;</span><strong></strong>" +
                response.message
            );
            location.reload();
          } else {
            quickActivateAlert.css("background-color", "#f44336");
            quickActivateAlert.html(
              "<span class='closebtn'>&times;</span><strong> </strong>" +
                response.message
            );
          }
        },
      });
    }
  );

  //On Click Notification Cross Icon
  quickActivateAlert.on("click", ".closebtn", function () {
    quickActivateAlert.fadeOut();
  });
});
