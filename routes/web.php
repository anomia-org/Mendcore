<?php
use Inertia\Inertia;
use GuzzleHttp\Middleware;
use App\Http\Controllers\TestCon;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\USController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\GrabController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\Web3LoginController;
use App\Http\Controllers\MaintenanceController;
use App\Http\Controllers\Endpoints\RssController;
use App\Http\Controllers\Endpoints\UserController;
use App\Http\Controllers\GoogleSocialiteController;
use App\Http\Controllers\Endpoints\RenderController;
use App\Http\Controllers\Endpoints\ItemApiController;
// use \Spatie\ResponseCache\Middlewares\CacheResponse; Broken :/
use App\Http\Controllers\Endpoints\SearchSiteController;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" Middleware group. Now create something great!
|
*/



Route::group(['as' => 'maintenance.', 'prefix' => 'maintenance'], function () {
Route::get('/', [MaintenanceController::class, 'show'])->name('page');
Route::post('/password', [MaintenanceController::class, 'authenticate'])->name('authenticate.password');
Route::get('/exit', [MaintenanceController::class, 'Exit'])->name('exit');
});
Route::group(['as' => 'api.', 'prefix' => 'vite/AeoApiEndpoints'], function () {
    Route::get('/search', [SearchSiteController::class, 'all'])->name('search');
    Route::get('/render/validate/{id}', [RenderController::class, 'userRender'])->name('avatar');
    Route::get('/user/online/{id}', [UserController::class, 'getStatus'])->name('user.online');
    Route::get('/user/follow/{user}', [UserController::class, 'follow'])->name('user.follow');
    Route::post('/user/unfollow/{user}', [UserController::class, 'unfollow'])->name('user.unfollow');
    Route::get('/items/{category}', [ItemApiController::class, 'getItemsByCategory'])->name('store.items');
    Route::get('/items/event/{eventId}', [ItemApiController::class, 'getEventItems'])->name('store.event.items');
    Route::get('/inventory/{category}', [AvatarController::class, 'getItemsByCategory'])->name('avatar.items');
    Route::get('/rss-feed', [RssController::class, 'index'])->name('rss');
    Route::get('/user/img/{id}', [UserController::class, 'getAvatar'])->name('avatar');

});
Route::group(['as' => 'my.', 'prefix' => 'my', 'middleware' => 'auth'], function () {

    Route::group(['Middleware' => 'auth'], function () {
        Route::group(['as' => 'dashboard.', 'prefix' => 'dashboard'], function () {
            Route::get('/', [GrabController::class, 'DashboardIndex'])->name('page');
            Route::post('/', [GrabController::class, 'DashboardVal'])->name('validate');
        });
    });
});

Route::group(['as' => 'user.', 'prefix' => 'users'], function () {
    Route::get('/discover', [GrabController::class, 'UserIndex'])->name('page');
    Route::get('/profile/{username}', [GrabController::class, 'ProfileIndex'])->name('profile');
    Route::group(['middleware' => 'auth'], function () {
        Route::group(['as' => 'settings.', 'prefix' => 'settings'], function () {
            Route::get('/{category}', [USController::class, 'edit'])->name('page');
            Route::patch('/update', [USController::class, 'update'])->name('update');
            Route::get('/delete-account', [USController::class, 'destroy'])->name('destroy');
        });
    });
});

Route::group(['as' => 'avatar.', 'prefix' => 'customize', 'middleware' => 'auth'], function () {
    Route::get('/', [GrabController::class, 'customizeIndex'])->name('page');
    Route::post('/update', [GrabController::class, 'UpdateAvatar'])->name('update');
});

Route::group(['as' => 'forum.', 'prefix' => 'discuss'], function () {
    Route::get('/{id}', [GrabController::class, 'ForumIndex'])->name('page');
    Route::get('/post/{id}/{slug}', [GrabController::class, 'ForumPost'])->name('post');
    Route::group(['as' => 'create.', 'prefix' => 'create'], function () {
        Route::get('/{id}', [GrabController::class, 'ForumCreate'])->name('page');
        Route::post('/{id}/validate', [GrabController::class, 'ForumVal'])->name('validate');
    });
    Route::group(['as' => 'reply.', 'prefix' => 'create/reply'], function () {
        Route::post('/{id}/validate', [GrabController::class, 'ForumReply'])->name('validate');
    });
});


Route::group(['as' => 'auth.', 'prefix' => 'auth'], function () {

    Route::post('logout', [AuthController::class, 'UserExit'])->name('logout');
    Route::get('/set-language/{language}', function ($language) {
        Session()->put('locale', $language);

        return redirect()->back();
    })->name('language');


    Route::group(['middleware' => 'guest'], function () {
        Route::group(['as' => 'login.', 'prefix' => 'login'], function () {
            // Google login
            Route::get('/google/v1', [GoogleSocialiteController::class, 'redirectToGoogle'])->name('google');
            Route::get('callback/google', [GoogleSocialiteController::class, 'handleCallback'])->name('google.validation');

            //  remove (//) If you want Facebook login
            //Route::get('auth/facebook', [FacebookSocialiteController::class, 'redirectToFB']);
            //Route::get('callback/facebook', [FacebookSocialiteController::class, 'handleCallback']);
            Route::get('/', [AuthController::class, 'LoginIndex'])->name('page');
            Route::post('/validate', [AuthController::class, 'LoginVal'])->name('validate');
            Route::get('/validate/metamask', [Web3LoginController::class, 'message'])->name('metamask');
            Route::post('/validate/meta-mask-api', [Web3LoginController::class, 'verify'])->name('metamask.validation');
        });

        Route::group(['as' => 'register.', 'prefix' => 'register'], function () {

            Route::get('/', [AuthController::class, 'RegisterIndex'])->name('page');
            Route::post('/validate', [AuthController::class, 'RegisterVal'])->name('validate');
        });

        Route::group(['as' => 'forgot.', 'prefix' => 'forgot'], function () {
            Route::get('/', [AuthController::class, 'ForgotIndex'])->name('page');
        });
});
});
Route::get('/', [GrabController::class, 'WelcomeIndex'])->Middleware(['guest'])->name('Welcome');

Route::get('/games', function () {
    return Inertia::render('Games/Index');
})->name('Game');

Route::get('/deletion', function () {
    return Inertia::render('AccountDeleted');
})->name('removed');
Route::group(['as' => 'store.', 'prefix' => 'market'], function () {
    Route::get('/', [GrabController::class, 'StoreIndex'])->name('page');
    Route::get('/item/{id}', [GrabController::class, 'StoreItem'])->name('item');
});
Route::get('/discord', [TestCon::class, 'index'])->name('test');
Route::get('/csrf-token', \App\Http\Controllers\RefreshCsrfTokenController::class);
