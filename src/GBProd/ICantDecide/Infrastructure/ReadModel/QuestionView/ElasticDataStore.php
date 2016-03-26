<?php

namespace GBProd\ICantDecide\Infrastructure\ReadModel\QuestionView;

use Elasticsearch\Client;
use Symfony\Component\Serializer\Serializer;

class ElasticDataStore implements DataStore
{
    private $client;

    private $serializer;

    private $index;

    private $type;

    public function __construct(
        Client $client,
        Serializer $serializer,
        $index,
        $type
    ) {
        $this->client     = $client;
        $this->serializer = $serializer;
        $this->index      = $index;
        $this->type       = $type;
    }

    public function save(QuestionView $view)
    {
        $response = $this->client->index([
            'index' => $this->index,
            'type'  => $this->type,
            'id'    => $view->id,
            'body'  => $this->serializer->normalize($view),
        ]);
    }

    public function findAll()
    {
        $response = $this->client->search([
            'index' => $this->index,
            'type'  => $this->type,
        ]);

        $response['hits']['hits'] = array_map(
            function($result) {
                $result['_source'] = $this->serializer->denormalize(
                    $result['_source'],
                    QuestionView::class
                );

                return $result;
            },
            $response['hits']['hits']
        );

        return $response;
    }
}