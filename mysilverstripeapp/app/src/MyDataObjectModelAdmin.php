<?php

namespace mynamespace;

use SilverStripe\Admin\ModelAdmin;

class MyDataObjectsModelAdmin extends ModelAdmin {

  private static $managed_models = [
    MyDataObject::class,
  ];

  private static $url_segment = 'my-data-objects';

  private static $menu_title = 'My data objects';
}