<?php

  $fids = Drupal::entityQuery('file')->execute();
  $file_usage = Drupal::service('file.usage');
  $datetime = Drupal::service('date.formatter');
  $i = 0;

  foreach ($fids as $fid) {
    $i++;
    $file = Drupal\file\Entity\File::load($fid);

    $fileDate = $datetime->format($file->getCreatedTime(), 'custom', "Y-m-d", null);
    if ($fileDate <= '2020-08-15') {
      echo '\n';
      print_r($fileDate);
      try {
        $file->delete();
      } catch (\Drupal\Core\Entity\EntityStorageException $e) {
        echo $e->getMessage();
      }
      //echo 'File deleted ' . $i;
      echo $i;
    }

  }


