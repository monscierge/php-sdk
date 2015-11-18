# Monscierge PHP SDK

A PHP wrapper for the Monscierge API. [Create an application](http://developer.monscierge.com) to get your client credentials in order to authenticate into the API.

## Installation

Simply add the following to your composer.json require block:

	'monscierge/php-sdk'

## Examples

### Authentication

All API methods require you be authenticated with a client that is registered with Monscierge. You will then use these credentials to instantiate your client instance.

```php
$client = new \Monscierge\Client($client_id, $client_secret);
```

#### Client Authenticated Requests

You can exchange your client credentials for an OAuth token to use for any non-user authenticated APIs.

```php
$oauth_token = $client->clientCredentialsExchange('uber4cats', 'nom0res3crets');
```

#### User Authenticated Requests

For methods that require user permission to alter context, you will need to either use OAuth flow and redirect the user to the authorization URL which will upon granting permission with the scopes requested allow access as the user.

```php
$authorize_url = $client->authorizeUrl('http://example.app/monscierge/callback');
```

Alternatively, you can ask the user for their login credentials to be exchanged for an OAuth token, but this is generally not recommended.

```php
$oauth_token = $client->basicCredentialsExchange('johnny.appleseed@monscierge.com', '123456');
```

#### Using OAuth tokens

Once you have an OAuth token, to then make API calls you should set the access token on the client instance.

```php
$client->setAccessToken($oauth_token['access_token']);
```

You will also want to store the `refresh_token` in order to prevent sessions from timing out for your users of your application. When a token expires, you can exchange it for a new OAuth token to continue making API calls.

```php
$client->refreshTokenExchange($oauth_token['refresh_token']);
```

#### Search places

```php
$client->places('San Francisco');
```

#### Get list of requests for a user

```php
$client->userRequests();
```

For more examples, dive into the SDK clients and look at the signatures. If you have any questions or feedback [create an issue](https://github.com/monscierge/php-sdk/issues) or send us an [email](mailto:developers@monscierge.com).
