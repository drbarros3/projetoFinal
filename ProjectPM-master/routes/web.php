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

use App\User;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('tela_login');
})->name('/');

Route::get('/cadastro', function () {
    return view('cadastro');
});

route::get('/teste', function () {
    return view('teste');
});


Route::post('registro', 'Auth\RegisterController@registrar')->name('registro');
Route::get('index', 'PolicialController@list')->name('index');


Route::group(['middleware' => ['auth']], function () {

    // if($usuario->chefedoSetor == 'SPO'){
        Route::resource('inicio', 'HomeController');
        Route::resource('dispensa', 'DispensaController');
        Route::resource('abono', 'AbonoController');
        Route::resource('inicial', 'Auth\LoginController');
        Route::resource('permutas', 'PermutarController');
        Route::resource('crimes', 'CrimeController');
        Route::resource('suspeitos', 'SuspeitoController');
        Route::resource('policial', 'PolicialController');
    
        //ROTA TELA INICIAL
    
        Route::get('home', 'HomeController@home')->name('home');
    
        //ROTA POLICIAL
    
        Route::get('confirmarRegistro/{id}', 'PolicialController@confirmarRegistro')->name('confirmarRegistroPolicial');
    
        //ROTA SUSPEITO
    
        Route::get('suspeito/{id}', 'SuspeitoController@Listacrimes')->name('crimes');
        Route::get('/registrar_crime/{suspeito}', 'CrimeController@registrar')->name('registrar');
        Route::get('/confirmarRegistroSuspeito/{id}', 'SuspeitoController@confirmarRegistroSuspeito')->name('confirmarRegistroSuspeito');
    
        //ROTA PERMUTA
        Route::get('permuta', 'PermutarController@indexer')->name('index');
        Route::get('excluirpermuta/{id}', 'PermutarController@deletar')->name('deletar');
        Route::get('confirma/{id}', 'PermutarController@atualizarStatus')->name('atualizarStatus');
        Route::get('confirmaSPO_permuta/{id}', 'PermutarController@SPO')->name('spo');
        Route::get('SPOregeitada_permuta/{id}', 'PermutarController@nao')->name('nao');
        Route::get('CMDregeitada_permuta/{id}', 'PermutarController@naoCMD')->name('naoCMD');
        Route::get('imprimirPermuta/{permuta}', 'PermutarController@imprimir')->name('imprimirPermuta');
        Route::get('aceitar/{id}', 'PermutarController@aceitar')->name('aceitar');
        Route::get('refazer_permuta/{id}', 'PermutarController@refazer')->name('refazer');
        Route::get('confirmaCMD_permuta/{id}', 'PermutarController@CMD')->name('cmd');
        Route::get('teste', 'PermutarController@teste')->name('teste');
        Route::get('Atualizarpermuta/{id}, PermutarController@refazerPermuta')->name('refazerPermuta');
    
        //ROTA DISPENSA
    
        Route::get('confirmaSPO_dispensa/{id}', 'DispensaController@SPO')->name('spoDispensa');
        Route::get('SPOregeitada_dispensa/{id}', 'DispensaController@nao')->name('naoDispensa');
        Route::get('CMDregeitada_dispensa/{id}', 'DispensaController@naoCMD')->name('naoCMDDispensa');
        Route::get('imprimirDispensa/{dispensa}', 'DispensaController@imprimir')->name('imprimirDispensa');
        Route::get('refazer_dispensa/{id}', 'DispensaController@refazer')->name('refazerDispensa');
        Route::get('confirmaCMD_dispensa/{id}', 'DispensaController@CMD')->name('cmdDispensa');
        Route::get('imprimirDispensa/{dispensa}', 'DispensaController@imprimir')->name('imprimirDispensa');
    
        //ROTA ABONO
    
        Route::get('abono_sub/{id}', 'AbonoController@sub_confirma')->name('sub');
        Route::get('sim_abonoCMD/{id}', 'AbonoController@CMD')->name('simAbonoCMD');
        Route::get('nao_abonoCMD/{id}', 'AbonoController@nao')->name('naoAbonoCMD');
        Route::get('refazer_abono/{id}', 'AbonoController@refazer')->name('refazerAbono');
        Route::get('imprimirAbono/{abono}', 'AbonoController@imprimir')->name('imprimirAbono');
    // }

    
});

Route::Auth();
