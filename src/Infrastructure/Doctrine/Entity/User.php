<?php

namespace App\Infrastructure\Doctrine\Entity;

use App\Infrastructure\Doctrine\Repository\UserRepository;
use Doctrine\DBAL\Types\Types;
use Symfony\Component\Security\Core\User\UserInterface;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: UserRepository::class)]
#[ORM\Table(name: "users")]
class User implements UserInterface
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id;

    #[ORM\Column(name: 'fistname', type: Types::STRING, length: 255)]
    private string $firstname;

    #[ORM\Column(name: 'lastname', type: Types::STRING, length: 255)]
    private string $lastname;

    #[ORM\Column(name: 'email', type: Types::STRING, length: 255, unique: true)]
    private string $email;

    #[ORM\Column(name: 'password', type: Types::STRING, length: 255)]
    private string $password;

    #[ORM\Column(name: 'roles', type: Types::SIMPLE_ARRAY, length: 255, nullable: true)]
    private array $roles = [];

    #[ORM\Column(name: 'user_from', type: Types::STRING, length: 255)]
    private string $userFrom;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFirstname(): string
    {
        return $this->firstname;
    }

    public function setFirstname(string $firstname): self
    {
        $this->firstname = $firstname;

        return $this;
    }

    public function getLastname(): string
    {
        return $this->lastname;
    }

    public function setLastname(string $lastname): self
    {
        $this->lastname = $lastname;

        return $this;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    public function getUserFrom(): string
    {
        return $this->userFrom;
    }

    public function setUserFrom(string $userFrom): self
    {
        $this->userFrom = $userFrom;

        return $this;
    }

    public function getRoles(): array
    {
        $roles = $this->roles;
        $roles[] = 'ROLE_USER';

        return array_unique($roles);
    }

    public function eraseCredentials()
    {
        // TODO: Implement eraseCredentials() method.
    }

    public function getUserIdentifier(): string
    {
        return $this->email;
    }
}