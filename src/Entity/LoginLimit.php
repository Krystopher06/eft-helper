<?php

namespace App\Entity;

use App\Repository\LoginLimitRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=LoginLimitRepository::class)
 */
class LoginLimit
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $ip_adress;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $time_diff;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIpAdress(): ?string
    {
        return $this->ip_adress;
    }

    public function setIpAdress(string $ip_adress): self
    {
        $this->ip_adress = $ip_adress;

        return $this;
    }

    public function getTimeDiff(): ?string
    {
        return $this->time_diff;
    }

    public function setTimeDiff(string $time_diff): self
    {
        $this->time_diff = $time_diff;

        return $this;
    }
}
