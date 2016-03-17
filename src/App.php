<?php

namespace Drupal\doctrine;

use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;
/**
 * Class App
 * Basic app class
 */
class App {
  static private $instance;

  private $entityManager;

  /**
   * @return \Drupal\doctrine\App
   */
  static public function instance() {
    if (static::$instance === NULL) {
      static::$instance = new Static();
    }
    return static::$instance;
  }

  /**
   * Constructor
   *
   * This will initialize the model for doctrine?
   */
  public function __construct() {
    $config = Setup::createAnnotationMetadataConfiguration(array(__DIR__."/Model"), TRUE);
    // database configuration parameters
    $conn = array(
      'driver' => 'pdo_sqlite',
      'path' => ':memory:',
    );


    // obtaining the entity manager
    $this->entityManager = EntityManager::create($conn, $config);


  }

  /**
   *
   * @return \Doctrine\ORM\EntityManager
   */
  public function entityManager() {
    return $this->entityManager;
  }
}