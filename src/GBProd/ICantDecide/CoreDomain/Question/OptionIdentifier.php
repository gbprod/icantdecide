<?php

namespace GBProd\ICantDecide\CoreDomain\Question;

use Ramsey\Uuid\Uuid;

/**
 * Identifier for option
 *
 * @author GBProd <contact@gb-prod.fr>
 */
final class OptionIdentifier
{
    /**
     * @var Uuid
     */
    private $questionUuid;
    
    /**
     * @var int
     */
    private $position;
    
    /**
     * build a indentification
     *
     * @param Uuid $questionUuid
     * @param int  $position
     *
     * @return PositionIdentifier
     */
    public static function build(Uuid $questionUuid, $position)
    {
        if ($position < 0) {
            throw new \InvalidArgumentException("Position should not be positive integer.");
        }

        return new self($questionUuid, $position);
    }

    /**
     * @param Uuid $questionUuid
     * @param int  $position
     */
    private function __construct($questionUuid, $position)
    {
        $this->questionUuid = $questionUuid;
        $this->position     = $position;
    }

    /**
     * Get question identifier
     *
     * @return Uuid
     */
    public function getQuestionUuid()
    {
        return $this->questionUuid;
    }
    
    /**
     * Get position
     *
     * @return integer
     */
    public function getPosition()
    {
        return $this->position;
    }
}
