# Ratchet-Cloud-PHP-Test-Task
Ratchet Cloud: PHP Test Task

clone repository

use php_test.sql to setup database

Run "npm install" in local repository

In index.php change: $sitePath and $siteName

In js/signIn change: var sitePath

To setup redirection on index.php, in .htaccess add:

<IfModule mod_rewrite.c>

	RewriteEngine On
	RewriteBase /Ratchet-Cloud-PHP-Test-Task/
	RewriteCond %{REQUEST_FILENAME} !-f
	RewriteCond %{REQUEST_FILENAME} !-d
	RewriteRule .* index.php [L]

</IfModule>

Then modify gulpfile.js to change output path.

Finally, run "gulp" command in cmd line while in local repository.


Live demo: http://www.dynkosergei.co.nf/Ratchet-Cloud-PHP-Test-Task/
