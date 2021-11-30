<?php

namespace App\Controller;
use App\Contracts\BookInterface;
use App\Model\BookModel;
use App\Traits\BookInputTrait;

class BooksController extends Controller implements BookInterface
{
    use BookInputTrait;


    public function index(){
        return (new BookModel)->get();
    }


    public function store(){

        $array = $this->readInput();

        $book = new BookModel();

        $result = $book->create($array);

        if( $result == true){
            echo "Book Information Saved Successfully (^_^)\n";
        }else{
            echo $result;
        }
    }


    public  function update($id = 1){

        $array = $this->readInput();

        $book = new BookModel();
        $result = $book->update($array, $id);

        if( $result == true) {
            echo "Book Information Updated Successfully (^_^)\n";
        }else {
            echo $result;
        }
    }


    public function show(int $id){
        $data = (new BookModel)->find($id);
        if(!$data){
            return "Book Not Found :(";
        }
        return $data;
    }


    public function findLatest(){
        return (new BookModel)->latest();
    }


    public function delete($id){
        $book = new BookModel();
        $result = $book->delete($id);

        if( $result == true){
            echo "Book Information Deleted Successfully (^_^)\n";
        }else{
            echo $result;
        }
    }

    public function deleteBulk($ids = []){
        $book = new BookModel();
        $result = $book->deleteAll($ids);

        if( $result == true){
            echo "Book Information Deleted Successfully (^_^)\n";
        }else{
            echo $result;
        }
    }

}