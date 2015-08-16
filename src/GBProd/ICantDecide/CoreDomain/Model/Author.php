<?php

namespace GBProd\ICantDecide\CoreDomain\Model;

/**
 * Author
 *
 * @author gbprod <contact@gb-prod.fr>
 */
class Author implements AuthorInterface
{
    /**
     * @var string
     */
    private $email;

    /**
     * Email of the author
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }
}
