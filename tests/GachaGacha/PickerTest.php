<?php

require_once (dirname(__FILE__) .'/../../src/autoload.php');


class PickerTest extends \PHPUnit_Framework_TestCase
{
    public function testPickOne()
    {
        $a = new \GachaGacha\Picker();
        $a->set('Marks',    10.2);
        $a->set('Daniel',   20);
        $a->set('Schuster', 15.15);

        $result = $a->pick(1);
        $this->assertContains($result, array('Schuster', 'Daniel', 'Marks'));
        $result = $a->pick();
        $this->assertContains($result, array('Schuster', 'Daniel', 'Marks'));
    }

    public function testPickMulti()
    {
        $a = new \GachaGacha\Picker();
        $a->set('Marks',    10);
        $a->set('Daniel',   0);
        $a->set('Schuster', 0);

        $b = $a->pick(10);
        $result = array_count_values($b);

        $this->assertTrue(isset($result['Marks']));
    }

    public function testNull()
    {
        $a = new \GachaGacha\Picker();
        $a->set('Marks',    30);
        $result = $a->pick(0);

        $this->assertNull($result);
    }

    public function testException()
    {
        $a = new \GachaGacha\Picker();

        try {
            $a->set('Marks', 'test');
        }
        catch (\Exception $e) {
            return;
        }

        $this->fail();
    }

}