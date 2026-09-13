<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function featured()
    {
        $products = $this->products();
        $featured = $products[4];

        return view('products.show', ['product'=> $featured]);
    }

    public function filter($brand = null)
    {
      $all = $this->products();
       
      if ($brand === null) {
        $products = $all;
      } else {
        $products = [];
      
     foreach ($all as $id => $product) {
        if ($product['brand'] == $brand) {
            $products[$id] = $product;
        }
      }
    }
    return view('products.filter', ['products' => $products, 'brand' => $brand,]);
    }
    public function index()
    {
        return view('products.index', ['products'=> $this -> products()]);
    }
    public function show($id)
    {
        $products = $this->products();

        if(!isset($products[$id]))
            {
                abort(404);
            }

        return view('products.show', ['product' => $products[$id]]);
    }
    
    private function products(){
        return [
            1 => ['id' => 1,'name'=> 'Shampoo', 'price' => 10, 'stock'=> 50, 'brand' => 'sunsilk', 'is_available' => true],
            2 => ['id' => 2,'name'=> 'stick-O', 'price' => 100, 'stock'=> 20, 'brand' => 'choco', 'is_available' => true],
            3 => ['id' => 3,'name'=> 'smart', 'price' => 50, 'stock'=> 30, 'brand' => 'dishwashing', 'is_available' => false],
            4 => ['id' => 4,'name'=> 'joy', 'price' => 20, 'stock' => 40, 'brand' => 'dishwashing', 'is_available' => true],
            5 => ['id' => 5,'name'=> 'coffee', 'price' => 60, 'stock' => 70, 'brand' => 'nescafe', 'is_available' => false],
            6 => ['id' => 6,'name' => 'lollipop', 'price' => 80, 'stock' => 9, 'brand' => 'mint', 'is_available' => true],
        ];
    }
}




/*
Q1. Explain the order you placed your featured route and your detail route in, and what would happen if you swapped them.
    > ANSWER 
         I placed my featured route (/products/featured) above my detail route (/products/{id}) in web.php.
This matters because Laravel matches routes in the order they're defined, from top to bottom, and stops at the first match. My detail route uses {id} as a wildcard, which matches any value in that URL position  including the literal text "featured". So if I visited /products/featured with the detail route listed first, Laravel would match it to /products/{id} and try to run show('featured'), treating "featured" as if it were a product ID. Since 'featured' isn't a valid key in my products array, this would cause an error (like "Undefined array key" or a 404), rather than reaching my intended featured() method.

Q2. What happens when someone visits an id that does not exist in your data, and what did you write to make that happen?
    >ANSWER
        When someone visits an id that doesn't exist in my data (e.g. /products/99), my show() method checks whether that id exists in the $products array using isset(). If it doesn't, I call abort(404), which tells Laravel to immediately stop and return Laravel's default 404 "Not Found" error page, instead of trying to render a view with missing data.

Q3. Why do your links use route names instead of typed URLs? Give one concrete thing that would break if they did not.
    >ANSWER
        I use route names instead of typed URLs so that my links don't break if the actual URL path changes later. Route names act as a fixed reference point — Laravel generates the correct URL for me based on the route definition, not on text I manually typed into every blade file.
Concrete example of what would break: If I decided to rename my URL structure from /products/{id} to /items/{id} (a common refactor), every hardcoded link like href="/products/{{$product['id']}}" across all my blade files would now point to the wrong, broken URL — I'd have to manually find and update each one. But if I used href="{{ route('products.show', $product['id']) }}", I'd only need to update the URL once, in the route definition itself, and every link across the app would automatically generate the correct new path.


*/
<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

You may also try the [Laravel Bootcamp](https://bootcamp.laravel.com), where you will be guided through building a modern Laravel application from scratch.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains thousands of video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the [Laravel Partners program](https://partners.laravel.com).

### Premium Partners

- **[Vehikl](https://vehikl.com/)**
- **[Tighten Co.](https://tighten.co)**
- **[WebReinvent](https://webreinvent.com/)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Curotec](https://www.curotec.com/services/technologies/laravel/)**
- **[Cyber-Duck](https://cyber-duck.co.uk)**
- **[DevSquad](https://devsquad.com/hire-laravel-developers)**
- **[Jump24](https://jump24.co.uk)**
- **[Redberry](https://redberry.international/laravel/)**
- **[Active Logic](https://activelogic.com)**
- **[byte5](https://byte5.de)**
- **[OP.GG](https://op.gg)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
