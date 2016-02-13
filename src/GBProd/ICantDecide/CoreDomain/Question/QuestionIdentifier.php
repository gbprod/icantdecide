<?php

namespace GBProd\ICantDecide\CoreDomain\Question;

/**
 * Identifier for questions
 *
 * @author GBProd <contact@gb-prod.fr>
 */
final class QuestionIdentifier
{
    /**
     * @var mixed
     */
    private $value;

    /**
     * Generate a new identifier
     *
     * @param mixed $id
     *
     * @return QuestionIdentifier
     */
    public static function create($id)
    {
        return new self($id);
    }

    /**
     * @param mixed $value
     */
    private function __construct($value)
    {
        $this->value = $value;
    }

    /**
     * Get identifier value
     *
     * @return mixed
     */
    public function getValue()
    {
        return $this->value;
    }
}
