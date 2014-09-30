<?php 

  /*
    Plugin Name: Prevent Update Table Change
    Plugin URI: 
    Description: Prevent tables from being altered during WP update
    Version: 0.0.1
    Author: John A. Huebner II
    Author URI: https://github.com/Hube2
    License: GPL v2 or later
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
					$query = preg_replace('/option_name\s+varchar\s*\([^\)]*\)/is', 'option_name varchar(255)', $query);
					$queries[$key] = $query;
				}
			}
			return $queries;
		} // end public function dbdelta_queries
		
	} // end class prevent_update_table_change
	
	
?>