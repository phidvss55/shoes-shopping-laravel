<?php

namespace App\Console;

class CollectionExample
{
    public function example() {
        $result = '';
        $data = [
            ['price' => 10000, 'tax' => 510, 'payment' => false ],
            ['price' => 15000, 'tax' => 490, 'payment' => true ],
            ['price' => 25000, 'tax' => 500, 'payment' => false ],
            ['price' => 45000, 'tax' => 501, 'payment' => true ],
        ];

        $arrayNumbers = [
            '1' => '2',
            '3' => '4',
            '5' => '6',
        ];

//        $result = collect($arrayNumbers)->collapse();
//        $result = collect($data)->min(function($value) {
//            if (!$value['payment']) {
//                return $value['price'] + $value['tax'];
//            } else {
//                return false;
//            }
//        });
        // chunk
//        $result = collect($data)->chunk(2)->last();
        // combine
//        $result = collect(['key1', 'key2'])->combine(['value1', 'value2']);
        // contact
        // contains
//        $result = collect($arrayNumbers)->contains('1', '2');
        // count
        // cross join
//        collect($data)->dd();
        // diffUsing
        // tap
        // map
//        $result = collect($data)->map(function($item, $key) {
//            return $item['price'] + $item['tax'];
//        });
        // mapWithKey
        // whereBetween
//        $result = collect($data)->whereBetween('tax', [100, 500]);
        // whereIn: such as where between but values will be the array that search equal key filter
        // whereNotIn
        // whereInstanceOf
        // wrap
        // unwrap
        // filter
        // pluck
        $result = collect($data)->pluck('price');

        return $result;
    }
}
