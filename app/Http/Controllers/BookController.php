<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Book;
use Illuminate\Support\Facades\Log;

class BookController extends Controller
{
    public function index()
    {
        try {
            $books = Book::all();

            // 取得した値をビュー「book/index」に渡す
            return view('book/index', compact('books'));
        } catch (\Throwable $th) {
            $date = new DateTime('now');
            $result = $date->format('Y-m-d H:i:s');
            Log::error('[' . $result . ']' . 'Error:' . $th->getMessage());
        }
    }

    public function edit($id)
    {
        try {
            // DBよりURIパラメータと同じIDを持つBookの情報を取得
            $book = Book::findOrFail($id);

            // 取得した値をビュー「book/edit」に渡す
            return view('book/edit', compact('book'));
        } catch (\Throwable $th) {
            $date = new DateTime('now');
            $result = $date->format('Y-m-d H:i:s');
            Log::error('[' . $result . ']' . 'Error:' . $th->getMessage());
        }
    }
}
