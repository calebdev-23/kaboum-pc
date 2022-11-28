<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221031175102 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE unite_centrale DROP FOREIGN KEY FK_EFB2D03968162054');
        $this->addSql('DROP INDEX IDX_EFB2D03968162054 ON unite_centrale');
        $this->addSql('ALTER TABLE unite_centrale CHANGE carte_mere_id mere_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE unite_centrale ADD CONSTRAINT FK_EFB2D03939DEC40E FOREIGN KEY (mere_id) REFERENCES produits (id)');
        $this->addSql('CREATE INDEX IDX_EFB2D03939DEC40E ON unite_centrale (mere_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE unite_centrale DROP FOREIGN KEY FK_EFB2D03939DEC40E');
        $this->addSql('DROP INDEX IDX_EFB2D03939DEC40E ON unite_centrale');
        $this->addSql('ALTER TABLE unite_centrale CHANGE mere_id carte_mere_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE unite_centrale ADD CONSTRAINT FK_EFB2D03968162054 FOREIGN KEY (carte_mere_id) REFERENCES produits (id)');
        $this->addSql('CREATE INDEX IDX_EFB2D03968162054 ON unite_centrale (carte_mere_id)');
    }
}
