<?php


namespace Bookkeeper\Http\Controllers;


class PeopleController extends BookkeeperController {

    /**
     * Shows the overview
     *
     * @return view
     */
    public function index() {
        return $this->compileView('people.index');
    }

}