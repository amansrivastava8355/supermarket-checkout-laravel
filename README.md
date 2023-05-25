# SUPERMARKET CHECKOUT API
## Assignment
Let’s implement the code for a supermarket checkout that calculates the total price of a number
of items.
An item has the following attributes:
● SKU
● Unit Price

Our goods are priced individually. Some items are multi-priced: buy n of them, and they’ll cost
you less than buying them individually. For example, item ‘A’ might cost $50 individually, but this
week we have a special offer: buy three ‘A’s and they’ll cost you $130.
Here is an example of prices:
```
SKU Unit Price Special Price
A $50 3 for $130
B $30 2 for $45
C $20
D $15
```

Our checkout accepts items in any order, so that if we scan a B, an A, and another B, we’ll
recognize the two B’s and price them at 45 (for a total price so far of 95). Because the pricing
changes frequently, we need to be able to pass in a set of pricing rules each time we start
handling a checkout transaction.

The interface to the checkout should look like:
```
co = new CheckOut(pricing_rules);
co.scan(item); 
co.scan(item);
price = co.total();
```

Here are some examples of cases:
```
Items Total
A, B $80
A, A $100
A, A, A $130
```

## Setup and Getting Started 
### Setting up Local Development Environment
It is recommended to use Docker with Laravel Sail for a quick and reliable setup.
Clone this repo: ```git clone git@github.com:amansrivastava8355/supermarket-checkout-laravel```
Install Composer:
```
docker run --rm \
    -u "$(id -u):$(id -g)" \
    -v $(pwd):/opt \
    -w /opt \
    laravelsail/php82-composer:latest \
    composer install --ignore-platform-reqs
```

Build App Docker Container:
```
./vendor/bin/sail build
```

Set following keys in .env:

```
APP_PORT=8601
APP_SERVICE=app
COMPOSE_PROJECT_NAME=supermarket_checkout_laravel
```

Fire up Laravel Sail:

```
./vendor/bin/sail up -d
```

Write the test in any order according to you prefrence in routes/web.php and Visit ```http://localhost:8601``` in your browser, and you should see the total price displayed.

Please run the below command to check the test cases:
```
./vendor/bin/sail php artisan test
```

