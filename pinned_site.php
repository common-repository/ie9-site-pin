<?php
/*
Plugin Name: Pining Site
Plugin URI: 
Description: It can add your wordpress site to taskbar for IE9
Version: 0.1
Author: Savita Soni	
Author URI: 
*/



	
	add_action('wp_head', 'set_head');
	add_action('admin_menu','pinning_menu');
	show_popup();
	
	function pinning_menu()
	{
		add_options_page('Pinning Site', 'Pinning Site', 10, 'pinning-site', 'pinning_site');
	}
	function pinning_site()
	{
		?>
		<div class="wrap">		
			comes here
		</div>
		<?php
	}
	function set_head()
	{
		global $current_user;	
		?>
			
		<!-- IE9 Pinned -->
		<meta name="application-name" content="<?php bloginfo('name') ?>" />
		<meta name="msapplication-tooltip" content="<?php bloginfo('description') ?>" />
		<meta name="msapplication-starturl" content="./" />
		<meta name="msapplication-window" content="width=device-width;height=device-height" />
		<meta name="msapplication-task" content="name=<?php _e('Syndicate this site using RSS 2.0') ?>;action-uri=<?php bloginfo('rss2_url') ?>;icon-uri=favicon.ico" />	
		<?php
			$num = 5;
			$recent_posts = wp_get_recent_posts($num);
			foreach($recent_posts as $post)
			{
				?>
				<meta name="msapplication-task" content="name=<?php echo $post["post_title"]?>;action-uri=<?php echo get_permalink($post['ID']) ?>;icon-uri=favicon.ico" />	
				<?php
			}
			if($current_user->wp_user_level == 10)
			{
				$url_new_post = site_url('/wp-admin/post-new.php');
				$url_comments = site_url('/wp-admin/edit-comments.php');
				?>
				<meta name="msapplication-task" content="name=Add New Post;action-uri=<?php echo $url_new_post ?>;icon-uri=favicon.ico" />	
				<meta name="msapplication-task" content="name=Comments;action-uri=<?php echo $url_comments ?>;icon-uri=favicon.ico" />	
				<?php
			}
			?>
			<!-- IE9 Pinned -->	
			<?php
	}
	function show_popup()
	{
		
		$pluginurl = dirname(plugin_basename(__FILE__)).'/';
		$jquery =  WP_PLUGIN_URL.'/'.$pluginurl.'js/jquery-1.4.2.min.js';
		$pinscript=  WP_PLUGIN_URL.'/'.$pluginurl.'js/pin.js';
		$style= WP_PLUGIN_URL."/".$pluginurl."pin.css";
		
		wp_enqueue_script('jquery', $jquery );
		wp_enqueue_script('pinscript', $pinscript);
		wp_enqueue_style('style',$style );	
				
	}
	
?>
	
