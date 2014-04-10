<?php

namespace Dizda\BackupBundle\Tests;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

/**
 * Class MongoDBTest
 *
 * @package Dizda\BackupBundle\Tests\Databases
 */
class AbstractTesting extends WebTestCase
{

    /**
     * Setup the kernel.
     *
     * @return null
     */
    public function setUp()
    {
        $kernel = self::getKernelClass();

        self::$kernel = new $kernel('test', true);
        self::$kernel->boot();
    }

}