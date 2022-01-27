<?php

/*
*
* Backend Routes
* These routes need view-backend permission
* --------------------------------------------------------------------
*/
use Illuminate\Support\Facades\Route;
Route::group(['namespace' => 'Backend', 'prefix' => 'admin', 'as' => 'backend.', 'middleware' => ['auth', 'can:view_backend']], function () {

    /**
     * Backend Dashboard
     * Namespaces indicate folder structure.
     */

    Route::get('/', 'BackendController@index')->name('home');
    Route::get('dashboard', 'BackendController@index')->name('dashboard');
    Route::get('property_details', 'BackendController@getPropertyDetails');

    /*
     *
     *  Settings Routes
     *
     * ---------------------------------------------------------------------
     */
    Route::group(['middleware' => ['permission:edit_settings']], function () {
        $module_name = 'settings';
        $controller_name = 'SettingController';
        Route::get("$module_name", "$controller_name@index")->name("$module_name");
        Route::post("$module_name", "$controller_name@store")->name("$module_name.store");
    });

    /*
    *
    *  Notification Routes
    *
    * ---------------------------------------------------------------------
    */
    $module_name = 'notifications';
    $controller_name = 'NotificationsController';
    Route::get("$module_name", ['as' => "$module_name.index", 'uses' => "$controller_name@index"]);
    Route::get("$module_name/markAllAsRead", ['as' => "$module_name.markAllAsRead", 'uses' => "$controller_name@markAllAsRead"]);
    Route::delete("$module_name/deleteAll", ['as' => "$module_name.deleteAll", 'uses' => "$controller_name@deleteAll"]);
    Route::get("$module_name/{id}", ['as' => "$module_name.show", 'uses' => "$controller_name@show"]);

    /*
    *
    *  Notice Routes
    *
    * ---------------------------------------------------------------------
    */

    Route::get('notices',['as' => 'notices.index', 'uses' => 'NoticeController@index']);
    Route::get('notices/trashed', ['as' => 'notices.trashed', 'uses' => 'NoticeController@trashed']);
    Route::patch('notices/trashed/{id}', ['as' => 'notices.restore', 'uses' => "NoticeController@restore"]);
    Route::get('notices/create',['as' => 'notices.create', 'uses' => 'NoticeController@create']);
    Route::post('notices',['as' => 'notices.store', 'uses' => 'NoticeController@store']);
    Route::get('notices/{notice}',['as' => 'notices.show', 'uses' => 'NoticeController@show']);
    Route::get('notices/{notice}/edit',['as' => 'notices.edit', 'uses' => 'NoticeController@edit']);
    Route::put('notices/{notice}',['as' => 'notices.update', 'uses' => 'NoticeController@update']);
    Route::delete('notices/{notice}',['as' => 'notices.destroy', 'uses' => 'NoticeController@destroy']);
    

/*
    *
    *  Slider Routes
    *
    * ---------------------------------------------------------------------
    */

    Route::delete('gallerys/{gallery}',['as' => 'sliders.delete', 'uses' => 'SliderController@galleryDestroy']);
    Route::get('sliders',['as'=>'sliders.index', 'uses'=>'SliderController@index']);

    Route::get('sliders/trashed', ['as' => 'sliders.trashed', 'uses' => 'SliderController@trashed']);
    Route::patch('sliders/trashed/{id}', ['as' => 'sliders.restore', 'uses' => "SliderController@restore"]);
    Route::delete('sliders/trashed/{id}', ['as' => 'sliders.remove', 'uses' => "SliderController@actualDelete"]);
  
    Route::get('sliders/create',['as' => 'sliders.create', 'uses' => 'SliderController@create']);
    Route::post('sliders',['as' => 'sliders.store', 'uses' => 'SliderController@store']);
    Route::get('sliders/{slider}',['as' => 'sliders.show', 'uses' => 'SliderController@show']);
    Route::get('sliders/{slider}/edit',['as'=>'sliders.edit', 'uses'=>'SliderController@edit']);
    Route::put('sliders/{slider}',['as'=>'sliders.update','uses'=>'SliderController@update']);
    Route::delete('sliders/{slider}',['as' => 'sliders.destroy', 'uses' => 'SliderController@destroy']);
    
   
    /*
    *
    *  Property Routes
    *
    * ---------------------------------------------------------------------
    */

    Route::get('properties',['as'=>'properties.index', 'uses'=>'PropertyController@index']);

    Route::get('properties/trashed', ['as' => 'properties.trashed', 'uses' => 'PropertyController@trashed']);
    Route::patch('properties/trashed/{id}', ['as' => 'properties.restore', 'uses' => "PropertyController@restore"]);
    Route::delete('properties/trashed/{id}', ['as' => 'properties.remove', 'uses' => "PropertyController@actualDelete"]);
  

    Route::get('properties/create',['as' => 'properties.create', 'uses' => 'PropertyController@create']);
    Route::post('properties',['as' => 'properties.store', 'uses' => 'PropertyController@store']);
    Route::get('properties/{property}',['as' => 'properties.show', 'uses' => 'PropertyController@show']);
    Route::get('properties/{property}/edit',['as'=>'properties.edit', 'uses'=>'PropertyController@edit']);
    Route::put('properties/{property}',['as'=>'properties.update','uses'=>'PropertyController@update']);
    Route::delete('properties/{property}',['as' => 'properties.destroy', 'uses' => 'PropertyController@destroy']);

   /*
    *
    *  Contact Routes
    *
    * ---------------------------------------------------------------------
    */
   
    Route::get('contacts',['as'=>'contacts.index', 'uses'=>'ContactController@index']);

    Route::get('contacts/trashed', ['as' => 'contacts.trashed', 'uses' => 'ContactController@trashed']);
    Route::patch('contacts/trashed/{id}', ['as' => 'contacts.restore', 'uses' => "ContactController@restore"]);
    Route::delete('contacts/trashed/{id}', ['as' => 'contacts.remove', 'uses' => "ContactController@actualDelete"]);

    Route::get('contacts/create',['as' => 'contacts.create', 'uses' => 'ContactController@create']);
    Route::post('contacts',['as' => 'contacts.store', 'uses' => 'ContactController@store']);
    Route::get('contacts/{contact}',['as' => 'contacts.show', 'uses' => 'ContactController@show']);
    Route::get('contacts/{contact}/edit',['as'=>'contacts.edit', 'uses'=>'ContactController@edit']);
    Route::put('contacts/{contact}',['as'=>'contacts.update','uses'=>'ContactController@update']);
    Route::delete('contacts/{contact}',['as' => 'contacts.destroy', 'uses' => 'ContactController@destroy']);


/*
    *
    *  About Us Routes
    *
    * ---------------------------------------------------------------------
    */

    Route::get('abouts',['as'=>'abouts.index', 'uses'=>'AboutController@index']);

    Route::get('abouts/trashed', ['as' => 'abouts.trashed', 'uses' => 'AboutController@trashed']);
    Route::patch('abouts/trashed/{id}', ['as' => 'abouts.restore', 'uses' => "AboutController@restore"]);
    Route::delete('abouts/trashed/{id}', ['as' => 'abouts.remove', 'uses' => "AboutController@actualDelete"]);

    Route::get('abouts/create',['as' => 'abouts.create', 'uses' => 'AboutController@create']);
    Route::post('abouts',['as' => 'abouts.store', 'uses' => 'AboutController@store']);
    Route::get('abouts/{about}',['as' => 'abouts.show', 'uses' => 'AboutController@show']);
    Route::get('abouts/{about}/edit',['as'=>'abouts.edit', 'uses'=>'AboutController@edit']);
    Route::put('abouts/{about}',['as'=>'abouts.update','uses'=>'AboutController@update']);
    Route::delete('abouts/{about}',['as' => 'abouts.destroy', 'uses' => 'AboutController@destroy']);


    /*
    *
    *  Pricing Routes
    *
    * ---------------------------------------------------------------------
    */

    Route::get('pricings',['as'=>'pricings.index', 'uses'=>'PricingController@index']);

    Route::get('pricings/trashed', ['as' => 'pricings.trashed', 'uses' => 'PricingController@trashed']);
    Route::patch('pricings/trashed/{id}', ['as' => 'pricings.restore', 'uses' => "PricingController@restore"]);
    Route::delete('pricings/trashed/{id}', ['as' => 'pricings.remove', 'uses' => "PricingController@actualDelete"]);

    Route::get('pricings/create',['as' => 'pricings.create', 'uses' => 'PricingController@create']);
    Route::post('pricings',['as' => 'pricings.store', 'uses' => 'PricingController@store']);
    Route::get('pricings/{pricing}',['as' => 'pricings.show', 'uses' => 'PricingController@show']);
    Route::get('pricings/{pricing}/edit',['as'=>'pricings.edit', 'uses'=>'PricingController@edit']);
    Route::put('pricings/{pricing}',['as'=>'pricings.update','uses'=>'PricingController@update']);
    Route::delete('pricings/{pricing}',['as' => 'pricings.destroy', 'uses' => 'PricingController@destroy']);


    /*
    *
    *  Backup Routes
    *
    * ---------------------------------------------------------------------
    */

    $module_name = 'backups';
    $controller_name = 'BackupController';
    Route::get("$module_name", ['as' => "$module_name.index", 'uses' => "$controller_name@index"]);
    Route::get("$module_name/create", ['as' => "$module_name.create", 'uses' => "$controller_name@create"]);
    Route::get("$module_name/download/{file_name}", ['as' => "$module_name.download", 'uses' => "$controller_name@download"]);
    Route::get("$module_name/delete/{file_name}", ['as' => "$module_name.delete", 'uses' => "$controller_name@delete"]);

    /*
    *
    *  Roles Routes
    *
    * ---------------------------------------------------------------------
    */
    $module_name = 'roles';
    $controller_name = 'RolesController';
    Route::resource("$module_name", "$controller_name");

    /*
    *
    *  Users Routes
    *
    * ---------------------------------------------------------------------
    */
    $module_name = 'users';
    $controller_name = 'UserController';
    Route::get("$module_name/profile/{id}", ['as' => "$module_name.profile", 'uses' => "$controller_name@profile"]);
    Route::get("$module_name/profile/{id}/edit", ['as' => "$module_name.profileEdit", 'uses' => "$controller_name@profileEdit"]);
    Route::patch("$module_name/profile/{id}/edit", ['as' => "$module_name.profileUpdate", 'uses' => "$controller_name@profileUpdate"]);
    Route::get("$module_name/emailConfirmationResend/{id}", ['as' => "$module_name.emailConfirmationResend", 'uses' => "$controller_name@emailConfirmationResend"]);
    Route::delete("$module_name/userProviderDestroy", ['as' => "$module_name.userProviderDestroy", 'uses' => "$controller_name@userProviderDestroy"]);
    Route::get("$module_name/profile/changeProfilePassword/{id}", ['as' => "$module_name.changeProfilePassword", 'uses' => "$controller_name@changeProfilePassword"]);
    Route::patch("$module_name/profile/changeProfilePassword/{id}", ['as' => "$module_name.changeProfilePasswordUpdate", 'uses' => "$controller_name@changeProfilePasswordUpdate"]);
    Route::get("$module_name/changePassword/{id}", ['as' => "$module_name.changePassword", 'uses' => "$controller_name@changePassword"]);
    Route::patch("$module_name/changePassword/{id}", ['as' => "$module_name.changePasswordUpdate", 'uses' => "$controller_name@changePasswordUpdate"]);
    Route::get("$module_name/trashed", ['as' => "$module_name.trashed", 'uses' => "$controller_name@trashed"]);
    Route::patch("$module_name/trashed/{id}", ['as' => "$module_name.restore", 'uses' => "$controller_name@restore"]);
    Route::get("$module_name/index_data", ['as' => "$module_name.index_data", 'uses' => "$controller_name@index_data"]);
    Route::get("$module_name/index_list", ['as' => "$module_name.index_list", 'uses' => "$controller_name@index_list"]);
    Route::resource("$module_name", "$controller_name");
    Route::patch("$module_name/{id}/block", ['as' => "$module_name.block", 'uses' => "$controller_name@block", 'middleware' => ['permission:block_users']]);
    Route::patch("$module_name/{id}/unblock", ['as' => "$module_name.unblock", 'uses' => "$controller_name@unblock", 'middleware' => ['permission:block_users']]);
});
