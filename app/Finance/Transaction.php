<?php

namespace Bookkeeper\Finance;


use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model as Eloquent;
use Kenarkose\Sortable\Sortable;
use Nicolaslopezj\Searchable\SearchableTrait;

class Transaction extends Eloquent {

    use Sortable, SearchableTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'type', 'amount', 'account_id',
        'received', 'notes', 'created_at', 'tags'
    ];

    /**
     * Sortable columns
     *
     * @var array
     */
    protected $sortableColumns = ['name', 'amount', 'created_at'];

    /**
     * Default sortable key
     *
     * @var string
     */
    protected $sortableKey = 'created_at';

    /**
     * Default sortable direction
     *
     * @var string
     */
    protected $sortableDirection = 'desc';

    /**
     * Searchable columns.
     *
     * @var array
     */
    protected $searchable = [
        'columns' => [
            'name' => 10
        ]
    ];

    /**
     * Scope for request filter
     *
     * @param Builder $query
     * @param string $type
     * @return Builder
     */
    public function scopeFilteredByType(Builder $query, $type = null)
    {
        $type = $type ?: request('f', 'all');

        if (in_array($type, ['income', 'expense', 'income-i', 'expense-i']))
        {
            $received = ends_with($type, '-i') ? 0 : 1;
            $type = rtrim($type, '-i');

            $query
                ->whereType($type)
                ->whereReceived($received);
        }

        return $query;
    }

    /**
     * Tags relation
     *
     * @return BelongsToMany
     */
    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    /**
     * Tags attribute setter
     *
     * @param string $value
     */
    public function setTagsAttribute($value)
    {
        if ($this->exists)
        {
            $this->tags()->sync(json_decode($value));
        }
    }

    /**
     * Presents the thumbnail of the transaction
     *
     * @return string
     */
    public function presentThumbnail()
    {
        return '<span class="transaction-thumbnail transaction-thumbnail--' . $this->type . ($this->received == 1 ? '-received' : '') . '"></span>';
    }

    /**
     * Presents the amount
     *
     * @return string
     */
    public function presentAmount()
    {
        return currency_string_for($this->amount, $this->account_id);
    }

    /**
     * Returns tag keys in an array
     *
     * @return array
     */
    public function getTagKeys()
    {
        $keys = [];

        foreach($this->tags as $tag)
        {
            $keys[] = $tag->getKey();
        }

        return $keys;
    }

}
