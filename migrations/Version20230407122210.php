<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230407122210 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE stocks (id INT AUTO_INCREMENT NOT NULL, magasin_id INT NOT NULL, produit_id INT NOT NULL, quantite INT NOT NULL, INDEX IDX_56F7980520096AE3 (magasin_id), INDEX IDX_56F79805F347EFB (produit_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE stocks ADD CONSTRAINT FK_56F7980520096AE3 FOREIGN KEY (magasin_id) REFERENCES magasin (id)');
        $this->addSql('ALTER TABLE stocks ADD CONSTRAINT FK_56F79805F347EFB FOREIGN KEY (produit_id) REFERENCES produits (id)');
        $this->addSql('ALTER TABLE magasin DROP stock, DROP stock_critique');
        $this->addSql('ALTER TABLE produits DROP FOREIGN KEY FK_BE2DDF8CDE52078D');
        $this->addSql('DROP INDEX IDX_BE2DDF8CDE52078D ON produits');
        $this->addSql('ALTER TABLE produits DROP magasins_id');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE stocks DROP FOREIGN KEY FK_56F7980520096AE3');
        $this->addSql('ALTER TABLE stocks DROP FOREIGN KEY FK_56F79805F347EFB');
        $this->addSql('DROP TABLE stocks');
        $this->addSql('ALTER TABLE magasin ADD stock INT NOT NULL, ADD stock_critique TINYINT(1) DEFAULT NULL');
        $this->addSql('ALTER TABLE produits ADD magasins_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE produits ADD CONSTRAINT FK_BE2DDF8CDE52078D FOREIGN KEY (magasins_id) REFERENCES magasin (id)');
        $this->addSql('CREATE INDEX IDX_BE2DDF8CDE52078D ON produits (magasins_id)');
    }
}
