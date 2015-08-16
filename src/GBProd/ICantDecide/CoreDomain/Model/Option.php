<?php

namespace GBProd\ICantDecide\CoreDomain\Model;

/**
 * Option
 *
 * @author gbprod <contact@gb-prod.fr>
 */
class Option implements OptionInterface
{
    /**
     * @var string
     */
    protected $text;

    /**
     * @var int
     */
    protected $voteCount;

    /**
     * @var QuestionInterface
     */
    protected $question;

    /**
     * @param string $text
     */
    public function __construct($text, QuestionInterface $question)
    {
        $this->text     = $text;
        $this->question = $question;
    }

    /**
     * {inheritdoc}
     */
    public function getText()
    {
        return $this->text;
    }

    /**
     * {inheritdoc}
     */
    public function addVote()
    {
        $this->voteCount++;
    }

    /**
     * {inheritdoc}
     */
    public function getVoteCount()
    {
        return $this->voteCount;
    }

    /**
     * {inheritdoc}
     */
    public function getQuestion()
    {
        $this->question;
    }
}
