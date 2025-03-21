<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $data['image'] = $request->file('image')->store('image','public');
        $product = Product::create($data);
        $product->seasons()->sync($request->season_id);
        return redirect()->route('products.content');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        // バリデーションデータを取得
        // $validateData = $request->validated();

        // リクエストから'name'を取得 -> $product->name で新しい値をセット
        $product->name = $request->input('name');
        $product->price = $request->input('price');
        $product->description = $request->input('description');

        // 画像のアップロードと保存
        if ($request->hasFile('image')) {

            if ($product->image) {
                Storage::delete('public/' . $product->image);
            }

            $file=$request->file('image');
            // time()現在のタイムスタンプを取得
            // getClientOriginalName()は、ユーザーのアップロードしたファイル名を取得
            $fileName = time() . '_' . $file->getClientOriginalName();
            // 新しい画像を保存 (storage/app/public/imageにstoreで保存)
            $filePath = $file->storeAs('public/image', $fileName);

            //データベースの更新**
            $product->image = 'image/' . $fileName;
        }

        // 季節(Season)の更新
        $product->seasons()->sync($request->input('season_id',[]));

        // データベースに保存
        $product->save();

        // フォーム送信(更新)->redirect->POST送信
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
        
    }
}
