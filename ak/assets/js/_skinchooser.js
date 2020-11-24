jQuery(document).ready(function ($) {

    var skinContainerShowHideClass = 'hide-skin-chooser';
    jQuery('#show_hide_skin_chooser').click(function (e) {
        e.preventDefault();

        var $skinContainer = $('#skin-chooser-container');
        if ($skinContainer.hasClass(skinContainerShowHideClass)) {
            $skinContainer.removeClass(skinContainerShowHideClass);
        }
        else {
            $skinContainer.addClass(skinContainerShowHideClass);
        }


        return false;
    });


    /* Color Picker */
    var color_chooser_source =jQuery("#css-skin").html(), color_chooser_template = Handlebars.compile(color_chooser_source);
    /*jQuery('.input-colorpicker').ColorPicker({
        onSubmit: function (hsb, hex, rgb, el) {
            jQuery(el).val('#' + hex);
            jQuery(el).ColorPickerHide();
        },
        onBeforeShow: function () {
            jQuery(this).ColorPickerSetColor(this.value);
        },
        onChange: function (hsb, hex, rgb, el) {

            var $el = $(el), new_color = '#' + hex, source, template, elName = $el.attr('name'), htmlTemplate;
            $el.next().css('background-color', '#' + hex);

            el.value = new_color;


            skins_data[$default_skin][elName] = new_color;
            skins_data[$default_skin][elName + '_rgba'] = convertHex(new_color, 0.5);
            htmlTemplate = color_chooser_template(skins_data[$default_skin]);

            jQuery("#skin-chooser-css").remove();
            jQuery('<style type="text/css" id="skin-chooser-css">' + htmlTemplate + '</style>').appendTo('head');


            //data:text/css;base64,
            $('#skin-save').attr('href', 'data:text/css;base64,' + $.base64Encode(htmlTemplate));
            // $("#skin-chooser-css")[0].cssText = htmlTemplate;
            // $("#skin-chooser-css").html( htmlTemplate );
        }
    }).bind('keyup', function () {
            jQuery(this).ColorPickerSetColor(this.value);
        });*/


    jQuery('.skin-chooser-label').click(function () {
        jQuery(this).next().slideToggle();
    });

    /* Set default mode */
    if (jQuery('#wrapper').hasClass('boxed')) {
        jQuery('#layout-mode option[value="boxed"]')[0].selected = true;

    }
    //change mod
    $('#layout-mode').change(function () {
        jQuery('#wrapper').attr('class', $('option:selected', this).val());
        jQuery('#masonry-elements,.portfolio-items').isotope('reLayout');
        jQuery(window).trigger('resize');
    });
	// change color skin of theme 
    /* jQuery(document).on('click', '.predefined-skins', function () {
        jQuery("#skin-chooser-css").remove();
        var skin_name = jQuery(this).data('skinname'), $inputColorPicker, color;
        $default_skin = skin_name;

        for (var prop in default_skins_data[$default_skin]) {
            $inputColorPicker = $('.input-colorpicker[name=' + prop + ']')
            color = default_skins_data[$default_skin][prop];
            $inputColorPicker.val(color);
            $inputColorPicker.next().css('background-color', color);
        }
	
       //jQuery('#skin-file-css').attr('href', '../../css/skins/' + skin_name + '.css'); 
		
		var oldlink = document.getElementById("skin-file-css"); 
        var newlink = document.createElement("link");
        newlink.setAttribute("id", "skin-file-css");
		newlink.setAttribute("rel", "stylesheet");
        newlink.setAttribute("type", "text/css");
        newlink.setAttribute("href", "http://localhost/wordpress-3.9/wp-content/themes/weblizar+shortcode/css/skins/"+ skin_name + '.css');		
        document.getElementsByTagName("head").item(0).replaceChild(newlink, oldlink);
		

        var header_div_type = default_skins_data[$default_skin]['header_type'];
       jQuery('.top-header').attr('class', 'top-header ' + header_div_type);
       jQuery('#divider-mode option:selected').removeAttr('selected');
        if(  jQuery('#divider-mode option[value=' + header_div_type + ']')[0] )
            jQuery('#divider-mode option[value=' + header_div_type + ']')[0].selected = true;
    }); */

    var last_class_used = '';
    jQuery('.pattern,.image-chooser').click(function () {
        if (!isBoxed()) {
            alert('Please choose boxed layout first :)');
            return false;
        }
        var pattern_class = $(this).data('body-class');
        jQuery('body').attr('class', pattern_class);
        //$('body').addClass(pattern_class);
        last_class_used = pattern_class;
    });


    jQuery('#skin-save').click(function () {
        if (jQuery(this).attr('href') == "") {
            alert('The skin does not changed!');
            return false;
        }
    });

    jQuery('#divider-mode').change(function () {
        var option = $('option:selected', this).val();
        jQuery('.top-header').attr('class', 'top-header ' + option);
    });
});

function rgb_color(rgb, a) {
    if (a) {
        return 'rgba(' + rgb.r + ',' + rgb.g + ',' + rgb.b + ',' + a + ')';
    }
    else {
        return 'rgb(' + rgb.r + ',' + rgb.g + ',' + rgb.b + ')';
    }
}

function isBoxed() {
    return  jQuery('#layout-mode option:selected').val() == 'boxed';
}

function convertHex(hex, opacity) {
    hex = hex.replace('#', '');
    r = parseInt(hex.substring(0, 2), 16);
    g = parseInt(hex.substring(2, 4), 16);
    b = parseInt(hex.substring(4, 6), 16);

    result = 'rgba(' + r + ',' + g + ',' + b + ',' + opacity + ')';
    return result;
}
