<?php

namespace GBProd\ICantDecide\CoreDomain\Specification\Question;

use GBProd\Specification\CompositeSpecification;

class IsAvailable extends CompositeSpecification
{
    public function isSatisfiedBy($candidate)
    {
        return $candidate->getEndDate() > new \DateTime('now');
    }
}