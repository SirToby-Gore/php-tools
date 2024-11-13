# Php-tools
this is a repo full of useful php tools made by me and other.

# HTML-tag
This is a class that makes a tag in php

I got fed-up with having to use the every reliable echo for tags now this works as needed for you.

```php
# php

$html = new Tag(
    tag_name: 'html',
    children: [
        new Tag(
            tag_name: 'head',
            children: [
                new Tag(
                    tag_name: 'title',
                    inner_html: 'Page Title'
                ),
                new Tag(
                    tag_name: 'link',
                    self_closed: FALSE,
                    attributes: [
                        "rel" => 'stylesheet',
                        "href" => '../scss/styles.css'
                    ]
                )
            ]
        ),
        new Tag(
            tag_name: 'body',
            children: [
                new Tag(
                    tag_name: 'h1',
                    inner_html: 'Hello World'
                ),
                new Tag(
                    tag_name: 'p',
                    inner_html: 'This is a paragraph' 
                ),
                new Tag(
                    tag_name: 'input',
                    self_closed: FALSE,
                    attributes: [
                        'type' => 'text',  
                        'required' => NULL // use NULL for a attribute with no assignable value
                    ]
                )
            ]
        )
    ]
);

Tag::top_of_file();

$html->render();
```


# Connection

This is a short hand for connecting to a database

```php
# php

require 'connection.php';

$connection->query("SELECT * FROM users");
```


# SqlManager

This makes for an easier connection to a database

```php
# php

require 'connection.php';

$connection = new SqlManager($host, $username, $password, $database);

$users = $connection->return_query("SELECT * FROM users");

$connection->query("DROP TABLE users");

$connection->close();
```