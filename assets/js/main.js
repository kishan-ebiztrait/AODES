
jQuery( document ).ready(function() {
  jQuery(".menu-icon").click(function(){
    jQuery(".header-nav").slideToggle();
    
  });
  jQuery(document).on('change','.woocommerce div.product .brator-product-layout-header-content form.cart .variations td select',function(){

    var s_width = jQuery(this).siblings('.select2-container').css('width');

    jQuery(this).siblings('.select2-container').css('width',s_width);
    
  });

  
  
  var temp_title_height = 0;
  jQuery(".brator-product-single-item-mini").find(".brator-product-single-item-title").each(function(){
    if(jQuery(this).height() > temp_title_height ){
      temp_title_height = jQuery(this).height();
    }
  })
  jQuery(".brator-product-single-item-mini").find(".brator-product-single-item-title").height(temp_title_height+"px");
  
  var temp_price_height = 0;
  jQuery(".brator-product-single-item-mini").find(".brator-product-single-item-price").each(function(){
    if(jQuery(this).height() > temp_price_height ){
      temp_price_height = jQuery(this).height();
    }
  })
  jQuery(".brator-product-single-item-mini").find(".brator-product-single-item-price").height(temp_price_height+"px");

  jQuery(".brator-inline-product-filter-left").appendTo(".brator-inline-product-filter-right");
  var count_html = jQuery(".brator-inline-product-filter-right").find(".woocommerce-result-count").html();
  jQuery(".brator-inline-product-filter-right").find(".woocommerce-result-count").html("Showing " + count_html);
  jQuery(".brator-pagination-box").appendTo(".brator-inline-product-filter-right");
  var brator_custome_html = jQuery('.brator-inline-product-filter-area').clone();
  jQuery(".brator-breadcrumb-area ").prependTo(".brator-inline-product-filter-area");
  jQuery(brator_custome_html).insertAfter(".products");
  jQuery("#advanced-searchform").insertBefore(".brator-sidebar-area");
  jQuery(".brator-breadcrumb-area ").prependTo(".product-detail-page-right");
  jQuery(".woocommerce-ordering").find("select").addClass("select2");
  jQuery(".product-detail-page-right").find(".container-xxxl").removeClass("container-xxxl");
  jQuery(".product-detail-page-right").find(".container-xxl").removeClass("container-xxl");
  jQuery(".product-detail-page-right").find(".variations").find("select").addClass("select2");
  jQuery(".product-detail-page-right").find(".container").removeClass("container");
  jQuery(".brator-product-single-tab-area").find(".col-xxl-8").addClass("col-xxl-12");
  jQuery(".brator-product-single-tab-area").find(".col-xxl-8").removeClass("col-xxl-8");
  jQuery("<h5>VEHICLE PARTS FILTER</h5>").prependTo("#advanced-searchform");
  jQuery(".cart_group").find(".details").prepend("<div class='bundle-side-cart'></div>");
  jQuery(".details").each(function(){
    jQuery(this).find(".bundled_product_title").appendTo(jQuery(this).find(".bundle-side-cart"));
    jQuery(this).find(".cart").appendTo(jQuery(this).find(".bundle-side-cart"));
  })

  jQuery(".recently-view").find(".brator-section-header-title").html("<h2>Related Products</h2>");
  jQuery('.select2').select2();

  // jQuery("#makeyear").change(function(){
    jQuery("#makebrand").prop("disabled", false);
  // })
  // jQuery("#makebrand").change(function(){
    jQuery("#makemodel").prop("disabled", false);
  // })
  // jQuery("#makemodel").change(function(){
    jQuery("#makeengine").prop("disabled", false);
  // })
  // jQuery("#makeengine").change(function(){
    jQuery("#makefueltype").prop("disabled", false);
  // })

  if(getUrlParameter('makeyear') != ""){
    jQuery("#makeyear").val(getUrlParameter('makeyear'));
  }
  if(getUrlParameter('brand') != ""){
    jQuery("#makebrand").val(getUrlParameter('brand'));
  }
  if(getUrlParameter('model') != ""){
    jQuery("#makemodel").val(getUrlParameter('model'));
  }
  if(getUrlParameter('engine') != ""){
    jQuery("#makeengine").val(getUrlParameter('engine'));
  }
  if(getUrlParameter('fueltype') != ""){
    jQuery("#makefueltype").val(getUrlParameter('fueltype'));
  }
});

var getUrlParameter = function getUrlParameter(sParam) {
  var sPageURL = window.location.search.substring(1),
      sURLVariables = sPageURL.split('&'),
      sParameterName,
      i;

  for (i = 0; i < sURLVariables.length; i++) {
      sParameterName = sURLVariables[i].split('=');

      if (sParameterName[0] === sParam) {
          return sParameterName[1] === undefined ? true : decodeURIComponent(sParameterName[1]);
      }
  }
  return false;
};
  