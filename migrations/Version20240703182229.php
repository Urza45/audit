<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240703182229 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE caces_date (id INT AUTO_INCREMENT NOT NULL, categories_id INT DEFAULT NULL, workers_id INT DEFAULT NULL, obtention_date DATE NOT NULL, INDEX IDX_A98749EBA21214B7 (categories_id), INDEX IDX_A98749EB28A00806 (workers_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE caces_date ADD CONSTRAINT FK_A98749EBA21214B7 FOREIGN KEY (categories_id) REFERENCES categories (id)');
        $this->addSql('ALTER TABLE caces_date ADD CONSTRAINT FK_A98749EB28A00806 FOREIGN KEY (workers_id) REFERENCES workers (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE caces_date DROP FOREIGN KEY FK_A98749EBA21214B7');
        $this->addSql('ALTER TABLE caces_date DROP FOREIGN KEY FK_A98749EB28A00806');
        $this->addSql('DROP TABLE caces_date');
    }
}
