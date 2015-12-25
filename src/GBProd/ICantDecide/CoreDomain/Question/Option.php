<?php

namespace GBProd\ICantDecide\CoreDomain\Question;

/**
 * Option
 *
 * @author gbprod <contact@gb-prod.fr>
 */
final class Option
{
    /**
     * @var string
     */
    protected $text;

    /**
     * @param string $text
     */
    private function __construct($text)
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
}
