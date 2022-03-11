<?php

namespace SsWiking\TelegramBot\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Carbon;
use SsWiking\TelegramBot\Database\Factories\TelegramBotFactory;

/**
 * SsWiking\TelegramBot\Models\TelegramBot
 *
 * @property int $id
 * @property string $token
 * @property string $name
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read Collection|TelegramChat[] $chats
 * @property-read int|null $chats_count
 * @method static Builder|TelegramBot newModelQuery()
 * @method static Builder|TelegramBot newQuery()
 * @method static Builder|TelegramBot query()
 * @method static Builder|TelegramBot whereCreatedAt($value)
 * @method static Builder|TelegramBot whereId($value)
 * @method static Builder|TelegramBot whereName($value)
 * @method static Builder|TelegramBot whereToken($value)
 * @method static Builder|TelegramBot whereUpdatedAt($value)
 * @mixin \Eloquent
 * @noinspection PhpUndefinedClassInspection
 * @noinspection PhpFullyQualifiedNameUsageInspection
 */
class TelegramBot extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'token',
    ];

    /**
     * Chats relation
     *
     * @return HasMany
     */
    public function chats(): HasMany
    {
        return $this->hasMany(TelegramChat::class);
    }

    /**
     * @inheritDoc
     */
    public static function booted(): void
    {
        self::created(static function (TelegramBot $bot) {
            if (empty($bot->name)) {
                $bot->name = "Bot #$bot->id";
                $bot->saveQuietly();
            }
        });
    }

    /**
     * @inheritDoc
     */
    protected static function newFactory(): TelegramBotFactory
    {
        return TelegramBotFactory::new();
    }

    /**
     * @inheritDoc
     */
    public function getRouteKeyName(): string
    {
        return 'token';
    }
}