<?php

use App\BasicExtra;
use App\Page;

if (! function_exists('setEnvironmentValue')) {
    function setEnvironmentValue(array $values)
    {

        $envFile = app()->environmentFilePath();
        $str = file_get_contents($envFile);

        if (count($values) > 0) {
            foreach ($values as $envKey => $envValue) {

                $str .= "\n"; // In case the searched variable is in the last line without \n
                $keyPosition = strpos($str, "{$envKey}=");
                $endOfLinePosition = strpos($str, "\n", $keyPosition);
                $oldLine = substr($str, $keyPosition, $endOfLinePosition - $keyPosition);

                // If key does not exist, add it
                if (!$keyPosition || !$endOfLinePosition || !$oldLine) {
                    $str .= "{$envKey}={$envValue}\n";
                } else {
                    $str = str_replace($oldLine, "{$envKey}={$envValue}", $str);
                }

            }
        }

        $str = substr($str, 0, -1);
        if (!file_put_contents($envFile, $str)) return false;
        return true;

    }
}


if (! function_exists('convertUtf8')) {
    function convertUtf8( $value ) {
        return mb_detect_encoding($value, mb_detect_order(), true) === 'UTF-8' ? $value : mb_convert_encoding($value, 'UTF-8');
    }
}


if (! function_exists('make_slug')) {
    function make_slug($string) {
        $slug = preg_replace('/\s+/u', '-', trim($string));
        $slug = str_replace("/","",$slug);
        $slug = str_replace("?","",$slug);
        return $slug;
    }
}


if (! function_exists('make_input_name')) {
    function make_input_name($string) {
        return preg_replace('/\s+/u', '_', trim($string));
    }
}


if (! function_exists('serviceCategory')) {
    function serviceCategory() {
        $hbex = BasicExtra::first();
        if($hbex->service_category == 1){
            return true;
        } else {
            return false;
        }
    }
}

if (!function_exists('slug_create') ) {
    function slug_create($val) {
        $slug = preg_replace('/\s+/u', '-', trim($val));
        $slug = str_replace("/","",$slug);
        $slug = str_replace("?","",$slug);
        return $slug;
    }
}

function numberTowords($num)
{

$ones = array(
0 =>"ZERO",
1 => "ONE",
2 => "TWO",
3 => "THREE",
4 => "FOUR",
5 => "FIVE",
6 => "SIX",
7 => "SEVEN",
8 => "EIGHT",
9 => "NINE",
10 => "TEN",
11 => "ELEVEN",
12 => "TWELVE",
13 => "THIRTEEN",
14 => "FOURTEEN",
15 => "FIFTEEN",
16 => "SIXTEEN",
17 => "SEVENTEEN",
18 => "EIGHTEEN",
19 => "NINETEEN",
"014" => "FOURTEEN"
);
$tens = array( 
0 => "ZERO",
1 => "TEN",
2 => "TWENTY",
3 => "THIRTY", 
4 => "FORTY", 
5 => "FIFTY", 
6 => "SIXTY", 
7 => "SEVENTY", 
8 => "EIGHTY", 
9 => "NINETY" 
); 
$hundreds = array( 
"HUNDRED", 
"THOUSAND", 
"MILLION", 
"BILLION", 
"TRILLION", 
"QUARDRILLION" 
); /*limit t quadrillion */
$num = number_format($num,2,".",","); 
$num_arr = explode(".",$num); 
$wholenum = $num_arr[0]; 
$decnum = $num_arr[1]; 
$whole_arr = array_reverse(explode(",",$wholenum)); 
krsort($whole_arr,1); 
$rettxt = ""; 
foreach($whole_arr as $key => $i){
    
while(substr($i,0,1)=="0")
        $i=substr($i,1,5);
if($i < 20){ 
/* echo "getting:".$i; */
$rettxt .= $ones[$i]; 
}elseif($i < 100){ 
if(substr($i,0,1)!="0")  $rettxt .= $tens[substr($i,0,1)]; 
if(substr($i,1,1)!="0") $rettxt .= " ".$ones[substr($i,1,1)]; 
}else{ 
if(substr($i,0,1)!="0") $rettxt .= $ones[substr($i,0,1)]." ".$hundreds[0]; 
if(substr($i,1,1)!="0")$rettxt .= " ".$tens[substr($i,1,1)]; 
if(substr($i,2,1)!="0")$rettxt .= " ".$ones[substr($i,2,1)]; 
} 
if($key > 0){ 
$rettxt .= " ".$hundreds[$key]." "; 
}
} 
if($decnum > 0){
$rettxt .= " and ";
if($decnum < 20){
$rettxt .= $ones[$decnum];
}elseif($decnum < 100){
$rettxt .= $tens[substr($decnum,0,1)];
$rettxt .= " ".$ones[substr($decnum,1,1)];
}
}
return $rettxt;
}


if (!function_exists('getHref') ) {
    function getHref($link) {
        $href = "#";

        if ($link["type"] == 'home') {
            $href = route('front.index');
        } else if ($link["type"] == 'services' || $link["type"] == 'services-megamenu') {
            $href = route('front.services');
        } else if ($link["type"] == 'packages') {
            $href = route('front.packages');
        }
        else if ($link["type"] == 'aboutus') {
            $href = route('front.aboutus');
        }
        else if ($link["type"] == 'meetprofile') {
            $href = route('front.meetprofile');
        }
        else if ($link["type"] == 'portfolios' || $link["type"] == 'portfolios-megamenu') {
            $href = route('front.portfolios');
        } else if ($link["type"] == 'team') {
            $href = route('front.team');
        } else if ($link["type"] == 'career') {
            $href = route('front.career');
        } else if ($link["type"] == 'courses' || $link["type"] == 'courses-megamenu') {
            $href = route('courses');
        } else if ($link["type"] == 'events' || $link["type"] == 'events-megamenu') {
            $href = route('front.events');
        } else if ($link["type"] == 'causes' || $link["type"] == 'causes-megamenu') {
            $href = route('front.causes');
        } else if ($link["type"] == 'knowledgebase') {
            $href = route('front.knowledgebase');
        } else if ($link["type"] == 'calendar') {
            $href = route('front.calendar');
        } else if ($link["type"] == 'gallery') {
            $href = route('front.gallery');
        } else if ($link["type"] == 'faq') {
            $href = route('front.faq');
        } else if ($link["type"] == 'products' || $link["type"] == 'products-megamenu') {
            $href = route('front.product');
        } else if ($link["type"] == 'cart') {
            $href = route('front.cart');
        } else if ($link["type"] == 'checkout') {
            $href = route('front.checkout');
        } else if ($link["type"] == 'blogs' || $link["type"] == 'blogs-megamenu') {
            $href = route('front.blogs');
        } else if ($link["type"] == 'rss') {
            $href = route('front.rss');
        } else if ($link["type"] == 'feedback') {
            $href = route('feedback');
        } else if ($link["type"] == 'contact') {
            $href = route('front.contact');
        } else if ($link["type"] == 'custom') {
            if (empty($link["href"])) {
                $href = "#";
            } else {
                $href = $link["href"];
            }
        } else {
            $pageid = (int)$link["type"];
            $page = Page::find($pageid);
            if (!empty($page)) {
                $href = route('front.dynamicPage', [$page->slug]);
            } else {
                $href = '#';
            }
        }

        return $href;
    }
}



if (!function_exists('create_menu') ) {
    function create_menu($arr) {
        echo '<ul style="z-index: 0;">';
        foreach ($arr["children"] as $el) {

            // determine if the class is 'submenus' or not
            $class = null;
            if (array_key_exists("children", $el)) {
                $class = 'class="submenus"';
            }


            // determine the href
            $href = getHref($el);


            echo '<li '.$class.'>';
            echo '<a  href="'.$href.'" target="'.$el["target"].'">'.$el["text"].'</a>';
            if (array_key_exists("children", $el)) {
                create_menu($el);
            }
            echo '</li>';
        }
        echo '</ul>';
    }
}



if (!function_exists('hex2rgb') ) {
    function hex2rgb( $colour ) {
        if ( $colour[0] == '#' ) {
            $colour = substr( $colour, 1 );
        }
        if ( strlen( $colour ) == 6 ) {
            list( $r, $g, $b ) = array( $colour[0] . $colour[1], $colour[2] . $colour[3], $colour[4] . $colour[5] );
        } elseif ( strlen( $colour ) == 3 ) {
            list( $r, $g, $b ) = array( $colour[0] . $colour[0], $colour[1] . $colour[1], $colour[2] . $colour[2] );
        } else {
            return false;
        }
        $r = hexdec( $r );
        $g = hexdec( $g );
        $b = hexdec( $b );
        return array( 'red' => $r, 'green' => $g, 'blue' => $b );
    }
}


if (!function_exists('onlyDigitalItemsInCart')) {
    function onlyDigitalItemsInCart() {
        $cart = session()->get('cart');

        if (!empty($cart)) {
            foreach ($cart as $key => $cartItem) {
                if (array_key_exists('type', $cartItem) && $cartItem['type'] != 'digital') {
                    return false;
                }
            }
        }

        return true;
    }
}


if (!function_exists('containsDigitalItemsInCart')) {
    function containsDigitalItemsInCart() {
        $cart = session()->get('cart');

        if (!empty($cart)) {
            foreach ($cart as $key => $cartItem) {
                if (array_key_exists('type', $cartItem) && $cartItem['type'] == 'digital') {
                    return true;
                }
            }
        }

        return false;
    }
}


if (!function_exists('onlyDigitalItems')) {
    function onlyDigitalItems($order) {
        $oitems = $order->orderitems;

        foreach ($oitems as $key => $oitem) {
            if ($oitem->product->type != 'digital') {
                return false;
            }
        }

        return true;
    }
}


if (!function_exists('containsDigitalItem')) {
    function containsDigitalItem($order) {
        $oitems = $order->orderitems;

        foreach ($oitems as $key => $oitem) {
            if ($oitem->product->type == 'digital') {
                return true;
            }
        }

        return false;
    }
}

if (!function_exists('cartLength')) {
    function cartLength()
    {
        $length = 0;
        if (session()->has('cart') && !empty(session()->get('cart'))) {
            $cart = session()->get('cart');
            foreach ($cart as $key => $cartItem) {
                $length += (float)$cartItem['qty'];
            }
        }

        return round($length, 2);
    }
}

if (!function_exists('cartTotal')) {
    function cartTotal()
    {
        $total = 0;
        if (session()->has('cart') && !empty(session()->get('cart'))) {
            $cart = session()->get('cart');
            foreach ($cart as $key => $cartItem) {
                $total += (float)$cartItem['price'] * (float)$cartItem['qty'];
            }
        }

        return round($total, 2);
    }
}

if (!function_exists('cartSubTotal')) {
    function cartSubTotal()
    {
        $coupon = session()->has('coupon') && !empty(session()->get('coupon')) ? session()->get('coupon') : 0;
        $cartTotal = cartTotal();
        $subTotal = $cartTotal - $coupon;

        return round($subTotal, 2);
    }
}


if (!function_exists('tax')) {
    function tax()
    {
        $bex = BasicExtra::first();
        $tax = $bex->tax;

        if (session()->has('cart') && !empty(session()->get('cart'))) {
            $tax = (cartSubTotal() * $tax) / 100;
        }

        return round($tax, 2);
    }
}

if (!function_exists('coupon')) {
    function coupon()
    {
        return session()->has('coupon') && !empty(session()->get('coupon')) ? round(session()->get('coupon'), 2) : 0.00;
    }
}



