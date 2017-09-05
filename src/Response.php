<?php

namespace Gephart\Response;

/**
 * Response
 *
 * @package Gephart\Response
 * @author Michal Katuščák <michal@katuscak.cz>
 * @since 0.2
 */
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

    /**
     * @param string $content
     * @param array $headers
     * @param bool $send_headers
     */
    public function __construct(string $content, array $headers = [], bool $send_headers = true)
    {
        $this->content = $content;
        $this->headers = $headers;
        $this->send_headers = $send_headers;
    }

    /**
     * @return string
     */
    public function render(): string
    {
        if ($this->send_headers) {
            $headers = array_merge($this->getBaseHeaders(), $this->headers);

            foreach ($headers as $header) {
                header($header);
            }
        }

        return $this->content;
    }

    /**
     * @return array
     */
    private function getBaseHeaders(): array
    {
        return [
            "content-type: text/html;charset=utf-8"
        ];
    }

}