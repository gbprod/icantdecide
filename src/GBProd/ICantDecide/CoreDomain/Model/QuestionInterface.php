<?php

namespace GBProd\ICantDecide\CoreDomain\Model;

/**
 * Interface for questions
 *
 * @author gbprod <contact@gb-prod.fr>
 */
interface QuestionInterface
{
    /**
     * Id of the question
     *
     * @return string
     */
    public function getId();

    /**
     * Text of the questions
     *
     * @return string
     */
    public function getText();

    /**
     * Get options
     *
     * @return array
     */
    public function getOptions();

    /**
     * Add an option
     *
     * @param OptionInterface $option
     *
     * @return self
     */
    public function addOption(OptionInterface $option);

    /**
     * Get the author
     *
     * @return AuthorInterface
     */
    public function getAuthor();
}
