<?php

use Skape\Zipcode\Validation\ZipcodeExists;
use Mockery as m;

class ZipcodeExistsTest extends PHPUnit_Framework_TestCase
{

    public static function setUpBeforeClass()
    {
        $unitTesting = true;
        $testEnvironment = 'testing';
        require __DIR__.'/../../../../bootstrap/start.php';
    }

    /**
     * @expectedException \ReflectionException
     */
    public function testWithoutIocFinder()
    {
        $validation = new ZipcodeExists();
        $validation->validate('', '', '');
    }

    public function testWithValidCep()
    {
        $finder = m::mock('\Skape\Zipcode\Finder');
        $finder->shouldReceive('find')->andReturn(new \Skape\Zipcode\Response());

        App::instance('ZipcodeFinder', $finder);

        $validation = new ZipcodeExists();
        $this->assertTrue($validation->validate('', '', ''));
    }

    public function testWithInvalidCep()
    {
        $finder = m::mock('\Skape\Zipcode\Finder');
        $finder->shouldReceive('find')->andThrow('\Skape\Zipcode\Exception');

        App::instance('ZipcodeFinder', $finder);

        $validation = new ZipcodeExists();
        $this->assertFalse($validation->validate('', '', ''));
    }

} 