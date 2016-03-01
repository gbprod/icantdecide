<?php

namespace GBProd\ICantDecide\CoreDomain\Specification\Question;

use RulerZ\Spec\Specification;

class IsAvailable implements Specification
{
    public function getRule()
    {
        return 'endDate >= :now';
    }

    public function getParameters()
    {
        return [
            'now' => new \DateTimeImmutable('now'),
        ];
    }
}