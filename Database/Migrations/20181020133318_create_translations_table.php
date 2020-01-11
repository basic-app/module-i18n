<?php
/**
 * @author Basic App Dev Team <dev@basic-app.com>
 * @license MIT
 * @link http://basic-app.com
 */
namespace BasicApp\I18n\Database\Migrations;

class Migration_create_translations_table extends \BasicApp\Core\Migration
{

    public $tableName = 'translations';

    public function up()
    {
        $this->forge->addField([
            'translation_id' => $this->primaryKey()->toArray(),
            'translation_created_at' => $this->created()->toArray(),
            'translation_updated_at' => $this->updated()->toArray(),
            'translation_lang' => $this->lang()->toArray(),
            'translation_category' => $this->string(127)->notNull()->toArray(),
            'translation_source' => $this->string(127)->notNull()->toArray(),
            'translation_value' => $this->string()->toArray()
        ]);

        $this->forge->addKey('translation_id', true);

        $this->forge->addKey('translation_category');

        $this->forge->addUniqueKey(['translation_category', 'translation_source', 'translation_lang']);

        $this->forge->createTable($this->tableName);
    }

    public function down()
    {
        $this->forge->dropTable($this->tableName);
    }

}