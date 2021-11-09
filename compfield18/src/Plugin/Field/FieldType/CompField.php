<?php

namespace Drupal\compfield18\Plugin\Field\FieldType;

use Drupal\Core\Field\FieldItemBase;
use Drupal\Core\TypedData\DataDefinition;
use Drupal\Core\Field\FieldStorageDefinitionInterface as StorageDefinition;

/**
 * Plugin implementation of the 'address' field type.
 *
 * @FieldType(
 *   id = "Compound",
 *   module = "compfield18",
 *   label = @Translation("Compound"),
 *   description = @Translation("Compound field."),
 *   category = @Translation("Compound"),
 *   default_widget = "CompDefaultWidget"
 * )
 */
class CompField extends FieldItemBase {

  /**
   * Field type properties definition.
   * 
   * Inside this method we defines all the fields (properties) that our 
   * custom field type will have.
   * 
   * Here there is a list of allowed property types: https://goo.gl/sIBBgO
   */
  public static function propertyDefinitions(StorageDefinition $storage) {

    $properties = [];

    $properties['spantext'] = DataDefinition::create('string')
      ->setLabel(t('Span Text'));
      
    $properties['description'] = DataDefinition::create('string')
      ->setLabel(t('Description'));              

    $properties['sidebar_title'] = DataDefinition::create('string')
      ->setLabel(t('Sidebar Title'));
      
    $properties['card_title'] = DataDefinition::create('string')
      ->setLabel(t('Card Title'));

    $properties['card_description'] = DataDefinition::create('string')
      ->setLabel(t('Card Description'));  
      
    $properties['exp_lvl'] = DataDefinition::create('integer')
      ->setLabel(t('Exp Lvl'));  
    
    $properties['title'] = DataDefinition::create('string')
      ->setLabel(t('Title'));
      
    $properties['thumb_url'] = DataDefinition::create('string')
      ->setLabel(t('Thumb Url'));  
    
    $properties['article_url'] = DataDefinition::create('string')
      ->setLabel(t('Article Url'));
    
    $properties['topic_id'] = DataDefinition::create('integer')
      ->setLabel(t('Topic Id'));
    
    $properties['subtopic_id'] = DataDefinition::create('integer')
      ->setLabel(t('Subtopic Id'));    
      
    $properties['parent_topic'] = DataDefinition::create('string')
      ->setLabel(t('Parent Topic'));

    $properties['sub_topic'] = DataDefinition::create('string')
      ->setLabel(t('Sub Topic'));  
      
    return $properties;
  }

  /**
   * Field type schema definition.
   * 
   * Inside this method we defines the database schema used to store data for 
   * our field type.
   * 
   * Here there is a list of allowed column types: https://goo.gl/YY3G7s
   */
  public static function schema(StorageDefinition $storage) {

    $columns = [];
    $columns['spantext'] = [
      'type' => 'char',
      'length' => 20,
    ];
    $columns['description'] = [
      'type' => 'char',
      'length' => 155,
    ];
    $columns['sidebar_title'] = [
      'type' => 'char',
      'length' => 25,
    ];
    $columns['card_title'] = [
      'type' => 'char',
      'length' => 20,
    ];
    $columns['card_description'] = [
      'type' => 'char',
      'length' => 80,
    ];
    $columns['exp_lvl'] = [
      'type' => 'int',
      'unsigned' => TRUE,
      'size' => 'tiny',
    ];
    $columns['title'] = [
      'type' => 'char',
      'length' => 255,
    ];
    $columns['thumb_url'] = [
      'type' => 'char',
      'length' => 255,
    ];
    $columns['article_url'] = [
      'type' => 'char',
      'length' => 255,
    ];
    $columns['topic_id'] = [
      'type' => 'int',
      'unsigned' => TRUE,
      'size' => 'small',
    ];
    $columns['subtopic_id'] = [
      'type' => 'int',
      'unsigned' => TRUE,
      'size' => 'medium',
    ];
    $columns['parent_topic'] = [
      'type' => 'char',
      'length' => 50,
    ];
    $columns['sub_topic'] = [
      'type' => 'char',
      'length' => 50,
    ];

    return [
      'columns' => $columns,
      'indexes' => [],
    ];
  }

  /**
   * Define when the field type is empty. 
   * 
   * This method is important and used internally by Drupal. Take a moment
   * to define when the field fype must be considered empty.
   */
  public function isEmpty() {

    $isEmpty = 
      empty($this->get('spantext')->getValue()) &&
      empty($this->get('description')->getValue()) &&
      empty($this->get('sidebar_title')->getValue()) &&
      empty($this->get('card_title')->getValue()) &&
      empty($this->get('card_description')->getValue()) &&
      empty($this->get('exp_lvl')->getValue()) &&
      empty($this->get('title')->getValue()) &&
      empty($this->get('thumb_url')->getValue()) &&
      empty($this->get('article_url')->getValue()) &&      
      empty($this->get('topic_id')->getValue()) &&
      empty($this->get('subtopic_id')->getValue()) &&
      empty($this->get('parent_topic')->getValue()) &&
      empty($this->get('sub_topic')->getValue());

    return $isEmpty;
  }

} // class


