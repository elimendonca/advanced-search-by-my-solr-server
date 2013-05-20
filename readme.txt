<<<<<<< HEAD
=== Advanced Search by My Solr Server ===
Contributors: www.mysolrserver.com
Author URI: http://www.mysolrserver.com
Plugin URI: http://wordpress.org/extend/plugins/advanced-search-by-my-solr-server/
Tags: solr, search, search results, search integration, custom search, better search, search replacement, category search, comment search, tag search, page search, post search, search highlight, seo
Requires at least: 3.0.0
Tested up to: 3.4.2
Stable tag: 2.0.4


A WordPress plugin that replaces the default WordPress search with a lot of benefits


== Description ==

In order to make Advanced Search by My Solr Server plugin work, you need a Solr server installed and configured with the provided schema.xml file. 
If you don't have the time or resources to install, configure and maintain a Solr server, My Solr Server do it for you ! 


= What is www.mysolrserver.com ? =

My Solr Server is a Software as a Service Apache Solr enterprise search platform (http://www.mysolrserver.com). My Solr Server provides hosted instances of the Apache Solr server. 
In a couple of minutes, you can create your own Solr server instance, manage it in our manager and integrate it with your favourite CMS by using its standard Solr plugin or module. Wordpress is one of the supported CMS.


= What Advanced Search by My Solr Server plugin does ? =

Advanced Search by My Solr Server plugin replaces the default WordPress search. Features and benefits include:

*   Index pages, posts and custom post types
*   Enable search and faceting on fields such as tags, categories, author, page type, custom fields and custom taxonomies
*   Add special template tags so you can create your own custom result pages to match your theme.
*   Search term suggestions (AutoComplete)
*   Provides better search results based on relevancy
*   Create custom summaries with the search terms highlighted
*   Completely integrated into default WordPress theme and search widget.
*   Configuration options allow you to select pages to ignore

=======
=== Browse Content by My Solr Server ===
Contributors: www.mysolrserver.com
Author URI: http://www.mysolrserver.com
Plugin URI: http://wordpress.org/extend/plugins/browse-content-by-my-solr-server/
Donate link: 
Tags: custom fields, browse content, search
Requires at least: 3.0.0
Tested up to: 3.3.1
Stable tag: 2.0.4

A WordPress widget that browses content by standard WordPress attributes (categories, tags and authors) and custom fields.

== Description ==

Browse Content by My Solr Server widget allows to navigate through WordPress content by standard WordPress attributes (categories, tags and authors) and custom fields.

You can see a demo at http://www.eolya.fr/blog/ 
>>>>>>> fff9c6adc0826763c83358f52a4e5afe5c1b3889

== Installation ==

= Prerequisite = 

<<<<<<< HEAD
A Solr server installed and configured with the provided schema.xml file. This file is configured for English content. Update this file according to your content language.

In order to have spell checking work, in your solrconfig.xml file, check :

1. the spellchecker component have to be correctly configured :

    &lt;lst name="spellchecker"&gt;
      &lt;str name="name">default&lt;/str&gt;
      &lt;str name="field">spell&lt;/str&gt;
      &lt;str name="spellcheckIndexDir"&gt;spellchecker&lt;/str&gt;
      &lt;str name="buildOnOptimize"&gt;true&lt;/str&gt;
    &lt;/lst&gt;
   
2. the request handler includes the spellchecker component

     &lt;arr name="last-components"&gt;
       &lt;str&gt;spellcheck&lt;/str&gt;
     &lt;/arr&gt;  
    
If you are using "Solr for Wordpress" Wordpress plugin, deactivate and uninstall it (in previous version, "Solr for Wordpress" Wordpress plugin was a pre-requisite).


= Installation =

1. Upload the `advanced-search-by-my-solr-server` folder to the `/wp-content/plugins/` directory
2. Activate the plugin through the 'Plugins' menu in WordPress
3. Go in Advanced Search by My Solr Server settings page ("Advanced Search by My Solr Server"), configure the plugin and Load your blog content in Solr ("Load Content" button)

= Customize the plugin display =

The plugin uses the template files located in the `template` directory. You can implement your own template files by copying theses files with a new name terminating by "_custom" (for instance, the file mss_search.php is copied as mss_search_custom.php). These new files can be located in the plugin's template directory or in your theme's main directory.
=======
Install and activate `Advanced Search by My Solr Server plugin 2.0.0 and greater` (http://wordpress.org/extend/plugins/advanced-search-by-my-solr-server/).
Index your blog content into Solr (see Solr hosting provider here : http://www.mysolrserver.com/) 

= Installation =

1. Upload the `browse-content-by-my-solr-server` folder to the `/wp-content/plugins/` directory
2. Activate the plugin through the `Plugins` menu in WordPress
3. Drad & drop the widget in the sidebar
3. Edit the widget settings

= Configuration =

1. Provide a widget title
2. Provide the standard WordPress attributes (categories, tags and authors) and custom fields to be used in the widget
3. Select the template file from you theme to be used to show posts list. By default, the `search.php` template is used. You can chose to create a specific template. For exemple, with the default Wordpress themes, you can copy search.php to browse.php and remove the line that display the message "Search Results for:".
A browse.php sample file is provided in the sample directory.

= Customize the posts list =

As explained just before, you can create a dedicated template file in your theme based for example on search.php. This template is in charge to implement the WordPress loop.

&lt;?php if ( have_posts() ) : ?&gt;
...
&lt;?php while ( have_posts() ) : the_post(); ?&gt;
...
&lt;?php endwhile; ?&gt;

= Customize the widget display =

The widget uses the template files `template/mssbc_default.php` and `template/mssbc_default.css`.

You can implement your own template by copying theses two files as `mssbc_custom.php` and `mssbc_custom.css`. These two new files can be located in the widget's template directory or in your theme's main directory.
>>>>>>> fff9c6adc0826763c83358f52a4e5afe5c1b3889


== Frequently Asked Questions ==

<<<<<<< HEAD
= What version of WordPress does Advanced Search by My Solr Server plugin work with? =

Advanced Search by My Solr Server plugin works with WordPress 3.0.0 and greater.
=======
= What version of WordPress does Browse Content by My Solr Server plugin work with? =

Browse Content by My Solr Server plugin works with WordPress 3.0.0 and greater.
>>>>>>> fff9c6adc0826763c83358f52a4e5afe5c1b3889

= What version of Solr does Advanced Search by My Solr Server plugin work with? =

Advanced Search by My Solr Server plugin works with Solr 1.4.x and 3.x

<<<<<<< HEAD
= How to manage Custom Post type, custom taxonomies and custom fields? =

Advanced Search by My Solr Server pluginplugin was tested with:
=======
= How to manage Custom Post type, custom taxonomies and custom fields

Browse Content by My Solr Server plugin was tested with:
>>>>>>> fff9c6adc0826763c83358f52a4e5afe5c1b3889
* "Custom Post Type UI" plugin for Custom Post type and custom taxonomies management 
* "Custom Field Template" plugin for custom fields management
* WP-Types plugin for Custom Post type and custom taxonomies management and for custom fields management

<<<<<<< HEAD
== Screenshots ==

1. Configuration page


2. Configuration page (facets)

=======

== Screenshots ==

1. Widget in sidebar

2. Configuration Page
>>>>>>> fff9c6adc0826763c83358f52a4e5afe5c1b3889

== Changelog ==

= 2.0.4 =

<<<<<<< HEAD
* Search result display bug fix

= 2.0.3 =

* Bug fix jQuery conflict
* Tests with WP-Types plugin
* Include custom fields and custom taxonomies in searched data 
* SolrPhpClient upgrade
* Add proxy support

= 2.0.2 =

* Bug fix while checking Solr connection

= 2.0.1 =

* Update installation prerequisites in order to have spell checking work.

= 2.0.0 =

* Includes all indexing and searching features
* "Solr for Wordpress" plugin is not a pre-requisite anymore
* Add support for custom post types and custom taxonomies
* Settings page refactoring
* Bug fixing

= 1.0.2 =

* Bug fixing

= 1.0.1 =

* Bug fixing

= 1.0.0 =

* Initial version just for My Solr Server connection management.
* "Solr for Wordpress" plugin is a pre-requisite
=======
* SolrPhpClient upgrade

= 2.0.2 =

* Bug fixing
* Provide a browse.php sample file to be use in the theme
* Tests with WP-Types plugin 

= 2.0.1 =

* SolrPhpClient library dependency update

= 2.0.0 =

* Add support for custom post types and custom taxonomies

= 1.1.1 =

* Fixes issue when attribute values orcustom field values contain special characters like & 

= 1.1.0 =

* Works with both a static page as front page or last posts as front page (`Reading settings` of WordPress)

= 1.0.0 =

* Initial version 


>>>>>>> fff9c6adc0826763c83358f52a4e5afe5c1b3889

