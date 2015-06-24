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
    - auth_url
    - api_url
    - cookie_file
  - If "auth" is not set in config, It must be set as arguments for constructor.
  - Change CONF_FILE in FrappeClient.php#L27

## Usage

### Constructor

  - @param string usr - (Optional) User name to login - If empty, value will be set from config.
  - @param string pwd - (Optional) Password - If empty, value will be set from config.
  - @returns class FrappeClient
  - @throws FrappeClient_Exception

### Searching and Getting list

- search()
  - @params string DocType
  - @params array Conditions
  - @params array fields
  - @params int limit_start (Optional)
  - @params int limit_page_length (Optional)
  - @returns class FrappeClient_Result
  - @throws FrappeClient_Exception

### Geting single data

- get()
  - @params string DocType
  - @params string Key of DocType
  - @returns class FrappeClient_Result
  - @throws FrappeClient_Exception

### Inserting data

- insert()
  - @params string DocType
  - @params array Data for Insert
  - @returns class FrappeClient_Result
  - @throws FrappeClient_Exception

### Updating data

- update()
  - @params string DocType
  - @params string Key of DocType
  - @params array Data for Insert
  - @returns class FrappeClient_Result
  - @throws FrappeClient_Exception


## Class

### FrappeClient_Result

- body (boject) Responce body
- info (Array) CURL_INFO (Header)
- errorno (Int) CURL_ERRORNO
- error (String) CURL_ERROR


## Difinition of terms

- Document
  - Data unit on ERPNext.
- DocType
  - Type of Document on ERPNext. Like Database Table name.



