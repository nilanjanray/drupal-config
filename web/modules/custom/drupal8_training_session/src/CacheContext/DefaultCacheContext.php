<?php

namespace Drupal\drupal8_training_session\CacheContext;

use Drupal\Core\Cache\CacheableMetadata;
use Drupal\Core\Cache\Context\CacheContextInterface;

/**
* Class DefaultCacheContext.
*/
class DefaultCacheContext implements CacheContextInterface {


  /**
   * Constructs a new DefaultCacheContext object.
   */
  public function __construct() {
  
  }

  /**
  * {@inheritdoc}
  */
  public static function getLabel() {
    drupal_set_message('Lable of cache context');
  }

  /**
  * {@inheritdoc}
  */
  public function getContext() {
    // Actual logic of context variation will lie here.
  }

  /**
  * {@inheritdoc}
  */
  public function getCacheableMetadata() {
    return new CacheableMetadata();
  }

}
