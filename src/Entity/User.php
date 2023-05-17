<?php

namespace App\Entity;

use App\Repository\UserRepository;
use App\Service\UuidGenerator;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: UserRepository::class)]
#[ORM\Table(name: '`user`')]
class User
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: "CUSTOM")]
    #[ORM\CustomIdGenerator(class: UuidGenerator::class)]
    #[ORM\Column]
    private ?string $id = null;

    public function getId(): ?int
    {
        return $this->id;
    }
}
