<?php

namespace Drupal\compfield18\Plugin\Field\FieldWidget;

use Drupal;
use Drupal\Core\Field\FieldItemListInterface;
use Drupal\Core\Field\WidgetBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Plugin implementation of the 'AddressDefaultWidget' widget.
 *
 * @FieldWidget(
 *   id = "CompDefaultWidget",
 *   module = "compfield18",
 *   label = @Translation("Node-details Widget"),
 *   field_types = {
 *     "Compound"
 *   }
 * )
 */
class CompDefaultWidget extends WidgetBase {

  /**
   * Define the form for the field type.
   * 
   * Inside this method we can define the form used to edit the field type.
   * 
   * Here there is a list of allowed element types: https://goo.gl/XVd4tA
   */
  public function formElement(
    FieldItemListInterface $items,
    $delta, 
    Array $element, 
    Array &$form, 
    FormStateInterface $formState
  ) {

    // Span Text

    $element['spantext'] = [
      '#type' => 'textfield',
      '#title' => t('Span Text'),

      // Set here the current value for this field, or a default value (or 
      // null) if there is no a value
      '#default_value' => isset($items[$delta]->spantext) ? 
          $items[$delta]->spantext : null,

      '#empty_value' => '',
      '#placeholder' => t('Span Text'),
      '#maxlength' => 18,
    ];
    
    // Description

    $element['description'] = [
      '#type' => 'textarea',
      '#title' => t('Description'),
      '#default_value' => isset($items[$delta]->description) ? 
          $items[$delta]->description : null,
      '#empty_value' => '',
      '#placeholder' => t('Description'),
      '#maxlength' => 145,
    ];

    // Sidebar Title

    $element['sidebar_title'] = [
      '#type' => 'textfield',
      '#title' => t('Sidebar Title'),
      '#default_value' => isset($items[$delta]->sidebar_title) ? 
          $items[$delta]->sidebar_title : null,
      '#empty_value' => '',
      '#placeholder' => t('Sidebar Title'),
      '#maxlength' => 21,
    ];
    
    // Card Title

    $element['card_title'] = [
      '#type' => 'textfield',
      '#title' => t('Card Title'),
      '#default_value' => isset($items[$delta]->card_title) ? 
          $items[$delta]->card_title : null,
      '#empty_value' => '',
      '#placeholder' => t('Card Title'),
      '#maxlength' => 18,
    ];
    
    // Card Description

    $element['card_description'] = [
      '#type' => 'textfield',
      '#title' => t('Card Description'),
      '#default_value' => isset($items[$delta]->card_description) ? 
          $items[$delta]->card_description : null,
      '#empty_value' => '',
      '#placeholder' => t('Card Description'),
      '#maxlength' => 76,
    ];
    
    //exp lvl - unsigned integer from 1 - 5
    
    $element['exp_lvl'] = [
      '#type' => 'number',
      '#title' => t('Exp Lvl'),      
      '#default_value' => (isset($items[$delta]->exp_lvl) ? $items[$delta]->exp_lvl : null),
      '#min' => 1,
      '#max' => 5,
    ];

    //Title

    $element['title'] = [
      '#type' => 'textfield',
      '#title' => t('Title'),
      '#default_value' => isset($items[$delta]->title) ? 
          $items[$delta]->title : null,
      '#empty_value' => '',
      '#placeholder' => t('Title'),
    ];
    
    //added JavaScript with title element
    $element['title']['#attached']['library'][] = 'compfield18/compfield_js';
    //added JavaScript with title element
    
    //Thumb Url
    
    $element['thumb_url'] = [
      '#type' => 'url',
      '#title' => t('Thumb Url'),
      '#default_value' => isset($items[$delta]->thumb_url) ? 
          $items[$delta]->thumb_url : null,
      '#empty_value' => '',
      '#placeholder' => t('Thumb Url'),
    ];
    
    //Article Url
    
    $element['article_url'] = [
      '#type' => 'url',
      '#title' => t('Article Url'),
      '#default_value' => isset($items[$delta]->article_url) ? 
          $items[$delta]->article_url : null,
      '#empty_value' => '',
      '#placeholder' => t('Article Url'),
    ];
    
    //Topic Id - min 1, unsigned integer, small - max 65535 source: https://www.drupal.org/docs/7/api/schema-api/data-types/integer
    
    $element['topic_id'] = [
      '#type' => 'number',
      '#title' => t('Topic Id'),      
      '#default_value' => (isset($items[$delta]->topic_id) ? $items[$delta]->topic_id : null),
      '#min' => 1,
      '#max' => 65535,
    ];
    
    //Subtopic Id - required for updating or appending to taxonomy field
    
    $element['subtopic_id'] = [
      '#type' => 'number',
      '#title' => t('Subtopic Id'),      
      '#default_value' => (isset($items[$delta]->subtopic_id) ? $items[$delta]->subtopic_id : null),
      '#min' => 1,
      '#max' => 16777215,
    ];
    
    //Parent Topic

    $element['parent_topic'] = [
      '#type' => 'textfield',
      '#title' => t('Parent Topic'),
      '#default_value' => isset($items[$delta]->parent_topic) ? 
          $items[$delta]->parent_topic : null,
      '#empty_value' => '',
      '#placeholder' => t('Parent Topic'),
      '#maxlength' => 48,
    ];
    
    //Sub Topic

    $element['sub_topic'] = [
      '#type' => 'textfield',
      '#title' => t('Sub Topic'),
      '#default_value' => isset($items[$delta]->sub_topic) ? 
          $items[$delta]->sub_topic : null,
      '#empty_value' => '',
      '#placeholder' => t('Sub Topic'),
      '#maxlength' => 48,
    ];
    
    return $element;
  }

} // class


