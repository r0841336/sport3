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
                       'bannerImg' => UrlHelper::url($entry->productImg->one()->getUrl('productImg'), ['scheme' => 'http']),


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

                    ];
                },
            ];
        },


    ]
];