<?php

namespace Drupal\drupal8_training_session\Controller;

use Drupal\Core\Controller\ControllerBase;
// use Drupal\Core\Session\AccountInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Drupal\Core\Entity\EntityTypeManagerInterface;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;

use Drupal\drupal8_training_session\Event\Drupal8TrainingEvent;
/**
 * Class TrainingController.
 */
class TrainingController extends ControllerBase {

	
  public $entitymanager;
  public $eventdipatch;

  public function __construct(EntityTypeManagerInterface $em, EventDispatcherInterface $eventdipatch) {
    $this->entitymanager = $em;
    $this->eventdipatch = $eventdipatch;
  }

  /**
   * Trainingconcepts.
   *
   * @return string
   *   Return markup string.
   */
   public function trainingconcepts($checkdrupal, $name, $mytype) {
      //print_r(\Drupal::service('entity_type.manager')->getStorage('node'));
      // Event subscriber implementation of Training class
      $this->eventdipatch->dispatch(Drupal8TrainingEvent::EVENT_NAME, new Drupal8TrainingEvent());
      $node = $this->entitymanager->getStorage('node')->load(1);
     // print_r($node->get('body')->getString());
     return [
       '#type' => 'markup',
       '#markup' => $this->t('Here is the training concepts all about regarding Drupal8 @name and @mytype, <b>@check</b> , @node-body', [
	 '@name' => $name, '@mytype' => $mytype, '@check' => ksm($node),
	    '@node-body' => check_markup(($node->get('body')->getValue())[0]['value'], 'restricted_html'),
         ]
       ),
     ];
   }
  public static function create(ContainerInterface $c) {
     return new static($c->get('entity_type.manager'), $c->get('event_dispatcher'));
   }
}
