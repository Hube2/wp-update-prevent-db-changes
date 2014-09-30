WP Update Prevent DB Changes
============================

Prevent WP from reseting db schema changes

Have you had to modify one of the standard DB columns?

Like for example changing option_name from varchar(64) to varchar(255) so that you can use a plugin that may
long option_name values?

Then updated WP to a new version only to find that your site has crahsed and burned?

Add this file to the mu-plugins folder on your site and modify the dbdelta_queries method to change the default
WP DB schema so that your changes are not reset to the WP defaults.

The current method includes the alteration I mentioned above for the option_name column.
