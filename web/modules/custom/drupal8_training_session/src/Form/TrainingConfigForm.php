<?php

namespace Drupal\drupal8_training_session\Form;

use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Class TrainingConfigForm.
 */
class TrainingConfigForm extends ConfigFormBase {

  /**
   * {@inheritdoc}
   */
  protected function getEditableConfigNames() {
    return [
      'drupal8_training_session.trainingconfig',
    ];
  }

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'training_config_form';
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    $config = $this->config('drupal8_training_session.trainingconfig');
    $form['firtname'] = [
      '#type' => 'textfield',
      '#title' => $this->t('FirtName'),
      '#description' => $this->t('First Name of Trainer'),
      '#maxlength' => 64,
      '#size' => 64,
      '#default_value' => $config->get('firtname'),
    ];
    $form['languages'] = [
      '#type' => 'select',
      '#title' => $this->t('Languages'),
      '#options' => ['PHP' => $this->t('PHP'), 'Drupal' => $this->t('Drupal'), 'Java' => $this->t('Java'), 'Node' => $this->t('Node'), 'Python' => $this->t('Python'), '.NET' => $this->t('.NET')],
      '#size' => 5,
      '#default_value' => $config->get('languages'),
    ];
    return parent::buildForm($form, $form_state);
  }

  /**
   * {@inheritdoc}
   */
  public function validateForm(array &$form, FormStateInterface $form_state) {
    parent::validateForm($form, $form_state);
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    parent::submitForm($form, $form_state);

    $this->config('drupal8_training_session.trainingconfig')
      ->set('firtname', $form_state->getValue('firtname'))
      ->set('languages', $form_state->getValue('languages'))
      ->save();
  }

}
