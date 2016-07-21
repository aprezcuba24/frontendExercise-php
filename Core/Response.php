<?php

/**
 * @author: Renier Ricardo Figueredo
 * @mail: aprezcuba24@gmail.com
 */
namespace Core;

class Response
{
    protected $content;
    protected $status;
    protected $headers;

    public function __construct($content, $status = 200, $headers = [])
    {
        $this->content = $content;
        $this->status  = $status;
        $this->headers = $headers;
    }

    public function __toString()
    {
        header(sprintf('HTTP/1.0 %s', $this->status), true, $this->status);
        foreach ($this->headers as $key => $value) {
            header($key.': '.$value, false, $this->status);
        }
        return $this->content;
    }
}