<?php

namespace GBProd\ICantDecide\Infrastructure\ReadModel\QuestionView;

use Elasticsearch\Client;

class ElasticDataStore implements DataStore
{
    private $client;
    
    public function __construct(Client $client)
    {
        $this->client = $client;        
    }
    
    public function save(QuestionView $view)
    {
        
    }

    public function findAll()
    {
        
    }
}