<?php

namespace GBProd\ICantDecide\CoreDomain\Question;

use Ramsey\Uuid\Uuid;

/**
 * Identifier for options
 *
 * @author GBProd <contact@gb-prod.fr>
 */
final class OptionIdentifier
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
     * @return OptionIdentifier
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
