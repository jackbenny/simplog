simplog
=======

simplog is a (very) simple PHP blog engine. It's supposed to be implemented into an existing webpage since this in only the engine part and does not contain a complete webpage/blog of any kind. It's also intended to only have a single user.

What's missing?
---------------
Not much really as of 2013-07-27, depending on how you plan to use it. Included is a template to create the MySQL table, a small HTML and PHP file to create new posts, an index.php file that displays your posts and a config file to connect to a database and set number of posts per page. Now there is also a HTML file to find your posts and edit/update them.

You no longer need to protect the user/ directory yourself. Authentication is done using the database.

Usage
-----
simplog.php is intended to be included (with php include) on your webpage, therefore simplog.php doesn't include any HTML start/end tags or anything like that. That's for your webpage to handle, simplog is made as clean as possible for this reason. The includes and user directory also needs to be on your server in the same directory, they include important files. In the user directory you can create new posts and edit existing ones. To edit a post click on Edit post (in /user) and fill in the date and title of the post you want to edit. Hit Find post to find the post or posts matching. Now you can edit the post.

How do I create the MySQL table?
--------------------------------

Either create a new mysql user and database or use an existing one, then either:

Option 1) Go to http://mydomain.tld/path-to-simplog/install.php

    or...

Option 2) Run this command from the shell:

	mysql -u <user> -p <database> < blogtable.sql

You'll be asked to enter the password for the user, enter it.


Now you have created the table for the blog. Now you can start filling it with blog posts.

Contributing
------------
Any contributions are welcome since this is a work in progress.
Add yourself to the THANKS file if you like to after contributing to the project.

