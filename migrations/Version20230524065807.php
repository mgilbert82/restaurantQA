<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230524065807 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE menus (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE menus_formules (menus_id INT NOT NULL, formules_id INT NOT NULL, INDEX IDX_875B49EB14041B84 (menus_id), INDEX IDX_875B49EB168F3793 (formules_id), PRIMARY KEY(menus_id, formules_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE menus_formules ADD CONSTRAINT FK_875B49EB14041B84 FOREIGN KEY (menus_id) REFERENCES menus (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE menus_formules ADD CONSTRAINT FK_875B49EB168F3793 FOREIGN KEY (formules_id) REFERENCES formules (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE menus_formules DROP FOREIGN KEY FK_875B49EB14041B84');
        $this->addSql('ALTER TABLE menus_formules DROP FOREIGN KEY FK_875B49EB168F3793');
        $this->addSql('DROP TABLE menus');
        $this->addSql('DROP TABLE menus_formules');
    }
}
