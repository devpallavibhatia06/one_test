<?php
function register_theme_option_settings() {
	/*-- Home --*/
	register_setting( 'theme-options-settings-group', 'welcome_text' );
	register_setting( 'theme-options-settings-group', 'scrolling_text' );

	
  /*-- social link --*/
	register_setting( 'theme-options-settings-group', 'fblink_option' );
	register_setting( 'theme-options-settings-group', 'instalink_option' );
	register_setting( 'theme-options-settings-group', 'twlink_option' );
	register_setting( 'theme-options-settings-group', 'payments_option' );
	/*-- Footer Option --*/
   
   register_setting( 'theme-options-settings-group', 'copyright_option' );
   /*-- Contact Option --*/
   
   register_setting( 'theme-options-settings-group', 'address_option' );   
   register_setting( 'theme-options-settings-group', 'tel_option' );   
   register_setting( 'theme-options-settings-group', 'email_option' );	
}
//-- for image upload in media --//
function theme_option_settings_page() {
?>
<script language="JavaScript">
jQuery(document).ready(function(){
	var imgurl;
	jQuery('#home_image').click(function() {
	var formfield = jQuery(this).attr('name');	
	tb_show('', 'media-upload.php?type=image&amp;TB_iframe=true');

	window.send_to_editor = function(html) {
	var subStr = html.match("src=(.*)alt");
	subStr[1]=subStr[1].trim();
  imgurl=subStr[1].substr(1, subStr[1].length-2);
	jQuery('#'+formfield).val(imgurl); 
	tb_remove();
	};

	return false;
	});
});
</script>
<style>
td input[type='button'] {
	width: auto !important;
}
.themeList li {
	width:100%;
	margin:5px 0;
	text-align:center;
	cursor:pointer;
	background:#fff;
	box-sizing:border-box;
	padding:2%;
	border-radius: 5px;
	font-weight: 700;
	font-size: 15px;
	border: 1px solid #ccc;
}
.optionMenus {
	float:left;
	width:15%;
}
.optionTables {
	float:left;
	width:80%;
	border-radius: 5px;
	box-sizing:border-box;
	border: 1px solid #2196F3;
	background: rgba(33, 150, 243, 0.24);
	margin:0 10px;
}
.optionTables1 {
	padding:1%;
}
.form-table {
	display:none;
	width:100%;
}
.form-table th {
	width:auto !important;
}
.form-table td {
	width: 79%;
}
td input:not([type='checkbox']), td textarea {
	width:100% ;
	padding:5px;
	border-radius: 5px;
}
.form-table:First-child {
	display:block;
}
.active1 {
	background: #2196F3 !important;
	color: #fff;
}
.titles {
	width: 100%;
	float: left;
	background: #FFC107;
	margin: 0;
	padding: 10px;
	box-sizing: border-box;
	color: #fff;
	border-radius: 5px 5px 0 0;
}
.wp-picker-container.wp-picker-active {
	position: absolute;
	z-index: 999;
	background: #fff;
	padding: 20px;
	box-shadow: 2px 2px 10px;
}
</style>
<div class="wrap">
  <h2>Theme Options</h2>
  <form method="post" action="options.php">
    <?php settings_fields( 'theme-options-settings-group' ); ?>
    <?php do_settings_sections( 'theme-options-settings-group' ); ?>
    <div style="width:100%;">
     <?php submit_button(); ?>
      <div class="optionMenus">
        <ul class="themeList" style="list-style:none;">
          <li class="active1">Home Page</li>
          <li >Social Link</li>
          <li >Footer</li>
          <li >Contact Settings</li>
        </ul>
      </div>
      <div class="optionTables">
        <h3 class="titles">Home Page</h3>
        <div class="optionTables1">
          <!--Home Page-->
          <table class="form-table">
			<tr valign="top">
              <th scope="row">Welcome Text</th>
				<td>
				<?php
				$welcome_text = get_option('welcome_text');
				wp_editor( $welcome_text,'welcome_text', array('textarea_rows'=>8));
				?>
				</td>
            </tr>
			<tr valign="top">
              <th scope="row">Icons Text</th>
				<td>
				<?php
				$scrolling_text = get_option('scrolling_text');
				wp_editor( $scrolling_text,'scrolling_text', array('textarea_rows'=>8));
				?>
				</td>
            </tr>
          </table>
		  <table class="form-table">
			
            <tr valign="top">
              <th scope="row">Facebook Link</th>
              <td><input type="text" name="fblink_option" value="<?php echo esc_attr( get_option('fblink_option') ); ?>" placeholder="Facebook url"></td>
            </tr>
			<tr valign="top">
              <th scope="row">Linkdin Link</th>
              <td><input type="text" name="instalink_option" value="<?php echo esc_attr( get_option('instalink_option') ); ?>" placeholder="Linkdin url"/></td>
            </tr>
			<tr valign="top">
              <th scope="row">Twitter Link</th>
              <td><input type="text" name="twlink_option" value="<?php echo esc_attr( get_option('twlink_option') ); ?>" placeholder="Twitter url"/></td>
            </tr>
				<tr valign="top">
              <th scope="row">Payments Link </th>
              <td><input type="text" name="payments_option" value="<?php echo esc_attr( get_option('payments_option') ); ?>" placeholder="Payment url"/></td>
            </tr>

			</table>
			<table class="form-table">
				<tr valign="top">
					<th scope="row">Copyright Text</th>
					<td><input type="text" name="copyright_option" value="<?php echo esc_attr(get_option('copyright_option')); ?>" /></td>
				</tr> 
			</table>
			<table class="form-table">
				<tr valign="top">
					<th scope="row">Email :</th>
					<td><input type="text" name="email_option" value="<?php echo  get_option('email_option'); ?>"/></td>
				</tr>
                <tr valign="top">
					<th scope="row">Phone :</th>
					<td><input type="text" name="tel_option" value="<?php echo  get_option('tel_option'); ?>"/></td>
				</tr>
                <tr valign="top">
					<th scope="row">Address :</th>
					<td>
                    	<?php
				$address_option = get_option('address_option');
				wp_editor( $address_option,'address_option', array('textarea_rows'=>4));
				?>
                   </td>
				</tr>
				
			</table>
        </div>
      </div>
      <div style="clear:both;">
      <?php submit_button(); ?>
      </div>
    </div>
  </form>
</div>
<?php } 

add_action( 'admin_enqueue_scripts', 'load_custom_script' ); 
function load_custom_script() {
	//wp_enqueue_style( 'custom_css_script' ,plugins_url('/css/themeStyle.css', __FILE__));
    wp_enqueue_script('custom_js_script',  plugins_url('/js/themeScript.js', __FILE__), array('jquery'));
} 
?>