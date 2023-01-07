<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230105154518 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE categories (id INT AUTO_INCREMENT NOT NULL, image_id INT NOT NULL, nom VARCHAR(125) NOT NULL, UNIQUE INDEX UNIQ_3AF346683DA5256D (image_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE commandes (id INT AUTO_INCREMENT NOT NULL, user_id INT DEFAULT NULL, valider TINYINT(1) NOT NULL, date DATETIME NOT NULL, reference INT NOT NULL, produits LONGTEXT NOT NULL COMMENT \'(DC2Type:array)\', INDEX IDX_35D4282CA76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE media (id INT AUTO_INCREMENT NOT NULL, path VARCHAR(255) NOT NULL, alt VARCHAR(125) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE tva (id INT AUTO_INCREMENT NOT NULL, multiplicate DOUBLE PRECISION NOT NULL, nom VARCHAR(125) NOT NULL, valeur DOUBLE PRECISION NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE utilisateurs_adresses (id INT AUTO_INCREMENT NOT NULL, user_id INT DEFAULT NULL, nom VARCHAR(125) NOT NULL, prenom VARCHAR(125) NOT NULL, telephone VARCHAR(30) NOT NULL, adresse VARCHAR(255) NOT NULL, cp VARCHAR(10) NOT NULL, pays VARCHAR(125) NOT NULL, ville VARCHAR(125) NOT NULL, complement VARCHAR(255) NOT NULL, INDEX IDX_F4167640A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE categories ADD CONSTRAINT FK_3AF346683DA5256D FOREIGN KEY (image_id) REFERENCES media (id)');
        $this->addSql('ALTER TABLE commandes ADD CONSTRAINT FK_35D4282CA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE utilisateurs_adresses ADD CONSTRAINT FK_F4167640A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE produits ADD image_id INT NOT NULL, ADD tva_id INT NOT NULL, ADD categorie_id INT NOT NULL, DROP categorie, DROP image, DROP tva');
        $this->addSql('ALTER TABLE produits ADD CONSTRAINT FK_BE2DDF8C3DA5256D FOREIGN KEY (image_id) REFERENCES media (id)');
        $this->addSql('ALTER TABLE produits ADD CONSTRAINT FK_BE2DDF8C4D79775F FOREIGN KEY (tva_id) REFERENCES tva (id)');
        $this->addSql('ALTER TABLE produits ADD CONSTRAINT FK_BE2DDF8CBCF5E72D FOREIGN KEY (categorie_id) REFERENCES categories (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_BE2DDF8C3DA5256D ON produits (image_id)');
        $this->addSql('CREATE INDEX IDX_BE2DDF8C4D79775F ON produits (tva_id)');
        $this->addSql('CREATE INDEX IDX_BE2DDF8CBCF5E72D ON produits (categorie_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE produits DROP FOREIGN KEY FK_BE2DDF8CBCF5E72D');
        $this->addSql('ALTER TABLE produits DROP FOREIGN KEY FK_BE2DDF8C3DA5256D');
        $this->addSql('ALTER TABLE produits DROP FOREIGN KEY FK_BE2DDF8C4D79775F');
        $this->addSql('ALTER TABLE categories DROP FOREIGN KEY FK_3AF346683DA5256D');
        $this->addSql('ALTER TABLE commandes DROP FOREIGN KEY FK_35D4282CA76ED395');
        $this->addSql('ALTER TABLE utilisateurs_adresses DROP FOREIGN KEY FK_F4167640A76ED395');
        $this->addSql('DROP TABLE categories');
        $this->addSql('DROP TABLE commandes');
        $this->addSql('DROP TABLE media');
        $this->addSql('DROP TABLE tva');
        $this->addSql('DROP TABLE utilisateurs_adresses');
        $this->addSql('DROP INDEX UNIQ_BE2DDF8C3DA5256D ON produits');
        $this->addSql('DROP INDEX IDX_BE2DDF8C4D79775F ON produits');
        $this->addSql('DROP INDEX IDX_BE2DDF8CBCF5E72D ON produits');
        $this->addSql('ALTER TABLE produits ADD categorie VARCHAR(80) NOT NULL, ADD image VARCHAR(255) NOT NULL, ADD tva DOUBLE PRECISION NOT NULL, DROP image_id, DROP tva_id, DROP categorie_id');
    }
}
