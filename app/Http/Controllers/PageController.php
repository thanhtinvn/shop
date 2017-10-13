<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Slide;
use App\Product;


class PageController extends Controller
{
    public function getIndex(){
    	$slide = Slide::all();
    	$newProduct = Product::where('new',1)->paginate(4);
    	$promotionProduct = Product::where('promotion_price','<>',0)->paginate(8);
    	return view('page.index',compact('slide','newProduct','promotionProduct'));
    }

    public function getProductType($type){
    	$productByType = Product::where('id_type',$type)->get();
    	return view('page.product-type',compact('productByType'));
    }

    public function getProduct(){
    	return view('page.product');
    }

    public function getContact(){
    	return view('page.contact');
    }

    public function getAbout(){
    	return view('page.about');
    }
}
