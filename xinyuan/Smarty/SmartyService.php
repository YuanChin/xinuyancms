<?php

namespace Xinyuan\Smarty;

use Smarty;
use Xinyuan\Container\Container;

class SmartyService
{
  public function register(Container $container)
  {
      $container->bind('smarty', function () {
          $smarty = new Smarty();
          $smarty->template_dir = __BASEDIR__ . '/resources/views/';
          $smarty->compile_dir = __BASEDIR__ . '/storage/framework/views/';
          $smarty->default_modifiers = ['escape:"htmlall"'];

          return $smarty;
      });
  }
}