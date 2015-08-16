<?php

namespace GBProd\ICantDecide\CoreDomain\Model;

/**
 * Question
 *
 * @author gbprod <contact@gb-prod.fr>
 */
class Question implements QuestionInterface
{
    /**
     * @var string
     */
    private $text;

    /**
     * @var AnswerCollectionInterface
     */
    private $options = array();

    /**
     * @param string $text
     */
    public function __construct($text)
    {
        $this->text = $text;
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
    public function getOptions()
    {
        return $this->options;
    }

    /**
     * {inheritdoc}
     */
    public function addOption(OptionInterface $option)
    {
        $this->options[] = $option;

        return $this;
    }

    /**
     * Create an option
     *
     * @param string $text
     *
     * @return OptionInterface
     */
    public function createOption($text)
    {
        return new Option($text, $this);
    }
}
