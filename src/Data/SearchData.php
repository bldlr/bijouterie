<?php
// L ENTITY POUR LA PARTIE DU FILTRE
namespace App\Data;
use Symfony\Component\Validator\Constraints as Assert;

class SearchData
{

  
    const TRI = [
        'Prix Croissant' => 0,
        'Prix Décroissant' => 1,
        'Nom Croissant' => 2,
        'Nom Décroissant' => 3,
    ];


    /**
     * @var string
     */
        public $q = '';


    /**
     * @var Category[]
     */
        public $categories = [];

    
    /**
     * @var null|integer
     * @Assert\GreaterThanOrEqual(propertyPath="min", message="Le prix maximum doit être inférieur ou égale au prix minimum" )
     */
        public $max;


    /**
     * @var null|integer
     * @Assert\LessThanOrEqual(propertyPath="max", message="Le prix minimum doit être inférieur ou égale au prix maximum" )
     */
        public $min;



    /**
     * @var string
     */
        private $ordre;
// PROBLEME POUR LA PARTIE ORDRE

        public function getOrdre(): ?int
        {
            return $this->ordre;
        }
    
        public function setOrdre(int $ordre): self
        {
            $this->ordre = $ordre;
    
            return $this;
        }
    
        public function getOrdreType(): string
        {
            return self::TRI[$this->ordre];
        }



 











}