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
    private $id;

    /**
     * @var string
     */
    private $text;
    
    /**
     * Give a option to a question
     *
     * @param string $text
     */
    public static function give(OptionIdentifier $id, $text)
    {
        return new self($id, $text);
    }

    /**
     * @param OptionIdentifier $id
     * @param string           $text
     */
    private function __construct(OptionIdentifier $id, $text)
    {
        if (empty($text)) {
            throw new \InvalidArgumentException("The text should not be blank.");
        }

        $this->id   = $id;
        $this->text = $text;
    }

    /**
     * Get text of the option
     *
     * @return string
     */
    public function getText()
    {
        return $this->text;
    }

    /**
     * Get id of the option
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }
}
