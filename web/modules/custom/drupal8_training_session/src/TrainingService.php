<?php

namespace Drupal\drupal8_training_session;
use Drupal\Core\Entity\EntityTypeManagerInterface;
/**
 * Class TrainingService.
 */
class TrainingService implements TrainingServiceInterface {

  public $variables;
  /**
   * Constructs a new TrainingService object.
   */
  public function __construct(EntityTypeManagerInterface $em) {
    $this->variables = $em;
  }

  /**
   * The function related my training information of node.
   *
   * @param int $id
   *   This the node id.
   *
   * @return object
   *   This about node. 
   */
  public function training($id) {
    $node = $this->variables->getStorage('node')->load($id);
    return $node;	
  }
}
