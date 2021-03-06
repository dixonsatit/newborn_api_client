<?php
return [
      'enablePrettyUrl' => true,
      'enableStrictParsing' => true,
      'showScriptName' => false,
      'rules' => [
        [
            'class' => 'yii\rest\UrlRule',
            'controller' => [
                'hospital',
                'kkh/v1/patient',
                'kkh/v1/ipd-inf',
                'kkh/v1/ipd-obs',
                'hosxp/v1/patient',
                'spmedical/v1/patient'
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
                'medeesoft/v1/patient'
            ],
            'extraPatterns' => [
                'GET search' => 'search',
                'GET list' => 'list'
            ]
        ]

      ],
];
 ?>
