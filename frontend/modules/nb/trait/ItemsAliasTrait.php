<?php

namespace frontend\modules\nb\trait;

use frontend\modules\nb\models\ItemsAliasQuery;

trait ItemsAliasTrait {

  public static function findItemsAlias()
  {
      return new ItemsAliasQuery('\frontend\modules\newborn7\models\ItemsAlias');
  }

  public function getItems($key){
      return static::findItemsAlias()->load($key);
  }
}
