<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Artiste
 *
 * @ORM\Table(name="artiste")
 * @ORM\Entity
 */
class Artiste
{
    /**
     * @var int
     *
     * @ORM\Column(name="ID", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="NOM", type="string", length=100, nullable=false)
     */
    private $nom;

    /**
     * @var bool
     *
     * @ORM\Column(name="ESTCHANTEUR", type="boolean", nullable=false)
     */
    private $estchanteur;


}
