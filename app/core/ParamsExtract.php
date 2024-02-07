<?php
  namespace app\core;

  class ParamsExtract
  {
    public static function extract($uri, $sliceIndexStartFrom)
    {
      $countUri = count($uri);

      return array_slice($uri, $sliceIndexStartFrom, $countUri);
    }
  }