<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\EquipoRepository")
 */
class Equipo
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $categoria;

    /**
     * @ORM\Column(type="string", length=20)
     */
    private $sexo;

    /**
     * @ORM\Column(type="integer")
     */
    private $numJugadores;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Resultado", mappedBy="equipoLocal")
     */
    private $resultadosLocales;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Resultado", mappedBy="equipoVisitante")
     */
    private $resultadosVisitante;

    public function __construct()
    {
        $this->resultadosLocales = new ArrayCollection();
        $this->resultadosVisitante = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCategoria(): ?string
    {
        return $this->categoria;
    }

    public function setCategoria(string $categoria): self
    {
        $this->categoria = $categoria;

        return $this;
    }

    public function getSexo(): ?string
    {
        return $this->sexo;
    }

    public function setSexo(string $sexo): self
    {
        $this->sexo = $sexo;

        return $this;
    }

    public function getNumJugadores(): ?int
    {
        return $this->numJugadores;
    }

    public function setNumJugadores(int $numJugadores): self
    {
        $this->numJugadores = $numJugadores;

        return $this;
    }

    /**
     * @return Collection|Resultado[]
     */
    public function getresultadosLocales(): Collection
    {
        return $this->resultadosLocales;
    }

    public function addResultado(Resultado $resultado): self
    {
        if (!$this->resultadosLocales->contains($resultado)) {
            $this->resultadosLocales[] = $resultado;
            $resultado->setEquipoLocal($this);
        }

        return $this;
    }

    public function removeResultado(Resultado $resultado): self
    {
        if ($this->resultadosLocales->contains($resultado)) {
            $this->resultadosLocales->removeElement($resultado);
            // set the owning side to null (unless already changed)
            if ($resultado->getEquipoLocal() === $this) {
                $resultado->setEquipoLocal(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Resultado[]
     */
    public function getResultadosVisitante(): Collection
    {
        return $this->resultadosVisitante;
    }

    public function addResultadosVisitante(Resultado $resultadosVisitante): self
    {
        if (!$this->resultadosVisitante->contains($resultadosVisitante)) {
            $this->resultadosVisitante[] = $resultadosVisitante;
            $resultadosVisitante->setEquipoVisitante($this);
        }

        return $this;
    }

    public function removeResultadosVisitante(Resultado $resultadosVisitante): self
    {
        if ($this->resultadosVisitante->contains($resultadosVisitante)) {
            $this->resultadosVisitante->removeElement($resultadosVisitante);
            // set the owning side to null (unless already changed)
            if ($resultadosVisitante->getEquipoVisitante() === $this) {
                $resultadosVisitante->setEquipoVisitante(null);
            }
        }

        return $this;
    }
}
