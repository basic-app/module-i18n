<?php
/**
 * @package Basic App Internationalization
 * @license MIT License
 * @link    http://basic-app.com
 */
namespace BasicApp\I18n\Database\Migrations;

use CodeIgniter\Database\Migration;

class Migration_create_translations_table extends Migration
{

	public $tableName = 'translations';

	public function up()
	{
		$this->forge->addField([
			'translation_id' => [
				'type' => 'INT',
				'constraint' => 11,
				'unsigned' => true,
				'auto_increment' => true
			],
			'translation_created_at' => [
				'type' => 'TIMESTAMP DEFAULT CURRENT_TIMESTAMP',
				'null' => true
			],
			'translation_updated_at' => [
				'type' => 'TIMESTAMP NULL',
				'default' => null
			],
            'translation_lang' => [
                'type' => 'CHAR',
                'constraint' => 2,
                'null' => false
            ],
			'translation_category' => [
				'type' => 'VARCHAR',
				'constraint' => 127,
				'null' => false
			],
			'translation_source' => [
				'type' => 'VARCHAR',
				'constraint' => 127,
				'null' => false
			],
			'translation_value' => [
				'type' => 'VARCHAR',
				'constraint' => 255,
				'null' => true,
				'default' => null
			],
		]);

		$this->forge->addKey('translation_id', true);

		$this->forge->addKey('translation_category');

		$this->forge->addUniqueKey(['translation_category', 'translation_source', 'translation_lang']);

		$this->forge->createTable($this->tableName, false, ['ENGINE' => 'InnoDB']);
	}

	public function down()
	{
		$this->forge->dropTable($this->tableName, false);
	}

}