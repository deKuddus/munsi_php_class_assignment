## A simple Book Crud system using commandline php

This assignment was done based on `OOP PHP` regarding of our class.


## To run the application, we need to execute the following command:

```Bash
composer install or composer update
```

The main entry point of the application is `index.php` file.
We applied namespace `autoloading` to the application using composer. `App` is alias for `app` folder.

### Database Connection
The DatabaseConnection class responsible to connect to the database as a `singleton` method.


### Base Model to handle the database operation.
The `Model` class is `astract baseclass` to responsible to handle the database operations which extends the `DatabaseConnection` Class globally.

### BookIntrface
The `BookInterface` class is responsible to contain few methods which must be implemented by `BookController`.

### BookInputTrait
The `BookInputTrait` class is responsible to handle common method/property implemented by `BookController`.


The following five method are available in `index.php` to test the `BookController` crud system.

```Bash
$book->delete(1); //required id as parameter
$book->deleteBulk();
$book->store();
$book->update(1); //required id as parameter
$book->findLatest();
$book->show(2); //required id as parameter
$book->index();
```