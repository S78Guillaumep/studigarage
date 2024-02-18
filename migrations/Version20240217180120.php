<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240217180120 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE cars DROP FOREIGN KEY FK_95C71D14A21214B7');
        $this->addSql('DROP INDEX IDX_95C71D14A21214B7 ON cars');
        $this->addSql('ALTER TABLE cars ADD type_id INT DEFAULT NULL, DROP categories_id');
        $this->addSql('ALTER TABLE cars ADD CONSTRAINT FK_95C71D14C54C8C93 FOREIGN KEY (type_id) REFERENCES categories (id)');
        $this->addSql('CREATE INDEX IDX_95C71D14C54C8C93 ON cars (type_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE cars DROP FOREIGN KEY FK_95C71D14C54C8C93');
        $this->addSql('DROP INDEX IDX_95C71D14C54C8C93 ON cars');
        $this->addSql('ALTER TABLE cars ADD categories_id INT NOT NULL, DROP type_id');
        $this->addSql('ALTER TABLE cars ADD CONSTRAINT FK_95C71D14A21214B7 FOREIGN KEY (categories_id) REFERENCES categories (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE INDEX IDX_95C71D14A21214B7 ON cars (categories_id)');
    }
}
