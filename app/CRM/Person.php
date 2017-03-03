<?php


namespace Bookkeeper\CRM;


use Illuminate\Database\Eloquent\Model as Eloquent;
use Kenarkose\Sortable\Sortable;
use Nicolaslopezj\Searchable\SearchableTrait;

class Person extends Eloquent {

    use Sortable, SearchableTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name', 'last_name', 'company', 'job_title',
        'email', 'phone', 'phone2',
        'nationality', 'national_id',
        'address', 'city', 'state', 'country', 'postal_code',
        'notes'
    ];

    /**
     * Sortable columns
     *
     * @var array
     */
    protected $sortableColumns = ['first_name', 'created_at'];

    /**
     * Default sortable key
     *
     * @var string
     */
    protected $sortableKey = 'first_name';

    /**
     * Default sortable direction
     *
     * @var string
     */
    protected $sortableDirection = 'asc';

    /**
     * Searchable columns.
     *
     * @var array
     */
    protected $searchable = [
        'columns' => [
            'first_name' => 10,
            'last_name'  => 10,
            'email'      => 10,
            'company'    => 10
        ]
    ];

    public function presentFullName()
    {
        return $this->first_name . ' ' . $this->last_name;
    }

}