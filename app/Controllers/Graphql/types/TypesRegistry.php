<?php
/*
*  TypesRegistry.php
*
*  Here you have define your new types, in other case it will be trouble in the further
*/
namespace App\Controllers\Graphql\types;

use App\Controllers\Graphql\types\{ BookType, AuthorType };

class TypesRegistry
{
    private static $BookType;
    private static $AuthorType;

    public static function BookType()
    {
         return self::$BookType ?: (self::$BookType = new BookType());
        // return $this->BookType ?: ($this->BookType = new BookType($this));
    }

    public function AuthorType()
    {
        return self::$AuthorType ?: (self::$AuthorType = new AuthorType());
    }
}
