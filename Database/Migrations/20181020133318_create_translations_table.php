<?php
/**
 * @copyright Copyright (c) 2018-2019 Basic App Dev Team
 * @link http://basic-app.com
 * @license MIT License
 */
namespace BasicApp\I18n\Database\Migrations;

class Migration_create_translations_table extends \BasicApp\Core\Migration
{

	public $tableName = 'translations';

	public function up()
	{
		$this->forge->addField([
			'translation_id' => $this->primaryColumn(),
			'translation_created_at' => $this->createdColumn(),
			'translation_updated_at' => $this->updatedColumn(),
            'translation_lang' => $this->langColumn(),
			'translation_category' => $this->stringColumn([
				'constraint' => 127,
				'null' => false
			]),
			'translation_source' => $this->stringColumn([
				'constraint' => 127,
				'null' => false
			]),
			'translation_value' => $this->stringColumn()
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