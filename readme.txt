=== Reftagger Shortcode ===
Contributors: kcharity
Donate link: 
Tags: reftagger, bible, verse, verses, reference, scripture, tagging, tagger, libronix, logos, shortcode
Requires at least: 2.3
Tested up to: 4.3.1
Stable tag: 1.1
License: GPLv2 or later

Reftagger Shortcode creates a button in the TinyMCE visual editor in Wordpress allowing you to easily add semantic Bible markup. 

== Description ==


Reftagger Shortcode creates a button in the TinyMCE visual editor in Wordpress allowing you to easily add semantic Bible markup. 

The Reftagger plug-in is a great plug-in except when it comes to finding verses that are by themselves in text. 

Often when creating a sermon page for my church's website I would have something like:

* 2 Corinthians 5:1-8
* Our Destination – What we know (v.1)

[Reftagger](http://reftagger.com) plug-in doesn’t know that “v.1” was supposed to be verse 1 from 2 Corinthians 5:1-8 that was mentioned earlier in the text. 

That's where this shortcode comes in. Simply highlight the "v.1" text in the visual editor and click the reftagger button. 

The shortcode is then placed in the main edit window as [reftagger title=""]v.1[/reftagger] and all you need to do is add "2 Corinthians 5:1" to the title attribute. The rest is handled by the plug-in, it will render the code in semantic Bible markup on the front end. 

If you have the [Reftagger](http://reftagger.com) Bible reference plug-in active it identifies references to the Bible verses and turns the references into links to the verse on Biblia.com. 

For more information on the Reftagger Bible reference plug-in, visit http://reftagger.com.

== Installation ==

Easy Install

1. In your WordPress admin, go to 'Plugins' > 'Add New'.
1. Search for 'Reftagger Shortcode'.
1. Click 'Install', then 'Install Now', and then 'Activate Plugin'.

Manual Install

1. Download the plugin.
1. Unzip the plugin to your WordPress plugins directory `(/wp-content/plugins/)`.
1. Activate 'Reftagger Shortcode' through the 'Plugins' page in WordPress.

== Usage ==

* The plugin will begin working immediately when you activate it on the 'Plugins' page. 

* You will get a notification if you do not have the "Reftagger" plugin active. You can dismiss the notification if you wish.

* Go to your post or page edit screen and you will see a new icon in the visual editor. 

* Simply click the icon to place the shortcode in your main edit window at the location of your cursor. 

* You can also highlight text in the edit window and click the button to have the shortcode wrap around your highlighted text.

== Frequently Asked Questions ==
None

== Changelog == 

= 1.1 09/15/2015 =
Removed function reftagger_shortcode_style_load

= 1.0 05/18/2014 =
* Initial release

== Upgrade Notice == 
None

== Screenshots ==

1. The Reftagger Shortcode adds a new icon to your Visual Editor.
2. Clicking the icon just ads the blank short code, but you can also highlight existing copy.
3. The Reftagger Shortcode will wrap around your selection.
4. All that is left to do is to put in the title attribute.