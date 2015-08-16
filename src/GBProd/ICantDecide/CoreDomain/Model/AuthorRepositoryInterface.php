<?php

namespace GBProd\ICantDecide\CoreDomain\Model;

/**
 * Interface for author repository
 *
 * @author gbprod <contact@gb-prod.fr>
 */
interface AuthorRepositoryInterface
{
    /**
     * Create a Author instance
     *
     * @return AuthorInterface
     */
    public function create();

    /**
     * Find a author by email
     *
     * @param string $email
     *
     * @return AuthorInterface|null
     */
    public function findByEmail($email);
}
