<?php

namespace GBProd\ICantDecide\Infrastructure\Question\ExpressionBuilder;

use GBProd\DoctrineSpecification\ExpressionBuilder\Builder;
use GBProd\Specification\Specification;
use Doctrine\ORM\QueryBuilder;

/**
 * Expression Builder for is available specification
 *
 * @author gbprod <contact@gb-prod.fr>
 */
class IsAvailableBuilder implements Builder
{
    /**
     * {inheritdoc}
     */
    public function build(Specification $spec, QueryBuilder $qb)
    {
        return $qb->expr()->gt(
            $qb->getRootAlias().'.endDate',
            $qb->expr()->literal((new \DateTime('now'))->format('Y-m-d h:i:s'))
        );
    }
}