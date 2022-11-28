<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221106080737 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE test (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE test_categories (test_id INT NOT NULL, categories_id INT NOT NULL, INDEX IDX_41C0F0511E5D0459 (test_id), INDEX IDX_41C0F051A21214B7 (categories_id), PRIMARY KEY(test_id, categories_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE test_categories ADD CONSTRAINT FK_41C0F0511E5D0459 FOREIGN KEY (test_id) REFERENCES test (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE test_categories ADD CONSTRAINT FK_41C0F051A21214B7 FOREIGN KEY (categories_id) REFERENCES categories (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE test_categories DROP FOREIGN KEY FK_41C0F0511E5D0459');
        $this->addSql('ALTER TABLE test_categories DROP FOREIGN KEY FK_41C0F051A21214B7');
        $this->addSql('DROP TABLE test');
        $this->addSql('DROP TABLE test_categories');
    }
}
