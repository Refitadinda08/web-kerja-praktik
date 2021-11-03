# API SPESIFICATION

## Register Pasien
- Request
- METHOD : POST
- Endpoint: '/api/patient/register' 
```json
{
    "nama" : "String (nama pasien)",
    "email": "String (email pasien)",
    "password": "String (password)",
    "password_confirmation" : "String (password_confirmation)"
}
```
- Response
```json
{
    "code" : 200,
    "pesan": "Register Berhasil",
    "access_token": "akses token anda",
    "user" : [
        "id" : 1,
        "nama" : "nama user",
        "email" : "email user",
        "umur" : "umur user",
        "alamat": "alamat user",
    ],
}
```

## Login Pasien
- Request
- METHOD : POST 
- Endpoint: '/api/patient/login' 
```json
{
    "email": "String (email pasien)",
    "password": "String (password)"
}
```
- Response
```json
{
    "code" : 200,
    "pesan": "Login Berhasil",
    "access_token": "akses token anda",
    "user" : [
        "id" : 1,
        "name" : "nama user",
        "email" : "email user",
        "umur" : "umur user",
        "alamat": "alamat user",
    ],
}
```


## Logout Pasien
- Request
- METHOD : POST 
- Endpoint: '/api/patient/logout' 
```json
{
    "id" : "id pasien"
}
```
- Response
```json
{
    "code" : 200,
    "pesan": "Logout Berhasil"
}
```


## Update Pasien
- Request
- METHOD : POST
- Endpoint: '/api/patient/update' 
  - Header
    - Authorization : Bearer
```json
{
    "name" : "nama update",
    "umur" : "umur update",
    "alamat": "alamat update"
}
```
- Response
```json
{
    "code" : 200,
    "pesan": "Update Pasien berhasil",
    "user" : [
        "id" : 1,
        "name" : "nama user",
        "umur" : "umur user",
        "alamat": "alamat user",
    ],
}
```

## Insert Sensor
- Request
- METHOD : POST
- Endpoint: '/api/monitoring/insert' 
```json
{
    "fhr": "fhr",
    "toco": "toco"
}
```
- Response
```json
{
    "code" : 200,
    "pesan": "insert data berhasil",
}
```

## Riwayat Pemeriksaan
- Request
- Method : GET
- Endpoint: '/api/monitoring/patient' 
  - Header
    - Authorization : Bearer
- Response

```json
{
    "code" : 200,
    "pesan": "Data berhasil di ambil",
    "records" : [
        {
            "id_pemeriksaan": 1,
            "avg_fhr": 138,
            "avg_toco": 12,
            "created_at" : "2021-08-24"
        },
        {
            "id_pemeriksaan": 2,
            "avg_fhr": 138,
            "avg_toco": 12,
            "created_at" : "2021-08-24"
        },
        {
            "id_pemeriksaan": 3,
            "avg_fhr": 138,
            "avg_toco": 12,
            "created_at" : "2021-08-24"
        },
        {
            "id_pemeriksaan": 4,
            "avg_fhr": 138,
            "avg_toco": 12,
            "created_at" : "2021-08-24"
        },
    ],
}
```

## Detail Riwayat Pemeriksaan
- Request
- Method : POST
- Endpoint: '/api/monitoring/patient' 
  - Header
    - Authorization : Bearer
```json
{
    "id_pemeriksaan" : "id_pemeriksaan"
}
```

- Response

```json
{
    "code" : 200,
    "pesan": "Data pemeriksaan berhasil di ambil",
    "created_at": "2021-08-24",
    "records" : [
        {
            "id": 1,
            "fhr": 138,
            "toco": 12,
            "created_at" : "2021-08-24"
        },
        {
            "id": 2,
            "fhr": 138,
            "toco": 12,
            "created_at" : "2021-08-24"
        },
        {
            "id": 3,
            "fhr": 138,
            "toco": 12,
            "created_at" : "2021-08-24"
        },
        {
            "id": 4,
            "fhr": 138,
            "toco": 12,
            "created_at" : "2021-08-24"
        },
    ],
}
```