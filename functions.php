function add_menu_parent_class( $items ) {

	$parents = array();
	
	foreach ( $items as $item ) {
	
		if ( $item->menu_item_parent && $item->menu_item_parent > 0 ) {
			$parents[] = $item->menu_item_parent;
		}
	}	// loop through menu items and check if they have at least a single parent items; then add those to an array $parents

 		foreach ( $items as $item ) {
		
  			if ( in_array( $item->ID, $parents ) ) {
   				$item->classes[] = 'has-children';
  			}
 	}	// loop through $parents array and add a class (used for css/javascript manipulation) to each individual item
	
	return $items;
}
add_filter( 'wp_nav_menu_objects', 'add_menu_parent_class' );
