<?php
/**
 * Created by PhpStorm.
 * User: metzlerd
 * Date: 3/13/16
 * Time: 3:10 PM
 */

namespace Drupal\doctrine\Model;

/**
 * @Entity @Table(name="people")
 **/
class Person {

  /** @Id @Column(type="integer") @GeneratedValue **/
  public $id;

  /** @Column(type="string") **/
  public $name;

}