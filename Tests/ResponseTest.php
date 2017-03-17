<?php

include_once __DIR__ . "/../vendor/autoload.php";

class ResponseTest extends \PHPUnit\Framework\TestCase
{
    public function test()
    {
        $response = new \Gephart\Response\Response("<body>test</body>", [], false);
        $response = $response->render();

        $this->assertTrue($response === "<body>test</body>");
    }
}