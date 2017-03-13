<?php

include_once __DIR__ . "/../vendor/autoload.php";

class ResponseTest extends PHPUnit_Framework_TestCase
{
    public function test()
    {
        ob_start();
        $response = new \Gephart\Response\Response("<body>test</body>", [], false);
        $response->render();
        $response = ob_get_contents();
        ob_end_clean();

        $this->assertTrue($response === "<body>test</body>");
    }
}