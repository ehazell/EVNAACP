<?php
$edulite_view_demo = esc_html( __( 'View Demo','edulite'));
$edulite_upgrade_to_pro = esc_html( __( 'Upgrade To Pro', 'edulite' ));

 
function edulite_theme_page() {
	$title = esc_html(__('Edulite Theme','edulite'));
	add_theme_page( 
		esc_html(__( 'Upgrade To Edulite Pro','edulite')),
		$title.'', 
		'edit_theme_options',
		'edulite_upgrade',
		'edulite_display_upgrade'
	);
}

add_action('admin_menu','edulite_theme_page');


function edulite_display_upgrade() {
  $theme_data = wp_get_theme('edulite'); 
    
    // Check for current viewing tab
    $tab = null;
    if ( isset( $_GET['tab'] ) ) {
        $tab = $_GET['tab'];
    } else {
        $tab = null;
    } 
     
    $pro_theme_url = 'http://www.hubblethemes.com/recommends/edulite-premium-details/';
    $pro_theme_demo = 'http://www.hubblethemes.com/recommends/edulite-pro-demo/';
    $doc_url  = 'http://www.hubblethemes.com/docs/edulite-documentation/index.html';
    $support_url = 'https://wordpress.org/support/theme/edulite';   
    $rating_url = 'https://wordpress.org/support/theme/edulite/reviews/?filter=5';   
    
    $current_action_link =  admin_url( 'themes.php?page=edulite_upgrade&tab=pro_features' ); ?>
    <style>
	.about-wrap .about-text {
		margin: 0em 0px 0em 0  !important;;
		margin-bottom: 25px !important;
		min-height: 60px;
		color: #555d66;
	}
	.about-wrap {		
		max-width: 1200px;	
	}
	</style>
	<div class="construction-zone-wrapper about-wrap">
        <h1><?php printf(esc_html__('Welcome to %1$s - Version %2$s', 'edulite'), $theme_data->Name ,$theme_data->Version ); ?></h1><?php
       	printf( __('<div class="about-text"> Edulite is the perfect WordPress theme for your education Web project. Very Lightweight and easily customizable. Edulite is SEO Friendly, Load fast, Responsive, WPML, Retina ready, RTL & translation ready. Edulite is fully featured academic WordPress theme perfect for learning and teaching will give fun experiance to teacher and students both. Also theme can bes used for  websites whether it is for high-school, college, university, training academy, coaching centre, LMS, guidance and counselling centre, institute, distance learning, online library or discussion forum. This is highly customized and colors, fonts, background can be easily change. Theme is gutenberg and RTL ready with fully SEO featurtes. Slider and widgets can be added easily. Theme provides sevral sections according to a perfect education website. Theme offers various layouts change. You can add faculty, students, Course Section and testimoinals too. Theme is based on the latest WordPress so you can make a bug free website within few minutes.View Demo- http://hubblethemes.com/edulite-demo/ View Docs - http://www.hubblethemes.com/docs/edulite-documentation/index.html   ', 'edulite') ); ?>
       <p class="upgrade-btn"><a class="upgrade" href="<?php echo esc_url($pro_theme_demo); ?>" target="_blank"><?php printf( __( 'Upgrade To %1s Pro', 'edulite'), $theme_data->Name ); ?></a></p>
       <p class="upgrade-btn"><a class="upgrade upgrade-btm" href="<?php echo esc_url($pro_theme_url); ?>" target="_blank"><?php printf( __( 'Premium Demo', 'edulite'), $theme_data->Name ); ?></a></p>

	   <h2 class="nav-tab-wrapper">
	        <a href="?page=edulite_upgrade" class="nav-tab<?php echo is_null($tab) ? ' nav-tab-active' : null; ?>"><?php echo $theme_data->Name; ?></a>
<a href="?page=edulite_upgrade&tab=pro_features" class="nav-tab<?php echo $tab == 'pro_features' ? ' nav-tab-active' : null; ?>"><?php esc_html_e( 'PRO Features', 'edulite' );  ?></a>
            <a href="?page=edulite_upgrade&tab=free_vs_pro" class="nav-tab<?php echo $tab == 'free_vs_pro' ? ' nav-tab-active' : null; ?>"><?php esc_html_e( 'Free VS PRO', 'edulite' ); ?></a>
	        <?php do_action( 'edulite_admin_more_tabs' ); ?>
	    </h2>      

        <?php if ( is_null( $tab ) ) { ?>
            <div class="theme_info info-tab-content">
                <div class="theme_info_column clearfix">
                    <div class="theme_info_left">
                        <div class="theme_link">
                            <h3><?php esc_html_e( 'Theme Customizer', 'edulite' ); ?></h3>
                            <p class="about"><?php printf(esc_html__('%s supports the Theme Customizer for all theme settings. Click "Customize" to start customize your site.', 'edulite'), $theme_data->Name); ?></p>
                            <p>
                                <a href="<?php echo admin_url('customize.php'); ?>" class="button button-primary"><?php esc_html_e('Start Customize', 'edulite'); ?></a>
                            </p>
                        </div>
                        <div class="theme_link">
                            <h3><?php esc_html_e( 'Theme Documentation', 'edulite' ); ?></h3>
                            <p class="about"><?php printf(esc_html__('Need any help to setup and configure %s? Please have a look at our documentations instructions.', 'edulite'), $theme_data->Name); ?></p>
                            <p>
                                <a href="<?php echo esc_url($doc_url); ?>" target="_blank" class="button button-secondary"><?php esc_html_e(' Documentation', 'edulite'); ?></a>
                            </p>
                            <?php do_action( 'edulite_dashboard_theme_links' ); ?>
                        </div>  
                        <div class="theme_link">
                            <h3><?php esc_html_e( 'Having Trouble, Need Support?', 'edulite' ); ?></h3>
                            <p class="about"><?php printf(esc_html__('Support for %s WordPress theme is conducted through Genex free support ticket system.', 'edulite'), $theme_data->Name); ?></p>
                            <p>  
                                <a href="<?php echo esc_url($support_url); ?>" target="_blank" class="button button-secondary"><?php echo sprintf( esc_html('Create a support ticket', 'edulite'), $theme_data->Name); ?></a>
                            </p>
                        </div> 
						 <div class="theme_link">
                            <h3><?php esc_html_e( 'Please Rate Us', 'edulite' ); ?></h3>
                            <p class="about"><?php printf(esc_html__('We need your help to expand or and portoflio so please rate us on wordpress ', 'edulite'), $theme_data->Name); ?></p>
                            <p>  
                                <a href="<?php echo esc_url($rating_url); ?>" target="_blank" class="button button-secondary"><?php echo sprintf( esc_html('Rate This Theme', 'edulite'), $theme_data->Name); ?></a>
                            </p>
                        </div> 
                       
                    </div>  
                    <div class="theme_info_right">
                        <?php echo sprintf ( '<img src="'. get_template_directory_uri() .'/screenshot.jpg" alt="%1$s" />',__('Theme screenshot','edulite') ); ?>
                    </div>
                </div> 
            </div>
        <?php } ?>
	
        <?php if ( $tab == 'pro_features' ) { ?>
            <div class="pro-features-tab info-tab-content">
			 
				<div class="wrap clearfix">
			   <div class="one-third column clear">
<div class="icon-wrap"><i class="fa  fa-5x fa-cog"></i></div>
	<h3><?php echo esc_html(__( '3 Home Pages', 'edulite' )); ?></h3>
	<p><?php echo esc_html(__('Theme consist 3 Home page designs. You can choose anyone its your choice.', 'edulite' )); ?></p>
</div>
<div class="one-third column">
	<div class="icon-wrap"><i class="fa  fa-5x fa-th-large"></i></div>
	<h3><?php echo esc_html(__( '2 Header Preset', 'edulite' )); ?></h3>
	<p><?php echo esc_html(__('Theme have 2 tytpes of header preset so you can change and select your header design', 'edulite' )); ?></p>
</div>
<div class="one-third column">
	<div class="icon-wrap"><i class="fa  fa-5x fa-check"></i></div>
	<h3><?php echo esc_html( __( 'Demo content', 'edulite' )); ?></h3>
	<p><?php echo esc_html( __('Theme includes single click demo content. You can quickly setup the site like our demo and get started easily!', 'edulite' )); ?></p>
</div>

<div class="one-third column clear">
	<div class="icon-wrap"><i class="fa  fa-5x fa-envelope"></i></div>
	<h3><?php echo esc_html(__( 'Contact Form 7', 'edulite' )); ?></h3>
	<p><?php echo esc_html(__( 'Edulite Pro support contact form 7 that mean you can easily add your contact form with theme design ', 'edulite' )); ?></p>
</div>
<div class="one-third column">
	<div class="icon-wrap"><i class="fa  fa-5x fa-list-alt"></i></div>
	<h3><?php echo esc_html(__( 'Projects Page', 'edulite' )); ?> </h3>
	<p><?php echo esc_html(__( 'Theme have amazing Projects design Grid+ Masonry with you can use 2, 3, or 4 Columns layouts!', 'edulite' )); ?> </p>
</div>
<div class="one-third column">
	<div class="icon-wrap"><i class="fa  fa-5x fa-font"></i></div>
	<h3><?php echo esc_html(__( 'Typography', 'edulite' )); ?></h3>
	<p><?php echo esc_html(__('Theme loves typography, you can choose from over 500+ Google Fonts and Standard Fonts to customize your site!', 'edulite' )); ?></p>
</div>
<div class="one-third column clear">
	<div class="icon-wrap"><i class="fa  fa-5x fa-slideshare"></i></div>
	<h3><?php echo esc_html(__( 'Unlimited Image Slides', 'edulite' )); ?></h3>
	<p><?php echo esc_html(__('Theme includes Flex slider . You can add unlimited slides on your home page', 'edulite' )); ?></p>
</div>
<div class="one-third column">
	<div class="icon-wrap"><i class="fa  fa-5x fa-user"></i></div>
	<h3><?php echo esc_html(__( 'Team Page', 'edulite' )); ?></h3>
	<p><?php echo esc_html(__('You can add unlimited team members with team deatil page and also display their social profiles ', 'edulite' )); ?></p>
</div>
<div class="one-third column">
	<div class="icon-wrap"><i class="fa  fa-5x fa-magic"></i></div>
	<h3><?php echo esc_html(__( 'Retina Ready', 'edulite' )); ?></h3>
	<p><?php echo esc_html(__( 'Theme is Retina Ready. So, Everything looks amazingly sharp and crisp on high resolution retina displays of all sizes!', 'edulite' )); ?></p>
</div>
<div class="one-third column clear">
	<div class="icon-wrap"><i class="fa  fa-5x fa-dashboard"></i></div>
	<h3><?php echo esc_html(__( 'Awesome Icons', 'edulite' )); ?></h3>
	<p><?php echo esc_html(__( ' Choose from over 2500+ icons are fully integrated into the theme ', 'edulite' )); ?></p>
</div>
<div class="one-third column">
	<div class="icon-wrap"><i class="fa  fa-5x fa-magic"></i></div>
	<h3><?php echo esc_html(__( 'Excellent Support', 'edulite' )); ?></h3>
	<p><?php echo esc_html(__( 'We truly care about our customers and themes performance. We assure you that you will get the best after sale support like never before!', 'edulite' ));
 ?></p>
</div>
<div class="one-third column">
	<div class="icon-wrap"><i class="fa  fa-5x fa-desktop"></i></div>
	<h3><?php echo esc_html(__( 'Responsive Layout', 'edulite' )); ?></h3>
	<p><?php echo esc_html( __('Theme is fully responsive and can adapt to any screen size. Resize your browser window to view it!', 'edulite' )); ?></p>
</div>
<div class="one-third column clear">
	<div class="icon-wrap"><i class="fa  fa-5x fa-rocket"></i></div>
	<h3><?php echo esc_html( __( 'Testimonials', 'edulite' ));?></h3>
	<p><?php echo  esc_html( __( 'Display your clients\' glowing comments about your business on your homepage. Showing a specific number of testimonials with use of testimonial widget. ', 'edulite' ));?></p>
</div>
<div class="one-third column">
	<div class="icon-wrap"><i class="fa  fa-5x fa-skype"></i></div>
	<h3><?php echo esc_html( __( 'Social Media', 'edulite' )); ?></h3>
	<p><?php echo esc_html( __( 'Want your users to stay in touch? No problem, Theme has Social Media icons all throughout the theme!', 'edulite' )); ?></p>
</div>
<div class="one-third column">
	<div class="icon-wrap"><i class="fa  fa-5x fa-map-marker"></i></div>
	<h3><?php echo esc_html( __( 'Add Timeline', 'edulite' )); ?></h3>
	<p><?php echo esc_html( __('This Theme includes Timeline shortcode, So you can easily display your company history to your visitors or  your clients', 'edulite' )); ?></p>
</div>

<div class="one-third column clear">
	<div class="icon-wrap"><i class="fa  fa-5x fa-edit"></i></div>
	<h3><?php echo esc_html( __( 'Customization', 'edulite' )); ?></h3>
	<p><?php echo esc_html( __('With advanced theme options, page options & extensive docs, its never been easier to customize a theme!', 'edulite' )); ?></p>
</div>
<div class="one-third column">
	<div class="icon-wrap"><i class="fa  fa-5x fa-signal"></i></div>
	<h3><?php echo esc_html( __( 'Improvement', 'edulite' )); ?></h3>
	<p><?php echo esc_html( __('We love our theme and customers. We are committed to improve and add new features to Theme!', 'edulite' )); ?></p>
</div>
<div class="one-third column">
	<div class="icon-wrap"><i class="fa  fa-5x fa-slideshare"></i></div>
	<h3><?php echo esc_html( __( 'Custom Widgets', 'edulite' )); ?></h3>
	<p><?php echo esc_html( __('You can display custom widgets in sidebar as well as footer area. ', 'edulite' )); ?></p>
</div>


				</div>
			</div><?php   
		} ?>  

       <!-- Free VS PRO tab -->
        <?php if ( $tab == 'free_vs_pro' ) { ?>
            <div class="free-vs-pro-tab info-tab-content">
	            <div id="free_pro">
	                <table class="free-pro-table">
		                <thead>
			                <tr>
			                    <th></th>  
			                    <th><?php echo esc_html($theme_data->Name); ?> Lite</th>
			                    <th><?php echo esc_html($theme_data->Name); ?> PRO</th>
			                </tr>
		                </thead>
		                <tbody>
		                    <tr>
		                        <td><h3><?php _e('Responsive Design', 'edulite'); ?></h3></td>
		                        <td class="only-lite"><span class="dashicons-before dashicons-yes"></span></td>
		                        <td class="only-lite"><span class="dashicons-before dashicons-yes"></span></td>
		                    </tr>
		                    <tr>
		                        <td><h3><?php _e('Support', 'edulite'); ?></h3></td>
		                        <td class="only-lite"><span class="dashicons-before dashicons-yes"></span></td>
		                        <td class="only-lite"><span class="dashicons-before dashicons-yes"></span></td>
		                    </tr>		                    
		                    <tr>
		                        <td><h3><?php _e('Custom Logo Option', 'edulite'); ?></h3></td>
		                        <td class="only-lite"><span class="dashicons-before dashicons-yes"></span></td>
		                        <td class="only-lite"><span class="dashicons-before dashicons-yes"></span></td>
		                    </tr>
		                    <tr>
		                         <td><h3><?php _e('Social Links', 'edulite'); ?></h3></td>
		                         <td class="only-lite"><span class="dashicons-before dashicons-yes"></span></td>
		                         <td class="only-lite"><span class="dashicons-before dashicons-yes"></span></td>
		                    </tr>
		                    <tr>
		                    	 <td><h3><?php _e('Unlimited color option', 'edulite'); ?></h3></td>
		                    	 <td class="only-pro"><span class="dashicons-before dashicons-no-alt"></span></td>
		                    	 <td class="only-lite"><span class="dashicons-before dashicons-yes"></span></td>
		                    </tr>
		                    <tr>
		                    	 <td><h3><?php _e('3 Home page', 'edulite'); ?></h3></td>
		                    	 <td class="only-pro"><span class="dashicons-before dashicons-no-alt"></span></td>
		                    	 <td class="only-lite"><span class="dashicons-before dashicons-yes"></span></td>
		                    </tr>
							 <tr>
		                    	 <td><h3><?php _e('Header Presets', 'edulite'); ?></h3></td>
		                    	 <td class="only-pro"><?php _e('1', 'edulite'); ?></td>
		                    	 <td class="only-lite"><?php _e('4', 'edulite'); ?></td>
		                    </tr>	
		                     <tr>
		                    	 <td><h3><?php _e('Pre Defined Page Templates', 'edulite');?></h3></td>
		                    	 <td class="only-pro"><span class="dashicons-before dashicons-no-alt"></span></td>
		                    	 <td class="only-lite"><span class="dashicons-before dashicons-yes"></span></td>
		                    </tr>
		                    <tr>
		                    	<td><h3><?php _e('4 Portfolio Presets', 'edulite');?></h3></td>
		                    	<td class="only-pro"><span class="dashicons-before dashicons-no-alt"></span></td>
		                    	<td class="only-lite"><span class="dashicons-before dashicons-yes"></span></td>
		                    </tr>
		                    <tr>
		                    	<td><h3><?php _e('Team With Detail Page', 'edulite');?></h3></td>
		                    	<td class="only-pro"><span class="dashicons-before dashicons-no-alt"></span></td>
		                    	<td class="only-lite"><span class="dashicons-before dashicons-yes"></span></td>
		                    </tr>
		                    <tr>
		                    	<td><h3><?php _e('Redux Theme Option Panel', 'edulite');?></h3></td>
		                    	<td class="only-pro"><span class="dashicons-before dashicons-no-alt"></span></td>
		                    	<td class="only-lite"><span class="dashicons-before dashicons-yes"></span></td>
		                    </tr> 
							 
							<tr>
		                    	<td><h3><?php _e('Sticky Header Option', 'edulite');?></h3></td>
		                    	<td class="only-pro"><span class="dashicons-before dashicons-no-alt"></span></td>
		                    	<td class="only-lite"><span class="dashicons-before dashicons-yes"></span></td>
		                    </tr>
							<tr>
		                    	<td><h3><?php _e('Contact Form 7', 'edulite');?></h3></td>
		                    	<td class="only-pro"><span class="dashicons-before dashicons-no-alt"></span></td>
		                    	<td class="only-lite"><span class="dashicons-before dashicons-yes"></span></td>
		                    </tr>
							<tr>
		                    	<td><h3><?php _e('15+ Shortcodes', 'edulite');?></h3></td>
		                    	<td class="only-pro"><span class="dashicons-before dashicons-no-alt"></span></td>
		                    	<td class="only-lite"><span class="dashicons-before dashicons-yes"></span></td>
		                    </tr>
							<tr>
		                    	<td><h3><?php _e('Google Fonts', 'edulite');?></h3></td>
		                    	<td class="only-pro"><span class="dashicons-before dashicons-no-alt"></span></td>
		                    	<td class="only-lite"><span class="dashicons-before dashicons-yes"></span></td>
		                    </tr>
							 
		                     <tr>
		                    	<td><h3><?php _e('Multiple Service Layouts', 'edulite');?></h3></td>
		                    	<td class="only-pro"><span class="dashicons-before dashicons-no-alt"></span></td>
		                    	<td class="only-lite"><span class="dashicons-before dashicons-yes"></span></td>
		                    </tr>
							 <tr>
		                    	<td><h3><?php _e('Team Page', 'edulite');?></h3></td>
		                    	<td class="only-pro"><span class="dashicons-before dashicons-no-alt"></span></td>
		                    	<td class="only-lite"><span class="dashicons-before dashicons-yes"></span></td>
		                    </tr>
		                     <tr>
		                    	<td><h3><?php _e('Multiple Blog Layouts', 'edulite');?></h3></td>
		                    	<td class="only-pro"><span class="dashicons-before dashicons-no-alt"></span></td>
		                    	<td class="only-lite"><span class="dashicons-before dashicons-yes"></span></td>
		                    </tr>
		                     <tr>
		                    	<td><h3><?php _e('Page Animation', 'edulite');?></h3></td>
		                    	<td class="only-pro"><span class="dashicons-before dashicons-no-alt"></span></td>
		                    	<td class="only-lite"><span class="dashicons-before dashicons-yes"></span></td>
		                    </tr>
		                     <tr>
		                    	<td><h3><?php _e('Premium Priority Support', 'edulite');?></h3></td>
		                    	<td class="only-pro"><span class="dashicons-before dashicons-no-alt"></span></td>
		                    	<td class="only-lite"><span class="dashicons-before dashicons-yes"></span></td>
		                    </tr>
		                    
		                    <tr class="ti-about-page-text-center">
		                        <td><a href="<?php echo esc_url($pro_theme_demo); ?>" target="_blank" class="button button-primary button-hero"><?php printf( __( '%1s Pro Demo', 'edulite'), $theme_data->Name ); ?></a></td>
		                    	<td colspan="2"><a href="<?php echo esc_url($pro_theme_url); ?>" target="_blank" class="button button-primary button-hero"><?php printf( __( 'Upgrade To %1s Pro', 'edulite'), $theme_data->Name ); ?></a></td>
		                    </tr>
		                </tbody>
	                </table>			    
				</div>
			</div><?php 
		} ?>

    </div><?php
} ?>
