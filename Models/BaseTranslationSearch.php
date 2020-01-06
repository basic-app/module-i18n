<?php
/**
 * @author Basic App Dev Team <dev@basic-app.com>
 * @license MIT
 * @link http://basic-app.com
 */
namespace BasicApp\I18n\Models;

abstract class BaseTranslationSearch extends \BasicApp\Core\Entity
{

    protected $modelClass = TranslationSearchModel::class;

    public function applyToQuery($query)
    {
        $search = $this;

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

    public function categoryList($return = [])
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