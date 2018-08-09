<?php

namespace Drupal\drupal8_training_session\Event;
use Symfony\Component\EventDispatcher\Event;


class Drupal8TrainingEvent extends Event {

  const EVENT_NAME = 'mytraining';
  public function __construct() {
    //
  }

}	

