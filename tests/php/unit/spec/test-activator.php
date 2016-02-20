<?php
namespace WC_SLM\Unit\Test;

class Activator extends \PHPUnit_Framework_TestCase {

  function test_check_requirements(){

    $notices = $this->getMockBuilder('Notices')
      ->setMethods(array('add'))
      ->getMock();

    $notices->expects( $this->once() )
      ->method( 'add' );

    $activator = new \WC_SLM\Activator( $notices );
    $this->assertTrue( $activator->check_requirements('4.4.4', '4.4') );
    $this->assertFalse( $activator->check_requirements('4.4', '4.4.4') );

  }

}