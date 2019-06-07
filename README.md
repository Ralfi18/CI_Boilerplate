# CI_Boilerplate
<h4>Setup</h4>
<ul>
  <li>Create Virtual Host and change it in /root/application/config</li>
  <li>Use the sql file included in the repo or create your own and change config (tabe uses needed for authentication)</li>
</ul>

<h4>Database</h4>
<p>
Use some of the SQL files with command <code> source /path/to/file/new_table.sql</code>
</p>

<h4>Structure</h4>
<pre>
  public/
    -css
    -js
    -user_guide
    ...
  root/ 
    -application/
      -core/
        -MY_Controller.php
      -config
      -controllers/
        -admin/
          -Index_Controller.php
        -Index_Controller.php
      -models
      -helpers/
        -Layout_generator
      -libraries
      ...
    -system/
   .htaccess
  ..
</pre>
<h4>Virtual Host settings</h4>
<pre>
  <code>
    <VirtualHost *:80>
        ServerAdmin steral.eu
        ServerName steral.eu
        DocumentRoot "/var/www/html/steral/public"
        DirectoryIndex index.php
        <Directory "/var/www/html/steral.eu/public">
            Options       All
            AllowOverride All
            Require       all granted
        </Directory>
    </VirtualHost>
  </code>
</pre>