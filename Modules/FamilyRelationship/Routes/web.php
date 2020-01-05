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

use Modules\FamilyRelationship\Actions\ShowCreateFamilyRelationshipForm;
use Modules\FamilyRelationship\Actions\ShowEditFamilyRelationshipForm;
use Modules\FamilyRelationship\Actions\ViewFamilyRelationship;
use Modules\FamilyRelationship\Actions\DataTableOfFamilyRelationship;

Route::prefix('familyrelationship')->middleware('auth')->group(function() {
    Route::get('/', DataTableOfFamilyRelationship::class)->name('familyrelationship.index');
    Route::get('/create', ShowCreateFamilyRelationshipForm::class)->name('familyrelationship.create');
    Route::get('/{familyrelationship}', ViewFamilyRelationship::class)->name('familyrelationship.show');
    Route::get('/{familyrelationship}/edit', ShowEditFamilyRelationshipForm::class)->name('familyrelationship.edit');
});
