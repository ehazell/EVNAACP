<?php
/*
 * Class Name: density_wp_bootstrap_navwalker_preset
 * Plugin Name: WP Bootstrap Navwalker
 * Plugin URI:  https://github.com/wp-bootstrap/wp-bootstrap-navwalker
 * Description: A custom WordPress nav walker class to implement the Bootstrap 4 navigation style in a custom theme using the WordPress built in menu manager.
 * Author: Edward McIntyre - @twittem, WP Bootstrap, William Patton - @pattonwebz
 * Version: 4.1.0
 * Author URI: https://github.com/wp-bootstrap
 * GitHub Plugin URI: https://github.com/wp-bootstrap/wp-bootstrap-navwalker
 * GitHub Branch: master
 * License: GPL-3.0+
 * License URI: http://www.gnu.org/licenses/gpl-3.0.txt
*/

/* Check if Class Exists. */
if ( ! class_exists( 'density_wp_bootstrap_navwalker_preset' ) ) {
	/**
	 * density_wp_bootstrap_navwalker_preset class.
	 *
	 * @extends Walker_Nav_Menu
	 */
	class density_wp_bootstrap_navwalker_preset extends Walker_Nav_Menu {

		/**
		 * Starts the list before the elements are added.
		 *
		 * @since WP 3.0.0
		 *
		 * @see Walker_Nav_Menu::start_lvl()
		 *
		 * @param string   $output Used to append additional content (passed by reference).
		 * @param int      $depth  Depth of menu item. Used for padding.
		 * @param stdClass $args   An object of wp_nav_menu() arguments.
		 */
		public $megaMenuID;
	    public $count;

	    public function __construct()
	    {
	        $this->megaMenuID = 0;
	        $this->count = 0;
	    }
	    public function start_lvl(&$output, $depth = 0, $args = array())
	    {
	        $indent = str_repeat("\t", $depth);
	        
	        if ($this->megaMenuID != 0) {

	            $output .= "<div class=\"menu-full dropdown container\">
	                            <div class=\"col-sm-3\">
	                                <ul class=\"dropdown-items\">\n";
	        }
	        else {
	            $submenu = ($depth == 1) ? 'left-indent' : 'left-indent';
	            $output .= "\n$indent<ul class=\"dropdown  dropdown-items $submenu depth_$depth\" >\n";
	        }
	    }
	    public function end_lvl(&$output, $depth = 0, $args = array())
	    {
	        if ($this->megaMenuID != 0) {
	            $output .= "</ul></div></div>";
	        }
	        else {
	            $output .= "</ul>";
	        }
	    }
	    public function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0)
	    {
	        $indent = ($depth) ? str_repeat("\t", $depth) : '';
	        $li_attributes = '';
	        $class_names = $value = '';
	        $classes = empty($item->classes) ? array() : (array) $item->classes;

	        if ($this->megaMenuID != 0 && $this->megaMenuID === intval($item->menu_item_parent)) {
	      
	            $column_divider = array_search('column-divider', $classes);
	            if ($column_divider !== false) {
	                $output .= "</ul></div><div class=\"col-sm-3\"><ul class=\"dropdown-items\">\n";
	            }
	        } else {
	            $this->megaMenuID = 0;
	            
	        }

	        // add support for menu item title
	        if (strlen($item->attr_title) > 2) {
	            $output .= '<h4 class="title-menu"></h4>';
	        }

	        // managing divider: add divider class to an element to get a divider before it.
	        $divider_class_position = array_search('divider', $classes);
	        if ($divider_class_position !== false) {
	            $output .= "<li class=\"divider\"></li>\n";
	            unset($classes[$divider_class_position]);
	        }
	        if (array_search('menu-justify', $classes) !== false) {
	            $this->megaMenuID = $item->ID;
	        }
	        
	        $classes[] = ($args->has_children) ? 'has-child' : '';
	        $classes[] = ($item->current || $item->current_item_ancestor) ? 'active' : '';
	        $classes[] = 'menu-item-'.$item->ID;
	        if ($depth && $args->has_children) {
	            $classes[] = 'has-child';
	        }
	        $class_names = implode(' ', apply_filters('nav_menu_css_class', array_filter($classes), $item, $args));
	        $class_names = ' class="'.esc_attr($class_names).'"';
	        $id = apply_filters('nav_menu_item_id', 'menu-item-'.$item->ID, $item, $args);
	        $id = strlen($id) ? ' id="'.esc_attr($id).'"' : '';
	        $output .= $indent.'<li'.$id.$value.$class_names.$li_attributes.'>';
	        $attributes = !empty($item->attr_title) ? ' title="'.esc_attr($item->attr_title).'"' : '';
	        $attributes .= !empty($item->target) ? ' target="'.esc_attr($item->target).'"' : '';
	        $attributes .= !empty($item->xfn) ? ' rel="'.esc_attr($item->xfn).'"' : '';
	        $attributes .= !empty($item->url) ? ' href="'.esc_attr($item->url).'"' : '';
	        $item_output = $args->before;
	        $item_output .= '<a'.$attributes.'>';
	        // Check if item has featured image
	        $has_featured_image = array_search('featured-image', $classes);
	        if ($has_featured_image !== false) {
	            $postID = url_to_postid( $item->url );
	            $item_output .= "<img alt=\"" . esc_attr($item->attr_title) . "\" src=\"" . get_the_post_thumbnail_url( $postID ) . "\"/>";
	        }
	        $item_output .= $args->link_before.apply_filters('the_title', $item->title, $item->ID).$args->link_after;
	            
	            // add support for menu item descriptions
	            if (strlen($item->description) > 2) {
	                $item_output .= '</a> <span class="sub">'.$item->description.'</span>';
	            }
	        $item_output .= (($depth == 0 || 1) && $args->has_children) ? '</a>' : '</a>';
	        $item_output .= $args->after;
	        $output .= apply_filters('walker_nav_menu_start_el', $item_output, $item, $depth, $args);
	    }

	    public function display_element($element, &$children_elements, $max_depth, $depth, $args, &$output)
	    {
	        if (!$element) {
	            return;
	        }

	        $id_field = $this->db_fields['id'];

	        //display this element
	        if (is_array($args[0])) {
	            $args[0]['has_children'] = !empty($children_elements[$element->$id_field]);
	        } elseif (is_object($args[0])) {
	            $args[0]->has_children = !empty($children_elements[$element->$id_field]);
	        }

	        $cb_args = array_merge(array(&$output, $element, $depth), $args);
	        call_user_func_array(array($this, 'start_el'), $cb_args);

	        $id = $element->$id_field;

	        // descend only when the depth is right and there are childrens for this element
	        if (($max_depth == 0 || $max_depth > $depth + 1) && isset($children_elements[$id])) {
	            foreach ($children_elements[ $id ] as $child) {
	                if (!isset($newlevel)) {
	                    $newlevel = true;
	              //start the child delimiter
	              $cb_args = array_merge(array(&$output, $depth), $args);
	                    call_user_func_array(array($this, 'start_lvl'), $cb_args);
	                }
	                $this->display_element($child, $children_elements, $max_depth, $depth + 1, $args, $output);
	            }
	            unset($children_elements[ $id ]);
	        }

	        if (isset($newlevel) && $newlevel) {
	            //end the child delimiter
	          $cb_args = array_merge(array(&$output, $depth), $args);
	            call_user_func_array(array($this, 'end_lvl'), $cb_args);
	        }

	        //end this element
	        $cb_args = array_merge(array(&$output, $element, $depth), $args);
	        call_user_func_array(array($this, 'end_el'), $cb_args);
	    }
	}
}