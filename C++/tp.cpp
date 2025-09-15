#include <iostream>
#include <vector>
#include <string>
#include <iomanip>
#include <limits>

using namespace std;

// Class Elektronik dengan 4 atribut
class Elektronik {
private:
    string nama;
    string merk;
    double harga;
    int stok;

public:
    // Constructor
    Elektronik(string nama, string merk, double harga, int stok) {
        this->nama = nama;
        this->merk = merk;
        this->harga = harga;
        this->stok = stok;
    }
    
    // Getter methods
    string getNama() const {
        return nama;
    }
    
    string getMerk() const {
        return merk;
    }
    
    double getHarga() const {
        return harga;
    }
    
    int getStok() const {
        return stok;
    }
    
    // Setter methods
    void setNama(string nama) {
        this->nama = nama;
    }
    
    void setMerk(string merk) {
        this->merk = merk;
    }
    
    void setHarga(double harga) {
        this->harga = harga;
    }
    
    void setStok(int stok) {
        this->stok = stok;
    }
    
    // Method untuk menampilkan informasi elektronik
    void tampilkanInfo() const {
        cout << left << setw(15) << nama 
             << setw(15) << merk 
             << "Rp " << right << setw(10) << fixed << setprecision(0) << harga
             << setw(8) << stok << endl;
    }
};

// Class untuk mengelola toko elektronik
class TokoElektronik {
private:
    vector<Elektronik> daftarElektronik;
    
public:
    // Constructor
    TokoElektronik() {
        tambahDataAwal();
    }
    
    void tambahDataAwal() {
        daftarElektronik.push_back(Elektronik("Laptop Gaming", "ASUS", 15000000, 5));
        daftarElektronik.push_back(Elektronik("Smartphone", "Samsung", 8000000, 10));
        daftarElektronik.push_back(Elektronik("Smart TV", "LG", 12000000, 3));
        daftarElektronik.push_back(Elektronik("Headphone", "Sony", 2500000, 15));
    }
    
    void tampilkanMenu() {
        cout << "\n" << string(50, '=') << endl;
        cout << "           SISTEM TOKO ELEKTRONIK" << endl;
        cout << string(50, '=') << endl;
        cout << "1. Tambah Elektronik" << endl;
        cout << "2. Tampilkan Semua Elektronik" << endl;
        cout << "3. Edit Elektronik" << endl;
        cout << "4. Hapus Elektronik" << endl;
        cout << "5. Keluar" << endl;
        cout << string(50, '=') << endl;
    }
    
    void tambahElektronik() {
        cout << "\n--- TAMBAH ELEKTRONIK BARU ---" << endl;
        
        cin.ignore(); // Clear input buffer
        
        string nama, merk;
        double harga;
        int stok;
        
        cout << "Nama Elektronik: ";
        getline(cin, nama);
        
        cout << "Merk: ";
        getline(cin, merk);
        
        cout << "Harga: ";
        while (!(cin >> harga) || harga < 0) {
            cout << "Masukkan harga yang valid (positif): ";
            cin.clear();
            cin.ignore(numeric_limits<streamsize>::max(), '\n');
        }
        
        cout << "Stok: ";
        while (!(cin >> stok) || stok < 0) {
            cout << "Masukkan stok yang valid (tidak negatif): ";
            cin.clear();
            cin.ignore(numeric_limits<streamsize>::max(), '\n');
        }
        
        Elektronik elektronikBaru(nama, merk, harga, stok);
        daftarElektronik.push_back(elektronikBaru);
        
        cout << "Elektronik berhasil ditambahkan!" << endl;
    }
    
    bool tampilkanSemuaElektronik() {
        cout << "\n--- DAFTAR SEMUA ELEKTRONIK ---" << endl;
        
        if (daftarElektronik.empty()) {
            cout << "Tidak ada data elektronik." << endl;
            return false;
        }
        
        cout << "No  " << left << setw(15) << "Nama" 
             << setw(15) << "Merk" 
             << setw(15) << "Harga"
             << "Stok" << endl;
        cout << string(65, '-') << endl;
        
        for (size_t i = 0; i < daftarElektronik.size(); i++) {
            cout << left << setw(4) << (i + 1);
            daftarElektronik[i].tampilkanInfo();
        }
        
        cout << string(65, '-') << endl;
        cout << "Total item: " << daftarElektronik.size() << endl;
        return true;
    }
    
    void editElektronik() {
        if (!tampilkanSemuaElektronik()) {
            return;
        }
        
        int nomor;
        cout << "\nPilih nomor elektronik yang akan diedit (1-" 
             << daftarElektronik.size() << "): ";
        
        while (!(cin >> nomor) || nomor < 1 || nomor > (int)daftarElektronik.size()) {
            cout << "Nomor tidak valid! Masukkan nomor 1-" 
                 << daftarElektronik.size() << ": ";
            cin.clear();
            cin.ignore(numeric_limits<streamsize>::max(), '\n');
        }
        
        cin.ignore(); // Clear input buffer
        
        Elektronik& elektronik = daftarElektronik[nomor - 1];
        
        cout << "\n--- EDIT ELEKTRONIK ---" << endl;
        cout << "Data saat ini:" << endl;
        cout << "1. Nama: " << elektronik.getNama() << endl;
        cout << "2. Merk: " << elektronik.getMerk() << endl;
        cout << "3. Harga: Rp " << fixed << setprecision(0) << elektronik.getHarga() << endl;
        cout << "4. Stok: " << elektronik.getStok() << endl;
        
        string input;
        cout << "\nMasukkan nama baru (Enter untuk tidak mengubah): ";
        getline(cin, input);
        if (!input.empty()) {
            elektronik.setNama(input);
        }
        
        cout << "Masukkan merk baru (Enter untuk tidak mengubah): ";
        getline(cin, input);
        if (!input.empty()) {
            elektronik.setMerk(input);
        }
        
        cout << "Masukkan harga baru (0 untuk tidak mengubah): ";
        double harga;
        if (cin >> harga && harga > 0) {
            elektronik.setHarga(harga);
        }
        
        cout << "Masukkan stok baru (-1 untuk tidak mengubah): ";
        int stok;
        if (cin >> stok && stok >= 0) {
            elektronik.setStok(stok);
        }
        
        cout << "Data elektronik berhasil diupdate!" << endl;
    }
    
    void hapusElektronik() {
        if (!tampilkanSemuaElektronik()) {
            return;
        }
        
        int nomor;
        cout << "\nPilih nomor elektronik yang akan dihapus (1-" 
             << daftarElektronik.size() << "): ";
        
        while (!(cin >> nomor) || nomor < 1 || nomor > (int)daftarElektronik.size()) {
            cout << "Nomor tidak valid! Masukkan nomor 1-" 
                 << daftarElektronik.size() << ": ";
            cin.clear();
            cin.ignore(numeric_limits<streamsize>::max(), '\n');
        }
        
        cin.ignore(); // Clear input buffer
        
        Elektronik& elektronik = daftarElektronik[nomor - 1];
        cout << "Yakin ingin menghapus '" << elektronik.getNama() 
             << " " << elektronik.getMerk() << "'? (y/n): ";
        
        string konfirmasi;
        getline(cin, konfirmasi);
        
        if (konfirmasi == "y" || konfirmasi == "Y") {
            daftarElektronik.erase(daftarElektronik.begin() + nomor - 1);
            cout << "Elektronik berhasil dihapus!" << endl;
        } else {
            cout << "Penghapusan dibatalkan." << endl;
        }
    }
    
    void jalankan() {
        int pilihan;
        
        do {
            tampilkanMenu();
            cout << "Pilih menu (1-5): ";
            
            while (!(cin >> pilihan) || pilihan < 1 || pilihan > 5) {
                cout << "Pilihan tidak valid! Masukkan angka 1-5: ";
                cin.clear();
                cin.ignore(numeric_limits<streamsize>::max(), '\n');
            }
            
            switch (pilihan) {
                case 1:
                    tambahElektronik();
                    break;
                case 2:
                    tampilkanSemuaElektronik();
                    break;
                case 3:
                    editElektronik();
                    break;
                case 4:
                    hapusElektronik();
                    break;
                case 5:
                    cout << "Terima kasih telah menggunakan program Toko Elektronik!" << endl;
                    break;
            }
            
            if (pilihan != 5) {
                cout << "\nTekan Enter untuk melanjutkan...";
                cin.ignore();
                cin.get();
            }
        } while (pilihan != 5);
    }
};

// Program utama
int main() {
    TokoElektronik toko;
    toko.jalankan();
    
    return 0;
}