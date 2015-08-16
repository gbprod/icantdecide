# I can't decide Model & Domain

## Model

```php
<?php
// Create a concrete implementation of repositories
$authorRepository = new AuthorRepository(
    'GBProd\ICantDecide\CoreDomain\Model\Author'
);

$questionRepository = new QuestionRepository(
    'GBProd\ICantDecide\CoreDomain\Model\Question'
);

// Create a question
$question = $questionRepository->create(
    "What should I eat tonight ?",
    $authorRepository->create("contact@gb-prod.fr")
);

// Add options to the question
$question
    ->addOption($question->createOption("Burger"))
    ->addOption($question->createOption("Pizza"))
    ->addOption($question->createOption("Pasta"))
;
?>
```

## Domain

```php
<?php
$voter = new Voter();

$voter->vote($question, $option);

$voter->close($question);
?>
```
