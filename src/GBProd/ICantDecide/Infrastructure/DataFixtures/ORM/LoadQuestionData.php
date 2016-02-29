<?php

namespace GBProd\ICantDecide\Infrastructure\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use GBProd\ICantDecide\CoreDomain\Question\Question;
use GBProd\ICantDecide\CoreDomain\Question\QuestionIdentifier;

/**
 * Fixtures for questions
 * 
 * @author gbprod <contact@gb-prod.fr>
 */
class LoadQuestionData implements FixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $question = Question::ask(
            QuestionIdentifier::generate(),
            'What the answer to life the universe and everything ?',
            new \DateTimeImmutable('+1 day')
        );
        
        $manager->persist($question);
        $manager->flush();
    }
}