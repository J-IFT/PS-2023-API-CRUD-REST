<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Vente
 *
 * @ORM\Table(name="vente", uniqueConstraints={@ORM\UniqueConstraint(name="vente_unique", columns={"IDALBUM", "MOIS", "ANNEE"})}, indexes={@ORM\Index(name="IDX_888A2A4CD0D8FC40", columns={"IDALBUM"})})
 * @ORM\Entity
 */
class Vente
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
     * @var int
     *
     * @ORM\Column(name="MOIS", type="integer", nullable=false)
     */
    private $mois;

    /**
     * @var int
     *
     * @ORM\Column(name="ANNEE", type="integer", nullable=false)
     */
    private $annee;

    /**
     * @var int
     *
     * @ORM\Column(name="NBVENTES", type="integer", nullable=false)
     */
    private $nbventes;

    /**
     * @var \Album
     *
     * @ORM\ManyToOne(targetEntity="Album")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="IDALBUM", referencedColumnName="ID")
     * })
     */
    private $idalbum;


}
