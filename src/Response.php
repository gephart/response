<?php

namespace Gephart\Response;

class Response implements ResponseInterface
{

    /**
     * @var string
     */
    private $content;

    /**
     * @var array
     */
    private $headers;

    /**
     * @var bool
     */
    private $send_headers;

    public function __construct(string $content, array $headers = [], bool $send_headers = true)
    {
        $this->content = $content;
        $this->headers = $headers;
        $this->send_headers = $send_headers;
    }

    public function render()
    {
        if ($this->send_headers) {
            $headers = array_merge($this->getBaseHeaders(), $this->headers);

            foreach ($headers as $header) {
                header($header);
            }
        }

        echo $this->content;
    }

    private function getBaseHeaders(): array
    {
        return [
            "content-type: text/html;charset=utf-8"
        ];
    }

}