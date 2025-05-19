<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\CartItem;
use App\Models\MenuItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function updateCart(Request $request)
    {
        $userId = Auth::user()->id;

        $cart = Cart::where('user_id', $userId)->first();
        if ($cart) {
            foreach ($request->cartItems as $item) {
                $productId = (int)$item['id']; // Lấy ID của sản phẩm
                $quantity = (int)$item['quantity']; // Lấy số lượng sản phẩm


                $cartItem = CartItem::where('cart_id', $cart->id)
                    ->where('menu_item_id', $productId)
                    ->first();
                $menuItem = MenuItem::find($productId);

                if (!$menuItem) {
                    return response()->json(['status' => 'error', 'message' => 'Sản phẩm không tồn tại']);
                }

                if ($quantity > $menuItem->Quantity) {
                    return response()->json([
                        'status' => 'error',
                        'message' => 'Số lượng yêu cầu vượt quá số lượng nhà hàng có thể đáp ứng ! Số lượng tồn kho hiện tại là ' . $menuItem->stock
                    ]);
                }


                if ($quantity <= 0) {
                    return response()->json(['status' => 'error', 'message' => 'Số lượng không được nhỏ hơn hoặc bằng 0']);
                }
                if ($cartItem) {
                    $cartItem->cart_quantity = $quantity;
                    $cartItem->cart_price = $cartItem->menuItem->Price ;
                    $cartItem->save();
                }
            }

            $cartTotal = $cart->cartItems->sum(function ($item) {
                return $item->cart_price * $item->cart_quantity;
            });

            $cart->amount = $cartTotal;
            $cart->save();

            return response()->json(['status' => 'success', 'cart_total' => number_format($cartTotal)]);
        }

        return response()->json(['status' => 'error', 'message' => 'Có lỗi xảy ra']);
    }




    public function removeFromCart($cartItemId)
    {
        if (!Auth::check()) {
            return redirect()->route('login')
                ->with('error', 'Bạn cần đăng nhập để xóa sản phẩm.');
        }

        $cartItem = CartItem::find($cartItemId);

        if (! $cartItem) {
            return redirect()->route('cart.index')
                ->with('error', 'Không tìm thấy sản phẩm để xóa!');
        }

        $cart = $cartItem->cart;

        $cartItem->delete();

        if ($cart && $cart->cartItems()->count() === 0) {
            $cart->delete();
        }

        return redirect()->route('cart.index')
            ->with('success', 'Sản phẩm đã được xóa khỏi giỏ hàng!');
    }


    public function clearCart(Request $request)
    {
        // dd($request->all());
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Bạn cần đăng nhập để xóa giỏ hàng.');
        }

        // Tìm giỏ hàng của người dùng hiện tại
        $cart = Cart::where('user_id', Auth::id())->first();
        if ($cart) {
            // Xóa tất cả items trong giỏ hàng
            $cart->cartItems()->delete();  // Xóa tất cả các sản phẩm trong giỏ
            $cart->amount = 0;
            $cart->save();  // Lưu lại thay đổi của giỏ hàng

            return redirect()->route('cart.index')->with('success', 'Giỏ hàng đã được xóa!');
        }

        return redirect()->route('cart.index')->with('error', 'Giỏ hàng của bạn trống!');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Bạn cần đăng nhập để xem giỏ hàng.');
        }

        $userId = Auth::id();

        $cart = Cart::with('cartItems.menuItem')->where('user_id', $userId)->first();
        return view('Client.page.Cart.index', compact('cart'));
    }

    public function addToCart($menuItemId)
    {
        // 1. Kiểm tra đăng nhập
        if (!Auth::check()) {
            return redirect()->route('login.index')->with('error', 'Bạn cần đăng nhập để thêm sản phẩm vào giỏ hàng.');
        }

        $menuItem = MenuItem::find($menuItemId);

        if (!$menuItem) {
            return redirect()->back()->with('error', 'Sản phẩm không tồn tại.');
        }

        $userId = Auth::id();

        // 2. Lấy hoặc tạo giỏ hàng
        $cart = Cart::firstOrCreate(
            ['user_id' => $userId],
            ['amount' => 0]
        );

        // 3. Kiểm tra xem sản phẩm đã có trong giỏ chưa
        $cartItem = CartItem::where('cart_id', $cart->id)
            ->where('menu_item_id', $menuItemId)
            ->first();

        // 4. Kiểm tra vượt quá số lượng tồn kho
        $currentQuantityInCart = $cartItem ? $cartItem->cart_quantity : 0;
        $newQuantity = $currentQuantityInCart + 1;

        if ($newQuantity > $menuItem->Quantity) {
            return redirect()->back()->with('error', 'Không thể thêm sản phẩm. Số lượng trong kho không đủ.');
        }

        // 5. Thêm hoặc cập nhật sản phẩm trong giỏ
        if ($cartItem) {
            $cartItem->cart_quantity = $newQuantity;
            $cartItem->save();
        } else {
            CartItem::create([
                'cart_id' => $cart->id,
                'menu_item_id' => $menuItemId,
                'cart_price' => $menuItem->Price,
                'cart_quantity' => 1,
            ]);
        }

        // 6. Cập nhật tổng tiền giỏ hàng
        $this->updateCartAmount($cart);

        return redirect()->route('cart.index')->with('success', 'Sản phẩm đã được thêm vào giỏ hàng.');
    }


    private function updateCartAmount($cart)
    {
        $totalAmount = $cart->cartItems->sum(function ($cartItem) {
            return $cartItem->cart_price * $cartItem->cart_quantity;
        });

        $cart->amount = $totalAmount;
        $cart->save();
    }

}
