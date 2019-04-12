# Wordpress Like Button Plugin

![](https://img.shields.io/badge/V%201.0.0-BETA-blue.svg)  [![](https://img.shields.io/badge/code%20style-wordpress-9cf.svg)](https://codex.wordpress.org/WordPress_Coding_Standards)

Twitter heart button for Wordpress articles with Vue.js

![](https://raw.githubusercontent.com/frkyldrm/Wordpress-like-button-plugin-with-Vue.js/master/faruklikepul_button.gif)
  
# Installation 

  - Upload `faruklikepul` to the `/wp-content/plugins/` directory.
  - Activate the plugin through the 'Plugins' menu in WordPress.

# How to use 
When the plugin is active, it will create a list page to list the tags and a widget to show the most liked posts. Also an likes button below the articles.

   - Tag listing is created with page `Faruk Like Pul Tag Lists` name. You can   change title but do not change the page url `faruklikepul-tags`. This page sorts the labels according to their usage.
   
   - If you want to change the amount of likes, you can edit the `❤️ Post Like ` section on the post editing page.
   
   - Witget shows the most liked 10 articles. Widget Name: `❤️  Top Liked Posts`


# Includes

   - `faruklikepul/includes` is where functionality shared between the admin area and the public-facing parts of the site reside
  
   - `faruklikepul/admin` is for all admin-specific functionality
    
   - `faruklikepul/public` is for all public-facing functionality
    
[![](https://img.shields.io/badge/framework-Boilerplate-green.svg)](https://github.com/devinvinson/WordPress-Plugin-Boilerplate/)


# Tech

* [Vue.js] - The Progressive JavaScript Framework
* [DataTables.js] - jQuery Javascript library for HTML table
* [jQuery] - JavaScript Library


License
----

GNU GENERAL PUBLIC LICENSE

[Vue.js]: <https://vuejs.org/>
[DataTables.js]: <https://datatables.net/>
[jQuery]: <http://jquery.com>
