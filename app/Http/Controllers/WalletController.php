<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Wallet;
use App\Models\User;

class WalletController extends Controller
{
    public function createWallet(Request $request){
         $fields =$request->all();
        echo(request("email"));
        // return Wallet::create([$fields("email")]);
    }
    public function getWalletAmount(Request $request,$userId ){
         $wallet= Wallet::find($userId);
        return $wallet;
    }
    public function addFunds(Request $request, $userId){
        $wallet = Wallet::find($userId);
        $wallet->amountAvailable +=$request->amountAdded;
        $wallet->update(["amountAvailable"=>$wallet->amountAvailable]);
        return $wallet;
    }
}
