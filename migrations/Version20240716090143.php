<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240716090143 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE articulo_category (articulo_id INT NOT NULL, category_id INT NOT NULL, INDEX IDX_70B667552DBC2FC9 (articulo_id), INDEX IDX_70B6675512469DE2 (category_id), PRIMARY KEY(articulo_id, category_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE category (id INT AUTO_INCREMENT NOT NULL, type VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE articulo_category ADD CONSTRAINT FK_70B667552DBC2FC9 FOREIGN KEY (articulo_id) REFERENCES articulo (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE articulo_category ADD CONSTRAINT FK_70B6675512469DE2 FOREIGN KEY (category_id) REFERENCES category (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE articulo_category DROP FOREIGN KEY FK_70B667552DBC2FC9');
        $this->addSql('ALTER TABLE articulo_category DROP FOREIGN KEY FK_70B6675512469DE2');
        $this->addSql('DROP TABLE articulo_category');
        $this->addSql('DROP TABLE category');
    }
}
