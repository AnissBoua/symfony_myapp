<?php

namespace App\Entity;

use App\Repository\AutoRepository;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=AutoRepository::class)
 */
class Auto
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=20)
     * @Assert\NotBlank(
     * message = "The field {{ label }} is required"
     * )
     * @Assert\Length(
     *      min = 2,
     *      max = 50,
     *      minMessage = "Your {{ label }} must be at least {{ limit }} characters long",
     *      maxMessage = "Your {{ label }} cannot be longer than {{ limit }} characters"
     * )
     */
    private $marque;

    /**
     * @ORM\Column(type="string", length=20)
     * @Assert\NotBlank(
     * message = "The field {{ label }} is required"
     * )
     */
    private $modele;

    /**
     * @ORM\Column(type="integer")
     * @Assert\NotBlank(
     * message = "The field {{ label }} is required"
     * )
     * @Assert\Positive
     */
    private $puissance;

    /**
     * @ORM\Column(type="float")
     * @Assert\NotBlank(
     * message = "The field {{ label }} is required"
     * )
     */
    private $prix;

    /**
     * @ORM\Column(type="string", length=20)
     * @Assert\NotBlank(
     * message = "The field {{ label }} is required"
     * )
     */
    private $pays;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $image;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMarque(): ?string
    {
        return $this->marque;
    }

    public function setMarque(string $marque): self
    {
        $this->marque = $marque;

        return $this;
    }

    public function getModele(): ?string
    {
        return $this->modele;
    }

    public function setModele(string $modele): self
    {
        $this->modele = $modele;

        return $this;
    }

    public function getPuissance(): ?int
    {
        return $this->puissance;
    }

    public function setPuissance(int $puissance): self
    {
        $this->puissance = $puissance;

        return $this;
    }

    public function getPrix(): ?float
    {
        return $this->prix;
    }

    public function setPrix(float $prix): self
    {
        $this->prix = $prix;

        return $this;
    }

    public function getPays(): ?string
    {
        return $this->pays;
    }

    public function setPays(string $pays): self
    {
        $this->pays = $pays;

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(?string $image): self
    {
        $this->image = $image;

        return $this;
    }
}
