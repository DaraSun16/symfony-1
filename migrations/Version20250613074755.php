<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250613074755 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            ALTER TABLE categories ADD parent_id INT DEFAULT NULL
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE categories ADD CONSTRAINT FK_3AF34668727ACA70 FOREIGN KEY (parent_id) REFERENCES categories (id)
        SQL);
        $this->addSql(<<<'SQL'
            CREATE INDEX IDX_3AF34668727ACA70 ON categories (parent_id)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE comment ADD courses_id INT DEFAULT NULL
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE comment ADD CONSTRAINT FK_9474526CF9295384 FOREIGN KEY (courses_id) REFERENCES courses (id)
        SQL);
        $this->addSql(<<<'SQL'
            CREATE UNIQUE INDEX UNIQ_9474526CF9295384 ON comment (courses_id)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE courses ADD courses_review_id INT DEFAULT NULL
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE courses ADD CONSTRAINT FK_A9A55A4C20D66415 FOREIGN KEY (courses_review_id) REFERENCES review (id)
        SQL);
        $this->addSql(<<<'SQL'
            CREATE UNIQUE INDEX UNIQ_A9A55A4C20D66415 ON courses (courses_review_id)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE forgot_password ADD users_id INT DEFAULT NULL
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE forgot_password ADD CONSTRAINT FK_2AB9B56667B3B43D FOREIGN KEY (users_id) REFERENCES users (id)
        SQL);
        $this->addSql(<<<'SQL'
            CREATE UNIQUE INDEX UNIQ_2AB9B56667B3B43D ON forgot_password (users_id)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE lesson ADD lesson_course_id INT DEFAULT NULL
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE lesson ADD CONSTRAINT FK_F87474F33D3F2618 FOREIGN KEY (lesson_course_id) REFERENCES courses (id)
        SQL);
        $this->addSql(<<<'SQL'
            CREATE UNIQUE INDEX UNIQ_F87474F33D3F2618 ON lesson (lesson_course_id)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE `order` ADD payment_id INT DEFAULT NULL
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE `order` ADD CONSTRAINT FK_F52993984C3A3BB FOREIGN KEY (payment_id) REFERENCES payment (id)
        SQL);
        $this->addSql(<<<'SQL'
            CREATE INDEX IDX_F52993984C3A3BB ON `order` (payment_id)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE review ADD review_users_id INT DEFAULT NULL
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE review ADD CONSTRAINT FK_794381C644F13D36 FOREIGN KEY (review_users_id) REFERENCES users (id)
        SQL);
        $this->addSql(<<<'SQL'
            CREATE UNIQUE INDEX UNIQ_794381C644F13D36 ON review (review_users_id)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE shop ADD category_id INT DEFAULT NULL
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE shop ADD CONSTRAINT FK_AC6A4CA212469DE2 FOREIGN KEY (category_id) REFERENCES categories (id)
        SQL);
        $this->addSql(<<<'SQL'
            CREATE UNIQUE INDEX UNIQ_AC6A4CA212469DE2 ON shop (category_id)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE users ADD users_courses_id INT DEFAULT NULL, ADD users_comment_id INT DEFAULT NULL, ADD users_payment_id INT DEFAULT NULL
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE users ADD CONSTRAINT FK_1483A5E912469DE2 FOREIGN KEY (category_id) REFERENCES categories (id)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE users ADD CONSTRAINT FK_1483A5E92E42FC10 FOREIGN KEY (users_courses_id) REFERENCES courses (id)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE users ADD CONSTRAINT FK_1483A5E92F02D287 FOREIGN KEY (users_comment_id) REFERENCES comment (id)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE users ADD CONSTRAINT FK_1483A5E9D3A80C2F FOREIGN KEY (users_payment_id) REFERENCES payment (id)
        SQL);
        $this->addSql(<<<'SQL'
            CREATE INDEX IDX_1483A5E912469DE2 ON users (category_id)
        SQL);
        $this->addSql(<<<'SQL'
            CREATE UNIQUE INDEX UNIQ_1483A5E92E42FC10 ON users (users_courses_id)
        SQL);
        $this->addSql(<<<'SQL'
            CREATE UNIQUE INDEX UNIQ_1483A5E92F02D287 ON users (users_comment_id)
        SQL);
        $this->addSql(<<<'SQL'
            CREATE UNIQUE INDEX UNIQ_1483A5E9D3A80C2F ON users (users_payment_id)
        SQL);
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            ALTER TABLE categories DROP FOREIGN KEY FK_3AF34668727ACA70
        SQL);
        $this->addSql(<<<'SQL'
            DROP INDEX IDX_3AF34668727ACA70 ON categories
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE categories DROP parent_id
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE comment DROP FOREIGN KEY FK_9474526CF9295384
        SQL);
        $this->addSql(<<<'SQL'
            DROP INDEX UNIQ_9474526CF9295384 ON comment
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE comment DROP courses_id
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE courses DROP FOREIGN KEY FK_A9A55A4C20D66415
        SQL);
        $this->addSql(<<<'SQL'
            DROP INDEX UNIQ_A9A55A4C20D66415 ON courses
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE courses DROP courses_review_id
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE forgot_password DROP FOREIGN KEY FK_2AB9B56667B3B43D
        SQL);
        $this->addSql(<<<'SQL'
            DROP INDEX UNIQ_2AB9B56667B3B43D ON forgot_password
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE forgot_password DROP users_id
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE lesson DROP FOREIGN KEY FK_F87474F33D3F2618
        SQL);
        $this->addSql(<<<'SQL'
            DROP INDEX UNIQ_F87474F33D3F2618 ON lesson
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE lesson DROP lesson_course_id
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE `order` DROP FOREIGN KEY FK_F52993984C3A3BB
        SQL);
        $this->addSql(<<<'SQL'
            DROP INDEX IDX_F52993984C3A3BB ON `order`
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE `order` DROP payment_id
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE review DROP FOREIGN KEY FK_794381C644F13D36
        SQL);
        $this->addSql(<<<'SQL'
            DROP INDEX UNIQ_794381C644F13D36 ON review
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE review DROP review_users_id
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE shop DROP FOREIGN KEY FK_AC6A4CA212469DE2
        SQL);
        $this->addSql(<<<'SQL'
            DROP INDEX UNIQ_AC6A4CA212469DE2 ON shop
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE shop DROP category_id
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE users DROP FOREIGN KEY FK_1483A5E912469DE2
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE users DROP FOREIGN KEY FK_1483A5E92E42FC10
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE users DROP FOREIGN KEY FK_1483A5E92F02D287
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE users DROP FOREIGN KEY FK_1483A5E9D3A80C2F
        SQL);
        $this->addSql(<<<'SQL'
            DROP INDEX IDX_1483A5E912469DE2 ON users
        SQL);
        $this->addSql(<<<'SQL'
            DROP INDEX UNIQ_1483A5E92E42FC10 ON users
        SQL);
        $this->addSql(<<<'SQL'
            DROP INDEX UNIQ_1483A5E92F02D287 ON users
        SQL);
        $this->addSql(<<<'SQL'
            DROP INDEX UNIQ_1483A5E9D3A80C2F ON users
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE users DROP users_courses_id, DROP users_comment_id, DROP users_payment_id
        SQL);
    }
}
