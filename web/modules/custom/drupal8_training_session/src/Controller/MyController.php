<?php

namespace Drupal\drupal8_training_session\Controller;

use Drupal\Core\Controller\ControllerBase;

/**
 * Class MyController.
 */
class MyController extends ControllerBase {

  /**
   * Helloworld.
   *
   * @return string
   *   Return Hello string.
   */
  public function helloworld() {
    return [
      '#type' => 'markup',
      '#markup' => $this->t('Implement method: helloworld')
    ];
  }

}
