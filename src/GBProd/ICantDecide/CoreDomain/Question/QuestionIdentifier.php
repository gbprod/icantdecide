<?php

namespace GBProd\ICantDecide\CoreDomain\Question;

use Ramsey\Uuid\Uuid;

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
    public static function generate()
    {
        return new self(Uuid::uuid4());
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
