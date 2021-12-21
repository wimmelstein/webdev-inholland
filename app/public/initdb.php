<?php

use DB;

$db = DB::getInstance();

var_dump($db);
try {
    $db->query("CREATE TABLE if not exists ARTICLE (
    id SERIAL PRIMARY KEY,
    name varchar(255) NOT NULL,
    price numeric(10,2)
)");
} catch (PDOException $e) {
    echo "Query failed: " . $e->getMessage();
}

try {
    $db->query("INSERT INTO articles (name, price) values('Screwdriver', 10.99), ('Chandelier', 7.99);");
} catch (PDOException $e) {
    echo "Query failed: " . $e->getMessage();
}