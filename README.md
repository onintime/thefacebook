#TheFacebook Clone

This script was originally made by [Jeff](https://github.com/jbachand), but was very messy and hard to setup.
This version fixed most of the issues faced with the original script.

Here are some of the changes:
* Completely new log in system
* Removed Mongo db integration
* Removed most of the Facebook integration
* Removed most of the Facebook cookies from the facebook API
* Fixed the database issues
* Fixed some redirect issues
* And much much more!

##Setup

###Initial setup

To install the facebook script, follow these steps:

* Copy all files from thefacebook folder to root directory of domain / subdomain.
* Import facebook.sql to your database
* Open config.php in file editor
* Change details in config.php with your site details
* Make changes in other files in script at your risk.


###Admin Panel

To access the admin panel, you have to set yourself up as admin. To do so, log into PHPmyadmin, and change the "accountstatusid" to 9 of your user.

Accessing the admin panel is very easy, and can be done one of two ways:

* Heading over to /a/
* Log in normally

##Donation

If you enjoyed this script, please consider donating a few dogecoins: 

DKkX6AYG6o16B5iBgm9XsowmP7qssTxHjr
