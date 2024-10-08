<?php

use App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;






Route::get('/', function () {
    return redirect('/ar/admin/login');
});


Route::prefix(LaravelLocalization::setLocale() . '/admin')->middleware(['localeSessionRedirect', 'localizationRedirect', 'localeViewPath'])->group(function () {

    //------------------------------------------------------LOGIN ROUTES
    Route::get('login', 'Auth\LoginController@showLoginForm');

    Route::post('login', 'Auth\LoginController@login')->name('login');


    //------------------------------------------------------AUTH ROUTES
    Route::middleware('auth')->group(function () {

        //------------------------------------------------------LOGOUT
        Route::post('', 'Auth\LoginController@logout')->name('logout');

        //-------------------------------------------------------INDEX
        Route::view('', 'admin.index')->name('index');


        //-------------------------------------------------------ITEMS
        Route::resource('items', 'ItemController');


        //-------------------------------------------------------COMPANY
        Route::resource('companies', 'CompanyController');

        //-------------------------------------------------------PERIOD
        Route::resource('periods', 'PeriodController');

        //-------------------------------------------------------Fin-State
        Route::resource('fin-states', 'FinStateController');


        //-------------------------------------------------------ITEM-FIN-STAT
        Route::resource('item-fin-stats', 'ItemFinStatController');


        //-------------------------------------------------------COMPANY-CAPITAL-STRUCTURE
        Route::resource('company_capital_structure','CompanyCapitalStructureController');


        //------------------------------------------------------------COMPANY-CAPITAL-STRUCTURE-DETAILS
        Route::resource('company_capital_structure_details', 'CompanyCapitalStructureDetailsController');


        //--------------------------------------------------------------------------RELATED-ITEM
        Route::resource('related_item', 'RelatedItemController');


        //--------------------------------------------------------------------------ITEM-COMP-PRD-VAL
        Route::resource('item_comp_prd_val', 'ItemCompPrdValController');


        //--------------------------------------------------------------------------ITEM-ANALIZE-COMP
        Route::resource('item_analize_comp', 'ItemAnalizCopmController');




    });
});
