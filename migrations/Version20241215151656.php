<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20241215151656 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE soutenance DROP FOREIGN KEY FK_4D59FF6E12B2DC9C');
        $this->addSql('ALTER TABLE soutenance DROP FOREIGN KEY FK_4D59FF6ECE00928B');
        $this->addSql('ALTER TABLE soutenance ADD CONSTRAINT FK_4D59FF6E12B2DC9C FOREIGN KEY (matricule) REFERENCES enseignant (matricule) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE soutenance ADD CONSTRAINT FK_4D59FF6ECE00928B FOREIGN KEY (nce) REFERENCES etudiant (nce) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE soutenance DROP FOREIGN KEY FK_4D59FF6E12B2DC9C');
        $this->addSql('ALTER TABLE soutenance DROP FOREIGN KEY FK_4D59FF6ECE00928B');
        $this->addSql('ALTER TABLE soutenance ADD CONSTRAINT FK_4D59FF6E12B2DC9C FOREIGN KEY (matricule) REFERENCES enseignant (matricule)');
        $this->addSql('ALTER TABLE soutenance ADD CONSTRAINT FK_4D59FF6ECE00928B FOREIGN KEY (nce) REFERENCES etudiant (nce)');
    }
}
