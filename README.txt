=== Find Your Reps ===
Contributors:  kathleenfmalone, homergz
Tags: find state representatives, find state legislators, representative, legislator, state legislature, legislature, vote, politics, government
Requires at least: 3.5.2
Tested up to: 4.5
Stable tag: 1.2
License: GPLv2 or later

Find your state representatives by entering a street address.

== Description ==

Find Your Reps uses Google Maps Geocoding API to take a street address and convert it to latitude and longtitude. The latitude and
longtitude values are sent to the openstates.org API and the user's state representatives name, photo, website, email, district office
address and capitol office address is returned to them.

NOTE: The plugin requires an activation key from the Sunlight Foundation. The key can be acquired by registering at http://sunlightfoundation.com/api/accounts/register/.

== Installation ==

NOTE: The plugin requires an activation key from the Sunlight Foundation. The key can be acquired by registering at http://sunlightfoundation.com/api/accounts/register/.

= Manual Installation =

1. After downloading the plugin, unzip the plugin.
2. Upload the `find-your-reps` directory into your `wp-content/plugins` directory so that the structure is `wp-content/plugins/find-your-reps/....`
3. Activate the plugin in your WordPress admin.

= Better Installation =

1. Go to Plugins > Add New in your WordPress admin and search for 'Find Your Reps'.
2. Click Install.
3. Click Activate.

= Configuration =

1. Configure the plugin via the Find Your Reps link that appears in the Settings Menu section of the left sidebar in the backend.
2. To change the default styling copy fyr.css from plugins/find-your-reps/css to your theme directory.

== Screenshots ==

1. Find Your Reps - Search Form
2. Find Your Reps - Search Results

== Changelog ==

= 1.2 =
*Release Date - January 6, 2016*

* Added: Inline styling moved to fyr.css. Copy fyr.css from plugins/find-your-reps/css to your theme directory to modify.
* Added: Scripts and styles only load on posts/pages that contain the shortcode.
* Added: Misc additions in preparation for upcoming 2.0 major version release.
* Fixed: Removed deprecated code.

= 1.1 =
*Release Date - June 17, 2015*

* Fixed: Headers already sent warning notice.
* Fixed: Typos.
* Updated: Options page code.

= 1.0 =
*Release Date - January 25, 2014*

* Initial release.