<?php

namespace frontend\modules\nb\traits;

use frontend\modules\nb\models\query\ItemsAliasQuery;

trait ItemsAliasTrait {

  private $_itemsModel = null;

  private static function initItemsAlias()
  {
      return new ItemsAliasQuery('\frontend\modules\nb\models\ItemsAlias');
  }

  private function getItemsAlias()
  {
    if($this->_itemsModel == null)
    {
      $this->_itemsModel =  static::initItemsAlias();
    }
    return $this->_itemsModel;
  }

  public function getItems( $key )
  {
    return $this->getItemsAlias()->load($key);
  }

  public function getItemsLabel( $group, $key )
  {
    $items =  $this->getItemsAlias()->load($group);
    return array_key_exists($key,$items) ? $items[$key] : '';
  }

  public function getItemsNumber( $start = 1, $end = 5 )
  {
    $rang  =  range($start,$end);
    $items = [];
    foreach ($rang as $key => $value) {
      $items[$value] = $value;
    }
    return $items;
  }

  private function getRelationField($relationName, $fieldName, $defaultValue = null){
    return isset($this->{$relationName}) ? $this->{$relationName}->{$fieldName} : $defaultValue;
  }


  public function setStandardFormatdate($field)
  {
    if(strlen($this->{$field}) >= 10){
      return (date('Y',strtotime($this->{$field}))-543).date('-m-d',strtotime($this->{$field})).' '.date('H:i:s',strtotime($this->{$field}));
    }else{
      return (date('Y',strtotime($this->{$field}))-543).date('-m-d',strtotime($this->{$field}));
    }
  }

  public function setThaiFormatdate($field)
  {
    if(in_array($this->{$field},['0000-00-00','0000-00-00 00:00:00']) || empty($this->{$field}))
    {
      return null;
    }
    if(strlen($this->{$field}) >= 10 ){
      return date('d-m-',strtotime($this->{$field})). (date('Y',strtotime($this->{$field}))+543).' '.date('H:i:s',strtotime($this->{$field}));
    }else{
      return date('d-m-',strtotime($this->{$field})). (date('Y',strtotime($this->{$field}))+543);
    }
  }

  /** ============================================================================================================
  * @referent http://php.net/manual/en/function.date-diff.php
  * PARA: Date Should In YYYY-MM-DD Format
  * ==============================================================================================================
  * RESULT FORMAT:
  *  '%y Year %m Month %d Day %h Hours %i Minute %s Seconds' =>  1 Year 3 Month 14 Day 11 Hours 49 Minute 36 Seconds
  *  '%y Year %m Month %d Day'                               =>  1 Year 3 Month 14 Days
  *  '%m Month %d Day'                                       =>  3 Month 14 Day
  *  '%d Day %h Hours'                                       =>  14 Day 11 Hours
  *  '%d Day'                                                =>  14 Days
  *  '%h Hours %i Minute %s Seconds'                         =>  11 Hours 49 Minute 36 Seconds
  *  '%i Minute %s Seconds'                                  =>  49 Minute 36 Seconds
  *  '%h Hours                                               =>  11 Hours
  *  '%a Days                                                =>  468 Days
  ===========================================================================***/

  public function dateDifference( $birth_date , $current_date, $differenceFormat = '%y' )
  {
      $interval  = date_diff(date_create($birth_date), date_create($current_date));
      return $interval->format($differenceFormat);
  }

  public function getCurrentAge( $attribute, $format = '%y' )
  {
    return $this->dateDifference($this->getOldAttribute($attribute), date('Y-m-d'), $format);
  }
}
