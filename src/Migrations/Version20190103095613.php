<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190103095613 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE panel_entity ADD user_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE panel_entity ADD CONSTRAINT FK_FA2C372AA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_FA2C372AA76ED395 ON panel_entity (user_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE panel_entity DROP FOREIGN KEY FK_FA2C372AA76ED395');
        $this->addSql('DROP INDEX IDX_FA2C372AA76ED395 ON panel_entity');
        $this->addSql('ALTER TABLE panel_entity DROP user_id');
    }
}
