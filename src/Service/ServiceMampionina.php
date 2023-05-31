<?php
namespace App\Service;
use App\Repository\MampioninaRepository;

class ServiceMampionina {
    private $mkl;
    public function __construct(MampioninaRepository $repository)
    {
        $this->mkl = $repository;
    }
    public function getRecette()
    {
        $length = 0;
        $recette = 0;
        $recettes = $this->mkl->findAll();

        foreach( $recettes as $count){
            if($count->getObservation() == 'Recette'){
                $recette += $count->getPrice() * $count->getQuantite();
            }
        }
        return $recette;
    }

    public function getDepense()
    {
        $length = 0;
        $depense = 0;
        $recettes = $this->mkl->findAll();

        foreach( $recettes as $count){
            if($count->getObservation() == 'Dépense'){
                $depense += $count->getPrice() * $count->getQuantite();
            }
        }
        return $depense;
    }

    public function getSolde()
    {
        $reccette = $this->getRecette();
        $depense = $this->getDepense();
        $solde = $reccette - $depense;
        return $solde;
    }
}