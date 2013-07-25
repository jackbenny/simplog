simplog
=======

simplog is a (very) simply PHP blog engine. It's supposed to be implemented into an existing webpage since this in only the engine part and does not contain a ccomplete webpage/blog of any kind.

What's missing?
---------------
Pretty much everything, depending on how you plan to use it. simplog as of right now does not include anything to acually write/post blog posts. To create a blog post you have to manually create it in a MySQL database.
As of right now the only thing it can do is to display posts already created.

How do I create the MySQL table?
--------------------------------
Either create a new database and possibly a new user or use an existing database/user and run the command:

mysql -u <user> -p < blogtable.sql

You'll be asked to enter the passwor for the user, enter it. Now you have created the table for the blog. Now you can start filling it with blog posts.

Contributing
------------
Any contributions are welcome since this is a work in progress.
Add yourself to the THANKS file if you like to after contributing to the project.

