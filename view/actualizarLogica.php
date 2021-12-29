<?php

require ('../Repository.php');

$repository = new Repository();

$products = $repository->FetchAllFromProduct();


