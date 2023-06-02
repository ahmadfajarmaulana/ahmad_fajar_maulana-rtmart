# RTmart
<hr>

## Clone
- clone : git clone  https://github.com/ahmadfajarmaulana/ahmad_fajar_maulana-rtmart.git

## API 
- API Register/login
register user (Method POST): {url}/api/register atau http://localhost:8000/api/register
Payload :
name, email, password
    -------------------------
login User (Method POST): {url}/api/login atau http://localhost:8000/api/login
payload :
email, password

<hr>

- API Product Categori :
Menambahkan / Membuat sebuah kategori untuk product (Method POST) :
{url}/api/category atau http://localhost:8000/api/category

payload : 
name

<hr>

- API Product :
Menampilkan Semua data Product (Method GET) : 
{url}/api/product atau http://localhost:8000/api/product
    -------------------------
Menampilkan Detail Sebuah Product (Method GET)  : 
{url}/api/product/{id} atau http://localhost:8000/api/product/1
    -------------------------
Menambahkan Sebuah Product (Method POST)  : 
{url}/api/product atau http://localhost:8000/api/product

payload by form-data :
name, category_id, description, price, qty, image (file)
    -------------------------
Update/merubah Sebuah data Product (Method PUT)  : 
{url}/api/product/{id} atau http://localhost:8000/api/product/1

payload by form-data :
name, category_id, description, price, qty, (image (file) / null)
    -------------------------
Hapus Sebuah data Product (Method Delete)  : 
{url}/api/product/{id} atau http://localhost:8000/api/product/1

<hr>

- API Order
Membuat Order Product (Method POST) : 
{url}/api/order atau http://localhost:8000/api/order

payload :
product_id, total_qty
    -------------------------
Menampilkan Detail Order (Method GET) : 
{url}/api/order/{id} atau http://localhost:8000/api/order/1

<hr>

- API Payment
Membuat Pembayaran upload gambar (Method POST) :
{url}/api/payment/ atau http://localhost:8000/api/payment

Melihat Detail pembayaran (Method GET) :
{url}/api/payment/{id} atau http://localhost:8000/api/payment/id