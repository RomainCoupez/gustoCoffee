# gustoCoffee
Gusto Coffee app in Symfony 4.3.3 & VueJs

Installation:
- composer install
- doctrine:database:create (si pas de BDD gusto)
- doctrine:schema:update --force
- yarn install 
- yarn encore dev

- (+ import the .sql file in phpmyadmin gusto DBB) !

- add this vhost in the httpd-vhosts.conf 
<VirtualHost *:80>
    ServerName      gustoApp.local
    ServerAlias     gustoApp.local 
    DocumentRoot "${INSTALL_DIR}/www/gustoSymfonyVue/public"
    <Directory "${INSTALL_DIR}/www/gustoSymfonyVue/public">
        Require all granted
    </Directory>
</VirtualHost>

- add this in your Windows/System32/Drivers/hosts file (with bloc-note in admin)
127.0.0.1 gustoApp.local
::1 gustoApp.local


Run : 
- yarn watch

