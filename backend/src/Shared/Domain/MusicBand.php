<?php

declare(strict_types=1);

namespace App\Shared\Domain;

use App\Shared\Infrastructure\Doctrine\DBAL\Type\UlidType;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Uid\Ulid;

#[ORM\Entity()]
class MusicBand
{
    #[ORM\Id]
    #[ORM\Column(type: UlidType::NAME)]
    private Ulid $id;

    #[ORM\Column(type: Types::STRING, unique: true)]
    private string $name;

    #[ORM\Column(type: Types::STRING)]
    private string $originCountry;

    #[ORM\Column(type: Types::STRING)]
    private string $originCity;

    #[ORM\Column(type: Types::INTEGER)]
    private int $startingYear;

    #[ORM\Column(type: Types::INTEGER, nullable: true)]
    private ?int $bandSplitYear = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $founders = null;

    #[ORM\Column(type: Types::INTEGER, nullable: true)]
    private ?int $membersCount = null;

    #[ORM\Column(type: Types::STRING, nullable: true)]
    private ?string $musicalMovement = null;

    #[ORM\Column(type: Types::TEXT)]
    private string $description;

    public function __construct(
        Ulid $id,
        string $name,
        string $originCountry,
        string $originCity,
        int $startingYear,
        string $description,
    ) {
        $this->id = $id;
        $this->name = $name;
        $this->originCountry = $originCountry;
        $this->originCity = $originCity;
        $this->startingYear = $startingYear;
        $this->description = $description;
    }

    public function getId(): Ulid
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getOriginCountry(): string
    {
        return $this->originCountry;
    }

    public function setOriginCountry(string $originCountry): self
    {
        $this->originCountry = $originCountry;

        return $this;
    }

    public function getOriginCity(): string
    {
        return $this->originCity;
    }

    public function setOriginCity(string $originCity): self
    {
        $this->originCity = $originCity;

        return $this;
    }

    public function getStartingYear(): int
    {
        return $this->startingYear;
    }

    public function setStartingYear(int $startingYear): self
    {
        $this->startingYear = $startingYear;

        return $this;
    }

    public function getBandSplitYear(): ?int
    {
        return $this->bandSplitYear;
    }

    public function setBandSplitYear(?int $bandSplitYear): self
    {
        $this->bandSplitYear = $bandSplitYear;

        return $this;
    }

    public function getFounders(): ?string
    {
        return $this->founders;
    }

    public function setFounders(?string $founders): self
    {
        $this->founders = $founders;

        return $this;
    }

    public function getMembersCount(): ?int
    {
        return $this->membersCount;
    }

    public function setMembersCount(?int $membersCount): self
    {
        $this->membersCount = $membersCount;

        return $this;
    }

    public function getMusicalMovement(): ?string
    {
        return $this->musicalMovement;
    }

    public function setMusicalMovement(?string $musicalMovement): self
    {
        $this->musicalMovement = $musicalMovement;

        return $this;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }
}
