<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220310144422 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE depozit ADD angajati_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE depozit ADD CONSTRAINT FK_9A0AA6B62EA2AD6F FOREIGN KEY (angajati_id) REFERENCES angajat (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_9A0AA6B62EA2AD6F ON depozit (angajati_id)');
        $this->addSql('ALTER TABLE marfa ADD depozit_id INT NOT NULL');
        $this->addSql('ALTER TABLE marfa ADD CONSTRAINT FK_7A7DF556BF1AB579 FOREIGN KEY (depozit_id) REFERENCES depozit (id)');
        $this->addSql('CREATE INDEX IDX_7A7DF556BF1AB579 ON marfa (depozit_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE angajat CHANGE nume nume VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE depozit DROP FOREIGN KEY FK_9A0AA6B62EA2AD6F');
        $this->addSql('DROP INDEX UNIQ_9A0AA6B62EA2AD6F ON depozit');
        $this->addSql('ALTER TABLE depozit DROP angajati_id, CHANGE nume nume VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE locatie locatie VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE marfa DROP FOREIGN KEY FK_7A7DF556BF1AB579');
        $this->addSql('DROP INDEX IDX_7A7DF556BF1AB579 ON marfa');
        $this->addSql('ALTER TABLE marfa DROP depozit_id, CHANGE nume nume VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE descriere descriere VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`');
    }
}
