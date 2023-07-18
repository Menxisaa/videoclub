<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230718134343 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE client (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, surname VARCHAR(255) NOT NULL, date_created DATETIME NOT NULL, date_update DATETIME NOT NULL, date_deleted DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE rent (id INT AUTO_INCREMENT NOT NULL, product_id INT DEFAULT NULL, client_id INT DEFAULT NULL, date_from DATETIME NOT NULL, date_created DATETIME NOT NULL, date_updated DATETIME DEFAULT NULL, date_deleted DATETIME DEFAULT NULL, INDEX IDX_2784DCC4584665A (product_id), INDEX IDX_2784DCC19EB6921 (client_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE rent ADD CONSTRAINT FK_2784DCC4584665A FOREIGN KEY (product_id) REFERENCES product (id)');
        $this->addSql('ALTER TABLE rent ADD CONSTRAINT FK_2784DCC19EB6921 FOREIGN KEY (client_id) REFERENCES client (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE rent DROP FOREIGN KEY FK_2784DCC4584665A');
        $this->addSql('ALTER TABLE rent DROP FOREIGN KEY FK_2784DCC19EB6921');
        $this->addSql('DROP TABLE client');
        $this->addSql('DROP TABLE rent');
    }
}
