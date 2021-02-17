<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210217141253 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE users ADD twitch_name VARCHAR(100) NOT NULL, ADD discord_name VARCHAR(100) NOT NULL, ADD name_in_game VARCHAR(100) NOT NULL, ADD created_at DATETIME NOT NULL');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_1483A5E972EE84A6 ON users (twitch_name)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_1483A5E927F57D06 ON users (discord_name)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_1483A5E91FB4B56 ON users (name_in_game)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP INDEX UNIQ_1483A5E972EE84A6 ON users');
        $this->addSql('DROP INDEX UNIQ_1483A5E927F57D06 ON users');
        $this->addSql('DROP INDEX UNIQ_1483A5E91FB4B56 ON users');
        $this->addSql('ALTER TABLE users DROP twitch_name, DROP discord_name, DROP name_in_game, DROP created_at');
    }
}
