=== WC Algolia Places ===
Contributors: bryceadams, woothemes
Tags: algolia, places, woocommerce, autocomplete, address autocomplete
Requires at least: 3.9
Tested up to: 4.5.2
Stable tag: trunk
License: GPL
License URI: https://www.gnu.org/licenses/gpl-3.0.en.html

Use Algolia's Places API to autocomplete customer addresses on WooCommerce checkout and on the My Account pages. Instant setup!

== Description ==
WC Algolia Places uses [Algolia's Places API](https://community.algolia.com/places/) (which uses [OpenStreetMap](https://www.openstreetmap.org) and [GeoNames](http://www.geonames.org/)) to add autocomplete to all address fields in WooCommerce. This includes the checkout and the My Account page.

There's no setup involved - just install & activate the plugin to add autocomplete!

You should be able to do 1000/requests a day for free. For more info, see [rate limits](https://community.algolia.com/places/documentation.html#rate-limits).

**This is still a work in progress and seems to work best for US addresses.**

You can contribute / report bugs on [GitHub](https://github.com/Automattic/wc-algolia-places).

### License
This plugin, like WordPress, is GPL.
Algolia Places itself is MIT licensed.

== Installation ==
Plug & play! Install, activate and you're in business :)

== Frequently Asked Questions ==
Can I load a local copy of the Algolia places JS?

Yes! By default it loads the remote CDN copy but you can load it locally by adding some code like to your functions.php:

`
add_filter( 'wc_algolia_places_js_remote', '__return_false' );
`

== Screenshots ==
1. The Algolia Places live search
2. All address fields filled in after selecting an address

== Changelog ==
0.1.0: First release