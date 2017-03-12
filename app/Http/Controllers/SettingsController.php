<?php


namespace Bookkeeper\Http\Controllers;


use Bookkeeper\Support\Install\InstallHelper;
use Illuminate\Http\Request;

class SettingsController extends BookkeeperController {

    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        $form = $this->getEditForm();

        return $this->compileView('settings.edit', ['form' => $form]);
    }

    /**
     * @return \Kris\LaravelFormBuilder\Form
     */
    protected function getEditForm()
    {
        return $this->form('Bookkeeper\Html\Forms\Settings\EditForm', [
            'method' => 'PUT',
            'url'    => route('bookkeeper.settings.update'),
            'model'  => [
                'APP_LOCALE' => env('APP_LOCALE'),
                'DEFAULT_CURRENCY' => env('DEFAULT_CURRENCY'),
                'DEFAULT_ACCOUNT' => get_default_account()
            ]
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request|\Illuminate\Http\Request $request
     * @param InstallHelper $helper
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, InstallHelper $helper)
    {
        $this->validateEditForm($request);

        $helper->setEnvVariable('APP_LOCALE', $request->input('APP_LOCALE'));
        $helper->setEnvVariable('DEFAULT_CURRENCY', $request->input('DEFAULT_CURRENCY'));
        $helper->setEnvVariable('DEFAULT_ACCOUNT', $request->input('DEFAULT_ACCOUNT'));

        // Forget the currency rates cache since default account may have been changed
        \Cache::forget('bookkeeper.currency.rates');

        $this->notify('settings.edited');

        return redirect()->back();
    }

    /**
     * @param Request $request
     */
    protected function validateEditForm(Request $request)
    {
        $this->validateForm('Bookkeeper\Html\Forms\Settings\EditForm', $request);
    }

}