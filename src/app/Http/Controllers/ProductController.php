<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Product;
use App\Models\Season;
use App\Models\ProductSeason;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function content(Request $request)
    {
        $products = Product::query();
        $products = $products->Paginate(6);
        return view('content',compact('products'));
    }

    public function register(Request $request)
    {
        $seasons = Season::all();
        return view('register',compact('seasons'));
    }

    public function content_detail($id)
    {
        $product = Product::with('seasons')->findOrFail($id);
        $seasons = Season::all();
        return view('content_detail',compact('product','seasons'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {   // (検索条件を後から追加するため)
        $query = Product::query();
        // nameの入力が空ではない(nullや""ではない)場合にtrueとなる
        if ($request->filled('name')) {
            // $query->where(...)検索条件を追加(where)
            // ('name', 'like', )nameカラムに対して部
            // 分検索一致(like)を適用
            // ('%' . $request->input('name') . '%')全てのデータを取得
            $query->where('name', 'like', '%' . $request->input('name') . '%');
        }

        if ($request->filled('sort')) {
            $query->orderBy('price', $request->input('sort'));
        }

        $products = $query->paginate(10);

        return view('content',compact('products'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        // データを取得
        $data = $request->all();
        // 画像がアップロードされたときの処理
        $data['image'] = $request->file('image')->store('image','public');
        // 商品データの登録
        $product = Product::create($data);
        // 季節情報 (多対多noれりーション) の処理
        $product->seasons()->sync($request->season_id);
        return redirect()->route('products.content');
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // プロダクトモデルからfindOrFailで送信されたフルーツの$id(Eloquent)を読み込む
        // nullなら404を返す
        $product = Product::findOrFail($id);
        // フォームのデータを取得
        $data = $request->all();
        // 画像のアップロードと保存
        // フォームから新しい画像がアップロードされたか、チェックif文
        if ($request->hasFile('image'))
        {
            // 古い画像があれば削除
            if ($product->image) {
                Storage::disk('public')->delete($product->image);
            }
            // 新しい画像を保存
            $data['image'] = $request->file('image')->store('image','public');
        } else {
            // 画像がアップロードされなかった場合、imageの値を保持
            $data['image'] = $product->image;
        }
            // データを更新
            $product->update($data);
            // 季節情報を更新
            $product->seasons()->sync($request->input('season_id',[]));

        return redirect()->route('products.content')->with('success','商品が更新されました');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //  対象の商品を取得
        $product = Product::findOrFail($id);

        // 画像ファイルがあれば削除
            if (empty($product->image)) {
                // Storage(app/public/)内のファイルを削除する処理
                // disk('public')でstorage/app/publicにファイルを保存・管理するための処理
                Storage::disk('public')->delete($product->image);
            }

        // 商品データを削除
        $product->delete();

        return redirect()->route('products.content')->with('success','商品が削除されました');
    }
}
