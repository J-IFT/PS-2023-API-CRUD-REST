<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Metadata\ApiResource;
use Symfony\Component\Serializer\Annotation\Groups;


/**
 * Morceau
 *
 * @ORM\Table(name="morceau")
 * @ORM\Entity
 */
#[ApiResource]
class Morceau
{
    /**
     * @var int
     *
     * @ORM\Column(name="ID", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    public $id;

    /**
     * @var string
     *
     * @ORM\Column(name="TITRE", type="string", length=100, nullable=false)
     */
    #[Groups('content')]
    public $titre;

    /**
     * @var string
     *
     * @ORM\Column(name="DUREE", type="string", length=5, nullable=false, options={"fixed"=true})
     */
    public $duree;


}
