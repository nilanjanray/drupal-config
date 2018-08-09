<?php

namespace Drupal\drupal8_training_session\EventSubscriber;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\EventDispatcher\Event;
use Drupal\Core\Entity\EntityTypeManagerInterface;

use Drupal\drupal8_training_session\Event\Drupal8TrainingEvent;

/**
 * Class TrainingEventSubscriber.
 */
class TrainingEventSubscriber implements EventSubscriberInterface {


  public $myentity;
  /**
   * Constructs a new TrainingEventSubscriber object.
   */
  public function __construct(EntityTypeManagerInterface $em) {
    $this->myentity = $em;
  }

  /**
   * {@inheritdoc}
   */
  public static function getSubscribedEvents() {
    $events[Drupal8TrainingEvent::EVENT_NAME] = ['mytraining'];

    return $events;
  }

  /**
   * This method is called whenever the mytraining event is
   * dispatched.
   *
   * @param GetResponseEvent $event
   */
  public function mytraining(Drupal8TrainingEvent $event) {
    ksm($event);
    drupal_set_message('Event mytraining thrown by Subscriber in module drupal8_training_session.', 'status', TRUE);
  }

}
