<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221114160443 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE unite_centrale (id INT AUTO_INCREMENT NOT NULL, payment_id INT DEFAULT NULL, mere_id INT DEFAULT NULL, processeur_id INT DEFAULT NULL, ram_id INT DEFAULT NULL, graphique_id INT DEFAULT NULL, hdd_id INT DEFAULT NULL, ssd_id INT DEFAULT NULL, alimentation_id INT DEFAULT NULL, boitier_id INT DEFAULT NULL, date DATE NOT NULL, client VARCHAR(255) NOT NULL, INDEX IDX_EFB2D0394C3A3BB (payment_id), INDEX IDX_EFB2D03939DEC40E (mere_id), INDEX IDX_EFB2D0395C9BE5AD (processeur_id), INDEX IDX_EFB2D0393366068 (ram_id), INDEX IDX_EFB2D03936431CB1 (graphique_id), INDEX IDX_EFB2D0391493816F (hdd_id), INDEX IDX_EFB2D039AF4238A5 (ssd_id), INDEX IDX_EFB2D0398441D4D9 (alimentation_id), INDEX IDX_EFB2D03944DE6F7C (boitier_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE unite_centrale ADD CONSTRAINT FK_EFB2D0394C3A3BB FOREIGN KEY (payment_id) REFERENCES payment (id)');
        $this->addSql('ALTER TABLE unite_centrale ADD CONSTRAINT FK_EFB2D03939DEC40E FOREIGN KEY (mere_id) REFERENCES produits (id)');
        $this->addSql('ALTER TABLE unite_centrale ADD CONSTRAINT FK_EFB2D0395C9BE5AD FOREIGN KEY (processeur_id) REFERENCES produits (id)');
        $this->addSql('ALTER TABLE unite_centrale ADD CONSTRAINT FK_EFB2D0393366068 FOREIGN KEY (ram_id) REFERENCES produits (id)');
        $this->addSql('ALTER TABLE unite_centrale ADD CONSTRAINT FK_EFB2D03936431CB1 FOREIGN KEY (graphique_id) REFERENCES produits (id)');
        $this->addSql('ALTER TABLE unite_centrale ADD CONSTRAINT FK_EFB2D0391493816F FOREIGN KEY (hdd_id) REFERENCES produits (id)');
        $this->addSql('ALTER TABLE unite_centrale ADD CONSTRAINT FK_EFB2D039AF4238A5 FOREIGN KEY (ssd_id) REFERENCES produits (id)');
        $this->addSql('ALTER TABLE unite_centrale ADD CONSTRAINT FK_EFB2D0398441D4D9 FOREIGN KEY (alimentation_id) REFERENCES produits (id)');
        $this->addSql('ALTER TABLE unite_centrale ADD CONSTRAINT FK_EFB2D03944DE6F7C FOREIGN KEY (boitier_id) REFERENCES produits (id)');
        $this->addSql('ALTER TABLE categories ADD slug VARCHAR(255) NOT NULL, DROP description, DROP illustration');
        $this->addSql('ALTER TABLE produits DROP FOREIGN KEY FK_BE2DDF8CBCF5E72D');
        $this->addSql('DROP INDEX IDX_BE2DDF8CBCF5E72D ON produits');
        $this->addSql('ALTER TABLE produits DROP categorie_id');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE unite_centrale DROP FOREIGN KEY FK_EFB2D0394C3A3BB');
        $this->addSql('ALTER TABLE unite_centrale DROP FOREIGN KEY FK_EFB2D03939DEC40E');
        $this->addSql('ALTER TABLE unite_centrale DROP FOREIGN KEY FK_EFB2D0395C9BE5AD');
        $this->addSql('ALTER TABLE unite_centrale DROP FOREIGN KEY FK_EFB2D0393366068');
        $this->addSql('ALTER TABLE unite_centrale DROP FOREIGN KEY FK_EFB2D03936431CB1');
        $this->addSql('ALTER TABLE unite_centrale DROP FOREIGN KEY FK_EFB2D0391493816F');
        $this->addSql('ALTER TABLE unite_centrale DROP FOREIGN KEY FK_EFB2D039AF4238A5');
        $this->addSql('ALTER TABLE unite_centrale DROP FOREIGN KEY FK_EFB2D0398441D4D9');
        $this->addSql('ALTER TABLE unite_centrale DROP FOREIGN KEY FK_EFB2D03944DE6F7C');
        $this->addSql('DROP TABLE unite_centrale');
        $this->addSql('ALTER TABLE categories ADD description LONGTEXT DEFAULT NULL, ADD illustration VARCHAR(255) DEFAULT NULL, DROP slug');
        $this->addSql('ALTER TABLE produits ADD categorie_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE produits ADD CONSTRAINT FK_BE2DDF8CBCF5E72D FOREIGN KEY (categorie_id) REFERENCES categories (id)');
        $this->addSql('CREATE INDEX IDX_BE2DDF8CBCF5E72D ON produits (categorie_id)');
    }
}
