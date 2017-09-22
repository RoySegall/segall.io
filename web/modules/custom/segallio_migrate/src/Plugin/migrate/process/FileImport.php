<?php

/**
 * @file
 * Contain \Drupal\segallio_migrate\migrate\process
 */

namespace Drupal\segallio_migrate\Plugin\migrate\process;

use Drupal\migrate\MigrateExecutableInterface;
use Drupal\migrate\ProcessPluginBase;
use Drupal\migrate\Row;

/**
 * Importing a file.
 *
 * @MigrateProcessPlugin(
 *   id = "file_import"
 * )
 */
class FileImport extends ProcessPluginBase {

  /**
   * {@inheritdoc}
   */
  public function transform($value, MigrateExecutableInterface $migrate_executable, Row $row, $destination_property) {
    $source = drupal_get_path('module', 'segallio_migrate') . '/assets/images/' . $value;

    if (!$uri = file_unmanaged_copy($source)) {
      return [];
    }

    $file = \Drupal::entityTypeManager()->getStorage('file')->create(['uri' => $uri]);
    $file->save();

    return $file->id();
  }
}