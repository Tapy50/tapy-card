<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

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
Route::get('/php-info', function() {
    phpinfo();
});

Route::get('/add-pdf-category', function () {
    DB::table('pdf_categories')->truncate();
    \App\Models\PdfCategory::create([
        'category_name' => 'Personal Docs',
        'profile_id' => 15
    ]);
    \App\Models\PdfCategory::create([
        'category_name' => 'Office Docs',
        'profile_id' => 15
    ]);
    \App\Models\PdfCategory::create([
        'category_name' => 'Client Docs',
        'profile_id' => 15
    ]);
    \App\Models\PdfCategory::create([
        'category_name' => 'Project Docs',
        'profile_id' => 15
    ]);
    return 'DONE';
});

Route::get('forget-password', [\App\Http\Controllers\ForgetPasswordController::class, 'showForgetPasswordForm'])->name('forget.password.get');
Route::post('forget-password', [\App\Http\Controllers\ForgetPasswordController::class, 'submitForgetPasswordForm'])->name('forget.password.post');
Route::get('reset-password/{token}', [\App\Http\Controllers\ForgetPasswordController::class, 'showResetPasswordForm'])->name('reset.password.get');
Route::post('reset-password', [\App\Http\Controllers\ForgetPasswordController::class, 'submitResetPasswordForm'])->name('reset.password.post');


Route::get('slider/{code}', [\App\Http\Controllers\User\AuthController::class, 'slider']);
Route::get('getslider', [\App\Http\Controllers\User\AuthController::class, 'getslider']);

Route::get('/login', function () {
    return view('auth.login');
});
Route::get('demo7/dist/index.html', function () {
    return redirect('/');
});
Route::post('Login', [\App\Http\Controllers\frontController::class, 'login']);
Route::get('code/{code}', [\App\Http\Controllers\User\AuthController::class, 'code']);
Route::get('register/{code}', [\App\Http\Controllers\User\AuthController::class, 'Registerview']);
Route::get('ComplateRegister', [\App\Http\Controllers\User\AuthController::class, 'ComplateRegister']);
Route::get('P/{code}', [\App\Http\Controllers\User\AuthController::class, 'profile']);
Route::get('searchDepartment', [\App\Http\Controllers\User\AuthController::class, 'searchDepartment']);
Route::get('P2/{code}', [\App\Http\Controllers\User\AuthController::class, 'profile2']);
Route::get('Employees/{category}/{id}', [\App\Http\Controllers\User\AuthController::class, 'Employees']);

Route::post('register', [\App\Http\Controllers\User\AuthController::class, 'Register']);
Route::post('registerCompany', [\App\Http\Controllers\User\AuthController::class, 'registerCompany']);

Route::get('vcf/{profile_id}', [\App\Http\Controllers\User\AuthController::class, 'vcf']);
Route::get('Activation/{email}', [\App\Http\Controllers\User\AuthController::class, 'Activation']);
Route::get('testemail/{email}', [\App\Http\Controllers\User\AuthController::class, 'testemail']);
Route::get('mail-signature/{code}', [\App\Http\Controllers\User\AuthController::class, 'mailsignatures']);

Route::get('preview', [\App\Http\Controllers\User\AuthController::class, 'preview']);

    Route::post('ExchangeContact-store', [\App\Http\Controllers\Admin\ExhangeContactController::class, 'store'])->name('add.exchange.contact');

Route::post('Appointment-store', [\App\Http\Controllers\Admin\AppointmentsRelationController::class, 'store']);
Route::post('store-review', [\App\Http\Controllers\Admin\ReviewController::class, 'store']);

Route::group(['middleware' => ['user']], function () {

    // New code starts 20th july

    // Geolocation starts
    Route::post('/get-user-location/{id}', [\App\Http\Controllers\Admin\GeoLocationController::class, 'index'])->name('get_user_location');
    // Geolocation ends

    // Pdf starts
    Route::get('Pdf_datatable', [\App\Http\Controllers\Admin\PDFController::class, 'datatable'])->name('Pdf.datatable.data');
    Route::post('store-PDF',[\App\Http\Controllers\Admin\PDFController::class,'store']);
    Route::get('/add-button-PDF/{id}', function ($id) {
        $pdfCategories = \App\Models\PdfCategory::where('profile_id', $id)->get();
        return view('Admin/ProfileElements/PDF',compact('id', 'pdfCategories'));
    });
    Route::post('store-pdf-category', [\App\Http\Controllers\Admin\PDFController::class, 'storePdfCategory'])->name('store_pdf_category');

    // Pdf ends

    // New code ends 20th july

    Route::get('UserDashboard', function () {
        return view('User.index');
    });

    Route::get('User_setting', [\App\Http\Controllers\Admin\UserController::class, 'index']);
    Route::get('User_datatable', [\App\Http\Controllers\Admin\UserController::class, 'datatable'])->name('User.datatable.data');
    Route::get('delete-User', [\App\Http\Controllers\Admin\UserController::class, 'destroy']);
    Route::post('store-User', [\App\Http\Controllers\Admin\UserController::class, 'store']);
    Route::get('User-edit/{id}', [\App\Http\Controllers\Admin\UserController::class, 'edit']);
    Route::post('update-User', [\App\Http\Controllers\Admin\UserController::class, 'update']);
    Route::post('updateProfile', [\App\Http\Controllers\Admin\UserController::class, 'updateProfile']);

    Route::get('/add-button-User', function () {
        return view('Admin/User/button');
    });

    Route::get('Card_setting', [\App\Http\Controllers\Admin\CardController::class, 'index']);
    Route::get('lock-Card', [\App\Http\Controllers\Admin\CardController::class, 'lock']);
    Route::get('Edit_Card_profile', [\App\Http\Controllers\Admin\CardController::class, 'Edit_Card_profile']);
    Route::post('update_Card_Profile', [\App\Http\Controllers\Admin\CardController::class, 'update_Card_Profile']);

    Route::get('Analytics/{serial}', [\App\Http\Controllers\Admin\CardController::class, 'Analytics']);
    Route::get('Calendar/{serial?}', [\App\Http\Controllers\Admin\CardController::class, 'Calendar']);

    Route::get('Card_datatable', [\App\Http\Controllers\Admin\CardController::class, 'datatable'])->name('Card.datatable.data');
    Route::get('Tapping_datatable', [\App\Http\Controllers\User\TappingController::class, 'datatable'])->name('Tapping.datatable.data');


    Route::get('Profile_setting', [\App\Http\Controllers\Admin\ProfileController::class, 'index']);
    Route::get('Profile_datatable', [\App\Http\Controllers\Admin\ProfileController::class, 'datatable'])->name('Profile.datatable.data');
    Route::get('delete-Profile', [\App\Http\Controllers\Admin\ProfileController::class, 'destroy']);
    Route::post('store-Profile', [\App\Http\Controllers\Admin\ProfileController::class, 'store']);
    Route::get('Profile-edit/{id}', [\App\Http\Controllers\Admin\ProfileController::class, 'edit']);
    Route::post('Update-Profile', [\App\Http\Controllers\Admin\ProfileController::class, 'update']);
    Route::get('/add-button-Profile', function () {
        return view('Admin/Profile/button');
    });

    Route::get('reviews_setting', [\App\Http\Controllers\Admin\ReviewController::class, 'companyReview']);
    Route::get('review_setting/{id}', [\App\Http\Controllers\Admin\ReviewController::class, 'index']);
    Route::get('review_datatable', [\App\Http\Controllers\Admin\ReviewController::class, 'datatable'])->name('review.datatable.data');
    Route::get('delete-review', [\App\Http\Controllers\Admin\ReviewController::class, 'destroy']);
    Route::get('/add-button-review', function () {
        return view('Admin/review/button');
    });
    Route::get('Departments_setting', [\App\Http\Controllers\Admin\DepartmentsController::class, 'index']);
    Route::get('Departments_datatable', [\App\Http\Controllers\Admin\DepartmentsController::class, 'datatable'])->name('Departments.datatable.data');
    Route::get('delete-Departments', [\App\Http\Controllers\Admin\DepartmentsController::class, 'destroy']);
    Route::post('store-Departments', [\App\Http\Controllers\Admin\DepartmentsController::class, 'store']);
    Route::get('Departments-edit/{id}', [\App\Http\Controllers\Admin\DepartmentsController::class, 'edit']);
    Route::post('Update-Departments', [\App\Http\Controllers\Admin\DepartmentsController::class, 'update']);
    Route::get('/add-button-Departments', function () {
        return view('Admin/Departments/button');
    });
    Route::get('get-Profiles/{id}', [\App\Http\Controllers\Admin\ProfileController::class, 'getProfiles']);
    Route::get('/add-button-social/{id}', function ($id) {
        return view('Admin/ProfileElements/socialButton',compact('id'));
    });
    Route::get('/add-button-LinksButton/{id}', function ($id) {
        return view('Admin/ProfileElements/LinksButton',compact('id'));
    });
    Route::get('/add-button-ImagesButton/{id}', function ($id) {
        return view('Admin/ProfileElements/ImagesButton',compact('id'));
    });

    Route::get('/add-button-VideoButton/{id}', function ($id) {
        return view('Admin/ProfileElements/VideoButton',compact('id'));
    });

    Route::get('/add-button-ContactButton/{id}', function ($id) {
        return view('Admin/ProfileElements/ContactButton',compact('id'));
    });

        Route::get('CategoryImage_setting/{id}', [\App\Http\Controllers\Admin\CategoryImagesController::class, 'index']);
    Route::post('store-CategoryImage',[\App\Http\Controllers\Admin\CategoryImagesController::class,'store']);
    Route::get('CategoryImage_datatable', [\App\Http\Controllers\Admin\CategoryImagesController::class, 'datatable'])->name('CategoryImage.datatable.data');
    Route::get('delete-CategoryImage', [\App\Http\Controllers\Admin\CategoryImagesController::class, 'destroy']);
    Route::get('/add-button-CategoryImage/{id}', function ($id) {
        return view('Admin/CategoryImages/button',compact('id'));
    });

//    Route::get('CategoryImage_setting/{id}', [\App\Http\Controllers\Admin\CategoryController::class, 'index']);

        Route::get('Profile_elements/Category/subcategory/{id}',[\App\Http\Controllers\Admin\CategoryController::class,'index2']);

    Route::post('store-Categories',[\App\Http\Controllers\Admin\CategoryController::class,'store']);
    Route::get('ChangeProfileDepartment',[\App\Http\Controllers\Admin\CategoryController::class,'ChangeProfileDepartment']);
    Route::get('SubDepartment',[\App\Http\Controllers\Admin\CategoryController::class,'SubDepartment']);
    Route::post('Update_Profile_Deparment',[\App\Http\Controllers\Admin\CategoryController::class,'UpdateProfileDeparment']);

    Route::get('datatable_category', [\App\Http\Controllers\Admin\CategoryController::class, 'datatable'])->name('Category.datatable.data');
    Route::get('delete-Category', [\App\Http\Controllers\Admin\CategoryController::class, 'destroy']);
    Route::get('activeAll-Category', [\App\Http\Controllers\Admin\CategoryController::class, 'activeAll']);
    Route::get('/add-button-Category/{id}/{parent_id?}', function ($id ,$parent_id = null) {
        return view('Admin/ProfileElements/CategoryButton',compact('id','parent_id'));
    });
    Route::post('store-Payment',[\App\Http\Controllers\Admin\PaymentController::class,'store']);
    Route::get('Payment_datatable', [\App\Http\Controllers\Admin\PaymentController::class, 'datatable'])->name('Payment.datatable.data');
    Route::get('delete-Payment', [\App\Http\Controllers\Admin\PaymentController::class, 'destroy']);
    Route::get('activeAll-Payment', [\App\Http\Controllers\Admin\PaymentController::class, 'activeAll']);
    Route::get('/add-button-Payment/{id}', function ($id) {
        return view('Admin/ProfileElements/PaymentButton',compact('id'));
    });

    Route::post('Store_BusinessHours',[\App\Http\Controllers\Admin\ProfileElementsController::class,'Store_BusinessHours']);
    Route::get('Appointments_datatable', [\App\Http\Controllers\Admin\AppointmentController::class, 'datatable'])->name('Appointments.datatable.data');
    Route::get('delete-Appointments', [\App\Http\Controllers\Admin\AppointmentController::class, 'destroy']);
    Route::post('store-Appointments', [\App\Http\Controllers\Admin\AppointmentController::class, 'store']);
    Route::get('/add-button-Appointments/{id}', function ($id) {
        return view('Admin/ProfileElements/AppointmentsButton',compact('id'));
    });

    Route::get('Profile_elements/{id}', [\App\Http\Controllers\Admin\ProfileElementsController::class, 'index']);
    Route::get('Profile_elements/{type}/{id}', [\App\Http\Controllers\Admin\ProfileElementsController::class, 'index2']);
    Route::get('Profile_elements_datatable', [\App\Http\Controllers\Admin\ProfileElementsController::class, 'datatable'])->name('Profile_elements.datatable.data');
    Route::get('delete-Profile_elements', [\App\Http\Controllers\Admin\ProfileElementsController::class, 'destroy']);
    Route::post('store-Profile_elements', [\App\Http\Controllers\Admin\ProfileElementsController::class, 'store']);
    Route::get('activeAll-Profile_elements', [\App\Http\Controllers\Admin\ProfileElementsController::class, 'activeAll']);

    Route::post('store-Category', [\App\Http\Controllers\Admin\ProfileElementsController::class, 'storeCategory'])->name('store_image_category');

    Route::get('Setting', [\App\Http\Controllers\frontController::class, 'Setting']);

    Route::get('AppointmentsRelation_setting', [\App\Http\Controllers\Admin\AppointmentsRelationController::class, 'index']);
    Route::get('AppointmentsRelation_datatable', [\App\Http\Controllers\Admin\AppointmentsRelationController::class, 'datatable'])->name('AppointmentsRelation.datatable.data');

    Route::get('AppointmentsRelation-edit/{id}', [\App\Http\Controllers\Admin\AppointmentsRelationController::class, 'edit']);
    Route::post('update-AppointmentsRelation', [\App\Http\Controllers\Admin\AppointmentsRelationController::class, 'update']);
    Route::get('/add-button-AppointmentsRelation', function () {
        return view('Admin/AppointmentsRelation/button');
    });

    Route::get('ExchangeContact_setting', [\App\Http\Controllers\Admin\ExhangeContactController::class, 'index']);
    Route::get('ExchangeContact_datatable', [\App\Http\Controllers\Admin\ExhangeContactController::class, 'datatable'])->name('ExchangeContact.datatable.data');
    Route::get('/add-button-ExchangeContact', function () {
        return view('Admin/ExchangeContact/button');
    });
    Route::get('ExchangeContact-edit/{id}', [\App\Http\Controllers\Admin\ExhangeContactController::class, 'edit']);
    Route::post('update-ExchangeContact', [\App\Http\Controllers\Admin\ExhangeContactController::class, 'update']);


    Route::get('/add-button-Card', function () {
        return view('Admin/Card/button');
    });
});
Route::group(['middleware' => ['admin']], function () {
    Route::get('/', function () {
        return view('Admin.index');
    });

    Route::get('logout', [\App\Http\Controllers\frontController::class, 'logout']);

    Route::get('Dashboard', function () {
        return view('admin.dashboard');
    });
    Route::get('Admin_setting', [\App\Http\Controllers\Admin\AdminController::class, 'index']);
    Route::get('Admin_datatable', [\App\Http\Controllers\Admin\AdminController::class, 'datatable'])->name('Admin.datatable.data');
    Route::get('delete-Admin', [\App\Http\Controllers\Admin\AdminController::class, 'destroy']);
    Route::post('store-Admin', [\App\Http\Controllers\Admin\AdminController::class, 'store']);
    Route::get('Admin-edit/{id}', [\App\Http\Controllers\Admin\AdminController::class, 'edit']);
    Route::post('update-Admin', [\App\Http\Controllers\Admin\AdminController::class, 'update']);
    Route::get('/add-button-Admin', function () {
        return view('Admin/Admin/button');
    });


    Route::get('delete-Card', [\App\Http\Controllers\Admin\CardController::class, 'destroy']);
    Route::post('store-Card', [\App\Http\Controllers\Admin\CardController::class, 'store']);
    Route::get('Card-edit/{id}', [\App\Http\Controllers\Admin\CardController::class, 'edit']);
    Route::post('update-Card', [\App\Http\Controllers\Admin\CardController::class, 'update']);

  

    Route::get('delete-AppointmentsRelation', [\App\Http\Controllers\Admin\AppointmentsRelationController::class, 'destroy']);
    Route::post('store-AppointmentsRelation', [\App\Http\Controllers\Admin\AppointmentsRelationController::class, 'store']);

    Route::get('delete-ExchangeContact', [\App\Http\Controllers\Admin\ExhangeContactController::class, 'destroy']);
    Route::post('store-ExchangeContact', [\App\Http\Controllers\Admin\ExhangeContactController::class, 'store']);

    Route::get('Email_setting', [\App\Http\Controllers\Admin\EmailController::class, 'index']);
    Route::get('Email_datatable', [\App\Http\Controllers\Admin\EmailController::class, 'datatable'])->name('Email.datatable.data');
    Route::get('delete-Email', [\App\Http\Controllers\Admin\EmailController::class, 'destroy']);
    Route::post('store-Email', [\App\Http\Controllers\Admin\EmailController::class, 'store']);
    Route::get('/add-button-Email', function () {
        return view('Admin/Email/button');
    });
});

Route::get('lang/{lang}', function ($lang) {

    if (session()->has('lang')) {
        session()->forget('lang');
    }
    if ($lang == 'en') {
        session()->put('lang', 'en');
    } else {
        session()->put('lang', 'ar');
    }


    return back();
});

