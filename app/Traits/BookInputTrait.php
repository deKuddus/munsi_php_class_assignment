<?php

namespace App\Traits;
use DateTime;

trait BookInputTrait
{
    public function getBookName(){
        $name = readline("Enter Book name ");
        if(!$name){
            echo "Book name should not empty\n";
            return $this->getBookName();
        }
        return $name;
    }

    public function getBookAuthor(){
        $author = readline("Enter Book Author ");
        if(!$author){
            echo "Book Author should not empty\n";
            return $this->getBookAuthor();
        }
        return $author;
    }

    public function getBookIsbn(){
        $isbn = readline("Enter Book ISBN ");
        if(!$isbn){
            echo "Book ISBN should not empty\n";
            return $this->getBookIsbn();
        }
        return $isbn;
    }

    public function getBookPrice(){
        $price = readline("Enter Book Price ");
        if(!$price){
            echo "Book Price should not empty\n";
            return $this->getBookPrice();
        }
        return $price;
    }

    public function getBookDescription(){
        $description = readline("Enter Book Description ");
        if(!$description){
            echo "Book Description should not empty\n";
            return $this->getBookDescription();
        }
        return $description;
    }

    public function getBookCategory(){
        $category = readline("Enter Book Category ");
        if(!$category){
            echo "Book Category should not empty\n";
            return $this->getBookCategory();
        }
        return $category;
    }

    public function getBookPublisher(){
        $publisher = readline("Enter Book Publisher ");
        if(!$publisher){
            echo "Book Publisher should not empty\n";
            return $this->getBookPublisher();
        }
        return $publisher;
    }

    public function getBookPublishDate(){
        $publishDate = readline("Enter Book Publish Date ");
        if(!$publishDate){
            echo "Book Publish Date should not empty\n";
            return $this->getBookPublishDate();
        }elseif(!$this->validateDate($publishDate)){
            echo "Book Publish Date should be in format YYYY-MM-DD\n";
            return $this->getBookPublishDate();
        }
        return $publishDate;
    }

    public function validateDate($date, $format = 'Y-m-d'){
        $d = DateTime::createFromFormat($format, $date);
        return $d && $d->format($format) === $date;
    }

    public  function  readInput(){
        $name = $this->getBookName();
        $author = $this->getBookAuthor();
        $isbn = $this->getBookIsbn();
//        $category = $this->getBookCategory();
        $price = $this->getBookPrice();
        $description = $this->getBookDescription();
        $publisher = $this->getBookPublisher();
        $publish_date = $this->getBookPublishDate();

        $array = [
            'name' => $name ,
            'author' => $author,
            'isbn' => $isbn,
            'price' => $price,
            'description' => $description,
            'publisher' => $publisher,
            'publish_date' => $publish_date
        ];

        return $array;
    }

}