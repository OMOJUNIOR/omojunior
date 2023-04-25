<?php

namespace App\Http\Controllers;

use App\Models\MultiLanguage;
use Illuminate\Http\Request;

class MultiLanguageController extends Controller
{
    public function index()
    {
        $multiLanguages = MultiLanguage::paginate(25);

        return view('multiLanguage.list', compact('multiLanguages'));
    }

    public function createPost(Request $request)
    {
        $multiLanguage = new MultiLanguage();
        $multiLanguage->name = $request->name;
        $multiLanguage->text = $request->text;
        $multiLanguage->save();

        return redirect()->route('multiLanguage.list');
    }
}
