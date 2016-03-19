<?php

namespace GBProd\ICantDecide\Infrastructure\ReadModel\QuestionView;

use Elastica\Type;
use Elastica\Document;
use Symfony\Component\Serializer\Serializer;

class DataStore
{
    private $type;
    private $serializer;

    public function __construct(Type $type, Serializer $serializer)
    {
        $this->type       = $type;
        $this->serializer = $serializer;
    }

    public function save(QuestionView $view)
    {
        $document = new Document(
            $view->id,
            $this->serializer->serialize($view, 'json')
        );

        $this->type->addDocument($document);
        $this->type->getIndex()->refresh();
    }

    public function findAll()
    {
        return $this->type->search()->getResults();
    }
}