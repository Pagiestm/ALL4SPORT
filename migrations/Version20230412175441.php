<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230412175441 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE produits_commandes (produits_id INT NOT NULL, commandes_id INT NOT NULL, INDEX IDX_5DF6AD2CCD11A2CF (produits_id), INDEX IDX_5DF6AD2C8BF5C2E6 (commandes_id), PRIMARY KEY(produits_id, commandes_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE produits_commandes ADD CONSTRAINT FK_5DF6AD2CCD11A2CF FOREIGN KEY (produits_id) REFERENCES produits (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE produits_commandes ADD CONSTRAINT FK_5DF6AD2C8BF5C2E6 FOREIGN KEY (commandes_id) REFERENCES commandes (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE commandes DROP FOREIGN KEY FK_35D4282CCD11A2CF');
        $this->addSql('DROP INDEX IDX_35D4282CCD11A2CF ON commandes');
        $this->addSql('ALTER TABLE commandes DROP produits_id');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE produits_commandes DROP FOREIGN KEY FK_5DF6AD2CCD11A2CF');
        $this->addSql('ALTER TABLE produits_commandes DROP FOREIGN KEY FK_5DF6AD2C8BF5C2E6');
        $this->addSql('DROP TABLE produits_commandes');
        $this->addSql('ALTER TABLE commandes ADD produits_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE commandes ADD CONSTRAINT FK_35D4282CCD11A2CF FOREIGN KEY (produits_id) REFERENCES produits (id)');
        $this->addSql('CREATE INDEX IDX_35D4282CCD11A2CF ON commandes (produits_id)');
    }
}
