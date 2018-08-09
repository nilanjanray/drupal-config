<?php

namespace Drupal\drupal8_training_session\Plugin\Block;

use Drupal\Core\Block\BlockBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Plugin\ContainerFactoryPluginInterface;
use Symfony\Component\DependencyInjection\ContainerInterface; 

use Drupal\drupal8_training_session\TrainingServiceInterface;
use Drupal\Core\Cache\CacheBackendInterface;

/**
 * Provides a 'TrainingnowBlock' block.
 *
 * @Block(
 *  id = "trainingnow_block",
 *  admin_label = @Translation("Training block example"),
 * )
 */
class TrainingnowBlock extends BlockBase implements ContainerFactoryPluginInterface {
  public $trainingservice;
  public function __construct($configurations, $plugin_id, $plugin_defination, TrainingServiceInterface $ti) {
    parent::__construct($configurations, $plugin_id, $plugin_defination);
    $this->trainingservice = $ti;
  }
  /**
   * {@inheritdoc}
   */
  public function defaultConfiguration() {
    return [ ] + parent::defaultConfiguration();
  }

  /**
   * {@inheritdoc}
   */
  public function blockForm($form, FormStateInterface $form_state) {
    $form['block_name'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Training Block Name'),
      '#default_value' => $this->configuration['block_name'],
      '#maxlength' => 64,
      '#size' => 64,
      '#weight' => '0',
    ];
    $form['data'] = [
      '#type' => 'select',
      '#title' => $this->t('Data'),
      '#options' => ['PHP', 'Java', 'Python', 'Linux'],
      '#default_value' => $this->configuration['data'],
      '#weight' => '0',
    ];

    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function blockSubmit($form, FormStateInterface $form_state) {
    $this->configuration['block_name'] = $form_state->getValue('block_name');
    $this->configuration['data'] = $form_state->getValue('data');
  }

  /**
   * {@inheritdoc}
   */
  public function build() {
    // $build = [];
    // $build['trainingnow_block_block_name']['#markup'] = '<p>' . $this->configuration['block_name'] . '</p>';
    // $build['trainingnow_block_data']['#markup'] = '<p>' . $this->configuration['data'] . '</p>';
    if (is_object(\Drupal::cache()->get('training_cache_idea'))) {
      $node = $cache_node;
    }
    else {
     drupal_set_message('Drupal8');
     $node = $this->trainingservice->training(1); 
     \Drupal::cache()->set('training_cache_idea', $node, CacheBackendInterface::CACHE_PERMANENT, ["drupal8:1",]);
    }
    /*return [
      '#markup' => $this->t('Training Block with <p>@name</p> and <b>@data</b>', [
        '@name'=> $this->configuration['block_name'], '@data'=> check_markup(($node->get('body')->getValue())[0]['value'], 'restricted_html'), ]
      ),  
    ];*/
    return [
      '#markup' => 'Time' . date('H:i:s'),
      '#cache' => [
        'tags' => ['drupal8_training_session_currentime'],
	'max-age' => 10,
	'contexts' => ['train_session', ],
      ]
    ];

    //return $build;
  }

  public static function create(ContainerInterface $c, array $configurations, $plugin_id, $plugin_defination) {
    return new static(
      $configurations,
      $plugin_id,
      $plugin_defination,
      $c->get('drupal8_training_session.training')
    );
  }
}
