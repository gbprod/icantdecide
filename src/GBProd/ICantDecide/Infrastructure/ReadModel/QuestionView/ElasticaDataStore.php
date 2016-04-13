<?php

namespace GBProd\ICantDecide\Infrastructure\ReadModel\QuestionView;

use Elastica\Type;
use Symfony\Component\Serializer\Serializer;
use Elastica\Query\MatchAll;

class ElasticaDataStore implements DataStore
{
    private $type;

    private $serializer;

    public function __construct(
        Type $type,
        Serializer $serializer
    ) {
        $this->type       = $type;
        $this->serializer = $serializer;
    }

    public function save(QuestionView $view)
    {
        $document = $this->type->createDocument(
            $view->id, 
            $this->serializer->normalize($view)
        );
        
        $this->type->addDocument($document);
    }

    public function findAll()
    {
        $response = $this->type->search(new MatchAll());
        
        return array_map(
            function($result) {
                return $this->serializer->denormalize(
                    $result->getData(),
                    QuestionView::class
                );
            },
            $response->getResults()
        );
    }
}