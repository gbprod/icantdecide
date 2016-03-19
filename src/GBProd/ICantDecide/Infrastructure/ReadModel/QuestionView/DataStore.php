<?php

namespace GBProd\ICantDecide\Infrastructure\ReadModel\QuestionView;

interface DataStore
{
    public function save(QuestionView $view);

    public function findAll();
}