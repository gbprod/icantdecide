 <?php

namespace GBProd\ICantDecide\Infrastructure\Question;

use Doctrine\Common\Persistence\ObjectManager;
use GBProd\ICantDecide\CoreDomain\Question\Question;
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
}
