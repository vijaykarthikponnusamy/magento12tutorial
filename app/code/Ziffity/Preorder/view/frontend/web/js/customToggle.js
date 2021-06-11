define(['jquery'], function($){
    "use strict";
        return function myscript()
        {
            jQuery(document).ready(function() {
                jQuery("#preOrderForm").hide();
                jQuery(".toggleBtnHide").hide();
                jQuery(".toggleBtnShow").show();
        
                jQuery(".toggleBtnShow").click(function(){
                    jQuery("#preOrderForm").show();
                    jQuery(".toggleBtnHide").show();
                    jQuery(".toggleBtnShow").hide();
                });
        
                jQuery(".toggleBtnHide").click(function(){
                    jQuery("#preOrderForm").hide();
                    jQuery(".toggleBtnHide").hide();
                    jQuery(".toggleBtnShow").show();
                });
            });
        }
 });