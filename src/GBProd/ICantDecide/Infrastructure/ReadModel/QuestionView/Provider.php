<?php

namespace GBProd\ICantDecide\Infrastructure\ReadModel\QuestionView;

use GBProd\ICantDecide\CoreDomain\Question\QuestionRepository;
use GBProd\ICantDecide\Infrastructure\ReadModel\QuestionView\Repository as ViewRepository;
use FOS\ElasticaBundle\Provider\ProviderInterface;

class Provider implements ProviderInterface
{
    protected $viewRepository;

    protected $domainRepository;

    public function __construct(
        ViewRepository $viewRepository,
        QuestionRepository $repository
    ) {
        $this->viewRepository   = $viewRepository;
        $this->domainRepository = $repository;
    }

    /**
     * Insert the repository objects in the type index
     *
     * @param \Closure $loggerClosure
     * @param array    $options
     */
    public function populate(
        \Closure $loggerClosure = null,
        array $options = array()
    ) {
        $questions = $this->domainRepository->findAll();

        foreach ($questions as $question) {
            $view = QuestionView::fromQuestion($question);
            $this->viewRepository->save($view);
        }
    }
}