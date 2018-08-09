<?php

namespace Drupal\drupal8_training_session\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Class TrainingForm.
 */
class TrainingForm extends FormBase {


  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'training_form';
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    $form['label1'] = [
      '#type' => 'text_format',
      '#title' => $this->t('Label1'),
      '#description' => $this->t('This the testing label'),
      '#default_value' => Training,
      '#weight' => '0',
    ];
    $form['label2'] = [
      '#type' => 'radios',
      '#title' => $this->t('Label2'),
      '#options' => ['First1' => $this->t('First1'), 'Second' => $this->t('Second')],
      '#default_value' => 0,
      '#weight' => '0',
    ];
    $form['submit'] = [
      '#type' => 'submit',
      '#value' => $this->t('Submit'),
    ];

    return $form;
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
    // Display result.
    foreach ($form_state->getValues() as $key => $value) {
      drupal_set_message($key . ': ' . $value);
    }

  }

}
