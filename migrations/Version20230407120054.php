<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230407120054 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE magasin DROP FOREIGN KEY FK_54AF5F27CD11A2CF');
        $this->addSql('DROP INDEX IDX_54AF5F27CD11A2CF ON magasin');
        $this->addSql('ALTER TABLE magasin DROP produits_id');
        $this->addSql('ALTER TABLE produits ADD magasins_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE produits ADD CONSTRAINT FK_BE2DDF8CDE52078D FOREIGN KEY (magasins_id) REFERENCES magasin (id)');
        $this->addSql('CREATE INDEX IDX_BE2DDF8CDE52078D ON produits (magasins_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE magasin ADD produits_id INT NOT NULL');
        $this->addSql('ALTER TABLE magasin ADD CONSTRAINT FK_54AF5F27CD11A2CF FOREIGN KEY (produits_id) REFERENCES produits (id)');
        $this->addSql('CREATE INDEX IDX_54AF5F27CD11A2CF ON magasin (produits_id)');
        $this->addSql('ALTER TABLE produits DROP FOREIGN KEY FK_BE2DDF8CDE52078D');
        $this->addSql('DROP INDEX IDX_BE2DDF8CDE52078D ON produits');
        $this->addSql('ALTER TABLE produits DROP magasins_id');
    }
}
