<?php

namespace Core\Shufflers;

use Core\Contracts\ShufflerContract;

/**
 * Class CutTheDeckShuffler
 * This is a less than optimal shuffler that was implemented only for demonstration
 *
 * @package Core\Shufflers
 */
class CutTheDeckShuffler implements ShufflerContract
{

    /**
     * @param array $items
     * @return array
     * @throws \Exception
     */
    public function shuffle(array &$items): void
    {
        for ($i = count($items); $i >= rand(0, count($items)); --$i) {
            array_unshift($items, array_pop($items));
        }
    }
}