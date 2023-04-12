<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230407103457 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE magasin (id INT AUTO_INCREMENT NOT NULL, produits_id INT NOT NULL, nom VARCHAR(255) NOT NULL, adresse VARCHAR(255) NOT NULL, stock INT NOT NULL, INDEX IDX_54AF5F27CD11A2CF (produits_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE magasin ADD CONSTRAINT FK_54AF5F27CD11A2CF FOREIGN KEY (produits_id) REFERENCES produits (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE magasin DROP FOREIGN KEY FK_54AF5F27CD11A2CF');
        $this->addSql('DROP TABLE magasin');
    }
}
