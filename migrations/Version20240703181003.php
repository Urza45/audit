<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240703181003 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE workers_categories DROP FOREIGN KEY FK_8D0B3CAE28A00806');
        $this->addSql('ALTER TABLE workers_categories DROP FOREIGN KEY FK_8D0B3CAEA21214B7');
        $this->addSql('DROP TABLE workers_categories');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE workers_categories (workers_id INT NOT NULL, categories_id INT NOT NULL, INDEX IDX_8D0B3CAEA21214B7 (categories_id), INDEX IDX_8D0B3CAE28A00806 (workers_id), PRIMARY KEY(workers_id, categories_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE workers_categories ADD CONSTRAINT FK_8D0B3CAE28A00806 FOREIGN KEY (workers_id) REFERENCES workers (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE workers_categories ADD CONSTRAINT FK_8D0B3CAEA21214B7 FOREIGN KEY (categories_id) REFERENCES categories (id) ON DELETE CASCADE');
    }
}
