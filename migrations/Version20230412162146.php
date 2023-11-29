<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230412162146 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE commandes ADD produits_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE commandes ADD CONSTRAINT FK_35D4282CCD11A2CF FOREIGN KEY (produits_id) REFERENCES produits (id)');
        $this->addSql('CREATE INDEX IDX_35D4282CCD11A2CF ON commandes (produits_id)');
        $this->addSql('ALTER TABLE produits DROP FOREIGN KEY FK_BE2DDF8C8BF5C2E6');
        $this->addSql('DROP INDEX IDX_BE2DDF8C8BF5C2E6 ON produits');
        $this->addSql('ALTER TABLE produits DROP commandes_id');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE commandes DROP FOREIGN KEY FK_35D4282CCD11A2CF');
        $this->addSql('DROP INDEX IDX_35D4282CCD11A2CF ON commandes');
        $this->addSql('ALTER TABLE commandes DROP produits_id');
        $this->addSql('ALTER TABLE produits ADD commandes_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE produits ADD CONSTRAINT FK_BE2DDF8C8BF5C2E6 FOREIGN KEY (commandes_id) REFERENCES commandes (id)');
        $this->addSql('CREATE INDEX IDX_BE2DDF8C8BF5C2E6 ON produits (commandes_id)');
    }
}
