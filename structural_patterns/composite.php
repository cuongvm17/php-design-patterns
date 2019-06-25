<?php

abstract class OntheBookShelf
{
    abstract function getBookInfo($bookToGet);
    abstract function getBookCount();
    abstract function setBookCount($new_count);
    abstract function addBook($oneBook);
    abstract function removeBook($oneBook);
}

class OneBook extends OntheBookShelf
{
    private $title;
    private $author;

    function __construct($title, $author)
    {
        $this->title = $title;
        $this->author = $author;
    }

    function getBookInfo($bookToGet)
    {
        if (1 == $bookToGet) {
            return $this->title. " by " .$this->author;
        } else {
            return false;
        }
    }

    function getBookCount()
    {
        return 1;
    }

    function setBookCount($new_count)
    {
        return false;
    }

    function addBook($oneBook)
    {
        return false;
    }

    function removeBook($oneBook)
    {
        return false;
    }
}

class SeveralBooks extends OntheBookShelf
{
    private $oneBooks = array();
    private $bookCount;

    public function __construct()
    {
        $this->setBookCount(0);
    }

    public function getBookCount()
    {
        return $this->bookCount;
    }

    public function setBookCount($new_count)
    {
        $this->bookCount = $new_count;
    }

    public function getBookInfo($bookToGet)
    {
        if ($bookToGet <= $this->bookCount) {
            return $this->oneBooks[$bookToGet]->getBookInfo(1);
        } else {
            return false;
        }
    }

    public function addBook($oneBook)
    {
       $this->setBookCount($this->getBookCount()+1);
       $this->oneBooks[$this->getBookCount()] = $oneBook;
       return $this->getBookCount();
    }

    public function removeBook($oneBook)
    {
        $counter = 0;
        while (++$counter <= $this->getBookCount()) {
            if ($oneBook->getBookInfo(1) == $this->oneBooks[$counter]->getBookInfo(1)) {
                for ($x = $counter; $x < $this->getBookCount(); $x++) {
                    $this->setBookCount($this->getBookCount() - 1);
                }
            }
        }
        return $this->getBookCount();
    }
}

function writeln($line_in)
{
    echo $line_in. "\n";
}

writeln("BEGIN TESTING COMPOSITE PATTERN");
writeln('');

//$firstBook = new OneBook('Core PHP Programming, Third Edition', 'Atkinson and Suraski');
//writeln('(after creating first book) boneBook info: ');
//writeln($firstBook->getBookInfo(1));
//writeln('');
//
//$secondBook = new OneBook('PHP Bible', 'Converse and Park');
//writeln('(after creating second book) oneBook info: ');
//writeln($secondBook->getBookInfo(1));
//writeln('');
//
//$thirdBook = new OneBook('Design patterns', 'Gamma, Helm, Johnson, and Vlissides');
//writeln('(after creating third book) oneBook info: ');
//writeln($thirdBook->getBookInfo(1));
//writeln('');
//
//$books = new SeveralBooks();
//
//$booksCount = $books->addBook($firstBook);
//writeln('(after adding firstBook to books) SeveralBooks info: ');
//writeln($books->getBookInfo($booksCount));
//writeln('');
//
//$booksCount = $books->addBook($secondBook);
//writeln('(after adding secondBook to books) SeveralBooks info : ');
//writeln($books->getBookInfo($booksCount));
//writeln('');
//
//$booksCount = $books->addBook($thirdBook);
//writeln('(after adding thirdBook to books) SeveralBooks info : ');
//writeln($books->getBookInfo($booksCount));
//writeln('');
//
//$booksCount = $books->removeBook($firstBook);
//writeln('(after removing firstBook from books) SeveralBooks count : ');
//writeln($books->getBookCount());
//writeln('');
//
//writeln('(after removing firstBook from books) SeveralBooks info 1 : ');
//writeln($books->getBookInfo(1));
//writeln('');
//
//writeln('(after removing firstBook from books) SeveralBooks info 2 : ');
//writeln($books->getBookInfo(2));
//writeln('');
//
//writeln('END TESTING COMPOSITE PATTERN');

//var_dump($books);
$oneBook = new OneBook('This is book one', 'jacky vu');

$tree = new SeveralBooks();
$branch1 = new SeveralBooks();
$branch2 = new SeveralBooks();

$branch1->addBook($oneBook);

$branch2->addBook($oneBook);
$branch2->addBook($oneBook);

$tree->addBook($branch1);
$tree->addBook($branch2);
writeln($tree->getBookCount());
var_dump($tree);

