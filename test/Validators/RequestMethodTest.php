<?php

namespace Validators;

use PHPUnit\Framework\TestCase;
use UntitledRestFramework\Validators\RequestMethod;

class RequestMethodTest extends TestCase
{
    /**
     * @dataProvider validMethodNameProvider
     */
    public function testMethodNamePassesValidation($method)
    {
        $this->assertTrue(RequestMethod::Validate($method));
        $this->assertTrue(RequestMethod::Validate(strtoupper($method)));
        $this->assertTrue(RequestMethod::Validate(strtolower($method)));
    }

    /**
     * @dataProvider invalidMethodNameProvider
     */
    public function testInvalidMethodNameFailsValidation($method)
    {
        $this->assertFalse(RequestMethod::Validate($method));
        $this->assertFalse(RequestMethod::Validate(strtoupper($method)));
        $this->assertFalse(RequestMethod::Validate(strtolower($method)));
    }

    public function validMethodNameProvider(): array
    {
        return [
            ['GeT'],
            ['HeAd'],
            ['PoSt'],
            ['PuT'],
            ['DeLeTe'],
            ['CoNnEcT'],
            ['OpTiOnS'],
            ['TrAcE'],
            ['PaTcH']
        ];
    }

    public function invalidMethodNameProvider(): array
    {
        return [
            ['NoT'],
            ['A'],
            ['MeThoD'],
            ['RaNdOm'],
            ['FoO'],
            ['BaR'],
            ['BaZ'],
            ['<script type="text/javascript">xss lol</script>']
        ];
    }
}