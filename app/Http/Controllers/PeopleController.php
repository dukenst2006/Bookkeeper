<?php


namespace Bookkeeper\Http\Controllers;


use Bookkeeper\CRM\Person;
use Bookkeeper\Http\Controllers\Traits\BasicResource;
use Bookkeeper\Http\Controllers\Traits\UsesPersonForms;

class PeopleController extends BookkeeperController {

    use BasicResource, UsesPersonForms;

    /**
     * Self model path required for ModifiesPermissions
     *
     * @var string
     */
    protected $modelPath = Person::class;
    protected $resourceMultiple = 'people';
    protected $resourceSingular = 'person';

}