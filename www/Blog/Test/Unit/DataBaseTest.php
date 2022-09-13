<?php

namespace Blog\Test\Unit;

use Blog\DataBase;
use PDO;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;

class DataBaseTest extends TestCase
{
    /**
     * @var DataBase
     */
    private DataBase $object;

    /**
     * @var MockObject|PDO
     */
    private MockObject $connection;

    protected function setUp(): void
    {
        $this->connection = $this->createMock(PDO::class);
        $this->object = new DataBase($this->connection);
    }

    public function testGetConnection(): void
    {
        $result = $this->object->getConnection();
        $this->assertInstanceOf(PDO::class, $result);
        $this->assertNotEmpty($result);
    }


}