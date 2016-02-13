<?php

namespace GBProd\ICantDecide\CoreDomain\Question;

/**
 * Author
 *
 * @author gbprod <contact@gb-prod.fr>
 */
final class Author
{
    /**
     * @var string
     */
    private $email;

    /**
     * Create au author with email
     *
     * @param string $email
     *
     * @return Author
     */
    public static function withEmail($email)
    {
        return new self($email);
    }

    /**
     * @param string $email
     */
    private function __construct($email)
    {
        $this->email = $email;
    }

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
