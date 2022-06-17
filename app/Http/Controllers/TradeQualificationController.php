<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TradeQualification;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\DocumentUploadRequest;

class TradeQualificationController extends Controller
{

    public function uploadQualification(DocumentUploadRequest $request){
        $path = $request->file('file')->store('docs');
        TradeQualification::create([
            'path' => $path,
            'user_id' => Auth::id(),
            'company_id' => Auth::user()->company->id,
        ]);

        return back()->with('status', 'Your Document has been uploaded successfully.');
    }


    public function downloadQualification($file_id){
        $item = TradeQualification::find($file_id);
        if($item->user_id === Auth::id()){
            try{
                return Storage::download($item->path);
            }catch(Throwable $t){
                return back()->withErrors($t->getMessage());
            }
        }else{
            return back()->withErrors('Invalid file.');
        }
    }

    public function deleteQualification($file_id){
        $item = TradeQualification::find($file_id);
        if($item->user_id === Auth::id()){
            try{
                Storage::delete($item->path);
                $item->delete();

                return back()->with('status', 'The document has been deleted successfully.');
            }catch(Throwable $t){
                return back()->withErrors($t->getMessage());
            }
        }else{
            return back()->withErrors('Invalid file.');
        }
    }
}
