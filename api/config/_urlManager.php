<?php
return [
      'enablePrettyUrl' => true,
      'enableStrictParsing' => false,
      'showScriptName' => false,
      'rules' => [
        [
            'class' => 'yii\rest\UrlRule',
            'controller' => [
                'kkh/v1/patient',
                'kkh/v1/ipd-inf',
                'kkh/v1/ipd-obs',
                'hosxp/v1/patient'
            ],
            'extraPatterns' => [
                'GET search' => 'search',
                'GET list' => 'list'
            ],
            'tokens' => [
                '{id}' => '<id:\\w+>',
            ],
        ],[
            'class' => 'yii\rest\UrlRule',
            'controller' => [
                'jhcis/v1/patient',
            ],
            'extraPatterns' => [
                'GET search' => 'search',
                'GET list' => 'list'
            ]
        ]

      ],
];
 ?>
