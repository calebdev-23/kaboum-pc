<?php
namespace App\Classe;

use Symfony\Component\Validator\Constraints\Date;

class SearchRecette
{
    /**
     * @var string
     */
    public string $string ;
    /**
     * @var date
     */
    public $date;
    /**
     * @var array
     */
    public $categories = [];
}