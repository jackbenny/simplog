simplog
=======

simplog is a (very) simply PHP blog engine. It's supposed to be implemented into an existing webpage since this in only the engine part and does not contain a ccomplete webpage/blog of any kind. It's also intended to only have a single user.

What's missing?
---------------
Pretty much everything, depending on how you plan to use it. Included is a template to create the MySQL table, a small HTML and PHP file to create new posts, an index.php that displays your posts and a config file to connect to a database and set number of posts per page. What's currently missing is a way to edit posts. Also you need to protect the user directory yourself (with for example a .htaccess file), or else everyone can post to your blog.

How do I create the MySQL table?
--------------------------------
Either create a new database and possibly a new user or use an existing database/user and run the command:

	mysql -u <user> -p < blogtable.sql

You'll be asked to enter the passwor for the user, enter it. Now you have created the table for the blog. Now you can start filling it with blog posts.

Contributing
------------
Any contributions are welcome since this is a work in progress.
Add yourself to the THANKS file if you like to after contributing to the project.

