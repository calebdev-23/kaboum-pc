<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220930100857 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE detail_commande ADD commande_id INT DEFAULT NULL, ADD produit_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE detail_commande ADD CONSTRAINT FK_98344FA682EA2E54 FOREIGN KEY (commande_id) REFERENCES commandes (id)');
        $this->addSql('ALTER TABLE detail_commande ADD CONSTRAINT FK_98344FA6F347EFB FOREIGN KEY (produit_id) REFERENCES produits (id)');
        $this->addSql('CREATE INDEX IDX_98344FA682EA2E54 ON detail_commande (commande_id)');
        $this->addSql('CREATE INDEX IDX_98344FA6F347EFB ON detail_commande (produit_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE detail_commande DROP FOREIGN KEY FK_98344FA682EA2E54');
        $this->addSql('ALTER TABLE detail_commande DROP FOREIGN KEY FK_98344FA6F347EFB');
        $this->addSql('DROP INDEX IDX_98344FA682EA2E54 ON detail_commande');
        $this->addSql('DROP INDEX IDX_98344FA6F347EFB ON detail_commande');
        $this->addSql('ALTER TABLE detail_commande DROP commande_id, DROP produit_id');
    }
}
