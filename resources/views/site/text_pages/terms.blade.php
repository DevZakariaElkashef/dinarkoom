@extends('site.layouts.app')
@section('style')
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        h1 {
            text-align: center;
        }
        .terms-content {
            margin-top: 20px;
        }
    </style>
@endsection
@section('content')
    
        
        <!-- Contact section-->
        <section class="bg-dark text-light py-5" style="min-height: 90vh;">
            <div class="container px-5 my-5 px-5">
                <h1>Terms and Conditions</h1>
                <h3>Dear : @auth {{ Auth::user()->name }} @endauth</h3>
                <div class="terms-content">
                    <h2>Introduction</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla auctor ex ut nibh interdum, id imperdiet dui feugiat.</p>
                    
                    <h2>Acceptance of Terms</h2>
                    <p>Sed euismod dapibus felis, nec sagittis justo dictum sed. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; In hac habitasse platea dictumst.</p>
                    
                    <h2>Use License</h2>
                    <p>Nulla facilisi. Duis fringilla porta quam, ac eleifend magna feugiat ut. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.</p>
                    
                    <h2>Disclaimer</h2>
                    <p>Integer euismod metus eu purus tempor, sed aliquet eros auctor. Fusce ut ultricies nisi.</p>
                    
                    <h2>Limitations</h2>
                    <p>Proin feugiat, enim vel luctus feugiat, lacus nisl lobortis justo, sed consequat erat urna eget leo. Sed nec risus tincidunt, vestibulum turpis id, aliquet leo.</p>
                    
                    <h2>Governing Law</h2>
                    <p>These terms and conditions are governed by and construed in accordance with the laws of your jurisdiction.</p>
                    
                    <h2>Contact Us</h2>
                    <p>If you have any questions or concerns regarding these terms and conditions, please contact us.</p>
                </div>
            </div>
        </section>
        
@endsection