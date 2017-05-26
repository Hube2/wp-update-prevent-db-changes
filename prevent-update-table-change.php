<?php 

  /*
    Plugin Name: Prevent Update Table Change
    Plugin URI: 
    Description: Prevent tables from being altered during WP update
    Version: 0.0.1
    Author: John A. Huebner II
    Author URI: https://github.com/Hube2
    License: GPL v2 or later
    
    For this plugin to work it must be located in your Must Use Plugins folder
    usually /wp-content/mu-plugins/
  */
	
	new prevent_update_table_change();
	
	class prevent_update_table_change {
		
		public function __construct() {
			add_filter('dbdelta_queries', array($this, 'dbdelta_queries'));
		} // end public function __construct
		
		public function dbdelta_queries($queries) {
			//echo '<pre>'; print_r($queries); die;
			if (is_array($queries) && count($queries)) {
				foreach ($queries as $key => $query) {
					$query = preg_replace('/meta_key\s+varchar\s*\(255\)/is', 'meta_key varchar(191)', $query);
					$queries[$key] = $query;
				}
			}
			return $queries;
		} // end public function dbdelta_queries
		
	} // end class prevent_update_table_change
	
	
?>
