# Class Elektronik dengan 4 atribut
class Elektronik:
    def __init__(self, nama, merk, harga, stok):
        self.__nama = nama      # private attribute
        self.__merk = merk      # private attribute
        self.__harga = harga    # private attribute
        self.__stok = stok      # private attribute
    
    # Getter methods
    def get_nama(self):
        return self.__nama
    
    def get_merk(self):
        return self.__merk
    
    def get_harga(self):
        return self.__harga
    
    def get_stok(self):
        return self.__stok
    
    # Setter methods
    def set_nama(self, nama):
        self.__nama = nama
    
    def set_merk(self, merk):
        self.__merk = merk
    
    def set_harga(self, harga):
        self.__harga = harga
    
    def set_stok(self, stok):
        self.__stok = stok
    
    # Method untuk menampilkan informasi elektronik
    def tampilkan_info(self):
        print(f"{self.__nama:<15} {self.__merk:<15} Rp {self.__harga:>10,.0f} {self.__stok:>8}")


class TokoElektronik:
    def __init__(self):
        self.daftar_elektronik = []
        self.tambah_data_awal()
    
    def tambah_data_awal(self):
        """Menambahkan beberapa data elektronik awal"""
        self.daftar_elektronik.append(Elektronik("Laptop Gaming", "ASUS", 15000000, 5))
        self.daftar_elektronik.append(Elektronik("Smartphone", "Samsung", 8000000, 10))
        self.daftar_elektronik.append(Elektronik("Smart TV", "LG", 12000000, 3))
        self.daftar_elektronik.append(Elektronik("Headphone", "Sony", 2500000, 15))
    
    def tampilkan_menu(self):
        print("\n" + "=" * 50)
        print("           SISTEM TOKO ELEKTRONIK")
        print("=" * 50)
        print("1. Tambah Elektronik")
        print("2. Tampilkan Semua Elektronik")
        print("3. Edit Elektronik")
        print("4. Hapus Elektronik")
        print("5. Keluar")
        print("=" * 50)
    
    def tambah_elektronik(self):
        print("\n--- TAMBAH ELEKTRONIK BARU ---")
        
        nama = input("Nama Elektronik: ")
        merk = input("Merk: ")
        
        while True:
            try:
                harga = float(input("Harga: "))
                if harga >= 0:
                    break
                else:
                    print("Harga harus positif!")
            except ValueError:
                print("Harga harus berupa angka!")
        
        while True:
            try:
                stok = int(input("Stok: "))
                if stok >= 0:
                    break
                else:
                    print("Stok tidak boleh negatif!")
            except ValueError:
                print("Stok harus berupa angka!")
        
        elektronik_baru = Elektronik(nama, merk, harga, stok)
        self.daftar_elektronik.append(elektronik_baru)
        
        print("Elektronik berhasil ditambahkan!")
    
    def tampilkan_semua_elektronik(self):
        print("\n--- DAFTAR SEMUA ELEKTRONIK ---")
        
        if not self.daftar_elektronik:
            print("Tidak ada data elektronik.")
            return False
        
        print("No  Nama            Merk            Harga          Stok")
        print("-" * 65)
        
        for i, elektronik in enumerate(self.daftar_elektronik, 1):
            print(f"{i:<4}", end="")
            elektronik.tampilkan_info()
        
        print("-" * 65)
        print(f"Total item: {len(self.daftar_elektronik)}")
        return True
    
    def edit_elektronik(self):
        if not self.tampilkan_semua_elektronik():
            return
        
        while True:
            try:
                nomor = int(input(f"\nPilih nomor elektronik yang akan diedit (1-{len(self.daftar_elektronik)}): "))
                if 1 <= nomor <= len(self.daftar_elektronik):
                    break
                else:
                    print("Nomor tidak valid!")
            except ValueError:
                print("Masukkan nomor yang valid!")
        
        elektronik = self.daftar_elektronik[nomor - 1]
        
        print("\n--- EDIT ELEKTRONIK ---")
        print("Data saat ini:")
        print(f"1. Nama: {elektronik.get_nama()}")
        print(f"2. Merk: {elektronik.get_merk()}")
        print(f"3. Harga: Rp {elektronik.get_harga():,.0f}")
        print(f"4. Stok: {elektronik.get_stok()}")
        
        nama = input("\nMasukkan nama baru (Enter untuk tidak mengubah): ")
        if nama.strip():
            elektronik.set_nama(nama)
        
        merk = input("Masukkan merk baru (Enter untuk tidak mengubah): ")
        if merk.strip():
            elektronik.set_merk(merk)
        
        harga_input = input("Masukkan harga baru (Enter untuk tidak mengubah): ")
        if harga_input.strip():
            try:
                harga = float(harga_input)
                if harga >= 0:
                    elektronik.set_harga(harga)
                else:
                    print("Harga tidak valid, tidak diubah.")
            except ValueError:
                print("Format harga tidak valid, tidak diubah.")
        
        stok_input = input("Masukkan stok baru (Enter untuk tidak mengubah): ")
        if stok_input.strip():
            try:
                stok = int(stok_input)
                if stok >= 0:
                    elektronik.set_stok(stok)
                else:
                    print("Stok tidak valid, tidak diubah.")
            except ValueError:
                print("Format stok tidak valid, tidak diubah.")
        
        print("Data elektronik berhasil diupdate!")
    
    def hapus_elektronik(self):
        if not self.tampilkan_semua_elektronik():
            return
        
        while True:
            try:
                nomor = int(input(f"\nPilih nomor elektronik yang akan dihapus (1-{len(self.daftar_elektronik)}): "))
                if 1 <= nomor <= len(self.daftar_elektronik):
                    break
                else:
                    print("Nomor tidak valid!")
            except ValueError:
                print("Masukkan nomor yang valid!")
        
        elektronik = self.daftar_elektronik[nomor - 1]
        konfirmasi = input(f"Yakin ingin menghapus '{elektronik.get_nama()} {elektronik.get_merk()}'? (y/n): ")
        
        if konfirmasi.lower() == 'y':
            self.daftar_elektronik.remove(elektronik)
            print("Elektronik berhasil dihapus!")
        else:
            print("Penghapusan dibatalkan.")
    
    def jalankan(self):
        while True:
            self.tampilkan_menu()
            
            try:
                pilihan = int(input("Pilih menu (1-5): "))
            except ValueError:
                print("Pilihan harus berupa angka!")
                input("\nTekan Enter untuk melanjutkan...")
                continue
            
            if pilihan == 1:
                self.tambah_elektronik()
            elif pilihan == 2:
                self.tampilkan_semua_elektronik()
            elif pilihan == 3:
                self.edit_elektronik()
            elif pilihan == 4:
                self.hapus_elektronik()
            elif pilihan == 5:
                print("Terima kasih telah menggunakan program Toko Elektronik!")
                break
            else:
                print("Pilihan tidak valid!")
            
            if pilihan != 5:
                input("\nTekan Enter untuk melanjutkan...")


# Program utama
if __name__ == "__main__":
    toko = TokoElektronik()
    toko.jalankan()