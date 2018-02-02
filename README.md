# How to connect to ERPNext v5 API with PHP 5

- ERPNext is trademark of Frappe Technologies Pvt. Ltd.
- Copyright 2013 Frappe Techlogies Pvt Ltd.
- This code is licensed under the GNU General Public Lisense (v3) and the Documentation is licensed under Creative Commons (CC-BY-SA-3.0)

## Requirements

- ERPNext v5
- PHP 5.3 - 5.6
  - php-curl

## First of all

- If you got some error, make sure the bellow points:
  - URL
  - `usr`
  - `pwd`
  - Cookie
  - `parameter`
  - `DocType`
  - `Doc`
  - Permissions
  - HTTP response Code


## 1. Auth

- This is mandatory before any sequence of requests (except Auth).
- After pass the auth, you should get and save the cookie.
- You should send it with your API call, and it should be valid.

### URL

- `http(or https)://(ERPNext)/api/method/login`

### Method

- `POST`

### Parameters

- `usr`
  - mandatory
  - Login name of your ERPNext.
- `pwd`
  - mandatory
  - Password for `usr`.

### Return

- SUCCESS
  - JSON (with `message` property)
- FAIL
  - HTTP Status Code 40x


## 2. Search

### URL

- `http(or https)://(ERPNext)/api/resource/(DocType name)`

### Method

- `GET`

### Parameters

- `limit_start`
  - optional
  - default: 0
  - Offset for pagination
- `limit_page_length`
  - optional
  - default: 20
  - Limit for pagination
- `conditions`
  - optional
  - Conditions for search
  - e.g. "name=foobar@example.com"
- `fields`
  - optional
  - Keys and values in the DocType.
  - e.g. "name=first_name"

### Return

- SUCCESS
  - JSON
- FAIL
  - HTTP Status Code 40x


## 3. Get

### URL

- `http(or https)://(ERPNext)/api/resource/(DocType name)/(Doc name)`

### Method

- `GET`

### Parameters

- (none)

### Return

- SUCCESS
  - JSON
- FAIL
  - HTTP Status Code 40x



## 4. Insert

### URL

- `http(or https)://(ERPNext)/api/resource/(DocType name)`

### Method

- `POST`

### Parameters

- JSON

### Return

- SUCCESS
  - JSON
- FAIL:
  - HTTP Status Code 40x


## 5. Update

### URL

- `http(or https)://(ERPNext)/api/resource/(DocType name)/(Doc Name)`

### Method

- `PUT`

### Parameters

- JSON

### Return

- SUCCESS
  - JSON
- FAIL:
  - HTTP Status Code 40x



## 6. Delete

### URL

- `http(or https)://(ERPNext)/api/resource/(DocType name)/(Doc Name)`

### Method

- `DELETE`

### Parameters

- (none)

### Return

- SUCCESS
  - JSON
- FAIL:
  - HTTP Status Code 40x



## Example with php-curl

- http://php.net/manual/en/book.curl.php

### Auth

```
$ch = curl_init('https://example.com/api/method/login');
curl_setopt($ch,CURLOPT_POST, true);
curl_setopt($ch,CURLOPT_POSTFIELDS, array('usr'=>'me@example.com','pwd'=>'password'));
curl_setopt($ch,CURLOPT_CUSTOMREQUEST, 'POST');
// common description bellow
curl_setopt($ch,CURLOPT_IPRESOLVE, CURL_IPRESOLVE_V4);
curl_setopt($ch,CURLOPT_COOKIEJAR, '(your cookie file)');
curl_setopt($ch,CURLOPT_COOKIEFILE, '(your cookie file)');
curl_setopt($ch,CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch,CURLOPT_IPRESOLVE, CURL_IPRESOLVE_V4);
curl_setopt($ch,CURLOPT_TIMEOUT, (set secounds for timeout));
$response = curl_exec($ch);
$header = curl_getinfo($ch);
// 200? 404? or something?
$error_no = curl_errno($ch);
$error = curl_error($ch);
curl_close($ch);
if($error_no!=200){
  // do something for login error
  // return or exit
}
$body = json_decode($response);
if(JSON_ERROR_NONE == json_last_error()){
  // $response is not valid (as JSON)
  // do something for login error
  // return or exit
}
// use $body
```

### Search

```
$filters = json_encode(array('employee'=>'EMP/0001','att_date'=>'2017-01-01'));
// check if $filters invalid
$data = array('filters'=>$filters);
$q = http_build_query($data);
$ch = curl_init('https://example.com/api/resource/Attendance?'.$q);
curl_setopt($ch,CURLOPT_CUSTOMREQUEST, 'GET');
// the rest omitted (see Auth)
```

### Get

```
$ch = curl_init('https://example.com/api/resource/User/erp@example.com');
curl_setopt($ch,CURLOPT_CUSTOMREQUEST, 'GET');
// the rest omitted (see Auth)
```

### Update

```
$data = json_encode(array('att_date'=>'2017-01-01'));
// check if $data invalid
$ch = curl_init('https://example.com/api/resource/Attendance/ATT-00016');
curl_setopt($ch,CURLOPT_POSTFIELDS,array('data'=>$data));
curl_setopt($ch,CURLOPT_CUSTOMREQUEST, 'PUT');
// the rest omitted (see Auth)
```

### Insert

```
$data = json_encode(array('att_date'=>'2017-01-01','employee'=>'EMP/0004','status'=>'Present'));
// check if $data invalid
$ch = curl_init('https://example.com/api/resource/Attendance');
curl_setopt($ch,CURLOPT_POSTFIELDS,array('data'=>$data));
curl_setopt($ch,CURLOPT_POST, true);
// the rest omitted (see Auth)
```

### Delete

```
$ch = curl_init('https://example.com/api/resource/Attendance/ATT-00016');
curl_setopt($ch,CURLOPT_CUSTOMREQUEST, 'DELETE');
// the rest omitted (see Auth)
```


## FAQ

- What is a (`DocType`, `Doc` or something)?
  - See the reference of ERPNext.
- I got a something what I did not expect.
  - Re-check your codes, settings, data and your ERPNext.
- You should correct your codes because I am using ERPNext v6 (or newer).
  - Feel free to publish your codes on GitHub.
