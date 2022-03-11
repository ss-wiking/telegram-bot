<?php

namespace SsWiking\TelegramBot\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;
use SsWiking\TelegramBot\Models\TelegramChat;

class TelegramChatFactory extends Factory
{
    protected $model = TelegramChat::class;

    /**
     * @inheritDoc
     */
    public function definition(): array
    {
        return [
            'telegram_bot_id' => $this->faker->randomNumber(),
            'chat_id' => $this->faker->uuid(),
            'name' => $this->faker->name(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}
