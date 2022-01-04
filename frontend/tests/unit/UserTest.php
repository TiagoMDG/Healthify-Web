<?php
namespace frontend\tests;

use common\models\Userprofiles;

class UserTest extends \Codeception\Test\Unit
{
    /**
     * @var \frontend\tests\UnitTester
     */
    protected $tester;
    
    protected function _before()
    {
    }

    protected function _after()
    {
    }
    function testInvalidUser()
    {
        //Teste Create
        $pessoa = new Userprofiles();
        $pessoa->name = 'Pedro';
        $pessoa->nif = 'Caranguejeira';
        $pessoa->cellphone = 123456789;
        $pessoa->street = 'pedro@aulas.pt';
        $pessoa->door = 'pedro@aulas.pt';
        $pessoa->floor = 'pedro@aulas.pt';
        $pessoa->city = 'pedro@aulas.pt';
        $pessoa->userid = 2;
        $pessoa->save();
        $this->assertTrue($pessoa->save());

        //Teste READ
        $this->assertEquals('Pedro', $pessoa->Nome);

        //Teste Update
        $pessoa->Nome = 'Gil';
        $pessoa->save();
        $this->assertEquals('Gil', $pessoa->Nome);

        //Teste DELETE
        $pessoa->delete();
        $this->assertEquals(0,$pessoa->delete());


    }
    // tests
    public function testSomeFeature()
    {
    }
}