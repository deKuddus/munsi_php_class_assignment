<?php

namespace App\Contracts;

interface BookInterface
{
    public function getBookName();

    public function getBookAuthor();

    public function getBookIsbn();

    public function getBookPrice();

    public function getBookDescription();

    public function getBookCategory();

    public function getBookPublisher();

    public function getBookPublishDate();


}