<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221031095752 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE unite_centrale (id INT AUTO_INCREMENT NOT NULL, payment_id INT DEFAULT NULL, carte_mere_id INT DEFAULT NULL, processeur_id INT DEFAULT NULL, date DATE NOT NULL, client VARCHAR(255) NOT NULL, INDEX IDX_EFB2D0394C3A3BB (payment_id), INDEX IDX_EFB2D03968162054 (carte_mere_id), INDEX IDX_EFB2D0395C9BE5AD (processeur_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE unite_centrale ADD CONSTRAINT FK_EFB2D0394C3A3BB FOREIGN KEY (payment_id) REFERENCES payment (id)');
        $this->addSql('ALTER TABLE unite_centrale ADD CONSTRAINT FK_EFB2D03968162054 FOREIGN KEY (carte_mere_id) REFERENCES produits (id)');
        $this->addSql('ALTER TABLE unite_centrale ADD CONSTRAINT FK_EFB2D0395C9BE5AD FOREIGN KEY (processeur_id) REFERENCES produits (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE unite_centrale DROP FOREIGN KEY FK_EFB2D0394C3A3BB');
        $this->addSql('ALTER TABLE unite_centrale DROP FOREIGN KEY FK_EFB2D03968162054');
        $this->addSql('ALTER TABLE unite_centrale DROP FOREIGN KEY FK_EFB2D0395C9BE5AD');
        $this->addSql('DROP TABLE unite_centrale');
    }
}
