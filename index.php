<?php
require_once  "vendor/autoload.php";

use App\Controller\BooksController;

$book = new BooksController();
//$book->delete(1);
//$book->deleteBulk();
//$book->store();
//$book->update();
//dump($book->findLatest());
//dump($book->show(2));
dump($book->index());