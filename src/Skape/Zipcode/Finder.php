<?php
namespace Skape\Zipcode;

use Skape\Zipcode\Adapter\AdapterInterface;

class Finder
{

    /**
     * @var \Skape\Zipcode\Adapter\AdapterInterface
     */
    protected $adapter;

    public function _construct(AdapterInterface $adapter)
    {
        $this->setAdapter($adapter);
    }

    /**
     * @param \Skape\Zipcode\Adapter\AdapterInterface $adapter
     */
    public function setAdapter(AdapterInterface $adapter)
    {
        $this->adapter = $adapter;
    }

    /**
     * @return \Skape\Zipcode\Adapter\AdapterInterface
     */
    public function getAdapter()
    {
        return $this->adapter;
    }

    public function find($zipcode)
    {
        return $this->getAdapter()->find($zipcode);
    }

} 