<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230105191354 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE produits DROP FOREIGN KEY FK_BE2DDF8C4D79775F');
        $this->addSql('DROP TABLE tva');
        $this->addSql('DROP INDEX IDX_BE2DDF8C4D79775F ON produits');
        $this->addSql('ALTER TABLE produits DROP tva_id');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE tva (id INT AUTO_INCREMENT NOT NULL, multiplicate DOUBLE PRECISION NOT NULL, nom VARCHAR(125) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, valeur DOUBLE PRECISION NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE produits ADD tva_id INT NOT NULL');
        $this->addSql('ALTER TABLE produits ADD CONSTRAINT FK_BE2DDF8C4D79775F FOREIGN KEY (tva_id) REFERENCES tva (id)');
        $this->addSql('CREATE INDEX IDX_BE2DDF8C4D79775F ON produits (tva_id)');
    }
}
