<?php

namespace App\Interactions;

use Core\Card;
use Illuminate\Contracts\Session\Session;

class CardGameSessionHandler implements SessionResolverInterface, SessionSetterInterface
{
    protected $key;
    /**
     * @var Session
     */
    protected $session;

    /**
     * CardGameSessionHandler constructor.
     *
     * @param Session $session
     * @param string $key
     */
    public function __construct(Session $session, $key = 'card-game')
    {
        $this->key = $key;
        $this->session = $session;
    }

    /**
     * @return bool
     */
    public function keyExists(): bool
    {
        return $this->session->has($this->key);
    }

    /**
     * @return array
     */
    public function resolve(): array
    {
        return collect($this->session->get($this->key))->map(function ($card) {
            return new Card($card['suit'], $card['value'], $card['name'] ?? null);
        })->toArray();
    }

    public function set($data): void
    {
        $this->session->put($this->key, collect($data)->map(function ($card) {
            if ($card instanceof Card) {
                return [
                    'suit' => $card->suit,
                    'value' => $card->value,
                    'name' => $card->name,
                ];
            }
        })->toArray());
    }
}