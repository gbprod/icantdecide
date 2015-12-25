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
     * @var AnswerCollection
     */
    private $options;

    /**
     * Ask a question
     *
     * @param string $text
     * @param array  $options
     *
     * @return Question
     */
    public static function ask(QuestionIdentifier $id, $text/*, array $options*/)
    {
        return new self($id, $text/*, $options*/);
    }

    /**
     * @param string $text
     */
    private function __construct($id, $text/*, array $options*/)
    {
        $this->id   = $id;
        $this->text = $text;
        // $this->options = $options;
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
     * Options for question
     *
     * @return array
     */
    public function getOptions()
    {
        return $this->options;
    }
}
