<?php

namespace SsWiking\TelegramBot\Providers;

use Illuminate\Support\ServiceProvider;

class TelegramBotServiceProvider extends ServiceProvider
{
    /**
     * Register the application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap the application services.
     */
    public function boot(): void
    {
        // Publishing migrations.
        $this->publishes([
            __DIR__ . '/../../database/migrations/create_telegram_bots_table.php.stub' => database_path('migrations/' . date('Y_m_d_His') . '_create_telegram_bots_table.php'),
            __DIR__ . '/../../database/migrations/create_telegram_chats_table.php.stub' => database_path('migrations/' . date('Y_m_d_His') . '_create_telegram_chats_table.php'),
        ], 'migrations');
    }
}
