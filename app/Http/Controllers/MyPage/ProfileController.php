<?php

namespace App\Http\Controllers\MyPage;

use App\Http\Controllers\Controller;
use App\Http\Requests\Mypage\Profile\EditRequest;
use Illuminate\Http\File;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class ProfileController extends Controller
{
    public function showProfileEditForm()
    {
         return view('mypage.profile_edit_form')->with('user', Auth::user());
    }

    public function editProfile(EditRequest $request)
    {
        $user = Auth::user();
        $user->name = $request->input('name');
        if ($request->has('avatar')) {
            $fileName = $this->saveAvatar($request->file('avatar'));
            $user->avatar_file_name = $fileName;
        }
        $user->save();
        return redirect()->back()->with('status', 'プロフィールを変更しました。');
    }

    /**
     * アバター画像をリサイズして保存します
    *
    * @param UploadedFile $file アップロードされたアバター画像
    * @return string ファイル名
    */
    private function saveAvatar(UploadedFile $file): string
    {
        $tempPath = $this->makeTempPath(); // "/private/var/folders/tj/793635yj40g23pznx9r9ppxw0000gn/T/phpmMDbDb"
        Image::make($file)->fit(200, 200)->save($tempPath); // 一時ファイルに保存
        $filePath = Storage::disk('public')->put('avatars', new File($tempPath)); // ちゃんとしたところに画像ファイルを保存 "avatars/riuJLAQ87P30nZoeS1N6y2QEpzGYkiXE8DOMV8OW.png"
        return basename($filePath);  // ファイル名だけ返す "riuJLAQ87P30nZoeS1N6y2QEpzGYkiXE8DOMV8OW.png"
    }

    /**
     * 一時的にファイルを保存する場所を作ってそのファイルパスを返す
    *
    * @return string ファイルパス
    */
    private function makeTempPath(): string
    {
        $tmp_fp = tmpfile();
        $meta   = stream_get_meta_data($tmp_fp); // $tmp_fpを配列に変換してる感じ
        return $meta["uri"]; // "配列である$metaから/private/var/folders/tj/793635yj40g23pznx9r9ppxw0000gn/T/phpMNL6OA"のようなパスを抽出
    }
}
