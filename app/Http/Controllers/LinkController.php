<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\link;

class LinkController extends Controller
{
  public function generateRandomString($length) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
      $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    if (link::where('code', '=', $randomString)->exists()) {
      generateRandomString(2);
    }
    return $randomString;
  }
  
  public function create(Request $request){
    $Link = new link;
    $Link->url = $request->link;
    $Link->code = LinkController::generateRandomString(2);
    $Link->save();
    return redirect()->route('home');
  }

  public function decode($code){
    $Link = link::where('code', $code)->first();
    // Update visited link count
    $Link->visited = $Link->visited += 1;
    $Link->save();
    // Redirect to original url
    return redirect()->away($Link->url);
  }

}
