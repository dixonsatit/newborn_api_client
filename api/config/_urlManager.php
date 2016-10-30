<?php
return [
      'enablePrettyUrl' => true,
      'enableStrictParsing' => true,
      'showScriptName' => false,
      'rules' => [
          [
              'class' => 'yii\rest\UrlRule',
              'controller' => [
                  'v1/user'
              ],
              'extraPatterns' => [
                'GET search' => 'search'
              ]
          ]
      ],
];
 ?>
