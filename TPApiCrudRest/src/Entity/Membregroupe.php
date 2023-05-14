<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Metadata\ApiResource;


/**
 * Membregroupe
 *
 * @ORM\Table(name="membregroupe", uniqueConstraints={@ORM\UniqueConstraint(name="membregroupe_uq", columns={"IDGROUPE", "IDARTISTE"})}, indexes={@ORM\Index(name="membregroupe_artiste_fk", columns={"IDARTISTE"}), @ORM\Index(name="IDX_38A76F3CA637BDC1", columns={"IDGROUPE"})})
 * @ORM\Entity
 */
#[ApiResource]
class Membregroupe
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
     * @var \Groupe
     *
     * @ORM\ManyToOne(targetEntity="Groupe")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="IDGROUPE", referencedColumnName="ID")
     * })
     */
    private $idgroupe;

    /**
     * @var \Artiste
     *
     * @ORM\ManyToOne(targetEntity="Artiste")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="IDARTISTE", referencedColumnName="ID")
     * })
     */
    private $idartiste;


}
