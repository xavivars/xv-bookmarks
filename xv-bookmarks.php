<?php
/*
Plugin Name: XV Bookmarks
Plugin URI: http://xavi.ivars.me/codi/xv-bookmarks/
Description: Convert your bookmarks into a widget
Version: 0.1
Author: Xavi Ivars xavi.ivars@gmail.com
Author URI: http://xavi.ivars.me
License: GPLv3
GitHub Plugin URI: xavivars/xv-bookmarks
*/




class XV_Bookmarks_Widget extends WP_Widget {
        
    function __construct() {
        parent::__construct(false, $name = 'Blogs amics');
    }

    function xv_bookmarks() {
        $bookmarks = get_bookmarks('orderby=name&show_description=1');
        foreach ($bookmarks as $bookmark) {
            echo '<li><a href="'.$bookmark->link_url.'">';
            if (substr($bookmark->link_image,0,4) == 'http') {
                echo '<span class="imgfavicon"><img src="'.$bookmark->link_image.'" alt="'.$bookmark->link_name.'" /></span>';
            }
            echo $bookmark->link_name.'</a><div class="antifloat"></div>';
            echo '</li>';
        }
    }

    function widget($args, $instance) {             
        extract($args);
        echo $before_widget, $before_title, 'Blogs amics', $after_title , '<ul>';

        $this->xv_bookmarks();

        echo '</ul>', $after_widget;
    }
}

register_widget('XV_Bookmarks_Widget');

?>
