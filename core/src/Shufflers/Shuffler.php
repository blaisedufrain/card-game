<?php

namespace Core\Shufflers;

use Core\Contracts\ShufflerContract;

class Shuffler implements ShufflerContract
{

    /**
     * @param array $items
     * @return array
     * @throws \Exception
     */
    public function shuffle(array &$items): void
    {
        // Need to make sure we have default keys
        $items = array_values($items);
        for ($i = count($items) - 1 ; $i >= 0; $i--) {
            $random = rand(0, $i);
            $tmp = $items[$random];
            $items[$random] = $items[$i];
            $items[$i] = $tmp;
        }

    }
}