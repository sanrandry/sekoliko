<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20191027075822 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf('mysql' !== $this->connection->getDatabasePlatform()->getName(), 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE scolarite ADD school_year_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE scolarite ADD CONSTRAINT FK_276250ABD2EECC3F FOREIGN KEY (school_year_id) REFERENCES school_year (id)');
        $this->addSql('CREATE INDEX IDX_276250ABD2EECC3F ON scolarite (school_year_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf('mysql' !== $this->connection->getDatabasePlatform()->getName(), 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE scolarite DROP FOREIGN KEY FK_276250ABD2EECC3F');
        $this->addSql('DROP INDEX IDX_276250ABD2EECC3F ON scolarite');
        $this->addSql('ALTER TABLE scolarite DROP school_year_id');
    }
}
