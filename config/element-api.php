<?php

use craft\elements\Entry;
use craft\helpers\UrlHelper;

return [
    'endpoints' => [
        '/api/sport' => function() {
            return [
                'elementType' => Entry::class,
                'criteria' => ['section' => 'products'],
                'cache' => false, 
                'serializer' => 'jsonFeed',
                'transformer' => function(Entry $entry) {
                    return [
                        'id' => $entry->id,
                       'productTitle' => $entry->productTitle,
                       'price' => $entry->price,
                       'bannerImg' => str_replace('https', 'http', UrlHelper::url($entry->productImg->one()->getUrl('productImg'))),
                       'categorie' => $entry-> categories->all() ? implode(', ', $entry->categories->all()): [],
                       'fullText' => $entry->fullText,
                    ];
                },
            ];
        },

        '/api/sport/<entryId:\d+>' => function($entryId) {
            return [
                'elementType' => Entry::class,
                'criteria' => ['id' => $entryId],
                'cache' => false, 
                'serializer' => 'jsonFeed',
                'one' => true,
                'transformer' => function(Entry $entry) {
                    return [
                        'id' => $entry->id,
                        'productTitle' => $entry->productTitle,
                        'price' => $entry->price,
                        'fullText' => $entry->fullText,
                        'bannerImg' => str_replace('https', 'http', UrlHelper::url($entry->productImg->one()->getUrl('productImg'))),
                        'categorie' => $entry-> categories->all() ? implode(', ', $entry->categories->all()): [],

                    ];
                },
            ];
        },

        '/api/contact' => function() {
            return [
                'elementType' => Entry::class,
                'criteria' => ['section' => 'contactPage'],
                'cache' => false, 
                'serializer' => 'jsonFeed',
                'transformer' => function(Entry $entry) {
                    return [
                        'id' => $entry->id,
                        'richtext' => $entry->richText,
                    ];
                },
            ];
        },

        '/api/blog' => function() {
            return [
                'elementType' => Entry::class,
                'criteria' => ['section' => 'blog'],
                'cache' => false, 
                'serializer' => 'jsonFeed',
                'transformer' => function(Entry $entry) {
                    return [
                        'id' => $entry->id,
                        'richtext' => $entry->richText,
                    ];
                },
            ];
        },

        '/api/team' => function() {
            return [
                'elementType' => Entry::class,
                'criteria' => ['section' => 'team'],
                'cache' => false, 
                'serializer' => 'jsonFeed',
                'transformer' => function(Entry $entry) {
                    return [
                        'id' => $entry->id,
                        'bannerImg' => str_replace('https', 'http', UrlHelper::url($entry->bannerImg->one()->getUrl('productImg'))),
                        'naam' => $entry -> naamTeamlid,
                        'email' => $entry->emailAdresTeamlid,
                        'omschrijving' => $entry -> korteEigenTekst,

                    ];
                },
            ];
        },

    ]
    

    ];
    


