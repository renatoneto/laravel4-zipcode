<?php

use Skape\Zipcode\Finder;
use Mockery as m;

class FinderTest extends PHPUnit_Framework_TestCase
{

    public function testAdapterSet()
    {
        $adapter = m::mock('\Skape\Zipcode\Adapter\AdapterInterface');

        $finder = new Finder($adapter);
        $this->assertEquals($adapter, $finder->getAdapter());
    }

} 