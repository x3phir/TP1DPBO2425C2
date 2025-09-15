import java.util.*;

// Class Elektronik dengan 4 atribut
class Elektronik {
    private String nama;
    private String merk;
    private double harga;
    private int stok;
    
    // Constructor
    public Elektronik(String nama, String merk, double harga, int stok) {
        this.nama = nama;
        this.merk = merk;
        this.harga = harga;
        this.stok = stok;
    }
    
    // Getter methods
    public String getNama() {
        return nama;
    }
    
    public String getMerk() {
        return merk;
    }
    
    public double getHarga() {
        return harga;
    }
    
    public int getStok() {
        return stok;
    }
    
    // Setter methods
    public void setNama(String nama) {
        this.nama = nama;
    }
    
    public void setMerk(String merk) {
        this.merk = merk;
    }
    
    public void setHarga(double harga) {
        this.harga = harga;
    }
    
    public void setStok(int stok) {
        this.stok = stok;
    }
    
    // Method untuk menampilkan informasi elektronik
    public void tampilkanInfo() {
        System.out.printf("%-15s %-15s Rp %,.0f %10d%n", 
                         nama, merk, harga, stok);
    }
}

// Class utama untuk mengelola toko elektronik
public class TokoElektronik {
    private static ArrayList<Elektronik> daftarElektronik = new ArrayList<>();
    private static Scanner scanner = new Scanner(System.in);
    
    public static void main(String[] args) {
        // Menambahkan beberapa data awal
        tambahDataAwal();
        
        int pilihan;
        do {
            tampilkanMenu();
            System.out.print("Pilih menu (1-5): ");
            pilihan = scanner.nextInt();
            scanner.nextLine(); // consume newline
            
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
                    System.out.println("Terima kasih telah menggunakan program Toko Elektronik!");
                    break;
                default:
                    System.out.println("Pilihan tidak valid!");
            }
            
            if (pilihan != 5) {
                System.out.println("\nTekan Enter untuk melanjutkan...");
                scanner.nextLine();
            }
        } while (pilihan != 5);
    }
    
    private static void tampilkanMenu() {
        System.out.println("\n" + "=".repeat(50));
        System.out.println("           SISTEM TOKO ELEKTRONIK");
        System.out.println("=".repeat(50));
        System.out.println("1. Tambah Elektronik");
        System.out.println("2. Tampilkan Semua Elektronik");
        System.out.println("3. Edit Elektronik");
        System.out.println("4. Hapus Elektronik");
        System.out.println("5. Keluar");
        System.out.println("=".repeat(50));
    }
    
    private static void tambahDataAwal() {
        daftarElektronik.add(new Elektronik("Laptop Gaming", "ASUS", 15000000, 5));
        daftarElektronik.add(new Elektronik("Smartphone", "Samsung", 8000000, 10));
        daftarElektronik.add(new Elektronik("Smart TV", "LG", 12000000, 3));
        daftarElektronik.add(new Elektronik("Headphone", "Sony", 2500000, 15));
    }
    
    private static void tambahElektronik() {
        System.out.println("\n--- TAMBAH ELEKTRONIK BARU ---");
        
        System.out.print("Nama Elektronik: ");
        String nama = scanner.nextLine();
        
        System.out.print("Merk: ");
        String merk = scanner.nextLine();
        
        System.out.print("Harga: ");
        double harga = scanner.nextDouble();
        
        System.out.print("Stok: ");
        int stok = scanner.nextInt();
        
        Elektronik elektronikBaru = new Elektronik(nama, merk, harga, stok);
        daftarElektronik.add(elektronikBaru);
        
        System.out.println("Elektronik berhasil ditambahkan!");
    }
    
    private static void tampilkanSemuaElektronik() {
        System.out.println("\n--- DAFTAR SEMUA ELEKTRONIK ---");
        
        if (daftarElektronik.isEmpty()) {
            System.out.println("Tidak ada data elektronik.");
            return;
        }
        
        System.out.println("No  Nama            Merk            Harga          Stok");
        System.out.println("-".repeat(65));
        
        for (int i = 0; i < daftarElektronik.size(); i++) {
            System.out.printf("%-4d", (i + 1));
            daftarElektronik.get(i).tampilkanInfo();
        }
        
        System.out.println("-".repeat(65));
        System.out.println("Total item: " + daftarElektronik.size());
    }
    
    private static void editElektronik() {
        tampilkanSemuaElektronik();
        
        if (daftarElektronik.isEmpty()) {
            return;
        }
        
        System.out.print("\nPilih nomor elektronik yang akan diedit (1-" + 
                        daftarElektronik.size() + "): ");
        int nomor = scanner.nextInt();
        scanner.nextLine();
        
        if (nomor < 1 || nomor > daftarElektronik.size()) {
            System.out.println("Nomor tidak valid!");
            return;
        }
        
        Elektronik elektronik = daftarElektronik.get(nomor - 1);
        
        System.out.println("\n--- EDIT ELEKTRONIK ---");
        System.out.println("Data saat ini:");
        System.out.printf("1. Nama: %s%n", elektronik.getNama());
        System.out.printf("2. Merk: %s%n", elektronik.getMerk());
        System.out.printf("3. Harga: Rp %,.0f%n", elektronik.getHarga());
        System.out.printf("4. Stok: %d%n", elektronik.getStok());
        
        System.out.print("\nMasukkan nama baru (Enter untuk tidak mengubah): ");
        String nama = scanner.nextLine();
        if (!nama.trim().isEmpty()) {
            elektronik.setNama(nama);
        }
        
        System.out.print("Masukkan merk baru (Enter untuk tidak mengubah): ");
        String merk = scanner.nextLine();
        if (!merk.trim().isEmpty()) {
            elektronik.setMerk(merk);
        }
        
        System.out.print("Masukkan harga baru (0 untuk tidak mengubah): ");
        double harga = scanner.nextDouble();
        if (harga > 0) {
            elektronik.setHarga(harga);
        }
        
        System.out.print("Masukkan stok baru (-1 untuk tidak mengubah): ");
        int stok = scanner.nextInt();
        if (stok >= 0) {
            elektronik.setStok(stok);
        }
        
        System.out.println("Data elektronik berhasil diupdate!");
    }
    
    private static void hapusElektronik() {
        tampilkanSemuaElektronik();
        
        if (daftarElektronik.isEmpty()) {
            return;
        }
        
        System.out.print("\nPilih nomor elektronik yang akan dihapus (1-" + 
                        daftarElektronik.size() + "): ");
        int nomor = scanner.nextInt();
        
        if (nomor < 1 || nomor > daftarElektronik.size()) {
            System.out.println("Nomor tidak valid!");
            return;
        }
        
        Elektronik elektronik = daftarElektronik.get(nomor - 1);
        System.out.printf("Yakin ingin menghapus '%s %s'? (y/n): ", 
                         elektronik.getNama(), elektronik.getMerk());
        scanner.nextLine(); // consume newline
        String konfirmasi = scanner.nextLine();
        
        if (konfirmasi.toLowerCase().equals("y")) {
            daftarElektronik.remove(nomor - 1);
            System.out.println("Elektronik berhasil dihapus!");
        } else {
            System.out.println("Penghapusan dibatalkan.");
        }
    }
}