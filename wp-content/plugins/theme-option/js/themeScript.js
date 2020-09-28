jQuery(document).ready(function(){
								
			jQuery(".themeList li").click(function(){
				var i=jQuery(this).index(); 	
				i=i+1;
				var val=jQuery(this).html();
				jQuery(".titles").html(val);
				jQuery(".themeList li").removeClass('active1');
				jQuery(this).addClass('active1');
				
				jQuery(".form-table").hide();
				jQuery(".form-table:nth-child("+i+")").slideDown("slow");
			});		
			
});

jQuery(function($){

	$('.upload-image-btn').on( 'click', function( event ){
		var frame;
		var metaBox = $(this).parents('.image_upload');
		var id = $(this).attr('data-inputId');
		
    
		event.preventDefault();
    
    
		if ( frame ) {
		  frame.open();
		  return;
		}
    
		frame = wp.media.frames.file_frame =wp.media({
            title: 'Select or Upload Media Of Your Chosen Persuasion',
			button: {
				text: 'Use this media'
			},
			multiple: false 
        });

    
		frame.on( 'select', function() {
		  
		  var attachment = frame.state().get('selection').first().toJSON();
		
		  $('#'+id+'.upload-image-input').val( attachment.url );
			//alert('#'+id+'.upload-image-input');
		  
		});

		frame.open();
	});
  

});

jQuery(function($){
	
	$('.wpdev-plugin.image-gallery-upload').on('click', '.add-image-btn', function(event) {
		event.preventDefault();
		var control_container = $(this).parents('.wpdev-plugin.image-gallery-upload');
		var control_name = $(control_container).attr('data-control-name');
		var gallery_box = $(control_container).find('.gallery-box ul');

		var frame = wp.media({
		  title: 'Select multiple images with the CTRL key',
		  button: {
			text: 'Upload'
		  },
		  multiple: true 
		});

		frame.on( 'select', function() {
			var attachment = frame.state().get('selection').toJSON();
			for(var i=0; i< attachment.length; i++){
				$(gallery_box).append("<li><img src='"+attachment[i].url+"'/><input type='hidden' name='"+control_name+"[]' value='"+attachment[i].id+"'/><span class='remove'>&times;</span></li>");
				//console.log(attachment[i].id);
			}
		});

		frame.open();
	});

	$('.wpdev-plugin.image-gallery-upload').on('click', '.gallery-box ul li span.remove', function(event) {
		event.preventDefault();
		$(this).parent('li').remove();
	});
});