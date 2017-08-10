<?php

namespace Application\Migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\DBAL\Migrations\AbstractMigration;

class Version20170809213252AddUserTable extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        $this->addSql('CREATE SEQUENCE app_user_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE app_user (id INT NOT NULL, username VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        $this->addSql('DROP SEQUENCE app_user_id_seq');
        $this->addSql('DROP TABLE app_user');
    }
}
