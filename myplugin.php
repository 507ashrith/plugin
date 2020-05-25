<?php
/**
*Plugin Name: my new plugin
*Description:  script plugin
*Author: ASHRITH REDDYPALLI
**/

   function adventura_example_function()
   {
   	$content=" this is very basic pugin.";
   	$content.="<div> this ia new one</div>";
   	return$content;
   }
   add_shortcode('example','adventura_example_function');

function adventura_admin_menu_option()
{
	add_menu_page('Header & Footer scripts','site scripts','manage_options','adventura_admin_menu','adevntura_scripts_page','',200);
}


   add_action('admin_menu','adventura_admin_menu_option');

   function adevntura_scripts_page()
   {
   	   if(array_key_exists('submit_scripts_update',$_POST))
   	   {
   	   	 
   	   	update_option('adventura_header_scripts',$_POST['header_scripts']);
   	   	update_option('adventura_footer_scripts',$_POST['footer_scripts']);
         ?>
         <div id="setting-error-settings-updated" class="updated_settings_error notice is dismissable"><strong>settings have been saved.<strong></div>
         <?php



   	   }

   	$header_scripts=get_option('adventura_header_scripts','none');
    $footer_scripts=get_option('adventura_footer_scripts','none');
   	?>
   	<div class="wrap">
   		<h2> update scripts on the header and footer.</h2>

   		<form method="post" action="">

         <label for ="header_scripts">Header scripts</label>
         <textarea name="header_scripts" class="large-text"><?php print $header_scripts;?></textarea>
         <label for ="footer_scripts">Footer scripts</label>
         <textarea name="footer_scripts" class="large-text"><?php print $footer_scripts;?></textarea>

         <input type="submit"name="submit_scripts_update"class="button button-primary" value="UPDATE SCRIPTS">
         </form>
   	</div>
   	<?php
   }



   function adventura_display_header_scripts()
   {
     $header_scripts=get_option('adventura_header_scripts','none');
     print $header_scripts;
   }
    add_action('wp_head','adventura_display_header_scripts');

    function adventura_display_footer_scripts()
    {

     $footer_scripts=get_option('adventura_footer_scripts','none');
     print $footer_scripts;
    }
     add_action('wp_foot','adventura_display_footer_scripts');




   ?>
