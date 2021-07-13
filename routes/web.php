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

Route::get('/', function () {
    return view('auth.login');
});


Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');

Route::middleware(['auth'])->group(function () {

Route::resource('produtos', 'ProdutoController');
Route::get('/produtos','ProdutoController@index')->name('listar_produto');
Route::any('/produtos/pesquisar', 'ProdutoController@search')->name('pesquisar_produto');
Route::get('/produto/novo','ProdutoController@create')->name('criar_produto');
Route::post('/produto/novo','ProdutoController@store')->name('salvar_produto'); //salva_produto=nome no html
Route::get('/produtos/{id}','ProdutoController@show')->name('detalhar_produto');
Route::get('/produtos/excluir/{id}','ProdutoController@destroy')->name('excluir_produto');
Route::get('/produtos/editar/{id}','ProdutoController@edit')->name('editar_produto');
Route::post('/produto/editar/{id}','ProdutoController@update')->name('atualizar_produto');
Route::get('/produto/{id}','ProdutoController@show')->name('detalhar_produto');





// ============================================================================================= //


Route::resource('categorias', 'CategoriaProdutoController');
Route::get('/categorias','CategoriaProdutoController@index')->name('listar_categoria');
Route::any('/categorias/pesquisar', 'CategoriaProdutoController@search')->name('pesquisar_categoria');
Route::get('/categoria/novo','CategoriaProdutoController@create');
Route::post('/categoria/novo','CategoriaProdutoController@store')->name('salvar_categoria');
Route::get('/categorias/{id}','CategoriaProdutoController@show')->name('detalhar_categoria');
Route::get('/categorias/excluir/{id}','CategoriaProdutoController@destroy')->name('excluir_categoria');
Route::get('/categorias/editar/{id}','CategoriaProdutoController@edit')->name('editar_categoria');
Route::post('/categorias/editar/{id}','CategoriaProdutoController@update')->name('atualizar_categoria');


// ============================================================================================= //

Route::resource('clientes', 'ClienteController');
Route::get('clientes', 'ClienteController@index')->name('listar_cliente');
Route::any('/clientes/pesquisar', 'ClienteController@search')->name('pesquisar_cliente');
Route::get('/cliente/novo','ClienteController@create');
Route::post('/cliente/novo','ClienteController@store')->name('salvar_cliente');
Route::get('/clientes/{id}','ClienteController@show')->name('detalhar_cliente');

Route::get('/clientes/excluir/{id}','ClienteController@destroy')->name('excluir_cliente');
Route::get('/clientes/editar/{id}','ClienteController@edit')->name('editar_cliente');
Route::post('/clientes/editar/{id}','ClienteController@update')->name('atualizar_cliente');
Route::get('clientes/{id}/relatorio', 'ClienteController@geraPdf')->name('relatorio_cliente');

// ============================================================================================= //


Route::resource('estados', 'EstadoController');
Route::any('/estados/pesquisar', 'EstadoController@search')->name('pesquisar_estado');
Route::get('/estado/novo','EstadoController@create');
Route::post('/estado/novo','EstadoController@store')->name('salvar_estado');
Route::get('/estados/visualizar','EstadoController@show')->name('listar_estado');
Route::get('/estado/excluir/{id}','EstadoController@destroy')->name('excluir_estado');
Route::get('/estado/editar/{id}','EstadoController@edit')->name('editar_estado');
Route::post('/estado/editar/{id}','EstadoController@update')->name('atualizar_estado');

Route::resource('cidades', 'CidadeController');
Route::any('/cidades/pesquisar', 'CidadeController@search')->name('pesquisar_cidade');
Route::get('/cidade/nova','CidadeController@create');
Route::post('/cidade/nova','CidadeController@store')->name('salvar_cidade');
Route::get('/cidades/visualizar','CidadeController@show')->name('listar_cidade');
Route::get('/cidade/excluir/{id}','CidadeController@destroy')->name('excluir_cidade');
Route::get('/cidade/editar/{id}','CidadeController@edit')->name('editar_cidade');
Route::post('/cidade/editar/{id}','CidadeController@update')->name('atualizar_cidade');

Route::resource('enderecos', 'EnderecoController');
Route::any('/enderecos/pesquisar', 'EnderecoController@search')->name('pesquisar_endereco');
Route::get('/endereco/novo','EnderecoController@create'); //=================================== cliente/novo
Route::post('/endereco/novo','EnderecoController@store')->name('salvar_endereco');
Route::get('/enderecos/visualizar','EnderecoController@show')->name('listar_endereco');
Route::get('/endereco/excluir/{id}','EnderecoController@destroy')->name('excluir_endereco');
Route::get('/endereco/editar/{id}','EnderecoController@edit')->name('editar_endereco');
Route::post('/endereco/editar/{id}','EnderecoController@update')->name('atualizar_endereco');

Route::resource('usuarios', 'UserController');
Route::any('/usuarios/pesquisar', 'UserController@search')->name('pesquisar_user');
Route::get('/usuario/novo','UserController@create');
Route::post('/usuario/novo','UserController@store')->name('salvar_user');
Route::get('/usuario/excluir/{id}','UserController@destroy')->name('excluir_user');
Route::get('/usuario/editar/{id}','UserController@edit')->name('editar_user');
Route::post('/usuario/editar/{id}','UserController@update')->name('atualizar_user');

Route::get('/perfil/editar/{id}','UserController@editProfile')->name('editar_perfil');
Route::post('/perfil/editar/{id}','UserController@updateProfile')->name('atualizar_perfil');

Route::get('/usuario/{id}','UserController@show')->name('detalhar_user');
Route::get('usuarios', 'UserController@index')->name('listar_user');


//================================================================================================================//
Route::resource('ordens', 'OrdemServicoController');
Route::get('/ordens', 'OrdemServicoController@index')->name('listar_ordem');
Route::any('/ordens/pesquisar', 'OrdemServicoController@search')->name('pesquisar_ordem');
Route::get('/ordem/cadastrar','OrdemServicoController@create');
Route::post('/ordem/cadastrar','OrdemServicoController@store')->name('salvar_ordem');
Route::get('/ordens/{id}','OrdemServicoController@show')->name('detalhar_ordem');
Route::get('/ordem/excluir/{id}','OrdemServicoController@destroy')->name('excluir_ordem');
Route::get('/ordens/editar/{id}','OrdemServicoController@edit')->name('editar_ordem');
Route::post('/ordens/editar/{id}','OrdemServicoController@update')->name('atualizar_ordem');
Route::get('/relatorio/ordem', 'OrdemServicoController@geraPdfOs')->name('relatorio_os'); //================= AQUIIIIIIIIIIIII
Route::get('/relatorio/ordem/esp', 'OrdemServicoController@geraPdfEsp')->name('relatorio_esp');

Route::post('/ordem/finalizar/{id}','OrdemServicoController@finalizar')->name('finalizar_ordem');
Route::get('/relatorio/os', 'RelatorioController@gerarRelatorioOs');


Route::get('/ordens/{id}/adicionar-produtos','OrdemServicoController@addProduto')->name('adicionar_produto');
Route::post('/ordens/{id}/adicionar-produtos','OrdemServicoController@addProdutoSave')->name('salvar_produto_os');
Route::get('/ordens/{id}/remover-produtos/{produto_id}/{quantidade_produto}/','OrdemServicoController@removeProduto')->name('remover_produto');

Route::get('/ordens/{id}/adicionar-servicos','OrdemServicoController@addServico')->name('adicionar_servico');
Route::post('/ordens/{id}/adicionar-servicos','OrdemServicoController@addServicoSave')->name('salvar_servico_os');
Route::get('/ordens/{id}/remover-servicos/{tipo_servico_id}','OrdemServicoController@removeServico')->name('remover_servico');

//================================================================================================================//

Route::resource('tipos-servico', 'TipoServicoController');
Route::get('tipos-servico', 'TipoServicoController@index')->name('listar_tipo_serv');
Route::any('/tipos-servico/pesquisar', 'TipoServicoController@search')->name('pesquisar_tipo_serv');
Route::get('/tipo-servico/novo','TipoServicoController@create');
Route::post('/tipo-servico/novo','TipoServicoController@store')->name('salvar_tipo_serv');
Route::get('/tipo-servico/excluir/{id}','TipoServicoController@destroy')->name('excluir_tipo_serv');
Route::get('/tipo-servico/editar/{id}','TipoServicoController@edit')->name('editar_tipo_serv');
Route::post('/tipo-servico/editar/{id}','TipoServicoController@update')->name('atualizar_tipo_serv');

});





