<?php

interface IDataSource
{
    public function loadSecretKey();
}

class FileDataSource implements IDataSource
{
    public function loadSecretKey(): string
    {
        $key = '';
        $key = file_get_contents('key.txt');
        return $key;
    }
}

class DBDataSource implements IDataSource
{
    public function loadSecretKey(): string
    {
        $key = '';
        $sql = 'SELECT secret_key FROM settings';
        $key = (new PDO)->query($sql);
        return $key;
    }
}

class RedisDataSource implements IDataSource
{
    public function loadSecretKey(): string
    {
        $key = '';
        return $key;
    }
}

class CloudDataSource implements IDataSource
{
    public function loadSecretKey(): string
    {
        $key = '';
        return $key;
    }
}

class Concept
{
    private $client;
    private IDataSource $dataSource;

    public function __construct()
    {
        $this->client = new \GuzzleHttp\Client();
    }

    public function getUserData()
    {
        $params = [
            'auth' => ['user', 'pass'],
            'token' => $this->getSecretKey()
        ];

        $request = new \Request('GET', 'https://api.method', $params);
        $promise = $this->client->sendAsync($request)->then(function ($response) {
            $result = $response->getBody();
        });

        $promise->wait();
    }

    public function getSecretKey(): string
    {
        $this->dataSource->loadSecretKey();
    }

    public function setDataSource(IDataSource $dataSource)
    {
        $this->dataSource = $dataSource;
    }
}