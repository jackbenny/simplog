simplog
=======

simplog is a (very) simply PHP blog engine. It's supposed to be implemented into an existing webpage since this in only the engine part and does not contain a ccomplete webpage/blog of any kind.

What's missing?
---------------
Pretty much everything, depending on how you plan to use it. simplog as of right now does not include anything to acually write/post blog posts. To create a blog post you have to manually create it in a MySQL database.
There is also no template to create the database as of right now.
As of right now the only thing it can do is to display posts already created.

What should the MySQL table look like?
--------------------------------------
To create a table to be able to work with this blog engine you need a table to look like this (name it "blog" since that's what I used in the code).

An int field called postnumber with auto increment.
A date field called date.
A text field called tile.
A text field called posttext.

Contributing
------------
Any contributions are welcome since this is a work in progress.
Add yourself to the THANKS file if you like to after contributing to the project.

