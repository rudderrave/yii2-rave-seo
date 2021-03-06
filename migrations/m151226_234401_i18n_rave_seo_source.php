<?php

use ravesoft\db\SourceMessagesMigration;

class m151226_234401_i18n_rave_seo_source extends SourceMessagesMigration
{

    public function getCategory()
    {
        return 'rave/seo';
    }

    public function getMessages()
    {
        return [
            'Create SEO Record' => 1,
            'Follow' => 1,
            'Index' => 1,
            'Keywords' => 1,
            'SEO' => 1,
            'Search Engine Optimization' => 1,
            'Update SEO Record' => 1,
        ];
    }
}