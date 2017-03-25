<?php

namespace Gephart\Response;

class ResponseJson implements ResponseInterface
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

    public function __construct($content, array $headers = [], bool $send_headers = true)
    {
        $this->content = $content;
        $this->headers = $headers;
        $this->send_headers = $send_headers;
    }

    public function render(): string
    {
        if ($this->send_headers) {
            $headers = array_merge($this->getBaseHeaders(), $this->headers);

            foreach ($headers as $header) {
                header($header);
            }
        }

        return json_encode($this->content);
    }

    private function getBaseHeaders(): array
    {
        return [
            "content-type: application/json;charset=utf-8"
        ];
    }

}