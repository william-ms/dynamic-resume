<?php
  namespace app\core;

  class FolderExtract
  {
    public static function extract($uri):string
    {
      $folder = Uri::uriExist($uri, index:0);

      if($folder)
      {
        return (is_dir(strtolower(string: ROOT.CONTROLLER_PATH.$folder)))
        ? $folder
        : '';
      }

      return CONTROLLER_FOLDER_DEFAULT;
    }
  }