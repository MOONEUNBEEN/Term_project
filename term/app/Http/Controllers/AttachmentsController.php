<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\User;
use App\Attachment;

class AttachmentsController extends Controller
{
    public function store(Request $request) {
        $attachment = null;
        /* 
        1. 전송받은 파일을 지정된 폴더에 저장한다.
            어느 폴더에 저장해야 하나?

            public/files/사용자_아이디/

        2. 파일정보를 attachments테이블에 저장한다
        3. 잘 저장 되었어요라는 결과를 클라이언트에게 송신한다->json으로 전송
        */

        /* 1번 구현 */
        if($request->hasFile('file')) {
    		$file = $request->file('file');
 			
    		$filename = /*str_random().*/filter_var($file->getClientOriginalName(), FILTER_SANITIZE_URL);
    		$bytes = $file->getSize();
            $user = auth()->user();
            $path = public_path('files') . DIRECTORY_SEPARATOR . $user->id;
            if (!File::isDirectory($path)) {
                File::makeDirectory($path, 0777, true, true);
            }
            
            $file->move($path, $filename);


            /* 2번 구현 */

            $payload = [
                'filename'=>$filename,
                'bytes'=> $bytes,
                'mime'=>$file->getClientMimeType()
            ];
            
            $attachment =  Attachment::create($payload);
        }

        return response()->json($attachment, 200);
    }

    /* public function destroy(Request $request, $id) {
        $filename =  $request->filename;
        $attachment = Attachment::find($id);
        $attachment->deleteAttachedFile($filename);
        $attachment->delete();
        $user = \Auth::user();
        
        $path = public_path('files') . DIRECTORY_SEPARATOR .  $user->id . DIRECTORY_SEPARATOR . $filename;
        if (file_exists($path)) {
            unlink($path);
        }
        
        return $filename;  
    } */
}
