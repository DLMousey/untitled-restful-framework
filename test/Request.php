<?php

use PHPUnit\Framework\TestCase;
use UntitledRestFramework\Protocol;

class Request extends TestCase
{
    /**
     * @param array $data
     * @return void
     * @throws Exception
     * @dataProvider protocolProvider
     */
    public function testHttpProtocolAttributesCorrect(array $data)
    {
        $protocol = new Protocol($data['raw']);
        $this->assertEquals($data['expected']['protocol'], $protocol->getProtocol());
        $this->assertEquals($data['expected']['version'], $protocol->getVersion());
        $this->assertEquals($data['expected']['secure'], $protocol->getSecure());
    }

    public function protocolProvider(): array
    {
        return [
            [
                [
                    'raw' => 'HTTP/1.0',
                    'expected' => [
                        'protocol' => 'HTTP',
                        'version' => 1.0,
                        'secure' => false
                    ]
                ]
            ],
            [
                [
                    'raw' => 'HTTP/1.1',
                    'expected' => [
                        'protocol' => 'HTTP',
                        'version' => 1.1,
                        'secure' => false
                    ]
                ]
            ],
            [
                [
                    'raw' => 'HTTPS/1.1',
                    'expected' => [
                        'protocol' => 'HTTPS',
                        'version' => 1.1,
                        'secure' => true
                    ]
                ]
            ],
            [
                [
                    'raw' => 'HTTPS/2.0',
                    'expected' => [
                        'protocol' => 'HTTPS',
                        'version' => 2.0,
                        'secure' => true
                    ]
                ]
            ]
        ];
    }
}