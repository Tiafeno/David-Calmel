<?php
class Secondary_Walker extends Walker_Nav_Menu{
  // Tell Walker where to inherit it's parent and id values
    var $db_fields = array(
        'parent' => 'menu_item_parent', 
        'id'     => 'db_id' 
    );

    /**
     * At the start of each element, output a <li> and <a> tag structure.
     * 
     * Note: Menu objects include url and title properties, so we will use those.
     */
    function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
      $search = ['Â°'];
      $replace = ['°'];
      $id = (isset( $args->post_id )) ? (int)$args->post_id : false;
      $byID = $id ? ($id != $item->object_id) : false;
      if ( $byID ){
        $output .= sprintf( "\n<li><a href='%s'%s>%s</a></li>\n",
            $item->url,
            ( $item->object_id === get_the_ID() ) ? ' class="current"' : '',
            $item->title
        );
      }
        
    }
}