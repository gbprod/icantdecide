 <?php

namespace GBProd\ICantDecide\Infrastructure\Question;

use GBProd\ICantDecide\CoreDomain\Question\QuestionRepository;

/**
 * Question doctrine repository
 *
 * @author GBProd <contact@gb-prod.fr>
 */
class DoctrineQuestionRepository implements QuestionRepository
{
    /**
     * {inheritdoc}
     */
    public function find(QuestionIdentifier $id)
    {

    }

    /**
     * {inheritdoc}
     */
    public function save(Question $question)
    {

    }
}
