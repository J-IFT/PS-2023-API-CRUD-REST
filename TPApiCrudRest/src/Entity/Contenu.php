<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Metadata\ApiResource;
use Symfony\Component\Serializer\Annotation\Groups;


/**
 * Contenu
 *
 * @ORM\Table(name="contenu", uniqueConstraints={@ORM\UniqueConstraint(name="contenu_uq", columns={"IDMORCEAU", "IDALBUM"})}, indexes={@ORM\Index(name="contenu_album_fk", columns={"IDALBUM"}), @ORM\Index(name="IDX_89C2003FAD7D3E89", columns={"IDMORCEAU"})})
 * @ORM\Entity
 */
#[ApiResource]
class Contenu
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
     * @var \Album
     *
     * @ORM\ManyToOne(targetEntity="Album")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="IDALBUM", referencedColumnName="ID")
     * })
     */
    public $idalbum;

    /**
     * @var \Morceau
     *
     * @ORM\ManyToOne(targetEntity="Morceau")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="IDMORCEAU", referencedColumnName="ID")
     * })
     */
    public $idmorceau;


}
