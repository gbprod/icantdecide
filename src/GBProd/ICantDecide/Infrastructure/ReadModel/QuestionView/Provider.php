<?php

namespace GBProd\ICantDecide\Infrastructure\ReadModel\QuestionView;

use GBProd\ElasticaProviderBundle\Provider\BulkProvider;
use GBProd\ICantDecide\CoreDomain\Question\QuestionRepository;
use Symfony\Component\Serializer\Serializer;

class Provider extends BulkProvider
{
    private $repository;
    private $serializer;
    
    public function __construct(QuestionRepository $repository, Serializer $serializer)
    {
        $this->repository = $repository;
        $this->serializer = $serializer;
    }
    
    public function populate()
    {
        $questions = $this->repository->findAll();
        
        foreach ($questions as $question) {
            $view = QuestionView::fromQuestion($question);
            
            $this->index(
                $view->id, 
                $this->serializer->normalize($view)
            );
        }
    }
    
    public function count()
    {
        return $this->repository->countAll();
    }
}