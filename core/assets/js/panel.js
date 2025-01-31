jQuery.noConflict()(function($){

/* ===============================================
   ColorPicker
   =============================================== */

    $('.WIP_plugin_panel_color').wpColorPicker();

/* ===============================================
   Countdown
   =============================================== */

    $('.WIP_plugin_panel_countdown').datepicker();

/* ===============================================
   Message, after save options
   =============================================== */

	$('.WIP_plugin_panel_message').delay(1000).fadeOut(1000);

/* ===============================================
   On off
   =============================================== */

	$('.on-off').on("change",function() {

		if ($(this).val() === "on" ) {
			$('.hidden-element').css({'display':'none'});
		}
		else {
			$('.hidden-element').slideDown("slow");
		}

	});

	$('input[type="checkbox"].on_off').on("change",function() {

		if (!this.checked) {
			$(this).parent('.iPhoneCheckContainer').parent('.WIP_plugin_panel_box').next('.hidden-element').slideUp("slow");
		} else {
			$(this).parent('.iPhoneCheckContainer').parent('.WIP_plugin_panel_box').next('.hidden-element').slideDown("slow");
		}

	});

/* ===============================================
   Background
   =============================================== */

	var url = $(".template_directory").val();

	$('.select-background').each(function() {

		var sel = $(this).val();
		$(this).next(".preview").css({'background-image': 'url(" ' + url + sel +'")'});

	});

	$('.select-background').change("click",function() {

		var sel = $(this).val();
		$(this).next(".preview").css({'background-image': 'url(" ' + url + sel +'")'});

	});

/* ===============================================
   Upload media
   =============================================== */

	$('.WIP_plugin_panel_container .WIP_plugin_panel_box input.upload_button').on("click", function(e) {

		var custom_uploader;
		var attachmentId = "";

		attachmentId = $(this).prev('.upload_attachment').attr("id");

		e.preventDefault();

		if (custom_uploader) {
			custom_uploader.open(this);
			return;
		}

		custom_uploader = wp.media.frames.file_frame = wp.media({
			title: 'Choose Image',
			button: {
				text: 'Choose Image'
			},
			multiple: false
		});

		custom_uploader.on('select', function() {

			attachment = custom_uploader.state().get('selection').first().toJSON();
			$('input#' + attachmentId ).val(attachment.url);

		});

		custom_uploader.open();
 
	});

/* ===============================================
   Option panel
   =============================================== */

	$('.WIP_plugin_panel_container .WIP_plugin_panel_mainbox').css({'display':'none'});
	$('.WIP_plugin_panel_container .inactive').next('.WIP_plugin_panel_mainbox').css({'display':'block'});

	$('.WIP_plugin_panel_container h5.element').each(function(){

		if($(this).next('.WIP_plugin_panel_mainbox').css('display') === 'none') {
			$(this).next('input[name="element-opened"]').remove();
		}

		else {
			$(this).next().append('<input type="hidden" name="element-opened" value="'+$(this).attr('id')+'" />');

		}

	});

	$('.WIP_plugin_panel_container h5.element').on("click", function(){

		if($(this).next('.WIP_plugin_panel_mainbox').css('display') === 'none') {

			$(this).addClass('inactive');
			$(this).children('img').addClass('inactive');
			$('input[name="element-opened"]').remove();
			$(this).next().append('<input type="hidden" name="element-opened" value="'+$(this).attr('id')+'" />');
		}

		else {

			$(this).removeClass('inactive');
			$(this).children('img').removeClass('inactive');
			$(this).next('input[name="element-opened"]').remove();

		}

		$(this).next('.WIP_plugin_panel_mainbox').stop(true,false).slideToggle('slow');

	});

});
