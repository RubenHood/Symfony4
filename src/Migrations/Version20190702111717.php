<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190702111717 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE equipo (id INT AUTO_INCREMENT NOT NULL, categoria VARCHAR(50) NOT NULL, sexo VARCHAR(20) NOT NULL, num_jugadores INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE resultado (id INT AUTO_INCREMENT NOT NULL, equipo_local_id INT NOT NULL, equipo_visitante_id INT NOT NULL, puntos_local INT NOT NULL, puntos_visitante INT NOT NULL, cancha VARCHAR(255) NOT NULL, fecha DATETIME NOT NULL, INDEX IDX_B2ED91C88774E73 (equipo_local_id), INDEX IDX_B2ED91C8C243011 (equipo_visitante_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE resultado ADD CONSTRAINT FK_B2ED91C88774E73 FOREIGN KEY (equipo_local_id) REFERENCES equipo (id)');
        $this->addSql('ALTER TABLE resultado ADD CONSTRAINT FK_B2ED91C8C243011 FOREIGN KEY (equipo_visitante_id) REFERENCES equipo (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE resultado DROP FOREIGN KEY FK_B2ED91C88774E73');
        $this->addSql('ALTER TABLE resultado DROP FOREIGN KEY FK_B2ED91C8C243011');
        $this->addSql('DROP TABLE equipo');
        $this->addSql('DROP TABLE resultado');
    }
}
