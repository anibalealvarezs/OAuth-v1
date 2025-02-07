# OAuthV1

## Installation Instructions

Require the package in the `composer.json` file of your project, and map the package in the `repositories` section.

```json
{
    "require": {
        "php": ">=8.1",
        "anibalealvarezs/oauth-v1": "@dev"
    }
}
```

Note: In order to require the package, you need to have a valid SSH key configured in your CHMW's GitLab account.

## Usage

Create a new `OAuthV1` instance with the corresponding credentials.

```php
use Anibalealvarezs\OAuthV1\Enums\SignatureMethod;

$oAuth = new OAuthV1(
    consumerId: /*consumer id string */,
    consumerSecret: /*consumer secret string */,
    token: /*token string */,
    tokenSecret: /*token secret string */,
    signatureMethod: /*instance of SignatureMethod */,
);
```

### Available Methods

---

#### getAuthorizationHeader
Gets an array containing the authorization header string and debug data.   
Returns: *Array*

```php
$data = $oAuth->getAuthorizationHeader(
    method: /* HTTP method */,
    url: /* url string (excluding query params) */,
    queryParams: /* array of query params */,
    prefix: /* prefix string */,
);

// $data['string'] contains the authorization header string
// $data['debugData'] contains the debug data
```

Required parameters:
- `method`: *String*  
  HTTP method for the request. Ex: `GET`, `POST`, `PUT`, `DELETE`, etc.
- `url`: *String*  
  Request's URL including `http://` or `https://`.   

Optional parameters:
- `queryParams`: *Array*  
  Query params. Ex: `['param1' => 'value1', 'param2' => 'value2']`. Default is `[]`.
- `prefix`: *String*  
  String to be prepended to the Authorization Header string, including spaces. Default is `'OAuth '`.  
---

#### getNormalizedParamsWithSignature
Gets the normalized query params, including the signed SBS.   
Returns: *Array*

```php
$data = $oAuth->getNormalizedParamsWithSignature(
    httpMethod: /* HTTP method */,
    url: /* url string (excluding query params) */,
    queryParams: /* array of query params */,
);

// $data['params'] contains the normalized query params
// $data['debugData'] contains the debug data
```

Required parameters:
- `httpMethod`: *String*  
  HTTP method for the request. Ex: `GET`, `POST`, `PUT`, `DELETE`, etc.
- `url`: *String*  
  Request's URL including `http://` or `https://`.
- `queryParams`: *Array*  
  Query params. Ex: `['param1' => 'value1', 'param2' => 'value2']`. Default is `[]`.
---

#### getSignedSbs
Gets the SIGNED Signature Base String (SBS).   
Returns: *String*

```php
$data = $oAuth->getSignedSbs(
    httpMethod: /* HTTP method */,
    url: /* url string (excluding query params) */,
    normalizedParams: /* array of NORMALIZED query params */,
);
```

Required parameters:
- `httpMethod`: *String*  
  HTTP method for the request. Ex: `GET`, `POST`, `PUT`, `DELETE`, etc.
- `url`: *String*  
  Request's URL including `http://` or `https://`.
- `normalizedParams`: *Array*  
  NORMALIZED query params. Ex: `['param1' => 'value1', 'param2' => 'value2']`. Default is `[]`.
---

#### getSbs
Gets the Signature Base String (SBS).   
Returns: *String*

```php
$data = $oAuth->getSbs(
    httpMethod: /* HTTP method */,
    url: /* url string (excluding query params) */,
    normalizedParams: /* array of NORMALIZED query params */,
);
```

Required parameters:
- `httpMethod`: *String*  
  HTTP method for the request. Ex: `GET`, `POST`, `PUT`, `DELETE`, etc.
- `url`: *String*  
  Request's URL including `http://` or `https://`.
- `normalizedParams`: *Array*  
  NORMALIZED query params. Ex: `['param1' => 'value1', 'param2' => 'value2']`. Default is `[]`.
---

#### getNormalizedParams
Normalizes the query params.   
Returns: *Array*

```php
$data = $oAuth->getNormalizedParams(
    $queryParams: /* array of query params */,
);
```

Required parameters:
- `$queryParams`: *Array*  
  Array of query params. Ex: `['param1' => 'value1', 'param2' => 'value2']`.
---
