<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fresh Cycle - Checkout</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('panel/css/style.css') }}">
    
    <script src="https://js.stripe.com/v3/"></script>
    
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" /> 
</head>

<body>
    <!-- Header Section -->
    @include('layouts.header')

    <div class="font-[sans-serif] bg-gray-200 ">
        <div class="w-full mx-auto max-lg:max-w-xl">
            <div class="grid gap-6 lg:grid-cols-3">
                <div class="lg:col-span-2 max-lg:order-1 p-6 !pr-0 max-w-4xl mx-auto w-full">
                    <div class="text-center max-lg:hidden">
                        <h2 class="inline-block pb-1 text-3xl font-extrabold text-gray-800 border-b-2 border-gray-800">Checkout</h2>
                    </div>
                    @if (session('success'))
                        <div class="p-2 mb-4 text-green-700 bg-green-100 rounded">{{ session('success') }}</div>
                    @endif
                    @if ($errors->any())
                        <div class="p-2 mb-4 text-red-700 bg-red-100 rounded">{{ $errors->first() }}</div>
                    @endif
                    <form action="{{ route('process.payment') }}" method="POST" id="payment-form">
                        @csrf
                        <div>
                            <h2 class="text-xl font-bold text-gray-800">Shipping info</h2>
                            <div class="grid gap-8 mt-8 sm:grid-cols-2">
                                <div>
                                    <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                                    <input type="text" id="name" name="name" required class="w-full px-2 pb-2 text-sm text-gray-800 bg-transparent border-b-2 border-gray-500 focus:border-blue-600 focus:outline-none">
                                </div>
                                <div>
                                    <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                                    <input type="email" id="email" name="email" required class="w-full px-2 pb-2 text-sm text-gray-800 bg-transparent border-b-2 border-gray-500 focus:border-blue-600 focus:outline-none">
                                </div>
                                <div >
                                    <label for="address" class="block text-sm font-medium text-gray-700">Address</label>
                                    <input type="text" id="address" name="address" required class="w-full px-2 pb-2 text-sm text-gray-800 bg-transparent border-b-2 border-gray-500 focus:border-blue-600 focus:outline-none">
                                </div>
                                <div>
                                    <label for="city" class="block text-sm font-medium text-gray-700">City</label>
                                    <input type="text" id="city" name="city" required class="w-full px-2 pb-2 text-sm text-gray-800 bg-transparent border-b-2 border-gray-500 focus:border-blue-600 focus:outline-none">
                                </div>
                                <div>
                                    <label for="phone" class="block text-sm font-medium text-gray-700">Phone</label>
                                    <input type="text" id="phone" name="phone" required class="w-full px-2 pb-2 text-sm text-gray-800 bg-transparent border-b-2 border-gray-500 focus:border-blue-600 focus:outline-none">
                                </div>
                                <div>
                                    <label for="postal_code" class="block text-sm font-medium text-gray-700">Postal Code</label>
                                    <input type="text" id="postal_code" name="postal_code" required class="w-full px-2 pb-2 text-sm text-gray-800 bg-transparent border-b-2 border-gray-500 focus:border-blue-600 focus:outline-none">
                                </div>
                                <div>
                                    <label for="amount" class="block text-sm font-medium text-gray-700">Amount</label>
                                    <input type="number" id="amount" name="amount" value="{{ $finalTotal }}" readonly required class="w-full px-2 pb-2 text-sm text-gray-800 bg-transparent border-b-2 border-gray-500 focus:border-blue-600 focus:outline-none">
                                </div>
                            </div>
                        </div>

                        <!-- Payment Method -->
                        <div class="mt-16">
                            
                            <h2 class="text-xl font-bold text-gray-800">Payment method</h2>
                            <div class="grid gap-4 mt-4 sm:grid-cols-2">
                                <div class="flex items-center">
                                    <input type="radio" id="credit-card" name="payment" class="w-5 h-5 cursor-pointer" />
                                    <label for="credit-card" class="flex gap-2 ml-4 cursor-pointer">
                                        <img src="https://readymadeui.com/images/visa.webp" class="w-12" alt="card1" />
                                        <img src="https://readymadeui.com/images/american-express.webp" class="w-12" alt="card2" />
                                        <img src="https://readymadeui.com/images/master.webp" class="w-12" alt="card3" />
                                    </label>
                                </div>
                            </div>

                            <!-- Credit Card Information -->
                            <div id="credit-card-info" class="hidden mt-8">
                                <div class="grid gap-6">
                                    <input type="text" placeholder="Cardholder's Name" class="w-full px-2 pb-2 text-sm text-gray-800 bg-transparent border-b-2 border-gray-500 focus:border-blue-600 focus:outline-none" />
                                    <div class="flex items-center border-b-2 border-gray-500 focus-within:border-blue-600 focus:border-blue-600 focus:outline-none">
                                        <div id="card-brand" class="w-12 ml-3"></div>
                                        <div id="card-number" class="w-full px-2 pb-2 text-sm text-gray-800 bg-transparent outline-none"></div>
                                    </div>
                                    <div class="grid grid-cols-2 gap-6">
                                        <div id="card-expiry" class="w-full px-2 pb-2 text-sm text-gray-800 bg-transparent border-b-2 border-gray-500 focus:border-blue-600 focus:outline-none"></div>
                                        <div id="card-cvc" class="w-full px-2 pb-2 text-sm text-gray-800 bg-transparent border-b-2 border-gray-500 focus:border-blue-600 focus:outline-none"></div>
                                    </div>
                                </div>
                            </div>

                            <div class="flex items-center mt-6">
                                <input id="terms" type="checkbox" class="w-4 h-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500" />
                                <label for="terms" class="ml-3 text-sm">
                                    I accept the <a href="#" class="font-semibold text-blue-600 hover:underline">Terms and Conditions</a>.
                                </label>
                            </div>
                        </div>

                        <div class="flex flex-wrap gap-4 mt-8">
                            <div id="card-errors" role="alert" class="mt-2 mb-4 text-red-500"></div>
                            <button type="button" class="min-w-[150px] px-6 py-3.5 text-sm bg-gray-300 text-gray-800 rounded-lg hover:bg-gray-500">Back</button>
                            <button type="submit" class="min-w-[150px] px-6 py-3.5 text-sm bg-blue-600 text-white rounded-lg hover:bg-blue-700"> Confirm Payment Rs.{{ number_format($finalTotal, 2) }}</button>
                        </div>
                    </form>
                </div>
                <script>
                    var stripe = Stripe('{{ env('STRIPE_KEY') }}');
                    var elements = stripe.elements();
                    var style = {
                        base: {
                            color: '#32325d',
                            fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
                            fontSmoothing: 'antialiased',
                            fontSize: '16px',
                            '::placeholder': {
                                color: '#aab7c4'
                            }
                        },
                        invalid: {
                            color: '#fa755a',
                            iconColor: '#fa755a'
                        }
                    };
            
                    var cardNumber = elements.create('cardNumber', {style: style});
                    cardNumber.mount('#card-number');
            
                    var cardExpiry = elements.create('cardExpiry', {style: style});
                    cardExpiry.mount('#card-expiry');
            
                    var cardCvc = elements.create('cardCvc', {style: style});
                    cardCvc.mount('#card-cvc');
            
                    cardNumber.addEventListener('change', function(event) {
                        var displayError = document.getElementById('card-errors');
                        var cardBrand = document.getElementById('card-brand');
                        if (event.error) {
                            displayError.textContent = event.error.message;
                        } else {
                            displayError.textContent = '';
                        }
            
                        if (event.brand) {
                            var brandIcon = '';
                            switch (event.brand) {
                                case 'visa':
                                    brandIcon = 'https://readymadeui.com/images/visa.webp';
                                    break;
                                case 'mastercard':
                                    brandIcon = 'https://readymadeui.com/images/master.webp';
                                    break;
                                case 'amex':
                                    brandIcon = 'https://readymadeui.com/images/american-express.webp';
                                    break;
                                default:
                                    brandIcon = '';
                                    break;
                            }
                            cardBrand.innerHTML = brandIcon ? `<img src="${brandIcon}" class="w-12" alt="${event.brand}" />` : '';
                        }
                    });
            
                    var form = document.getElementById('payment-form');
                    form.addEventListener('submit', function(event) {
                        event.preventDefault();
            
                        stripe.createToken(cardNumber).then(function(result) {
                            if (result.error) {
                                var errorElement = document.getElementById('card-errors');
                                errorElement.textContent = result.error.message;
                            } else {
                                stripeTokenHandler(result.token);
                            }
                        });
                    });
            
                    function stripeTokenHandler(token) {
                        var form = document.getElementById('payment-form');
                        var hiddenInput = document.createElement('input');
                        hiddenInput.setAttribute('type', 'hidden');
                        hiddenInput.setAttribute('name', 'stripeToken');
                        hiddenInput.setAttribute('value', token.id);
                        form.appendChild(hiddenInput);
            
                        form.submit();
                    }
                </script>

                <div class="bg-gray-100 lg:h-screen lg:sticky lg:top-0">
                    <div class="relative h-full">
                        <div class="p-6 overflow-auto max-lg:max-h-[400px] lg:h-[calc(100vh-60px)] max-lg:mb-8">
                            <h2 class="text-xl font-bold text-gray-800">Order Products</h2>
                            <div class="mt-8 space-y-8">
                                @foreach($cartItems as $cartItem)
                                    <div class="flex flex-col gap-4">
                                        <div class="max-w-[140px] p-4 shrink-0 bg-gray-200 rounded-lg">
                                            <img src="{{ asset('storage/' . $cartItem->product->image) }}" class="object-contain w-full" />
                                        </div>
                                        <div class="w-full">
                                            <h3 class="text-base font-bold text-gray-800">{{ $cartItem->product->name }}</h3>
                                            <ul class="mt-2 space-y-2 text-sm text-gray-800">
                                                <li>Quantity <span class="ml-auto">{{ $cartItem->quantity }}</span></li>
                                                <li>Total Price <span class="ml-auto">Rs.{{ number_format($cartItem->quantity * $cartItem->product->price, 2) }}</span></li>
                                            </ul>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        <div class="w-full p-4 bg-gray-200 lg:absolute lg:left-0 lg:bottom-0">
                            <h3 class="text-lg font-bold text-gray-800">Summary</h3>
                            <ul class="mt-6 space-y-3 text-gray-800">
                                <li class="flex flex-wrap gap-4 text-sm">Product total <span class="ml-auto font-bold">Rs.{{ number_format($productTotal, 2) }}</span></li>
                                <li class="flex flex-wrap gap-4 text-sm">Fixed Shipping Price <span class="ml-auto font-bold">Rs.{{ number_format($shippingPrice, 2) }}</span></li>
                           
                                <hr />
                                <li class="flex flex-wrap gap-4 text-base font-bold">Total Amount<span class="ml-auto">Rs.{{ number_format($finalTotal, 2) }}</span></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

   
    
    <script>
    
        const creditCard = document.getElementById('credit-card');
        const paypal = document.getElementById('paypal');
        const creditCardInfo = document.getElementById('credit-card-info');
        const paypalInfo = document.getElementById('paypal-info');

        creditCard.addEventListener('change', () => {
            creditCardInfo.classList.remove('hidden');
            paypalInfo.classList.add('hidden');
        });

        paypal.addEventListener('change', () => {
            creditCardInfo.classList.add('hidden');
            paypalInfo.classList.remove('hidden');
        });
    </script>

    <!-- Footer Section -->
    @include('layouts.footer')

    <!-- Custom JavaScript -->
    <script src="{{ asset('panel/js/script.js') }}"></script>
</body>
</html>

