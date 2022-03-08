<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220308091418 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE angajat (id INT AUTO_INCREMENT NOT NULL, nume VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE depozit (id INT AUTO_INCREMENT NOT NULL, nume VARCHAR(255) NOT NULL, locatie VARCHAR(255) NOT NULL, data_intrare DATE DEFAULT NULL, data_iesire DATE DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE marfa (id INT AUTO_INCREMENT NOT NULL, nume VARCHAR(255) NOT NULL, descriere VARCHAR(255) NOT NULL, data_expirari DATE DEFAULT NULL, fragil TINYINT(1) NOT NULL, greutate INT NOT NULL, volum INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE angajat');
        $this->addSql('DROP TABLE depozit');
        $this->addSql('DROP TABLE marfa');
    }
}
