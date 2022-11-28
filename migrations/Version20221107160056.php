<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221107160056 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE categories_test (categories_id INT NOT NULL, test_id INT NOT NULL, INDEX IDX_4C268AA21214B7 (categories_id), INDEX IDX_4C268A1E5D0459 (test_id), PRIMARY KEY(categories_id, test_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE categories_test ADD CONSTRAINT FK_4C268AA21214B7 FOREIGN KEY (categories_id) REFERENCES categories (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE categories_test ADD CONSTRAINT FK_4C268A1E5D0459 FOREIGN KEY (test_id) REFERENCES test (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE categories_test DROP FOREIGN KEY FK_4C268AA21214B7');
        $this->addSql('ALTER TABLE categories_test DROP FOREIGN KEY FK_4C268A1E5D0459');
        $this->addSql('DROP TABLE categories_test');
    }
}
