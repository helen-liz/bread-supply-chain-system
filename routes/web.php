<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Admin\VendorController;
use App\Http\Controllers\Admin\AnalyticsController;
use App\Http\Controllers\Admin\SettingsController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Supplier\InventoryController;
use App\Http\Controllers\Supplier\OrderController;
use App\Http\Controllers\Supplier\ChatController;
use App\Http\Controllers\Bakery\ProductionController;
use App\Http\Controllers\Bakery\ScheduleController;
use App\Http\Controllers\Bakery\MaintenanceController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    
    // Admin Routes
    Route::prefix('admin')->name('admin.')->middleware('role:admin')->group(function () {
        Route::resource('vendors', VendorController::class);
        Route::resource('users', UserController::class);
        Route::get('/analytics', [AnalyticsController::class, 'index'])->name('analytics');
        Route::get('/settings', [SettingsController::class, 'index'])->name('settings');
        Route::post('/settings', [\App\Http\Controllers\Admin\SettingsController::class, 'update'])->name('settings.update');
        Route::get('/dashboard', [\App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('dashboard');
        Route::get('/users', [\App\Http\Controllers\Admin\UserController::class, 'index'])->name('users.index');
    });

    // Supplier routes
    Route::prefix('supplier')->name('supplier.')->middleware('role:supplier')->group(function () {
        Route::get('/inventory', [InventoryController::class, 'index'])->name('inventory');
        Route::get('/inventory/add', [InventoryController::class, 'create'])->name('inventory.add');
        Route::post('/inventory', [InventoryController::class, 'store'])->name('inventory.store');
        Route::get('/orders', [OrderController::class, 'index'])->name('orders');
        Route::get('/orders/new', [OrderController::class, 'create'])->name('orders.new');
        Route::post('/orders', [OrderController::class, 'store'])->name('orders.store');
        Route::get('/chat', [ChatController::class, 'index'])->name('chat');
    });

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Bakery Manager Routes
    Route::middleware(['auth', 'role:bakery_manager'])->prefix('bakery')->name('bakery.')->group(function () {
        // Production Routes
        Route::get('/production', function () {
            return view('bakery.production');
        })->name('production');

        Route::get('/production/start', [ProductionController::class, 'start'])->name('production.start');
        Route::post('/production/start', [ProductionController::class, 'store'])->name('production.store');
        
        // Schedule Routes
        Route::get('/schedule', function () {
            return view('bakery.schedule');
        })->name('schedule');

        Route::get('/schedule/create', [ScheduleController::class, 'create'])->name('schedule.create');
        Route::post('/schedule', [ScheduleController::class, 'store'])->name('schedule.store');
        
        // Maintenance Routes
        Route::get('/maintenance', function () {
            return view('bakery.maintenance');
        })->name('maintenance');

        Route::get('/maintenance/schedule', [MaintenanceController::class, 'schedule'])->name('maintenance.schedule');
        Route::post('/maintenance', [MaintenanceController::class, 'store'])->name('maintenance.store');
    });

    // Retail Manager Routes
    Route::middleware(['auth', 'role:retail_manager'])->prefix('retail')->name('retail.')->group(function () {
        Route::get('/orders', [App\Http\Controllers\Retail\OrderController::class, 'index'])->name('orders.index');
        Route::get('/orders/create', [App\Http\Controllers\Retail\OrderController::class, 'create'])->name('orders.create');
        Route::post('/orders', [App\Http\Controllers\Retail\OrderController::class, 'store'])->name('orders.store');
        Route::get('/orders/{order}', [App\Http\Controllers\Retail\OrderController::class, 'show'])->name('orders.show');
        Route::get('/orders/{order}/edit', [App\Http\Controllers\Retail\OrderController::class, 'edit'])->name('orders.edit');
        Route::put('/orders/{order}', [App\Http\Controllers\Retail\OrderController::class, 'update'])->name('orders.update');
        Route::delete('/orders/{order}', [App\Http\Controllers\Retail\OrderController::class, 'destroy'])->name('orders.destroy');

        Route::get('/inventory', [App\Http\Controllers\Retail\InventoryController::class, 'index'])->name('inventory.index');
        Route::get('/inventory/check', [App\Http\Controllers\Retail\InventoryController::class, 'check'])->name('inventory.check');
        Route::post('/inventory/update', [App\Http\Controllers\Retail\InventoryController::class, 'update'])->name('inventory.update');

        Route::get('/forecast', [App\Http\Controllers\Retail\ForecastController::class, 'index'])->name('forecast.index');
        Route::get('/forecast/generate', [App\Http\Controllers\Retail\ForecastController::class, 'generate'])->name('forecast.generate');
    });

    // Distributor Routes
    Route::middleware(['auth', 'role:distributor'])->prefix('distributor')->name('distributor.')->group(function () {
        Route::get('/routes', [\App\Http\Controllers\Distributor\RouteController::class, 'index'])->name('routes');
        Route::get('/routes/create', [\App\Http\Controllers\Distributor\RouteController::class, 'create'])->name('routes.create');
        Route::post('/routes', [\App\Http\Controllers\Distributor\RouteController::class, 'store'])->name('routes.store');
        Route::get('/vehicles', [\App\Http\Controllers\Distributor\VehicleController::class, 'index'])->name('vehicles');
        Route::get('/vehicles/assign', [\App\Http\Controllers\Distributor\VehicleController::class, 'assign'])->name('vehicles.assign');
        Route::post('/vehicles/assign', [\App\Http\Controllers\Distributor\VehicleController::class, 'storeAssignment'])->name('vehicles.storeAssignment');
        Route::get('/deliveries', [\App\Http\Controllers\Distributor\DeliveryController::class, 'index'])->name('deliveries');
        Route::get('/deliveries/confirm', [\App\Http\Controllers\Distributor\DeliveryController::class, 'confirm'])->name('deliveries.confirm');
        Route::post('/deliveries/confirm', [\App\Http\Controllers\Distributor\DeliveryController::class, 'storeConfirmation'])->name('deliveries.storeConfirmation');
    });
});

// Vendor Registration Routes
Route::get('/vendor/register', [VendorController::class, 'register'])->name('vendor.register');
Route::post('/vendor/register', [VendorController::class, 'store'])->name('vendor.store');

Route::middleware(['auth'])->group(function () {
    Route::get('/profile/edit', [\App\Http\Controllers\ProfileController::class, 'edit'])->name('profile.edit');
    Route::post('/profile/update', [\App\Http\Controllers\ProfileController::class, 'update'])->name('profile.update');
    Route::get('/password', [\App\Http\Controllers\Auth\PasswordController::class, 'edit'])->name('password.edit');
    Route::put('/password', [\App\Http\Controllers\Auth\PasswordController::class, 'update'])->name('password.update');
});

require __DIR__.'/auth.php';
