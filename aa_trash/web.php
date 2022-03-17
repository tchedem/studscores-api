<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;

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
    return view('welcome');
});

Route::get('/factura', function () {

    $list = DB::select("SELECT IdTiers_PK client_id, ct.IdCompteTiers_PK account_id , ct.IdTypeTiers_FK  type_clt, ct.CompteAuxiliaire acct_aux,  RaisonSocial ,  TelFixe , TelGsm ,IdUtilisateur_FK  user_id, Num_IFU , Num_RCCM ,CodeAbrége  code,Suspendu susp_index
    from FACT_SBIN.dbo.TB_E_TIERS_TRS t
    left join FACT_SBIN.dbo.TB_J_COMPTE_TIERS_CTI ct on ct.IdTiers_FK = t.IdTiers_PK");

    dd($list);
    $headers = [
        'Cache-Control'       => 'must-revalidate, post-check=0, pre-check=0',
        'Content-type'        => 'text/csv',
        'Content-Disposition' => 'attachment; filename=galleries.csv',
        'Expires'             => '0',
        'Pragma'              => 'public'
    ];
//dd(gettype((string) $list[0]));
    # add headers for each column in the CSV download
    array_unshift($list, array_keys($list[0]));

    $callback = function() use ($list)
    {
        $FH = fopen('php://output', 'w');
        foreach ($list as $row) {
            fputcsv($FH, $row);
        }
        fclose($FH);
    };

    return response()->stream($callback, 200, $headers);

    /*$data1 = DB::select("SELECT IdTiers_PK client_id, ct.IdCompteTiers_PK account_id , ct.IdTypeTiers_FK  type_clt, ct.CompteAuxiliaire acct_aux,  RaisonSocial ,  TelFixe , TelGsm ,IdUtilisateur_FK  user_id, Num_IFU , Num_RCCM ,CodeAbrége  code,Suspendu susp_index
    from FACT_SBIN.dbo.TB_E_TIERS_TRS t
    left join FACT_SBIN.dbo.TB_J_COMPTE_TIERS_CTI ct on ct.IdTiers_FK = t.IdTiers_PK");
    dd($data1);*/
});
