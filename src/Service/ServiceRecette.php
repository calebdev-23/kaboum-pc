<?php
namespace App\Service;
use App\Repository\DepenseRepository;
use App\Repository\RecetteRepository;
use function PHPUnit\Framework\countOf;

class ServiceRecette {
    private $recette;
    private $depense;
    public function __construct(RecetteRepository $repository, DepenseRepository $depense)
    {
        $this->recette = $repository;
        $this->depense = $depense;
    }

    public function nbRecetteToDay()
    {
        $length = 0;
        $recettes = $this->recette->RecetteToday();
        foreach( $recettes as $recette){
            $length++;
        }
        return $length;
    }
    public function getDepenseToday()
    {
        $depenseToday = 0;
        $depenses = $this->depense->today();
        foreach ($depenses as $depense)
        {
            $depenseToday += $depense->getDepense();
        }
        return $depenseToday;
    }

    public function getRecetteToDay()
    {
        $recetteToday = 0;
        $recettes = $this->recette->RecetteToday();
        foreach($recettes as $recette){
            $recetteToday += $recette->getPrice();
        }
      return  $recetteToday;
    }

    public function Solde()
    {
      return   $this->getRecetteToDay() - $this->getDepenseToday();
    }


}