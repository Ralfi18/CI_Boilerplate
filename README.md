# CI_Boilerplate
<h4>Setup</h4>
<ul>
  <li>Create Virtual Host http://steral.eu or change it in /root/application/config</li>
  <li>Use the sql file included in the repo or create your own and change config (tabe uses needed for authentication)</li>
</ul>

<h4>Structure</h4>
<pre>
  public/
    -css
    -js
    -user_guide
    ...
  root/ 
    -application/
      -config
      -controllers
      -models
      -helpers
      -libraries
      ...
    -system/
   .htaccess
  ..
</pre>
<h4>Virtual Host settings</h4>
<pre>
  <!-- <VirtualHost *:80>
      ServerAdmin steral.eu
      ServerName steral.eu
      DocumentRoot "/var/www/html/steral/public"
      DirectoryIndex index.php
      <Directory "/var/www/html/steral.eu/public">
          Options       All
          AllowOverride All
          Require       all granted
      </Directory>
  </VirtualHost> -->
</pre>