<?php

namespace mynamespace;

use SilverStripe\Assets\Image;
use SilverStripe\ORM\DataObject;
use SilverStripe\ORM\FieldType\DBField;

class MyDataObject extends DataObject {

  private static $db = [
    'Title' => 'Varchar',
    'Description' => 'Text',
  ];

  private static $has_one = [
    'Image' => Image::class,
  ];

  // Publishes image when saving MyDataObject
  private static $owns = [
    'Image',
  ];

  // Title => Field shown in admin summary
  private static $summary_fields = [
    'Title' => 'Title',
    'ViewableLink' => 'PDF Link',
  ];

  // Returns a clickable link for use in admin
  public function getViewableLink() {
    return DBField::create_field(
      'HTMLText',
      sprintf('<a target="_blank" href="%1$s">%1$s</a>', $this->PDFLink())
    );
  }

  // Can be used to link to pdf in templates etc
  public function PDFLink() {
    return '/pdf/' . $this->ID;
  }
}