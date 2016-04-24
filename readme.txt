=== Revision Cleaner Advanced ===
Contributors: martinkrcho, jurajk, lamosty
Tags: revisions, cleanup
Requires at least: 3.0.1
Tested up to: 4.5
Stable tag: 1.0.0
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Automatic revision cleanup has never been easier before.

== Description ==

This plug-in will help you manage post revisions once and for all. It automatically
deletes revisions older than certain number of days (configurable). You can also
configure the plug-in to keep only certain number of revision for all the remaining
post (configurable).

TODO: explain why using WP_POST_REVISIONS is not enough

== Frequently Asked Questions ==

= Can I delete all revisions in one go? =

The plug-in features a tool that can trigger the deletion of all revisions that
match the configuration. You can find it on the settings page.

== Changelog ==

= 1.0.0 =
First draft of the plug-in created at the Contributors Day in Bratislava.

=== Ideas ===

* Backup revisions to a separate database table before the deletion.
* Configurable number of revisions to delete in one batch.