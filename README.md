# FrappeClient-PHP (API Wrapper)

- ERPNext is trademark of Frappe Technologies Pvt. Ltd.
- Copyright 2013 Frappe Techlogies Pvt Ltd.
- This code is licensed under the GNU General Public Lisense (v3) and the Documentation is licensed under Creative Commons (CC-BY-SA-3.0)
- See. https://frappe.io/help/rest_api

## Security notes

- DO NOT put config.php and cookie.txt into public accessable area.


## Requirements

- ERPNext >= 5.0.x
- PHP >= 5.2
- curl >= 7.30.0
- Knowledge about ERPNext and API

## Settings

- Set specified User for using API on ERPNext
- Set configurations in config.php
  - The following items are mandatory
    - [auth_url](https://github.com/tmimori/FrappeClient-PHP/blob/master/config.php#L3)
    - [api_url](https://github.com/tmimori/FrappeClient-PHP/blob/master/config.php#L4)
    - [cookie_file](https://github.com/tmimori/FrappeClient-PHP/blob/master/config.php#L6)
  - If [auth](https://github.com/tmimori/FrappeClient-PHP/blob/master/config.php#L5) is not set in config, It must be set as arguments for constructor.
  - Change CONF_FILE in [FrappeClient.php](https://github.com/tmimori/FrappeClient-PHP/blob/master/FrappeClient.php#L27)

## Usage

### Constructor

  - @param string usr - (Optional) User name to login - If empty, value will be set from config.
  - @param string pwd - (Optional) Password - If empty, value will be set from config.
  - @returns class FrappeClient
  - @throws FrappeClient_Exception

### Searching and Getting list

- search()
  - @params string DocType
  - @params array conditions (Optional) - Conditions for search
  - @params array fields (Optional) - Field which should be picked up
  - @params int limit_start (Optional) default 0 - Offset for pagenation
  - @params int limit_page_length (Optional) default 20 - Limit for pagenation
  - @returns class FrappeClient
  - @throws FrappeClient_Exception

### Geting single data

- get()
  - @params string DocType
  - @params string Key - Key of DocType
  - @returns class FrappeClient
  - @throws FrappeClient_Exception

### Inserting data

- insert()
  - @params string DocType
  - @params array data - Data should be inserted
  - @returns class FrappeClient
  - @throws FrappeClient_Exception

### Updating data

- update()
  - @params string DocType
  - @params string key - Key of DocType
  - @params array data - Data should be updated
  - @returns class FrappeClient
  - @throws FrappeClient_Exception


## Class

### FrappeClient

- (object) body - Responce body
- (Array) header - CURL_INFO
- (Int) errorno - CURL_ERRORNO
- (String) error - CURL_ERROR
- (Boolean) is_auth - Authorized or not


## Difinition of terms

- Document
  - Data unit on ERPNext.
- DocType
  - Type of Document on ERPNext. Like a Database Table name.



