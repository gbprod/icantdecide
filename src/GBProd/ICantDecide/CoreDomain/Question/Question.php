<?php

namespace GBProd\ICantDecide\CoreDomain\Question;

use GBProd\ICantDecide\CoreDomain\Question\QuestionIdentifier;

/**
 * Question
 *
 * @author gbprod <contact@gb-prod.fr>
 */
final class Question
{
    /**
     * @var QuestionIdentifier
     */
    private $id;

    /**
     * @var string
     */
    private $text;

    /**
     * @var \DateTime
     */
    private $endDate;

    /**
     * Ask a question
     *
     * @param string $text
     * @param array  $options
     *
     * @return Question
     */
    public static function ask(QuestionIdentifier $id, $text, \DateTime $endDate)
    {
        return new self($id, $text, $endDate);
    }

    /**
     * @param string $text
     */
    private function __construct(QuestionIdentifier $id, $text, \DateTime $endDate)
    {
        $this->id      = $id;
        $this->text    = $text;
        $this->endDate = $endDate;
    }

    /**
     * id
     *
     * @return QuestionIdentifier
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Question text
     *
     * @return string
     */
    public function getText()
    {
        return $this->text;
    }

    /**
     * Question text
     *
     * @return string
     */
    public function getEndDate()
    {
        return $this->endDate;
    }
}
