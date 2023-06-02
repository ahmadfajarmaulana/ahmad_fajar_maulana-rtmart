# RTmart
<hr>

## Clone
- clone : git clone  https://github.com/ahmadfajarmaulana/ahmad_fajar_maulana-rtmart.git

## API 
- API Register/login
<br>
register user (Method POST): 
<br>
{url}/api/register atau http://localhost:8000/api/register
<br>
Payload :
<br>
name, email, password
<br>
    -------------------------
<br>
login User (Method POST): 
<br>
{url}/api/login atau http://localhost:8000/api/login
<br>
payload :
<br>
email, password
<br>

<hr>

- API Product Categori :
<br>
Menambahkan / Membuat sebuah kategori untuk product (Method POST) :
<br>
{url}/api/category atau http://localhost:8000/api/category
<br>
<br>
payload : 
<br>
name

<hr>

- API Product :
<br>
Menampilkan Semua data Product (Method GET) : 
<br>
{url}/api/product atau http://localhost:8000/api/product
<br>
    -------------------------
<br>
Menampilkan Detail Sebuah Product (Method GET)  : 
<br>
{url}/api/product/{id} atau http://localhost:8000/api/product/1
<br>
    -------------------------
<br>
Menambahkan Sebuah Product (Method POST)  : 
<br>
{url}/api/product atau http://localhost:8000/api/product
<br>

payload by form-data :
<br>
name, category_id, description, price, qty, image (file)
<br>
    -------------------------
<br>
Update/merubah Sebuah data Product (Method PUT)  : 
<br>
{url}/api/product/{id} atau http://localhost:8000/api/product/1
<br>

payload by form-data :
<br>
name, category_id, description, price, qty, (image (file) / null)
<br>
    -------------------------
<br>
Hapus Sebuah data Product (Method Delete)  : 
<br>
{url}/api/product/{id} atau http://localhost:8000/api/product/1
<br>

<hr>

- API Order
<br>
Membuat Order Product (Method POST) : 
<br>
{url}/api/order atau http://localhost:8000/api/order
<br>

payload :
<br>
product_id, total_qty
<br>
    -------------------------
<br>
Menampilkan Detail Order (Method GET) : 
<br>
{url}/api/order/{id} atau http://localhost:8000/api/order/1
<br>

<hr>

- API Payment
<br>
Membuat Pembayaran upload gambar (Method POST) :
<br>
{url}/api/payment/ atau http://localhost:8000/api/payment
<br>

Melihat Detail pembayaran (Method GET) :
<br>
{url}/api/payment/{id} atau http://localhost:8000/api/payment/id