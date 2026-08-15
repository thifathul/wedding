<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InvitationController;
use App\Http\Controllers\AdminController;

Route::get('/', [InvitationController::class, 'index'])->name('invitation.index');
Route::post('/rsvp', [InvitationController::class, 'store'])->name('invitation.store');

Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
Route::post('/admin', [AdminController::class, 'update'])->name('admin.update');
Route::post('/admin/gallery/{id}', [AdminController::class, 'deleteGallery'])->name('admin.gallery.delete');
