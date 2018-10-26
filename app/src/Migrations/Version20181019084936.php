<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20181019084936 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE Attribute (id INT AUTO_INCREMENT NOT NULL, base_attribute_id INT DEFAULT NULL, country TEXT NOT NULL, language TEXT NOT NULL, baseAttributeId INT NOT NULL, name TEXT NOT NULL, UNIQUE INDEX UNIQ_788B6D585897122 (base_attribute_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE AttributeValue (id INT AUTO_INCREMENT NOT NULL, base_attribute_value_id INT DEFAULT NULL, attribute_value_id INT DEFAULT NULL, country TEXT NOT NULL, language TEXT NOT NULL, baseAttributeValueId INT NOT NULL, value TEXT NOT NULL, UNIQUE INDEX UNIQ_171FDB7B85D14016 (base_attribute_value_id), UNIQUE INDEX UNIQ_171FDB7B65A22152 (attribute_value_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE BaseAttribute (id INT AUTO_INCREMENT NOT NULL, attribute_id INT DEFAULT NULL, product_option_attribute_value_id INT DEFAULT NULL, name TEXT NOT NULL, UNIQUE INDEX UNIQ_AFDEC035B6E62EFA (attribute_id), UNIQUE INDEX UNIQ_AFDEC03548E969B (product_option_attribute_value_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE BaseAttributeValue (id INT AUTO_INCREMENT NOT NULL, value TEXT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE BaseCategory (id INT AUTO_INCREMENT NOT NULL, base_category_id INT DEFAULT NULL, name TEXT NOT NULL, parentId INT NOT NULL, INDEX IDX_A745F8761B636B1A (base_category_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE BaseProduct (id INT AUTO_INCREMENT NOT NULL, product_id INT DEFAULT NULL, name TEXT NOT NULL, UNIQUE INDEX UNIQ_B38CD0C4584665A (product_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE BaseProductOption (id INT AUTO_INCREMENT NOT NULL, product_option_id INT DEFAULT NULL, base_product_id INT DEFAULT NULL, name TEXT NOT NULL, sku TEXT NOT NULL, baseProductId INT NOT NULL, UNIQUE INDEX UNIQ_2A7D638C964ABE2 (product_option_id), INDEX IDX_2A7D638D63EB556 (base_product_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE Category (id INT AUTO_INCREMENT NOT NULL, base_category_id INT DEFAULT NULL, country TEXT NOT NULL, language TEXT NOT NULL, name TEXT NOT NULL, description TEXT NOT NULL, isActive TINYINT(1) NOT NULL, urlCode TEXT NOT NULL, metaKeywords TEXT NOT NULL, metaDescription TEXT NOT NULL, INDEX IDX_FF3A7B971B636B1A (base_category_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE CategoryProduct (productId INT AUTO_INCREMENT NOT NULL, categoryId INT NOT NULL, PRIMARY KEY(productId)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE Currency (id INT AUTO_INCREMENT NOT NULL, product_option_id INT DEFAULT NULL, name TEXT NOT NULL, isoCode TEXT NOT NULL, isoNumberCode TEXT NOT NULL, symbol TEXT NOT NULL, decimals INT NOT NULL, thousandSeparator TEXT NOT NULL, decimalSeparator TEXT NOT NULL, isPrefixed TINYINT(1) NOT NULL, UNIQUE INDEX UNIQ_9020EA69C964ABE2 (product_option_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE daemon_manager (id INT AUTO_INCREMENT NOT NULL, pid INT NOT NULL, status INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE Marker (id INT AUTO_INCREMENT NOT NULL, code TEXT NOT NULL, value TEXT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE Products (id INT AUTO_INCREMENT NOT NULL, base_product_id INT DEFAULT NULL, country TEXT NOT NULL, language TEXT NOT NULL, baseProductId INT NOT NULL, name TEXT NOT NULL, shortDescription TEXT NOT NULL, description TEXT NOT NULL, composition TEXT NOT NULL, instruction TEXT NOT NULL, isActive TINYINT(1) NOT NULL, urlCode TEXT NOT NULL, metaKeywords TEXT NOT NULL, metaDescription TEXT NOT NULL, UNIQUE INDEX UNIQ_4ACC380CD63EB556 (base_product_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE ProductMarker (markerid INT AUTO_INCREMENT NOT NULL, productid INT NOT NULL, expiredAt DATETIME NOT NULL, PRIMARY KEY(markerid)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE ProductOption (id INT AUTO_INCREMENT NOT NULL, currency_id INT DEFAULT NULL, base_product_option_id INT DEFAULT NULL, country TEXT NOT NULL, language TEXT NOT NULL, baseProductOptionId INT NOT NULL, sku TEXT NOT NULL, name TEXT NOT NULL, isActive TINYINT(1) NOT NULL, price INT NOT NULL, oldPrice INT NOT NULL, currencyId INT NOT NULL, points DOUBLE PRECISION NOT NULL, UNIQUE INDEX UNIQ_C530D9B338248176 (currency_id), UNIQUE INDEX UNIQ_C530D9B36FECF1E8 (base_product_option_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE ProductOptionAttributeValue (id INT AUTO_INCREMENT NOT NULL, base_product_option_id INT DEFAULT NULL, base_attribute_id INT DEFAULT NULL, base_attribute_value_id INT DEFAULT NULL, baseAttributeId INT NOT NULL, baseAttributeValueId INT NOT NULL, baseProductOptionId INT NOT NULL, INDEX IDX_A979FB4E6FECF1E8 (base_product_option_id), UNIQUE INDEX UNIQ_A979FB4E5897122 (base_attribute_id), UNIQUE INDEX UNIQ_A979FB4E85D14016 (base_attribute_value_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE Attribute ADD CONSTRAINT FK_788B6D585897122 FOREIGN KEY (base_attribute_id) REFERENCES BaseAttribute (id)');
        $this->addSql('ALTER TABLE AttributeValue ADD CONSTRAINT FK_171FDB7B85D14016 FOREIGN KEY (base_attribute_value_id) REFERENCES BaseAttributeValue (id)');
        $this->addSql('ALTER TABLE AttributeValue ADD CONSTRAINT FK_171FDB7B65A22152 FOREIGN KEY (attribute_value_id) REFERENCES AttributeValue (id)');
        $this->addSql('ALTER TABLE BaseAttribute ADD CONSTRAINT FK_AFDEC035B6E62EFA FOREIGN KEY (attribute_id) REFERENCES Attribute (id)');
        $this->addSql('ALTER TABLE BaseAttribute ADD CONSTRAINT FK_AFDEC03548E969B FOREIGN KEY (product_option_attribute_value_id) REFERENCES ProductOptionAttributeValue (id)');
        $this->addSql('ALTER TABLE BaseCategory ADD CONSTRAINT FK_A745F8761B636B1A FOREIGN KEY (base_category_id) REFERENCES Category (id)');
        $this->addSql('ALTER TABLE BaseProduct ADD CONSTRAINT FK_B38CD0C4584665A FOREIGN KEY (product_id) REFERENCES Products (id)');
        $this->addSql('ALTER TABLE BaseProductOption ADD CONSTRAINT FK_2A7D638C964ABE2 FOREIGN KEY (product_option_id) REFERENCES ProductOption (id)');
        $this->addSql('ALTER TABLE BaseProductOption ADD CONSTRAINT FK_2A7D638D63EB556 FOREIGN KEY (base_product_id) REFERENCES BaseProduct (id)');
        $this->addSql('ALTER TABLE Category ADD CONSTRAINT FK_FF3A7B971B636B1A FOREIGN KEY (base_category_id) REFERENCES BaseCategory (id)');
        $this->addSql('ALTER TABLE Currency ADD CONSTRAINT FK_9020EA69C964ABE2 FOREIGN KEY (product_option_id) REFERENCES ProductOption (id)');
        $this->addSql('ALTER TABLE Products ADD CONSTRAINT FK_4ACC380CD63EB556 FOREIGN KEY (base_product_id) REFERENCES BaseProduct (id)');
        $this->addSql('ALTER TABLE ProductOption ADD CONSTRAINT FK_C530D9B338248176 FOREIGN KEY (currency_id) REFERENCES Currency (id)');
        $this->addSql('ALTER TABLE ProductOption ADD CONSTRAINT FK_C530D9B36FECF1E8 FOREIGN KEY (base_product_option_id) REFERENCES BaseProductOption (id)');
        $this->addSql('ALTER TABLE ProductOptionAttributeValue ADD CONSTRAINT FK_A979FB4E6FECF1E8 FOREIGN KEY (base_product_option_id) REFERENCES BaseProductOption (id)');
        $this->addSql('ALTER TABLE ProductOptionAttributeValue ADD CONSTRAINT FK_A979FB4E5897122 FOREIGN KEY (base_attribute_id) REFERENCES BaseAttribute (id)');
        $this->addSql('ALTER TABLE ProductOptionAttributeValue ADD CONSTRAINT FK_A979FB4E85D14016 FOREIGN KEY (base_attribute_value_id) REFERENCES BaseAttributeValue (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE BaseAttribute DROP FOREIGN KEY FK_AFDEC035B6E62EFA');
        $this->addSql('ALTER TABLE AttributeValue DROP FOREIGN KEY FK_171FDB7B65A22152');
        $this->addSql('ALTER TABLE Attribute DROP FOREIGN KEY FK_788B6D585897122');
        $this->addSql('ALTER TABLE ProductOptionAttributeValue DROP FOREIGN KEY FK_A979FB4E5897122');
        $this->addSql('ALTER TABLE AttributeValue DROP FOREIGN KEY FK_171FDB7B85D14016');
        $this->addSql('ALTER TABLE ProductOptionAttributeValue DROP FOREIGN KEY FK_A979FB4E85D14016');
        $this->addSql('ALTER TABLE Category DROP FOREIGN KEY FK_FF3A7B971B636B1A');
        $this->addSql('ALTER TABLE BaseProductOption DROP FOREIGN KEY FK_2A7D638D63EB556');
        $this->addSql('ALTER TABLE Products DROP FOREIGN KEY FK_4ACC380CD63EB556');
        $this->addSql('ALTER TABLE ProductOption DROP FOREIGN KEY FK_C530D9B36FECF1E8');
        $this->addSql('ALTER TABLE ProductOptionAttributeValue DROP FOREIGN KEY FK_A979FB4E6FECF1E8');
        $this->addSql('ALTER TABLE BaseCategory DROP FOREIGN KEY FK_A745F8761B636B1A');
        $this->addSql('ALTER TABLE ProductOption DROP FOREIGN KEY FK_C530D9B338248176');
        $this->addSql('ALTER TABLE BaseProduct DROP FOREIGN KEY FK_B38CD0C4584665A');
        $this->addSql('ALTER TABLE BaseProductOption DROP FOREIGN KEY FK_2A7D638C964ABE2');
        $this->addSql('ALTER TABLE Currency DROP FOREIGN KEY FK_9020EA69C964ABE2');
        $this->addSql('ALTER TABLE BaseAttribute DROP FOREIGN KEY FK_AFDEC03548E969B');
        $this->addSql('DROP TABLE Attribute');
        $this->addSql('DROP TABLE AttributeValue');
        $this->addSql('DROP TABLE BaseAttribute');
        $this->addSql('DROP TABLE BaseAttributeValue');
        $this->addSql('DROP TABLE BaseCategory');
        $this->addSql('DROP TABLE BaseProduct');
        $this->addSql('DROP TABLE BaseProductOption');
        $this->addSql('DROP TABLE Category');
        $this->addSql('DROP TABLE CategoryProduct');
        $this->addSql('DROP TABLE Currency');
        $this->addSql('DROP TABLE daemon_manager');
        $this->addSql('DROP TABLE Marker');
        $this->addSql('DROP TABLE Products');
        $this->addSql('DROP TABLE ProductMarker');
        $this->addSql('DROP TABLE ProductOption');
        $this->addSql('DROP TABLE ProductOptionAttributeValue');
    }
}
