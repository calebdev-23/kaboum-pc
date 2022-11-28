<?php
namespace App\Service;
use App\Repository\RecetteRepository;
use function PHPUnit\Framework\countOf;

class ServiceRecette {
    private $recette;
    public function __construct(RecetteRepository $repository)
    {
        $this->recette = $repository;
    }
    public function getRecetteToDay()
    {
        $length = 0;
        $recettes = $this->recette->RecetteToday();
        foreach( $recettes as $recette){
            $length++;
        }
        return $length;
    }

}