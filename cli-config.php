<?php
use Doctrine\ORM\Tools\Console\ConsoleRunner;
require_once 'config.php';
return ConsoleRunner::createHelperSet($entityManager);
