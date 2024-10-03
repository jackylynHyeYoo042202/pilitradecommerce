<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontEndController extends Controller
{
    public function homePage(Request $request) {
        $data = [
            'pageTitle' => 'PiliTrade | Online Marketplace'
        ];
        return view('front.pages.home', $data);
    }

    public function shopPage(Request $request) {
        $data = [
            'pageTitle' => 'Shop | PiliTrade Marketplace'
        ];
        return view('front.pages.shop', $data);
    }

    public function shopDetailPage(Request $request) {
        $data = [
            'pageTitle' => 'Shop Detail | PiliTrade Marketplace'
        ];
        return view('front.pages.shopdetail', $data);
    }

    public function cartPage(Request $request) {
        $data = [
            'pageTitle' => 'Cart | PiliTrade Marketplace'
        ];
        return view('front.pages.cart', $data);
    }

    public function checkoutPage(Request $request) {
        $data = [
            'pageTitle' => 'Checkout | PiliTrade Marketplace'
        ];
        return view('front.pages.checkout', $data);
    }

    public function registerPage(Request $request) {
        $data = [
            'pageTitle' => 'Register | PiliTrade Marketplace'
        ];
        return view('back.pages.auth.register', $data);
    }

    public function createSellerPage(Request $request) {
        $data = [
            'pageTitle' => 'Create Seller | PiliTrade Marketplace'
        ];
        return view('back.pages.auth.create', $data);
    }

    public function verifyAccountPage(Request $request) {
        $data = [
            'pageTitle' => 'Verify Account | PiliTrade Marketplace'
        ];
        return view('back.pages.auth.verifyAccount', $data);
    }

    public function registersuccessPage(Request $request) {
        $data = [
            'pageTitle' => 'Register-Success | PiliTrade Marketplace'
        ];
        return view('back.pages.auth.register-success', $data);
    }

    public function contactPage(Request $request) {
        $data = [
            'pageTitle' => 'Contact Us | PiliTrade Marketplace'
        ];
        return view('front.pages.contact', $data);
    }
}

