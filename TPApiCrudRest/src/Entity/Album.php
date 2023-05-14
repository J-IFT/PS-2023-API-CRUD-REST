<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Metadata\ApiResource;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * Album
 *
 * @ORM\Table(name="album", indexes={@ORM\Index(name="album_artiste_fk", columns={"IDARTISTE"}), @ORM\Index(name="album_groupe_fk", columns={"IDGROUPE"})})
 * @ORM\Entity
 */
#[ApiResource(normalizationContext: ['groups' => ['bandOrArtist']])]
// #[ApiResource]
class Album
{
    /**
     * @var int
     *
     * @ORM\Column(name="ID", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    #[Groups('bandOrArtist')]
    public $id;

    /**
     * @var string
     *
     * @ORM\Column(name="TITRE", type="string", length=100, nullable=false)
     */
    #[Groups('bandOrArtist')]
    public $titre;

    /**
     * @var string
     *
     * @ORM\Column(name="GENRE", type="string", length=50, nullable=false)
     */
    #[Groups('bandOrArtist')]
    public $genre;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="DATESORTIE", type="date", nullable=false)
     */
    #[Groups('bandOrArtist')]
    public $datesortie;

    /**
     * @var string
     *
     * @ORM\Column(name="PRIX", type="decimal", precision=5, scale=2, nullable=false)
     */
    #[Groups('bandOrArtist')]
    public $prix;

    /**
     * @var \Artiste
     *
     * @ORM\ManyToOne(targetEntity="Artiste")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="IDARTISTE", referencedColumnName="ID")
     * })
     */
    #[Groups('bandOrArtist')]
    public $idartiste;

    /**
     * @var \Groupe
     *
     * @ORM\ManyToOne(targetEntity="Groupe")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="IDGROUPE", referencedColumnName="ID")
     * })
     */
    #[Groups('bandOrArtist')]
    public $idgroupe;


}
