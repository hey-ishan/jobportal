<?php



/*

  |--------------------------------------------------------------------------

  | Web Routes

  |--------------------------------------------------------------------------

  |

  | Here is where you can register web routes for your application. These

  | routes are loaded by the RouteServiceProvider within a group which

  | contains the "web" middleware group. Now create something great!

  |

 */

$real_path = realpath(__DIR__) . DIRECTORY_SEPARATOR . 'front_routes' . DIRECTORY_SEPARATOR;

/* * ******** IndexController ************ */

Route::get('/', 'IndexController@index')->name('index');

Route::post('set-locale', 'IndexController@setLocale')->name('set.locale');

/* * ******** HomeController ************ */

Route::get('home', 'HomeController@index')->name('home');

/* * ******** TypeAheadController ******* */

Route::get('typeahead-currency_codes', 'TypeAheadController@typeAheadCurrencyCodes')->name('typeahead.currency_codes');

/* * ******** FaqController ******* */

Route::get('faq', 'FaqController@index')->name('faq');

/* * ******** CronController ******* */

Route::get('check-package-validity', 'CronController@checkPackageValidity');

/* * ******** Verification ******* */

Route::get('email-verification/error', 'Auth\RegisterController@getVerificationError')->name('email-verification.error');

Route::get('email-verification/check/{token}', 'Auth\RegisterController@getVerification')->name('email-verification.check');

Route::get('company-email-verification/error', 'Company\Auth\RegisterController@getVerificationError')->name('company.email-verification.error');

Route::get('company-email-verification/check/{token}', 'Company\Auth\RegisterController@getVerification')->name('company.email-verification.check');

/* * ***************************** */

// Sociallite Start

// OAuth Routes

Route::get('login/jobseeker/{provider}', 'Auth\LoginController@redirectToProvider');

Route::get('login/jobseeker/{provider}/callback', 'Auth\LoginController@handleProviderCallback');

Route::get('login/employer/{provider}', 'Company\Auth\LoginController@redirectToProvider');

Route::get('login/employer/{provider}/callback', 'Company\Auth\LoginController@handleProviderCallback');

// Sociallite End

/* * ***************************** */

Route::post('tinymce-image_upload-front', 'TinyMceController@uploadImage')->name('tinymce.image_upload.front');



Route::get('cronjob/send-alerts', 'AlertCronController@index')->name('send-alerts');



Route::post('subscribe-newsletter', 'SubscriptionController@getSubscription')->name('subscribe.newsletter');



/* * ******** OrderController ************ */

include_once($real_path . 'order.php');

/* * ******** CmsController ************ */

include_once($real_path . 'cms.php');

/* * ******** JobController ************ */

include_once($real_path . 'job.php');

/* * ******** ContactController ************ */

include_once($real_path . 'contact.php');

/* * ******** CompanyController ************ */

include_once($real_path . 'company.php');

/* * ******** AjaxController ************ */

include_once($real_path . 'ajax.php');

/* * ******** UserController ************ */

include_once($real_path . 'site_user.php');

/* * ******** User Auth ************ */

Auth::routes();

/* * ******** Company Auth ************ */

include_once($real_path . 'company_auth.php');

/* * ******** Admin Auth ************ */

include_once($real_path . 'admin_auth.php');





Route::get('blog', 'BlogController@index')->name('blogs');

Route::get('blog/search', 'BlogController@search')->name('blog-search');

Route::get('blog/{slug}', 'BlogController@details')->name('blog-detail');

Route::get('/blog/category/{blog}', 'BlogController@categories')->name('blog-category');

Route::get('/company-change-message-status', 'CompanyMessagesController@change_message_status')->name('company-change-message-status');
Route::get('/seeker-change-message-status', 'Job\SeekerSendController@change_message_status')->name('seeker-change-message-status');

Route::get('/sitemap', 'SitemapController@index');

Route::get('/sitemap/companies', 'SitemapController@companies');


Route::get('/clear-cache', function () {

  $exitCode = Artisan::call('config:clear');

  $exitCode = Artisan::call('cache:clear');

  $exitCode = Artisan::call('config:cache');

  return 'DONE'; //Return anything

});

Route::get('/import-sql', function () {
    try {
        $sqlPath = base_path('software_jobportaldb22.sql');
        if (!file_exists($sqlPath)) {
            return 'Error: SQL file not found at ' . $sqlPath;
        }
        
        // Clean slate: Drop all existing tables to prevent "Table already exists" errors
        DB::statement('SET FOREIGN_KEY_CHECKS = 0;');
        $tables = DB::select('SHOW TABLES');
        foreach ($tables as $table) {
            $tableName = array_values((array)$table)[0];
            DB::statement('DROP TABLE IF EXISTS `' . $tableName . '`');
        }
        DB::statement('SET FOREIGN_KEY_CHECKS = 1;');
        
        $sql = file_get_contents($sqlPath);
        
        // Fix for "Row size too large" error on modern MySQL versions
        $sql = str_ireplace('ROW_FORMAT=COMPACT', 'ROW_FORMAT=DYNAMIC', $sql);
        
        // Aiven enforces primary keys. We must disable this requirement for the import session.
        DB::unprepared('SET SESSION sql_require_primary_key = 0;');
        
        // Execute the raw SQL queries
        DB::unprepared($sql);
        
        return '<h1>Database Import Successful! 🎉</h1><p>Your old MySQL data is now successfully imported into the new Aiven Database. <a href="/">Click here to go to the Homepage</a></p>';
    } catch (\Exception $e) {
        return '<h1>Error Occurred During Import</h1><pre>' . $e->getMessage() . '</pre>';
    }
});


