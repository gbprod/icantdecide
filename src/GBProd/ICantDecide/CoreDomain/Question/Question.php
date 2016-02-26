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
     * Ask a question
     *
     * @param string $text
     * @param array  $options
     *
     * @return Question
     */
    public static function ask(QuestionIdentifier $id, $text)
    {
        return new self($id, $text);
    }

    /**
     * @param string $text
     */
    private function __construct($id, $text)
    {
        $this->id   = $id;
        $this->text = $text;
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
}
