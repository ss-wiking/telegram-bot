<?php

namespace SsWiking\TelegramBot\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Carbon;
use SsWiking\TelegramBot\Database\Factories\TelegramChatFactory;

/**
 * SsWiking\TelegramBot\Models\TelegramChat
 *
 * @property int $id
 * @property int $telegram_bot_id
 * @property string $chat_id
 * @property string $name
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read TelegramBot $bot
 * @method static Builder|TelegramChat newModelQuery()
 * @method static Builder|TelegramChat newQuery()
 * @method static Builder|TelegramChat query()
 * @method static Builder|TelegramChat whereChatId($value)
 * @method static Builder|TelegramChat whereCreatedAt($value)
 * @method static Builder|TelegramChat whereId($value)
 * @method static Builder|TelegramChat whereName($value)
 * @method static Builder|TelegramChat whereTelegramBotId($value)
 * @method static Builder|TelegramChat whereUpdatedAt($value)
 * @mixin \Eloquent
 * @noinspection PhpUndefinedClassInspection
 * @noinspection PhpFullyQualifiedNameUsageInspection
 */
class TelegramChat extends Model
{
    use HasFactory;

    protected $fillable = [
        'telegram_bot_id',
        'chat_id',
        'name',
    ];

    /**
     * Bot relation
     *
     * @return BelongsTo
     */
    public function bot(): BelongsTo
    {
        return $this->belongsTo(TelegramBot::class);
    }

    /**
     * @inheritDoc
     */
    public static function booted(): void
    {
        self::created(static function (TelegramChat $chat) {
            if (empty($chat->name)) {
                $chat->name = "Chat #$chat->id";
                $chat->saveQuietly();
            }
        });
    }

    /**
     * @inheritDoc
     */
    protected static function newFactory(): TelegramChatFactory
    {
        return TelegramChatFactory::new();
    }
}