<template>
    <div class="rounded bg-grey-light w-64 p-2">
        <div class="flex justify-between py-1">
            <h3 class="text-sm">Welcome to a simple card game</h3>
            <svg class="h-4 fill-current text-grey-dark cursor-pointer" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M5 10a1.999 1.999 0 1 0 0 4 1.999 1.999 0 1 0 0-4zm7 0a1.999 1.999 0 1 0 0 4 1.999 1.999 0 1 0 0-4zm7 0a1.999 1.999 0 1 0 0 4 1.999 1.999 0 1 0 0-4z"/></svg>
        </div>
        <div class="text-sm mt-2">
            <div class="bg-white p-2 rounded mt-1 border-b border-grey cursor-pointer hover:bg-grey-lighter">
                <p>Remaining Cards: {{ remaining }}</p>
                <br>
                <button class="bg-blue hover:bg-blue-dark text-white py-1 px-2 rounded" v-if="remaining > 0" @click="dealOne">Deal One</button>
                <button class="bg-red hover:bg-red-dark text-white py-1 px-2 rounded" @click="startOver">Start Over</button>
            </div>
            <div class="bg-white p-2 rounded mt-1 border-b border-grey cursor-pointer hover:bg-grey-lighter" v-for="card in cards">
                {{ card }}
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                cards: [],
                currentCard: '',
                remaining: 0
            }
        },
        created() {
            this.load()
        },
        methods: {
            load() {
                axios.get('/card-game/status').then(response => {
                        this.remaining = response.data.remaining;
                    })
            },
            dealOne() {
                axios.post('/card-game/deal-next').then(response => {
                        if (response.data.card == 'Game Over!') {
                            alert(response.data.card);
                        } else {
                            this.currentCard = response.data.card;
                            this.cards.unshift(response.data.card);
                            this.remaining = response.data.remaining;
                            if (this.remaining < 1) {
                                alert('Game Over!');
                            }
                        }
                    })
            },
            startOver() {
                axios.get('/card-game/start')
                    .then(() => {
                        this.cards = [];
                        this.load();
                    })
            }
        }
    }
</script>
