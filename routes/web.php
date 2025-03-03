<?php
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::view('/', 'welcome');

// Route::middleware(['auth', 'verified'])->group(function () {
//     Route::get('/dashboard', function () {
//         if (Auth::user()->is_admin) {
//             return redirect()->route('Admindashboard');
//         } else {
//             return redirect()->route('user-dashboard');
//         }
//     })->name('userdashboard');
// });

Route::middleware([

    ])->group(function () {
         Route::get('/dashboard', function () {
           if (auth()->user()->is_admin == 1) {
            return redirect()->route('Admindashboard');
           }else{
            return redirect()->route('user-dashboard');
           }
         })->name('userdashboard');

    });

    Route::prefix('admin')->middleware('admin')->group(function(){
        Route::get('/Admindashboard', function(){
            return view('admin.index');
        })->name('Admindashboard');

        Route::get('/admin.membership', function(){
            return view('admin.membership');
        })->name('admin.membership');

        Route::get('/admin.members', function(){
            return view('admin.members');
        })->name('admin.members');

        Route::get('/admin.membershipfees', function(){
            return view('admin.membershipfees');
        })->name('admin.membershipfees');

        Route::get('/admin.monthly_payment', function(){
            return view('admin.monthly_payment');
        })->name('admin.monthly_payment');

        Route::get('/admin.add-account', function(){
            return view('admin.add-account');
        })->name('admin.add_account');


     });

     Route::prefix('user')->middleware('user')->group(function(){
        Route::get('/dashboard', function(){
               return view('user.index');
           })->name('user-dashboard');



        Route::get('/user.payplan', function(){
            return view('user.payplan');
        })->name('user-payplan');

        Route::get('/user.monthlypayment', function(){
            return view('user.monthlypayment');
        })->name('user-monthlypayment');

        Route::get('/user.myaccount', function(){
            return view('user.myaccount');
        })->name('myaccount');




    });
     Route::get('membershipform', function(){
         return view('user.membershipform');
     })->name('user-membershipform');

// Route::view('dashboard', 'dashboard')
//     ->middleware(['auth', 'verified'])
//     ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
require __DIR__.'/auth.php';
