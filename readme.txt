=== Feed Widgets ===
Contributors: Denis-de-Bernardy, Mike_Koepke
Donate link: https://www.semiologic.com/donate/
Tags: semiologic
Requires at least: 3.1
Tested up to: 4.0
Stable tag: trunk


Lets you insert any widget in RSS feeds.


== Description ==

> *This plugin has been retired.  No further development will occur on it.*

The Feed Widgets plugin for WordPress lets you insert any widget after each post in your RSS feed.

To make the best of this plugin, be sure to configure the full text feed setting, under Settings / Reading.

You may also find its child project, the Inline Widgets plugin, of interest for non-feeds.


= Placing a widget after your post in your feeds =

It's short and simple:

1. Browse Appearance / Widgets
2. Open the Feed Widgets panel ("sidebar", in the WP jargon)
3. Place whichever widgets you want in that panel

Widgets in this panel will be appended to each post. Note that not all widgets work here: anything javascript based -- ads in particular -- are stripped from feed readers. To insert ads in your feed, use FeedBurner or an equivalent service.

Common uses for this plugin include:

- An Author Image widget, so as to add some "About this author" information after each post automatically
- A Related Widget, so as to drive readers to related content on your site
- A Newsletter Widget (some feed readers strip forms too, but most don't)
- An HTML-based (rather than js-based) ad that promotes a product on your site (or someone else's site)


= Help Me! =

The [Semiologic Support Page](https://www.semiologic.com/support/) is the best place to report issues.


== Installation ==

1. Upload the plugin folder to the `/wp-content/plugins/` directory
2. Activate the plugin through the 'Plugins' menu in WordPress


== Change Log ==

= 2.3.2 =

- Add code to turn deactivate the plugin

= 2.3.1 =

- Development has ceased on this plugin.  Updated source and readme accordingly

= 2.3 =

- WP 4.0 compat

= 2.2 =

- Code refactoring
- WP 3.9 compat

= 2.1.1 =

- WP 3.8 compat

= 2.1 =

- WP 3.6 compat
- PHP 5.4 compat

= 2.0.1 =

- WP 3.5 compat
- Fix PHPDoc errors

= 2.0 =

- Complete rewrite
- WP_Widget class
- Localization
- Code enhancements and optimizations
