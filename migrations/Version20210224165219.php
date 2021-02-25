<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210224165219 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE session_player (id INT AUTO_INCREMENT NOT NULL, id_user_id INT DEFAULT NULL, id_session_sherpa_id INT DEFAULT NULL, session_date DATE NOT NULL, session_start DATETIME NOT NULL, session_end DATETIME NOT NULL, nb_players INT NOT NULL, comments VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_F772703C79F37AE5 (id_user_id), UNIQUE INDEX UNIQ_F772703CE2D0DEAE (id_session_sherpa_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE session_player ADD CONSTRAINT FK_F772703C79F37AE5 FOREIGN KEY (id_user_id) REFERENCES users (id)');
        $this->addSql('ALTER TABLE session_player ADD CONSTRAINT FK_F772703CE2D0DEAE FOREIGN KEY (id_session_sherpa_id) REFERENCES session_sherpa (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE session_player');
    }
}
