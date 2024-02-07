<?php
  //config
  define('ENVIRONMENT', 'development');

  // paths
  define('ROOT', dirname(path:__FILE__, levels:3));
  define('VIEW_PATH', '/app/views/');
  define('CONTROLLER_PATH', '/app/controllers/');
  define('CONTROLLER_DEFAULT', 'Home');
  define('CONTROLLER_FOLDER_DEFAULT', '');

  define('CSS_PATH', '/assets/css/');
  define('JAVASCRIPT_PATH', '/assets/js/');
  define('IMAGE_PATH', '/assets/images/');

  // validate
  define('REQUIRED', 'ValidateRequired');
  define('EMAIL', 'ValidateEmail');
  define('MAXLEN', 'ValidateMaxlen');
