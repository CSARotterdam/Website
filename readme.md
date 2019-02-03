# CSAR - Website

This repository host the development enviroment of the CSAR rotterdam website.


### Setup Instructions

Internal reasons determined that only the content of the website would be uploaded to GitHub. This means that certain aspects need to be settup before work on the site can actually commit. If one desides to work on the website, they should consider downloading the developer environment through the FTP service in their IDE (e.g. PHPStorm). If one desides to use the current version of the website without the use of the development environment, follow these steps:

1. Download a fresh copy of [WordPress](https://wordpress.org)
2. Clone the repository which should give the structure below
3. Copy the contents, **except wp-content**, of the WordPress installation into the Website folder of the repository
4. Use your favorite webserver (e.g. WAMP (Windows), LAMP (Linux), MAMP (Mac), XAMP (Cross-platform)) and point the root folder toward the Website folder of the repository
5. Visit the local version of the website and complete the installation
6. Set CSAR as the main theme