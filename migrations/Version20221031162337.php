<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221031162337 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE unite_centrale ADD ram_id INT DEFAULT NULL, ADD graphique_id INT DEFAULT NULL, ADD hdd_id INT DEFAULT NULL, ADD ssd_id INT DEFAULT NULL, ADD alimentation_id INT DEFAULT NULL, ADD boitier_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE unite_centrale ADD CONSTRAINT FK_EFB2D0393366068 FOREIGN KEY (ram_id) REFERENCES produits (id)');
        $this->addSql('ALTER TABLE unite_centrale ADD CONSTRAINT FK_EFB2D03936431CB1 FOREIGN KEY (graphique_id) REFERENCES produits (id)');
        $this->addSql('ALTER TABLE unite_centrale ADD CONSTRAINT FK_EFB2D0391493816F FOREIGN KEY (hdd_id) REFERENCES produits (id)');
        $this->addSql('ALTER TABLE unite_centrale ADD CONSTRAINT FK_EFB2D039AF4238A5 FOREIGN KEY (ssd_id) REFERENCES produits (id)');
        $this->addSql('ALTER TABLE unite_centrale ADD CONSTRAINT FK_EFB2D0398441D4D9 FOREIGN KEY (alimentation_id) REFERENCES produits (id)');
        $this->addSql('ALTER TABLE unite_centrale ADD CONSTRAINT FK_EFB2D03944DE6F7C FOREIGN KEY (boitier_id) REFERENCES produits (id)');
        $this->addSql('CREATE INDEX IDX_EFB2D0393366068 ON unite_centrale (ram_id)');
        $this->addSql('CREATE INDEX IDX_EFB2D03936431CB1 ON unite_centrale (graphique_id)');
        $this->addSql('CREATE INDEX IDX_EFB2D0391493816F ON unite_centrale (hdd_id)');
        $this->addSql('CREATE INDEX IDX_EFB2D039AF4238A5 ON unite_centrale (ssd_id)');
        $this->addSql('CREATE INDEX IDX_EFB2D0398441D4D9 ON unite_centrale (alimentation_id)');
        $this->addSql('CREATE INDEX IDX_EFB2D03944DE6F7C ON unite_centrale (boitier_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE unite_centrale DROP FOREIGN KEY FK_EFB2D0393366068');
        $this->addSql('ALTER TABLE unite_centrale DROP FOREIGN KEY FK_EFB2D03936431CB1');
        $this->addSql('ALTER TABLE unite_centrale DROP FOREIGN KEY FK_EFB2D0391493816F');
        $this->addSql('ALTER TABLE unite_centrale DROP FOREIGN KEY FK_EFB2D039AF4238A5');
        $this->addSql('ALTER TABLE unite_centrale DROP FOREIGN KEY FK_EFB2D0398441D4D9');
        $this->addSql('ALTER TABLE unite_centrale DROP FOREIGN KEY FK_EFB2D03944DE6F7C');
        $this->addSql('DROP INDEX IDX_EFB2D0393366068 ON unite_centrale');
        $this->addSql('DROP INDEX IDX_EFB2D03936431CB1 ON unite_centrale');
        $this->addSql('DROP INDEX IDX_EFB2D0391493816F ON unite_centrale');
        $this->addSql('DROP INDEX IDX_EFB2D039AF4238A5 ON unite_centrale');
        $this->addSql('DROP INDEX IDX_EFB2D0398441D4D9 ON unite_centrale');
        $this->addSql('DROP INDEX IDX_EFB2D03944DE6F7C ON unite_centrale');
        $this->addSql('ALTER TABLE unite_centrale DROP ram_id, DROP graphique_id, DROP hdd_id, DROP ssd_id, DROP alimentation_id, DROP boitier_id');
    }
}
