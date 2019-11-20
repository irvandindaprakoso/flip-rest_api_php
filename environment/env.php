<?php
$variables = [
    'API_URL' => 'https://nextar.flip.id/disburse',
    'SECRET_KEY' => 'HyzioY7LP6ZoO7nTYKbG8O4ISkyWnX1JvAEVAhtWKZumooCzqp41',
];

foreach ($variables as $key => $value) {
    putenv("$key=$value");
}

?>
