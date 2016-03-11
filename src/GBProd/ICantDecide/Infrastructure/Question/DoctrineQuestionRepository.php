<?php

namespace GBProd\ICantDecide\Infrastructure\Question;

use Doctrine\Common\Persistence\ObjectManager;
use GBProd\DoctrineSpecification\Handler as SpecificationHandler;
use GBProd\Specification\Specification;
use GBProd\ICantDecide\CoreDomain\Question\Question;
use GBProd\ICantDecide\CoreDomain\Question\QuestionIdentifier;
use GBProd\ICantDecide\CoreDomain\Question\QuestionRepository;
use GBProd\DomainEvent\Dispatcher;

/**
 * Question doctrine repository
 *
 * @author GBProd <contact@gb-prod.fr>
 */
class DoctrineQuestionRepository implements QuestionRepository
{
    /**
     * @var ObjectManager
     */
    private $em;

    /**
     * @var SpecificationHandler
     */
    private $handler;

    /**
     * @var Dispatcher
     */
    private $dispatcher;

    /**
     * @param EntityManager $em
     */
    public function __construct(ObjectManager $em, SpecificationHandler $handler, Dispatcher $dispatcher)
    {
        $this->em         = $em;
        $this->handler    = $handler;
        $this->dispatcher = $dispatcher;
    }

    /**
     * {inheritdoc}
     */
    public function find(QuestionIdentifier $id)
    {
        return $this
            ->em
            ->getRepository(Question::class)
            ->find($id)
        ;
    }

    /**
     * {inheritdoc}
     */
    public function save(Question $question)
    {
        $this->em->persist($question);
        $this->em->flush();

        $this->dispatcher->dispatch($question);
    }

    /**
     * {inheritdoc}
     */
    public function findAll()
    {
        return $this
            ->em
            ->getRepository(Question::class)
            ->findAll()
        ;
    }

    /**
     * {inheritdoc}
     */
    public function findSatisfying(Specification $specification)
    {
        $qb = $this
            ->em
            ->getRepository(Question::class)
            ->createQueryBuilder('q')
        ;

        return $this->handler->handle($specification, $qb);
    }
}
