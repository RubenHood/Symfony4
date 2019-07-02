<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ResultadoRepository")
 */
class Resultado
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $puntosLocal;

    /**
     * @ORM\Column(type="integer")
     */
    private $puntosVisitante;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $cancha;

    /**
     * @ORM\Column(type="datetime")
     */
    private $fecha;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Equipo", inversedBy="resultadosLocal")
     * @ORM\JoinColumn(nullable=false)
     */
    private $equipoLocal;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Equipo", inversedBy="resultadosVisitante")
     * @ORM\JoinColumn(nullable=false)
     */
    private $equipoVisitante;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPuntosLocal(): ?int
    {
        return $this->puntosLocal;
    }

    public function setPuntosLocal(int $puntosLocal): self
    {
        $this->puntosLocal = $puntosLocal;

        return $this;
    }

    public function getPuntosVisitante(): ?int
    {
        return $this->puntosVisitante;
    }

    public function setPuntosVisitante(int $puntosVisitante): self
    {
        $this->puntosVisitante = $puntosVisitante;

        return $this;
    }

    public function getCancha(): ?string
    {
        return $this->cancha;
    }

    public function setCancha(string $cancha): self
    {
        $this->cancha = $cancha;

        return $this;
    }

    public function getFecha(): ?\DateTimeInterface
    {
        return $this->fecha;
    }

    public function setFecha(\DateTimeInterface $fecha): self
    {
        $this->fecha = $fecha;

        return $this;
    }

    public function getEquipoLocal(): ?Equipo
    {
        return $this->equipoLocal;
    }

    public function setEquipoLocal(?Equipo $equipoLocal): self
    {
        $this->equipoLocal = $equipoLocal;

        return $this;
    }

    public function getEquipoVisitante(): ?Equipo
    {
        return $this->equipoVisitante;
    }

    public function setEquipoVisitante(?Equipo $equipoVisitante): self
    {
        $this->equipoVisitante = $equipoVisitante;

        return $this;
    }
}
