<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230605125232 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE categories (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, slug VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE customer (id INT AUTO_INCREMENT NOT NULL, username VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE depense (id INT AUTO_INCREMENT NOT NULL, designation VARCHAR(255) NOT NULL, depense DOUBLE PRECISION NOT NULL, date DATE NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE ekinox (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, quantite INT NOT NULL, price DOUBLE PRECISION NOT NULL, date DATE NOT NULL, observation VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE files (id INT AUTO_INCREMENT NOT NULL, file VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE fournisseurs (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, contact VARCHAR(255) DEFAULT NULL, adresse VARCHAR(255) NOT NULL, tel VARCHAR(255) NOT NULL, pays VARCHAR(255) NOT NULL, ville VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE home (id INT AUTO_INCREMENT NOT NULL, home_categories_id INT DEFAULT NULL, fournisseur_id INT DEFAULT NULL, produit_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, quantite INT NOT NULL, date DATE NOT NULL, INDEX IDX_71D60CD0BFADD422 (home_categories_id), INDEX IDX_71D60CD0670C757F (fournisseur_id), INDEX IDX_71D60CD0F347EFB (produit_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE james (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, quantite INT NOT NULL, price DOUBLE PRECISION NOT NULL, observation VARCHAR(255) NOT NULL, date DATE NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE ks (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, quantite INT NOT NULL, price DOUBLE PRECISION NOT NULL, date DATE NOT NULL, observation VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE maka_kely (id INT AUTO_INCREMENT NOT NULL, date DATE NOT NULL, name VARCHAR(255) NOT NULL, quantite INT NOT NULL, price DOUBLE PRECISION NOT NULL, observation VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE mampionina (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, quantite INT NOT NULL, price DOUBLE PRECISION NOT NULL, date DATE NOT NULL, observation VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE payment (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE pc_upgrade (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, quantite INT NOT NULL, price DOUBLE PRECISION NOT NULL, date DATE NOT NULL, observation VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE produit_home (id INT AUTO_INCREMENT NOT NULL, produit_id INT DEFAULT NULL, date DATE NOT NULL, nom VARCHAR(255) NOT NULL, quantite VARCHAR(255) NOT NULL, observation VARCHAR(255) NOT NULL, INDEX IDX_584E713FF347EFB (produit_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE produits (id INT AUTO_INCREMENT NOT NULL, fournisseur_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, quantite INT NOT NULL, price DOUBLE PRECISION NOT NULL, description LONGTEXT DEFAULT NULL, stock INT NOT NULL, slug VARCHAR(255) NOT NULL, INDEX IDX_BE2DDF8C670C757F (fournisseur_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE produits_categories (produits_id INT NOT NULL, categories_id INT NOT NULL, INDEX IDX_3A9B64EDCD11A2CF (produits_id), INDEX IDX_3A9B64EDA21214B7 (categories_id), PRIMARY KEY(produits_id, categories_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE recette (id INT AUTO_INCREMENT NOT NULL, produits_id INT DEFAULT NULL, payment_id INT DEFAULT NULL, customer_id INT DEFAULT NULL, quantite INT NOT NULL, price DOUBLE PRECISION NOT NULL, date DATE NOT NULL, lieu VARCHAR(255) DEFAULT NULL, observation VARCHAR(255) DEFAULT NULL, name VARCHAR(255) NOT NULL, INDEX IDX_49BB6390CD11A2CF (produits_id), INDEX IDX_49BB63904C3A3BB (payment_id), INDEX IDX_49BB63909395C3F3 (customer_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE test (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE test_categories (test_id INT NOT NULL, categories_id INT NOT NULL, INDEX IDX_41C0F0511E5D0459 (test_id), INDEX IDX_41C0F051A21214B7 (categories_id), PRIMARY KEY(test_id, categories_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE ulysse (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, quantite INT NOT NULL, price DOUBLE PRECISION NOT NULL, date DATE NOT NULL, observation VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, name VARCHAR(255) NOT NULL, first_name VARCHAR(255) NOT NULL, illustration VARCHAR(255) DEFAULT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL, available_at DATETIME NOT NULL, delivered_at DATETIME DEFAULT NULL, INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE home ADD CONSTRAINT FK_71D60CD0BFADD422 FOREIGN KEY (home_categories_id) REFERENCES categories (id)');
        $this->addSql('ALTER TABLE home ADD CONSTRAINT FK_71D60CD0670C757F FOREIGN KEY (fournisseur_id) REFERENCES fournisseurs (id)');
        $this->addSql('ALTER TABLE home ADD CONSTRAINT FK_71D60CD0F347EFB FOREIGN KEY (produit_id) REFERENCES produits (id)');
        $this->addSql('ALTER TABLE produit_home ADD CONSTRAINT FK_584E713FF347EFB FOREIGN KEY (produit_id) REFERENCES produits (id)');
        $this->addSql('ALTER TABLE produits ADD CONSTRAINT FK_BE2DDF8C670C757F FOREIGN KEY (fournisseur_id) REFERENCES fournisseurs (id)');
        $this->addSql('ALTER TABLE produits_categories ADD CONSTRAINT FK_3A9B64EDCD11A2CF FOREIGN KEY (produits_id) REFERENCES produits (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE produits_categories ADD CONSTRAINT FK_3A9B64EDA21214B7 FOREIGN KEY (categories_id) REFERENCES categories (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE recette ADD CONSTRAINT FK_49BB6390CD11A2CF FOREIGN KEY (produits_id) REFERENCES produits (id)');
        $this->addSql('ALTER TABLE recette ADD CONSTRAINT FK_49BB63904C3A3BB FOREIGN KEY (payment_id) REFERENCES payment (id)');
        $this->addSql('ALTER TABLE recette ADD CONSTRAINT FK_49BB63909395C3F3 FOREIGN KEY (customer_id) REFERENCES customer (id)');
        $this->addSql('ALTER TABLE test_categories ADD CONSTRAINT FK_41C0F0511E5D0459 FOREIGN KEY (test_id) REFERENCES test (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE test_categories ADD CONSTRAINT FK_41C0F051A21214B7 FOREIGN KEY (categories_id) REFERENCES categories (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE home DROP FOREIGN KEY FK_71D60CD0BFADD422');
        $this->addSql('ALTER TABLE home DROP FOREIGN KEY FK_71D60CD0670C757F');
        $this->addSql('ALTER TABLE home DROP FOREIGN KEY FK_71D60CD0F347EFB');
        $this->addSql('ALTER TABLE produit_home DROP FOREIGN KEY FK_584E713FF347EFB');
        $this->addSql('ALTER TABLE produits DROP FOREIGN KEY FK_BE2DDF8C670C757F');
        $this->addSql('ALTER TABLE produits_categories DROP FOREIGN KEY FK_3A9B64EDCD11A2CF');
        $this->addSql('ALTER TABLE produits_categories DROP FOREIGN KEY FK_3A9B64EDA21214B7');
        $this->addSql('ALTER TABLE recette DROP FOREIGN KEY FK_49BB6390CD11A2CF');
        $this->addSql('ALTER TABLE recette DROP FOREIGN KEY FK_49BB63904C3A3BB');
        $this->addSql('ALTER TABLE recette DROP FOREIGN KEY FK_49BB63909395C3F3');
        $this->addSql('ALTER TABLE test_categories DROP FOREIGN KEY FK_41C0F0511E5D0459');
        $this->addSql('ALTER TABLE test_categories DROP FOREIGN KEY FK_41C0F051A21214B7');
        $this->addSql('DROP TABLE categories');
        $this->addSql('DROP TABLE customer');
        $this->addSql('DROP TABLE depense');
        $this->addSql('DROP TABLE ekinox');
        $this->addSql('DROP TABLE files');
        $this->addSql('DROP TABLE fournisseurs');
        $this->addSql('DROP TABLE home');
        $this->addSql('DROP TABLE james');
        $this->addSql('DROP TABLE ks');
        $this->addSql('DROP TABLE maka_kely');
        $this->addSql('DROP TABLE mampionina');
        $this->addSql('DROP TABLE payment');
        $this->addSql('DROP TABLE pc_upgrade');
        $this->addSql('DROP TABLE produit_home');
        $this->addSql('DROP TABLE produits');
        $this->addSql('DROP TABLE produits_categories');
        $this->addSql('DROP TABLE recette');
        $this->addSql('DROP TABLE test');
        $this->addSql('DROP TABLE test_categories');
        $this->addSql('DROP TABLE ulysse');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
