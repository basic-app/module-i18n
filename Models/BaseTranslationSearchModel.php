<?php
/**
 * @author Basic App Dev Team
 * @license MIT
 * @link http://basic-app.com
 */
namespace BasicApp\I18n\Models;

use Config\Database;

abstract class BaseTranslationSearchModel extends \BasicApp\Core\Model
{

    protected $returnType = TranslationSearch::class;

    protected $fieldLabels = [
        'category' => 'Category',
        'search' => 'Search'
    ];

    protected $langCategory = 'translations';

    public static function applyToQuery($search, $query)
    {
        if ($search->lang)
        {
            $query->where('translation_lang', $search->lang);
        }

        if ($search->category)
        {
            $query->where('translation_category', $search->category);
        }

        if ($search->search)
        {
            $query->groupStart();

            $query->like('translation_source', $search->search);

            $query->orLike('translation_value', $search->search);
        
            $query->groupEnd();
        }
    }

    public static function categories($return = [])
    {
        $elements = TranslationModel::factory()
            ->select('translation_category')
            ->distinct()
            ->groupBy('translation_category')
            ->orderBy('translation_category')
            ->get()
            ->getResultArray();

        foreach($elements as $row)
        {
            $return[$row['translation_category']] = $row['translation_category'];
        }

        return $return;
    }

}