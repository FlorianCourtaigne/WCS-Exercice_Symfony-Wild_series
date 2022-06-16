<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220616080003 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE episode CHANGE synopsis synopsis LONGTEXT NOT NULL');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_92ED77842B36786B ON program (title)');
        $this->addSql('ALTER TABLE season CHANGE description description VARCHAR(255) NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE episode CHANGE synopsis synopsis TEXT NOT NULL');
        $this->addSql('DROP INDEX UNIQ_92ED77842B36786B ON program');
        $this->addSql('ALTER TABLE season CHANGE description description TEXT NOT NULL');
    }
}
