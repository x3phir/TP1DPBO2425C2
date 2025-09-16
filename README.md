TP1DPBO2425C1 - Sistem Toko Elektronik
Janji
Saya [Nama Lengkap] dengan NIM [NIM] mengerjakan TP1 dalam mata kuliah Desain dan Pemrograman Berorientasi Objek untuk keberkahanNya maka saya tidak melakukan kecurangan seperti yang telah dispesifikasikan. Aamiin.
Penjelasan Program
Deskripsi
Program ini adalah sistem manajemen toko elektronik yang dibuat menggunakan konsep Object-Oriented Programming (OOP) dalam 4 bahasa pemrograman: Java, Python, C++, dan PHP. Program mengelola data produk elektronik dengan operasi CRUD (Create, Read, Update, Delete) menggunakan array/list of objects.
Desain Class
Class Elektronik
Class utama yang merepresentasikan produk elektronik dengan 4 atribut:
Atribut:

nama (String): Nama produk elektronik (contoh: "Laptop", "HP Android")
merk (String): Merek/brand produk (contoh: "ASUS", "Samsung")
harga (Double/Float): Harga produk dalam rupiah
stok (Integer): Jumlah stok yang tersedia

Method:

Constructor: Menginisialisasi objek elektronik dengan 4 parameter
Getter methods: getNama(), getMerk(), getHarga(), getStok()
Setter methods: setNama(), setMerk(), setHarga(), setStok()
tampilkanInfo(): Menampilkan informasi elektronik (CLI version)
toArray() & fromArray(): Konversi untuk penyimpanan session (PHP version)

Class TokoElektronik
Class untuk mengelola koleksi objek elektronik:
Atribut:

daftarElektronik: Array/List yang menyimpan multiple objects dari class Elektronik

Method:

tambahElektronik(): Membuat object baru dan menambah ke array
tampilkanSemuaElektronik(): Iterasi array dan tampilkan semua objects
editElektronik(): Mencari object berdasarkan index dan mengubah atributnya
hapusElektronik(): Menghapus object dari array berdasarkan index
jalankan(): Method utama untuk menjalankan program (CLI version)
saveToSession() & loadFromSession(): Persistensi array of objects (PHP version)

Implementasi per Bahasa
Java, Python, C++ (CLI Version)

Interface berbasis console/terminal dengan menu pilihan
Input menggunakan Scanner/input()/cin dari keyboard
Output ditampilkan dalam format tabel di terminal
Data disimpan dalam array/vector/list of objects di memory
Loop program hingga user memilih keluar

PHP (Web Version)

Interface berbasis web dengan HTML forms untuk input
Input menggunakan HTML form elements (text input, number input)
Output ditampilkan dalam HTML table
Data disimpan dalam PHP Session sebagai array of objects
Menggunakan POST method untuk semua operasi CRUD

Flow Program
CLI Version (Java, Python, C++)

Inisialisasi

Membuat object TokoElektronik
Menambah 4 object elektronik sebagai data awal ke dalam array


Menu Loop

Tampilkan menu dengan 5 pilihan
User input pilihan menu
Panggil method sesuai pilihan


Operasi CRUD pada Array of Objects

Create: Input data → Buat object Elektronik baru → Add ke array
Read: Loop array → Panggil method tampilkanInfo() setiap object
Update: Input index → Akses object di array[index] → Ubah atribut via setter
Delete: Input index → Hapus object dari array di posisi index


Validasi & Error Handling

Validasi input sesuai tipe data
Handling index out of bounds
Konfirmasi sebelum delete



Web Version (PHP)

Session Management

Load array of objects dari session
Jika kosong, inisialisasi dengan 4 objects


Form Processing

HTML form submit via POST
Server-side validation
Operasi pada array of objects


CRUD Operations

Create: POST data → Buat object → Push ke array → Save session
Read: Loop array objects → Tampilkan dalam HTML table
Update: POST index & data → Edit object di array[index] → Save session
Delete: POST index → Unset array[index] → Reindex array → Save session


Web Interface

Form untuk tambah data baru
Table untuk display semua objects
Button edit/hapus per row
Dynamic form edit dengan JavaScript



Konsep OOP yang Digunakan

Class & Object:

Elektronik sebagai blueprint
Multiple instances/objects dari class yang sama


Encapsulation:

Atribut private untuk data hiding
Public methods sebagai interface


Array/List of Objects:

Struktur data utama: Elektronik[] daftarElektronik
Operasi kolektif pada multiple objects
Manajemen lifecycle objects dalam collection



Struktur Program
TP1DPBO2425C1/
├── CPP/
│   └── toko_elektronik.cpp
├── Java/
│   └── TokoElektronik.java
├── Python/
│   └── toko_elektronik.py
├── PHP/
│   └── toko_elektronik.php
├── Dokumentasi/
│   ├── output_cpp.png
│   ├── output_java.png  
│   ├── output_python.png
│   ├── output_php_web.png
│   └── demo_program.mp4
└── README.md
Cara Menjalankan Program
Java
bashcd Java
javac TokoElektronik.java
java TokoElektronik
Python
bashcd Python
python toko_elektronik.py
C++
bashcd CPP
g++ -o toko_elektronik toko_elektronik.cpp
./toko_elektronik
PHP (Web)
bash# 1. Start web server (XAMPP/WAMP/MAMP)
# 2. Copy file ke folder htdocs/www
# 3. Akses via browser:
http://localhost/PHP/toko_elektronik.php
## Dokumentasi Output

### 1. Java Output

#### Menu dan Tampilan Awal
![Java Menu](documentations/menu-preview-java.png)

#### Proses Compile dan Jalankan Program
![Java Compile](documentations/compile-java.png)

#### Operasi CRUD - Create (Tambah Data)
![Java Create](documentations/create-java.png)

#### Operasi CRUD - Read (Tampilkan Data)
![Java Read](documentations/read-java.png)

#### Operasi CRUD - Update (Edit Data)
![Java Edit](documentations/edit-java.png)

#### Operasi CRUD - Delete (Hapus Data)
![Java Delete](documentations/delete-java.png)

Program Java menampilkan menu console dengan 5 pilihan. User dapat menambah, melihat, edit, dan hapus data elektronik. Data disimpan dalam ArrayList<Elektronik> dan ditampilkan dalam format tabel yang rapi di terminal.

### 2. Python Output

#### Menu dan Tampilan Awal  
![Python Menu](documentations/menu-preview-python.png)

#### Operasi CRUD - Create (Tambah Data)
![Python Create](documentations/create-python.png)

#### Operasi CRUD - Read (Tampilkan Data)
![Python Read](documentations/read-python.png)

#### Operasi CRUD - Update (Edit Data)
![Python Edit](documentations/edit-python.png)

#### Operasi CRUD - Delete (Hapus Data)
![Python Delete](documentations/delete-python.png)

Program Python mengimplementasikan class yang sama dengan interface console. Menggunakan list untuk menyimpan objects dan menyediakan validasi input yang baik dengan exception handling.

### 3. C++ Output

#### Menu dan Tampilan Awal
![C++ Menu](documentations/menu-preview-cpp.png)

#### Proses Compile dan Jalankan Program
![C++ Compile](documentations/compile-cpp.png)

#### Operasi CRUD - Create (Tambah Data)
![C++ Create](documentations/create-cpp.png)

#### Operasi CRUD - Read (Tampilkan Data)
![C++ Read](documentations/read-cpp.png)

#### Operasi CRUD - Update (Edit Data)
![C++ Edit](documentations/edit-cpp.png)

#### Operasi CRUD - Delete (Hapus Data)
![C++ Delete](documentations/delete-cpp.png)

Program C++ menggunakan vector<Elektronik> untuk menyimpan objects. Interface console dengan menu yang user-friendly dan validasi input menggunakan while loop.

### 4. PHP Web Output

#### Operasi CRUD - Create (Tambah Data)
![PHP Create](documentations/create-php.png)

#### Operasi CRUD - Read (Tampilkan Data)
![PHP Read](documentations/read-php.png)

#### Operasi CRUD - Update (Edit Data)
![PHP Edit](documentations/edit-php.png)

#### Operasi CRUD - Delete (Hapus Data)
![PHP Delete](documentations/delete-php.png)

#### Update Data Berhasil
![PHP Update](documentations/update-php.png)

Program PHP Web menampilkan interface HTML dengan form input dan table output. Menggunakan session untuk menyimpan array of objects. Features:
- HTML form untuk input data baru
- HTML table untuk menampilkan semua objects
- Button edit/hapus per item dengan JavaScript
- Form edit yang muncul dynamically
- Server-side validation dan error handling
