=== Car Loan Application and Calculator Plugin ===
Contributors: darrylcoder
Donate link: https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=5Q8WMBNRNH9HQ
Tags: car, car loan, loan application form, car loan calculator, car dealer, calculator, application form, form, loan
Requires at least: 3.3
Tested up to: 3.6.1
Stable tag: 1.1
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Adds a Car Loan Module to your website, let's you deploy a Car Loan Application form and Calculator and manage them beautifully on back-end.

== Description ==

This plugin was developed for a Car Dealer Website that needs a Car Loan application form and calculator on front-end and all data submitted can be managed at back-end including viewing applications, edit, delete and exporting CSV files. This is an AJAX powered plugin. My thoughts are the others may also need something with this functionality in their website so I guess that I might share this also to others.

This lets you deploy a Car Loan Application form and Calculator in front-end via shortcode and manage them beautifully on back-end, view, edit, delete, export CSV files (ajax powered).

FOR BUGS AND ERRORS:

I'll be glad to assist/help you please just email me @ engrdarrylfernandez@gmail.com

THIS IS ALSO IN GITHUB REPOSITORY if you want to contribute on development:
https://github.com/darryldecode/CLM

== Installation ==

1. Upload `Car_loan_module.zip` to the `/wp-content/plugins/` directory
1. Activate the plugin through the 'Plugins' menu in WordPress

-------------------------------------------------------
SETTINGS:

You can manage settings on the car loan application admin Page.

This includes:
-adding your car types
-provinces
-Emails (for notification)

-------------------------------------------------------
USAGE:

- Deploy the Car Loan Application form via shortcode:

[deploy_form]

OR

- Deploy the Car Loan Application on template:

<code><?php if( function_exists('clm_display_form') ) { clm_display_form(); } ?></code>



- Deploy the Loan Calculator via shortcode:

[deploy_calculator]

OR

- Deploy the Loan Calculator on template:

<code><?php if( function_exists('clm_display_calc') ) { clm_display_calc(); } ?></code>

== Frequently asked questions ==

I'll be glad to assist/help you please just email me @ engrdarrylfernandez@gmail.com

= A question that someone might have =

An answer to that question.

== Screenshots ==

1. Car Loan Manager Admin Page

== Changelog ==

-change behavior in backend when changing view (now uses hashtag url in indicating view to be served)<br>
-added Form Manager page in backend (it is still on development)



== Upgrade notice ==

Please make sure to set the "Clean Database on deactivation?" to "NO" in CLM settings before updating


== Arbitrary section 1 ==

This Plugin may not as flexible as you may expect, for this is just developed
for a specific functionality, that is for car loan dealers site and decided it to
share to others that may need the same functionality as I did. But if you have any ideas
or suggestions, feel free to email me at engrdarrylfernandez@gmail.com