<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Academic_Hub
 */

if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
}
?>

<aside id="secondary" class="widget-area">
	<?php academic_hub_sidebars_before(); ?>

	<?php dynamic_sidebar( 'sidebar-1' ); ?>
	
	<?php academic_hub_sidebars_after(); ?>
</aside><!-- #secondary -->
