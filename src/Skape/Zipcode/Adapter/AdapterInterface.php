<?php
namespace Skape\Zipcode\Adapter;

interface AdapterInterface
{

    /**
     * @param $zipcode
     * @return \Skape\Zipcode\Response
     */
    public function find($zipcode);

} 