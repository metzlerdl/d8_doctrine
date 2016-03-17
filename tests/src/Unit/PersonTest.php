<?php
/**
 * Created by PhpStorm.
 * User: metzlerd
 * Date: 3/13/16
 * Time: 3:16 PM
 */


namespace Drupal\Tests\doctrine\Unit;
use Drupal\doctrine\App;
use Drupal\doctrine\Model\Person;
use Drupal\Tests\UnitTestCase;

/**
 * @group Sandbox
 * @require module doctrine
 * @coversDefaultClass \Drupal\doctrine\App
 */
class PersonTest extends UnitTestCase {

  /**
   * Make sure we can talk to doctrine.
   */
  public function testDoctrine() {
    $app = App::instance()->instance();
    $em = $app->entityManager();
    $this->assertNotNull($em, "EntityManager created");
    // Generate schema
    $tool = new \Doctrine\ORM\Tools\SchemaTool($em);
    $classes = [
      $em->getClassMetadata('\Drupal\doctrine\Model\Person')
    ];
    $tool->createSchema($classes);
  }

  /**
   * Verify creation of a person
   */
  public function testCreatePerson() {
    $em = App::instance()->entityManager();
    $person = new Person();
    $person->name = 'Dave';
    $em->persist($person);
    $em->flush();
    // Now find out if we have a person.
    $users = $em->getRepository('\Drupal\doctrine\Model\Person');
    $objects = $users->findAll();
    $this->assertEquals('Dave', $objects[0]->name);
  }

}