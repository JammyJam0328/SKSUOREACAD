<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">

        <!-- Scripts -->
        <script src="{{ mix('js/app.js') }}" defer></script>
    </head>
    <body>
        <!-- This example requires Tailwind CSS v2.0+ -->
<div class="bg-gray-50">
    <div class="max-w-7xl mx-auto py-12 px-4 sm:py-16 sm:px-6 lg:px-8">
      <div class="max-w-3xl mx-auto divide-y-2 divide-gray-200">
        <h2 class="text-center text-3xl font-extrabold text-green-900 sm:text-4xl">
            Payment Transaction using Link Biz Portal
        </h2>
        <dl class="mt-6 space-y-6 divide-y divide-gray-200">
          <div class="pt-6">
            <dt class="text-lg">
              <!-- Expand/collapse question button -->
              <button type="button" class="text-left w-full flex justify-between items-start text-gray-400" aria-controls="faq-0" aria-expanded="false">
                <span class="font-bold text-xl text-gray-900">
                  Step 1
                </span>
               
              </button>
            </dt>
            <div class="mt-2 " id="faq-0">
                <img src="{{ asset('images/step1.png') }}" alt="">
              <p class="text-base text-gray-500">
              <ul class="list-inside mt-2  md:p-5">
                  <li>Select "MISCELLANEOUS FEE" for Transaction Type</li>
                  <li>Select  "Cash Payment" for Payment Option</li>
                  <li>Fill all required inputs</li>
              </ul>
              </p>
            </div>
          </div>
          <div class="pt-6">
            <dt class="text-lg">
              <!-- Expand/collapse question button -->
              <button type="button" class="text-left w-full flex justify-between items-start text-gray-400" aria-controls="faq-0" aria-expanded="false">
                <span class="font-bold text-xl text-gray-900">
                  Step 2
                </span>
               
              </button>
            </dt>
            <div class="mt-2 " id="faq-0">
                <img src="{{ asset('images/step2.png') }}" alt="">
              <p class="text-base text-gray-500">
              <ul class="list-inside mt-2  md:p-5">
                  <li>Review your information </li>
                  <li>Agree with the Terms and Condition</li>
                  <li>Click "Submit"</li>
              </ul>
              </p>
            </div>
          </div>
          <div class="pt-6">
            <dt class="text-lg">
              <!-- Expand/collapse question button -->
              <button type="button" class="text-left w-full flex justify-between items-start text-gray-400" aria-controls="faq-0" aria-expanded="false">
                <span class="font-bold text-xl text-gray-900">
                  Step 3
                </span>
               
              </button>
            </dt>
            <div class="mt-2 " id="faq-0">
                <img src="{{ asset('images/step4.png') }}" alt="">
                <img src="{{ asset('images/step5.png') }}" alt="">

              <p class="text-base text-gray-500">
              <ul class="list-inside mt-2  md:p-5">
                  <li>Select your preferred PAYMENT PARTNERS</li>
                
                  <li>Click "Proceed"</li>
              </ul>
              </p>
            </div>
          </div>

          <div class="pt-6">
            <dt class="text-lg">
              <!-- Expand/collapse question button -->
              <button type="button" class="text-left w-full flex justify-between items-start text-gray-400" aria-controls="faq-0" aria-expanded="false">
                <span class="font-bold text-xl text-gray-900">
                  Step 4
                </span>
               
              </button>
            </dt>
            <div class="mt-2 " id="faq-0"> 
                <ul class="list-inside mt-2  md:p-5">
                <li>This will appear for few seconds</li>
             
            </ul>
                <img src="{{ asset('images/step6.png') }}" alt="">
              <p class="text-base text-gray-500">
                ---->
              </p>
            
              <img src="{{ asset('images/step7.png') }}" alt="">
              <p class="text-base text-gray-500">
              <ul class="list-inside mt-2  md:p-5">
                <li>YOU WILL RECEIVE AN EMAIL OF YOUR LINK BIZ TRANSACTION</li>
                <li>Go to your selected payment partner and show the reference number</li>
                <li>Take a screenshot incase you accidentally reload the page</li>
              </ul>
              </p>
            </div>
          </div>
  
        </dl>
      </div>
    </div>
  </div>
  
    </body>
</html>
