<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221017074822 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE home (id INT AUTO_INCREMENT NOT NULL, home_categories_id INT DEFAULT NULL, fournisseur_id INT DEFAULT NULL, produit_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, quantite INT NOT NULL, date DATE NOT NULL, INDEX IDX_71D60CD0BFADD422 (home_categories_id), INDEX IDX_71D60CD0670C757F (fournisseur_id), INDEX IDX_71D60CD0F347EFB (produit_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE home ADD CONSTRAINT FK_71D60CD0BFADD422 FOREIGN KEY (home_categories_id) REFERENCES categories (id)');
        $this->addSql('ALTER TABLE home ADD CONSTRAINT FK_71D60CD0670C757F FOREIGN KEY (fournisseur_id) REFERENCES fournisseurs (id)');
        $this->addSql('ALTER TABLE home ADD CONSTRAINT FK_71D60CD0F347EFB FOREIGN KEY (produit_id) REFERENCES produits (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE home DROP FOREIGN KEY FK_71D60CD0BFADD422');
        $this->addSql('ALTER TABLE home DROP FOREIGN KEY FK_71D60CD0670C757F');
        $this->addSql('ALTER TABLE home DROP FOREIGN KEY FK_71D60CD0F347EFB');
        $this->addSql('DROP TABLE home');
    }
}
