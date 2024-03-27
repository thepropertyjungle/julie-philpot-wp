# WP TPJ Child Theme v1.0.7

A starter theme for development of WordPress websites using the Blade template engine.

This child theme is based off of the Elementor Hello theme. [Elementor Hello](https://elementor.com/products/hello-theme/). We've chosen this because it contains minimal styles and is a good base to build Elementor sites off of.

The Blade templates contained will use basic Bootstrap classes in order to make it functional and visually easier to work with.

## Basic Shortcodes

For more comprehensive documentation, please visit the [TPJ Wiki](https://tpjwiki.wpengine.com).

### Generic Shortcode Example:

[blade_dynamic_shortcode view_name="your-blade-template"]

### Search Facility Example:

[blade_dynamic_shortcode view_name="your-search-blade-template"]

### Featured Properties Example:

[blade_featured_properties view_name="partials/featured-properties" instruction_type="Sale" max_featured_results="6"]

### List Property Search:

Create a page within the WordPress admin. In this pages content section, add the following shortcode.

[blade_list_search results_per_page="9"]

The file used to display search results is page-list-search.blade.php

You can also create your own Blade templates and pass the file name into the search shortcode.

[blade_list_search results_per_page="9" instruction_type="Sale" showstc="on" view_name="some-other-blade-template"]

The above allows you to create your own template for displaying search custom results. It gives you the ability to create custom searches for Latest Properties, or properties from X county. You can use any search query supported by the general property search.

### Grid Property Search:

Create a page within the WordPress admin, In this pages content section, add the following shortcode.

[blade_grid_search results_per_page="9"]

### Map Property Search:

Create a page within the WordPress admin, In this pages content section, add the following shortcode.

[blade_dynamic_shortcode view_name="page-map-search"]

### Load More Infinite Search Results

If you want to display search results in an infinite list that displays more when scrolling, use the load-more component.

[blade_dynamic_shortcode view_name="components/load-more"]

### Cookies Policy:

[blade_dynamic_shortcode view_name="partials/cookies-policy"]

### Privacy Policy:

[blade_dynamic_shortcode view_name="partials/privacy-policy"]

### Terms of Use:

[blade_dynamic_shortcode view_name="partials/terms-of-use"]

### Display Negotiators

[blade_negotiators]

### Rental Yield Calculator

[blade_dynamic_shortcode view_name="components/rental-yield-calculator-sliders"]
