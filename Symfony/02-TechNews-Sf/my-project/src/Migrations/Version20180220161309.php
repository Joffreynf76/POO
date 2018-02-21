<?php declare(strict_types = 1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20180220161309 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE article CHANGE categorie categorie_id INT NOT NULL');
        $this->addSql('ALTER TABLE article ADD CONSTRAINT FK_CD8737FABCF5E72D FOREIGN KEY (categorie_id) REFERENCES Categorie (id)');
        $this->addSql('CREATE INDEX IDX_CD8737FABCF5E72D ON article (categorie_id)');
    }

    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE Article DROP FOREIGN KEY FK_CD8737FABCF5E72D');
        $this->addSql('DROP INDEX IDX_CD8737FABCF5E72D ON Article');
        $this->addSql('ALTER TABLE Article CHANGE categorie_id categorie INT NOT NULL');
    }
}
