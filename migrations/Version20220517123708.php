<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220517123708 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE pizza ADD category_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE pizza ADD CONSTRAINT FK_CFDD826F12469DE2 FOREIGN KEY (category_id) REFERENCES category (id)');
        $this->addSql('CREATE INDEX IDX_CFDD826F12469DE2 ON pizza (category_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE pizza DROP FOREIGN KEY FK_CFDD826F12469DE2');
        $this->addSql('DROP INDEX IDX_CFDD826F12469DE2 ON pizza');
        $this->addSql('ALTER TABLE pizza DROP category_id');
    }
}
