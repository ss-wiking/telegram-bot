<?php

namespace SsWiking\TelegramBot\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;
use SsWiking\TelegramBot\Models\TelegramBot;

class TelegramBotFactory extends Factory
{
    protected $model = TelegramBot::class;

    /**
     * @inheritDoc
     */
    public function definition(): array
    {
        return [
            'token' => Str::random(10),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}
