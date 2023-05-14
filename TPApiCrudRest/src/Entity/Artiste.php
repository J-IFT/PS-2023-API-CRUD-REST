<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Metadata\ApiResource;
use Symfony\Component\Serializer\Annotation\Groups;


/**
 * Artiste
 *
 * @ORM\Table(name="artiste")
 * @ORM\Entity
 */
#[ApiResource]
class Artiste
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
     * @ORM\Column(name="NOM", type="string", length=100, nullable=false)
     */
    #[Groups('bandOrArtist')]
    public $nom;

    /**
     * @var bool
     *
     * @ORM\Column(name="ESTCHANTEUR", type="boolean", nullable=false)
     */
    public $estchanteur;


}
