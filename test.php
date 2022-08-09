<?php

function myArrowFunc(int $count): string
{
    return str_repeat('<', $count) . str_repeat('>', $count);
}

echo myArrowFunc(10);

$deliveryMethodsArray = [
    [
        'code' => 'dhl',
        'customer_costs' => [
            22 => '1.000',
            11 => '3.000',
        ]
    ],
    [
        'code' => 'fedex',
        'customer_costs' => [
            22 => '4.000',
            11 => '6.000',
        ]
    ]
];

function sortDeliveryMethods(array $array): array
{
    $customCosts = [];
    $result = [];

    foreach ($array as $value) {
        $customCosts[] = $value['customer_costs'];
        foreach ($customCosts as $items) {
            foreach ($items as $key => $item) {
                $result[$key][$value['code']] = $item;
            }
        }
    }

    return $result;
}

$result = sortDeliveryMethods($deliveryMethodsArray);

echo '<br>';
echo '<pre>';
var_dump($result);
