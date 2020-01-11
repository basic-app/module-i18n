<?php
/**
 * @author Basic App Dev Team <dev@basic-app.com>
 * @license MIT
 * @link http://basic-app.com
 */
namespace BasicApp\I18n\Database\Seeds;

class I18nResetSeeder extends \BasicApp\Core\Seeder
{

    public function run()
    {
        $this->db->table('translations')->truncate();
    }

}