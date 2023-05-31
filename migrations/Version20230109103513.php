<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230109103513 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE recette ADD customer_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE recette ADD CONSTRAINT FK_49BB63909395C3F3 FOREIGN KEY (customer_id) REFERENCES customer (id)');
        $this->addSql('CREATE INDEX IDX_49BB63909395C3F3 ON recette (customer_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE recette DROP FOREIGN KEY FK_49BB63909395C3F3');
        $this->addSql('DROP INDEX IDX_49BB63909395C3F3 ON recette');
        $this->addSql('ALTER TABLE recette DROP customer_id');
    }
}
