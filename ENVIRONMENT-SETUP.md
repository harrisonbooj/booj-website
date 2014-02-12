#Environment Setup
This guide will help you set up your development enviornment in order to work on the non-enterprise sites.

##Before You Begin
Before you start with this guide, you should read the [Grunt Build Tool Documentation](http://boojlabs.activewebsite.com/documentation/view/72) article and be able to successfully perform builds. Get help from another developer if you cannot get this to work.

##Setting up Apache (Windows Machines)
Install WampServer (<http://www.wampserver.com/en/>). The latest version should work (look for PHP 5.4+). After WampServer has been installed, look for the WampServer icon in your system tray (next to the clock). Click the icon, and navigate to the `Apache` item, then select `Service` and click `Install Service...`.

Next, navigate to `C:\WAMP\bin\apache\apache[version number]\conf` and open the `httpd.conf` file in your code editor (or Notepad). Uncomment (remove the hash/pound symbol) from the following lines:

	LoadModule rewrite_module modules/mod_rewrite.so
	Include conf/extra/httpd-vhosts.conf

Next, locate the line that says `Listen 80` and change it to:

	Listen *:80

Save and then close httpd-vhosts.conf

Navigate to `C:\WAMP\bin\apache\apache[version number]\conf\extra` and open the `httpd-vhosts.conf` file in your code editor. Add the following to the bottom of that file:

	<VirtualHost *:80>
	    DocumentRoot "c:/wamp/www/projects/booj-website/public_html"
	    ServerName booj.dev
	    Options +FollowSymLinks
	    RewriteEngine On
	    <directory "c:/wamp/www/projects/booj-website/public_html">
	        Options Indexes FollowSymLinks
	        AllowOverride all
			Allow from all
	    </directory>
	</VirtualHost>

	<VirtualHost *:80>
	    DocumentRoot "c:/wamp/www/projects/boojers-website/public_html"
	    ServerName boojers.dev
	    Options +FollowSymLinks
	    RewriteEngine On
	    <directory "c:/wamp/www/projects/boojers-website/public_html">
	        Options Indexes FollowSymLinks
	        AllowOverride all
			Allow from all
	    </directory>
	</VirtualHost>

	<VirtualHost *:80>
	    DocumentRoot "c:/wamp/www/projects/independentre-website/public_html"
	    ServerName independentre.dev
	    Options +FollowSymLinks
	    RewriteEngine On
	    <directory "c:/wamp/www/projects/independentre-website/public_html">
	        Options Indexes FollowSymLinks
	        AllowOverride all
			Allow from all
	    </directory>
	</VirtualHost>

Save and then close httpd-vhosts.conf

Open the WampServer control panel (which should be located in the system tray), and select 'Restart all Services'. The WampServer icon should turn red momentarily, and then return to green. If the icon does not turn green, please come see R&D.

After the icon has turned green, click the WampServer icon agan, select `PHP` then `PHP Settings` and then click `short open tag` to enable the use of short opening tags (which is used heavily throughout the views).

That last step will be to edit your `hosts` file to point the dev URLS (`ex booj.dev`) to your local machine.

Click the Start Menu, and then Right Click on `Notepad` and select `Run as administrator`. Now, using the Notepad open file dialog (ctrl + O), navigate to `C:\Windows\System32\drivers\etc`. Change the `Text Documents (.txt)` filter in the bottom right to `All Files` and select the `hosts` file. Add the following lines to the bottom:

	127.0.0.1	booj.dev
	127.0.0.1	boojers.dev
	127.0.0.1	independentre.dev

Note that you should use a `tab` key in between the IP address (`127.0.0.1`) and the URL (`booj.dev`). Save this file, and then close Notepad.

##Setting up Apache (Mac Machines)
Coming soon.

##Github Setup
If you already have a github account, feel free to use it for this purpose. If you do not have a github account (or you would like one for this purpose only), then please create one now.

Download and install the Github application. Then, launch the application and sign in to your github account. Enter your name and complete the initial configuration. After you have made it to your dashboard, select 'Tools' and then click 'Options'. Change your `default storage directory` to `C:\wamp\www\projects`. Click 'Update' to save and close this dialog.

Next, you will need to setup an SSH key for your Git Bash terminal. Follow this [tutorial](https://help.github.com/articles/generating-ssh-keys#platform-windows) to get your SSH key setup and added to your Github account.

##Forking and Cloning
In your web browser, navigate to the github repository of the site you are trying to setup (eg: <https://github.com/ActiveWebsite/booj-website>), and click 'Fork'. This will set up a repository on your account with the latest copy of the live site.

Back in the Github application, select your Github account, and then click the 'Clone' for the repository you are setting up.

When this is finished, your files will be available in

	C:\WAMP\www\projects\[repo-name]\

	For example, the main booj site:
	C:\WAMP\www\projects\booj-website\

##Initial Configuration
For the example below, we will be working with the main booj site. If working with any of the other sites, replace "booj-website" with the repository you're working on.

Open a file browser, and navigate to your enterprise development (dev.lan) branch. Copy the "node_modules" folder, and paste it in the root of the project. Example:

	C:\WAMP\www\projects\booj-website\node_modules

Now, navigate to `C:\WAMP\www\projects\booj-website\public_html\` and open the `_.htaccess` file in your code editor. Locate the section labled `force the www`. Comment out (add hash/pound symbols to) the two lines between the `<IfModule>` lines. When done, that section should look like this:

	# force the www.
	<IfModule mod_rewrite.c>
	#	RewriteCond %{HTTP_HOST} !^www\.
	#	RewriteRule ^(.*)$ http://www.%{HTTP_HOST}/$1 [R=301,L]
	</IfModule>

Save this file as `.htaccess` and then close it. Please note, do NOT save your changes to the `_.htaccess` file! Next, navigate to `C:\WAMP\www\projects\booj-website\application\config` and open the `database.sample.php` file. Scroll down until you find this section:

	'mysql' => array(
		'driver'   => 'mysql',
		'host'     => 'local',
		'database' => 'booj_application',
		'username' => 'root',
		'password' => '',
		'charset'  => 'utf8',
		'prefix'   => '',
	),

In this section, change `host` to `127.0.0.1`. If your local MySQL database has a password set for the root user, you would enter it into the tick marks next to `'password'`. Note that the credentials for a default WampServer install would be `root` for the `'username'`, and no password.

When you are done making changes, save this file as `database.php`. Do NOT save your changes to the `database.sample.php` file!

Next, navigate to `C:\WAMP\www\projects\booj-website\bundles\admin\config` and open the `auth.sample.php` file. In that file, change the value for the `default_password` to anything you like. Save this file as `auth.php` and then close. Again, do NOT save your changes to the `auth.sample.php` file.

##Database Setup
Open your favorite SQL manager (the default WAMP installation contains an install of phpMyAdmin if you are familiar with that), and connect to your local MySQL database. Create the following databases, using default encoding:

	booj_application
	boojers_application
	independ_independentre

##Content Seeding
Now, we will set up some default user groups, users, and content for the site. We are not using the live content on development environments at this time, but it can be copied from the live site to dev via the site's admin panel. This example will assume you are working with the `booj-website` repository.

Open the `git bash` application (should have been installed when following the Grunt Build Tool setup) and navigate to the repository on your machine.

	cd /c/wamp/www/projects/booj-website/

Now, we will setup the initial migration table (which Laravel needs to run). Run the following commands

	/c/wamp/bin/php/php5.4.16/php artisan migrate:install
	/c/wamp/bin/php/php5.4.16/php artisan migrate

Now, we will setup the user groups. Run the following command (replacing with your relevant information)

	/c/wamp/bin/php/php5.4.16/php artisan admin::setup:groups

Next, we will setup an individual user. Make sure your password is a-z, A-Z, 1-9. No special symbols or characters (not even at symbols, dollar signs, ampersands, etc...)
	
	/c/wamp/bin/php/php5.4.16/php artisan admin::setup:user john smith jsmith email@address.com password

Finally, we will setup the menu items/content. Run the following command
	
	/c/wamp/bin/php/php5.4.16/php artisan content::setup
















