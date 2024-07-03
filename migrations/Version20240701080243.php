<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240701080243 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE categories (id INT AUTO_INCREMENT NOT NULL, id_normes_id INT NOT NULL, name VARCHAR(255) NOT NULL, text VARCHAR(255) DEFAULT NULL, INDEX IDX_3AF3466885937643 (id_normes_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE normes (id INT AUTO_INCREMENT NOT NULL, short_name VARCHAR(10) NOT NULL, long_name VARCHAR(255) NOT NULL, update_year INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE site (id INT AUTO_INCREMENT NOT NULL, identifier VARCHAR(255) NOT NULL, address VARCHAR(255) NOT NULL, postal_code VARCHAR(255) NOT NULL, town VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE workers (id INT AUTO_INCREMENT NOT NULL, id_site_id INT NOT NULL, identifier VARCHAR(255) NOT NULL, INDEX IDX_B82D7DC02820BF36 (id_site_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE workers_categories (workers_id INT NOT NULL, categories_id INT NOT NULL, INDEX IDX_8D0B3CAE28A00806 (workers_id), INDEX IDX_8D0B3CAEA21214B7 (categories_id), PRIMARY KEY(workers_id, categories_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL, available_at DATETIME NOT NULL, delivered_at DATETIME DEFAULT NULL, INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE categories ADD CONSTRAINT FK_3AF3466885937643 FOREIGN KEY (id_normes_id) REFERENCES normes (id)');
        $this->addSql('ALTER TABLE workers ADD CONSTRAINT FK_B82D7DC02820BF36 FOREIGN KEY (id_site_id) REFERENCES site (id)');
        $this->addSql('ALTER TABLE workers_categories ADD CONSTRAINT FK_8D0B3CAE28A00806 FOREIGN KEY (workers_id) REFERENCES workers (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE workers_categories ADD CONSTRAINT FK_8D0B3CAEA21214B7 FOREIGN KEY (categories_id) REFERENCES categories (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE categories DROP FOREIGN KEY FK_3AF3466885937643');
        $this->addSql('ALTER TABLE workers DROP FOREIGN KEY FK_B82D7DC02820BF36');
        $this->addSql('ALTER TABLE workers_categories DROP FOREIGN KEY FK_8D0B3CAE28A00806');
        $this->addSql('ALTER TABLE workers_categories DROP FOREIGN KEY FK_8D0B3CAEA21214B7');
        $this->addSql('DROP TABLE categories');
        $this->addSql('DROP TABLE normes');
        $this->addSql('DROP TABLE site');
        $this->addSql('DROP TABLE workers');
        $this->addSql('DROP TABLE workers_categories');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
