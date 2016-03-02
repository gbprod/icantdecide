<?php

namespace GBProd\ICantDecide\Infrastructure\Question;

use Doctrine\Common\Persistence\ObjectManager;
use GBProd\ICantDecide\CoreDomain\Question\Question;
use GBProd\ICantDecide\CoreDomain\Question\QuestionIdentifier;
use GBProd\ICantDecide\CoreDomain\Question\QuestionRepository;

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
     * @param EntityManager $em
     */
    public function __construct(ObjectManager $em)
    {
        $this->em = $em;
    }

    /**
     * {inheritdoc}
     */
    public function find(QuestionIdentifier $id)
    {
        return $this
            ->em
            ->getRepository('GBProd\ICantDecide\CoreDomain\Question\Question')
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
    }
    
    /**
     * {inheritdoc}
     */
    public function findAll()
    {
        return $this
            ->em
            ->getRepository('GBProd\ICantDecide\CoreDomain\Question\Question')
            ->findAll()
        ;
    }
    
    /**
     * {inheritdoc}
     */
    public function findSatisfying($specification)
    {
        // $qb = $this->em
        //     ->createQueryBuilder()
        //     ->select('q')
        //     ->from('GBProd\ICantDecide\CoreDomain\Question\Question', 'q')
        // ;
            
        return $this->findAll();
    }
}
