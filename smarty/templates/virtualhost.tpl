<VirtualHost *:80>
	ServerAdmin {$email}
	ServerName {$hostname}

	DocumentRoot {$wwwdir}{$hostname}/web
	<Directory />
		Options FollowSymLinks
		AllowOverride None
	</Directory>
	<Directory {$wwwdir}{$hostname}/web/>
		Options Indexes FollowSymLinks MultiViews
		AllowOverride All
		Order allow,deny
		allow from all
	</Directory>

	ErrorLog /var/log/apache2/error.log

	# Possible values include: debug, info, notice, warn, error, crit,
	# alert, emerg.
	LogLevel warn

	CustomLog /var/log/apache2/access.log combined

</VirtualHost>
