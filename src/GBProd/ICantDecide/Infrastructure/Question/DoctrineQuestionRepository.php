<?php

namespace GBProd\ICantDecide\Infrastructure\Question;

use Doctrine\Common\Persistence\ObjectManager;
use GBProd\ICantDecide\CoreDomain\Question\Question;
use GBProd\ICantDecide\CoreDomain\Question\QuestionIdentifier;
use GBProd\ICantDecide\CoreDomain\Question\QuestionRepository;
use RulerZ\Spec\Specification;
use RulerZ\RulerZ;

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
     * @var RulerZ
     */
    private $rulerz;

    /**
     * @param EntityManager $em
     */
    public function __construct(ObjectManager $em, RulerZ $rulerz)
    {
        $this->em     = $em;
        $this->rulerz = $rulerz;
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
    public function findSatisfying(Specification $specification)
    {
        $qb = $this->em
            ->createQueryBuilder()
            ->select('q')
            ->from('GBProd\ICantDecide\CoreDomain\Question\Question', 'q')
        ;
            
        return $this->rulerz->filterSpec($qb, $specification);
    }
}
