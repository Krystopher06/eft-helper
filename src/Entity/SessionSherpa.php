<?php

namespace App\Entity;

use App\Repository\SessionSherpaRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=SessionSherpaRepository::class)
 */
class SessionSherpa
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\OneToOne(targetEntity=Users::class, cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $idUser;

    /**
     * @ORM\Column(type="datetime")
     */
    private $sessionCreatedAt;

    /**
     * @ORM\Column(type="date")
     */
    private $date;

    /**
     * @ORM\Column(type="datetime")
     */
    private $sessionStart;

    /**
     * @ORM\Column(type="datetime")
     */
    private $sessionEnd;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdUser(): ?Users
    {
        return $this->idUser;
    }

    public function setIdUser(Users $idUser): self
    {
        $this->idUser = $idUser;

        return $this;
    }

    public function getSessionCreatedAt(): ?\DateTimeInterface
    {
        return $this->sessionCreatedAt;
    }

    public function setSessionCreatedAt(\DateTimeInterface $sessionCreatedAt): self
    {
        $this->sessionCreatedAt = $sessionCreatedAt;

        return $this;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function getSessionStart(): ?\DateTimeInterface
    {
        return $this->sessionStart;
    }

    public function setSessionStart(\DateTimeInterface $sessionStart): self
    {
        $this->sessionStart = $sessionStart;

        return $this;
    }

    public function getSessionEnd(): ?\DateTimeInterface
    {
        return $this->sessionEnd;
    }

    public function setSessionEnd(\DateTimeInterface $sessionEnd): self
    {
        $this->sessionEnd = $sessionEnd;

        return $this;
    }
}
