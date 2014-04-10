<?php

namespace Dizda\BackupBundle\Tests\Databases;

use Dizda\BackupBundle\Tests\AbstractTesting;

/**
 * Class MongoDBTest
 *
 * @package Dizda\BackupBundle\Tests\Databases
 */
class MongoDBTest extends AbstractTesting
{
    /**
     * Test different commands
     */
    public function testGetCommand()
    {
        $mongodb = self::$kernel->getContainer()->get('dizda.Backup.database.mongodb');

        // dump all dbs
        $mongodb->__construct(true, 'localhost', 27017, 'dizbdd', null, null, 'localhost');
        $this->assertEquals($mongodb->getCommand(), 'mongodump -h localhost --port 27017  --out ');

        // dump one db with not auth
        $mongodb->__construct(false, 'localhost', 27017, 'dizbdd', null, null, 'localhost');
        $this->assertEquals($mongodb->getCommand(), 'mongodump -h localhost --port 27017 --db dizbdd --out ');

        // dump one db with auth
        $mongodb->__construct(false, 'localhost', 27017, 'dizbdd', 'dizda', 'imRootBro', 'localhost');
        $this->assertEquals($mongodb->getCommand(), 'mongodump -h localhost --port 27017 -u dizda -p imRootBro --db dizbdd --out ');
    }

}
