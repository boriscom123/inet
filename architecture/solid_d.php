<?php

interface IRequestService
{
    public function request($url, $method, $options);

}

abstract class XMLHTTPRequestService implements IRequestService
{
    abstract public function request($url, $method, $options);
}

class XMLHttpService extends XMLHTTPRequestService
{
    public function request($url, $method, $options = [])
    {
    }
}

class Http
{
    private IRequestService $service;

    public function __construct(IRequestService $xmlHttpService)
    {
        $this->service = $xmlHttpService;
    }

    public function get(string $url, array $options)
    {
        $this->service->request($url, 'GET', $options);
    }

    public function post(string $url, array $options)
    {
        $this->service->request($url, 'POST', $options);
    }
}