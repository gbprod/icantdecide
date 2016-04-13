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
     * @var OptionIdentifier
     */
    private $id;

    /**
     * @var string
     */
    private $text;

    /**
     * @var int
     */
    private $position;
    
    /**
     * Give a option to a question
     *
     * @param string $text
     */
    public static function give(OptionIdentifier $id, $text, $position)
    {
        return new self($id, $text, $position);
    }

    /**
     * @param OptionIdentifier $id
     * @param string           $text
     * @param int              $position
     */
    private function __construct(OptionIdentifier $id, $text, $position)
    {
        if (empty($text)) {
            throw new \InvalidArgumentException("The text should not be blank.");
        }

        $this->id       = $id;
        $this->text     = $text;
        $this->position = $position;
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
     * Get position of the option
     *
     * @return int
     */
    public function getPosition()
    {
        return $this->position;
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
