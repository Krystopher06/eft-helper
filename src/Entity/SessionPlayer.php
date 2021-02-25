<?php

namespace App\Entity;

use App\Repository\SessionPlayerRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=SessionPlayerRepository::class)
 */
class SessionPlayer
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\OneToOne(targetEntity=Users::class, cascade={"persist", "remove"})
     */
    private $IdUser;

    /**
     * @ORM\OneToOne(targetEntity=SessionSherpa::class, cascade={"persist", "remove"})
     */
    private $IdSessionSherpa;

    /**
     * @ORM\Column(type="date")
     */
    private $sessionDate;

    /**
     * @ORM\Column(type="datetime")
     */
    private $SessionStart;

    /**
     * @ORM\Column(type="datetime")
     */
    private $SessionEnd;

    /**
     * @ORM\Column(type="integer")
     */
    private $nbPlayers;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Comments;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdUser(): ?Users
    {
        return $this->IdUser;
    }

    public function setIdUser(?Users $IdUser): self
    {
        $this->IdUser = $IdUser;

        return $this;
    }

    public function getIdSessionSherpa(): ?SessionSherpa
    {
        return $this->IdSessionSherpa;
    }

    public function setIdSessionSherpa(?SessionSherpa $IdSessionSherpa): self
    {
        $this->IdSessionSherpa = $IdSessionSherpa;

        return $this;
    }

    public function getSessionDate(): ?\DateTimeInterface
    {
        return $this->sessionDate;
    }

    public function setSessionDate(\DateTimeInterface $sessionDate): self
    {
        $this->sessionDate = $sessionDate;

        return $this;
    }

    public function getSessionStart(): ?\DateTimeInterface
    {
        return $this->SessionStart;
    }

    public function setSessionStart(\DateTimeInterface $SessionStart): self
    {
        $this->SessionStart = $SessionStart;

        return $this;
    }

    public function getSessionEnd(): ?\DateTimeInterface
    {
        return $this->SessionEnd;
    }

    public function setSessionEnd(\DateTimeInterface $SessionEnd): self
    {
        $this->SessionEnd = $SessionEnd;

        return $this;
    }

    public function getNbPlayers(): ?int
    {
        return $this->nbPlayers;
    }

    public function setNbPlayers(int $nbPlayers): self
    {
        $this->nbPlayers = $nbPlayers;

        return $this;
    }

    public function getComments(): ?string
    {
        return $this->Comments;
    }

    public function setComments(string $Comments): self
    {
        $this->Comments = $Comments;

        return $this;
    }
}
