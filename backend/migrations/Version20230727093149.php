<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

final class Version20230727093149 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Create MusicBand entity';
    }

    public function up(Schema $schema): void
    {
        $this->addSql('
            CREATE TABLE music_band (
                id BINARY(16) NOT NULL COMMENT \'(DC2Type:ulid)\', 
                name VARCHAR(255) NOT NULL, 
                origin_country VARCHAR(255) NOT NULL, 
                origin_city VARCHAR(255) NOT NULL, 
                starting_year INT NOT NULL, 
                band_split_year INT DEFAULT NULL, 
                founders LONGTEXT DEFAULT NULL, 
                members_count INT DEFAULT NULL, 
                musical_movement VARCHAR(255) DEFAULT NULL, 
                description LONGTEXT NOT NULL, 
                UNIQUE INDEX UNIQ_1CEEA6705E237E06 (name), 
                PRIMARY KEY(id)
            ) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB'
        );
    }

    public function down(Schema $schema): void
    {
        $this->addSql('DROP TABLE music_band');
    }
}
