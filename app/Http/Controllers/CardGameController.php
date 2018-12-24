<?php

namespace App\Http\Controllers;

use App\Interactions\SessionResolverInterface;
use App\Interactions\SessionSetterInterface;
use Core\Card;
use Core\CardDecks\PlayingCardDeck;
use Core\Contracts\DealerContract;
use Core\Exceptions\NoCardsRemainingException;

class CardGameController extends Controller
{
    /**
     * @var DealerContract
     */
    protected $dealer;
    /**
     * @var SessionResolverInterface
     */
    protected $resolver;

    public function __construct(DealerContract $dealer, SessionResolverInterface $resolver)
    {
        $this->dealer = $dealer;
        $this->resolver = $resolver;
    }

    public function start(SessionSetterInterface $setter)
    {
        $this->dealer->shuffle();
        $setter->set($this->dealer->getAllCards());

        return redirect()->route('play');
    }

    public function play()
    {
        return view('welcome');
    }

    public function getStatus()
    {
        $this->swapDeckFromSession();

        return response()->json([
            'remaining' => count($this->dealer->getAllCards()),
        ]);
    }


    public function dealNextCard(SessionSetterInterface $setter)
    {
        $this->swapDeckFromSession();
        try {
            $card = $this->dealer->dealOneCard();
        } catch (NoCardsRemainingException $e) {
            $card = 'Game Over!';
        }

        $setter->set($this->dealer->getAllCards());

        return response()->json([
            'card' => $card instanceof Card ? $card->display() : $card,
            'remaining' => count($this->dealer->getAllCards()),
        ]);
    }

    private function swapDeckFromSession()
    {
        if ($this->resolver->keyExists()) {
            $deck = new PlayingCardDeck($this->resolver->resolve());
            $this->dealer->swapDeck($deck);
        }
    }
}
