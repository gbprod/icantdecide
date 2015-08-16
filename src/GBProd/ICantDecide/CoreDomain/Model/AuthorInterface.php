<?php

namespace GBProd\ICantDecide\CoreDomain\Model;

/**
 * Interface for author
 *
 * @author gbprod <contact@gb-prod.fr>
 */
interface AuthorInterface
{
    /**
     * Email of the author
     *
     * @return string
     */
    public function getEmail();
}
