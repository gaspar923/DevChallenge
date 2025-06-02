<?php

namespace App\Domains\User\Entities;

class User
{
    private int $id;

    private string $name;

    private string $email;

    private string $password;

    private ?string $token;

    private int $created_by;

    private int $updated_by;

    public function __construct(int $id, string $name, string $email, string $password, ?string $token, int $created_by, int $updated_by)
    {
        $this->id = $id;
        $this->name = $name;
        $this->email = $email;
        $this->password = $password;
        $this->token = $token;
        $this->created_by = $created_by;
        $this->updated_by = $updated_by;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function getToken(): ?string
    {
        return $this->token;
    }

    public function getCreatedBy(): ?int
    {
        return $this->created_by;
    }

    public function getUpdatedBy(): ?int
    {
        return $this->updated_by;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    public function setPassword(string $password): void
    {
        $this->password = $password;
    }

    public function setToken(string $token): void
    {
        $this->token = $token;
    }

    public function setCreatedBy(int $created_by): void
    {
        $this->created_by = $created_by;
    }

    public function setUpdatedBy(int $updated_by): void
    {
        $this->updated_by = $updated_by;
    }
}
