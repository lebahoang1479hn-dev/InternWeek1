<?php
namespace Praticeday1;
// Lớp SinhVien đại diện cho một sinh viên với tên và điểm
class SinhVien {
    public $ten; // 
    public $diem; //

    // Hàm tạo lớp SinhVien
    public function  __construct($ten, $diem) { //__construct được tự động gọi khi  tạo một đối tượng từ lớp. Nó dùng để khởi tạo các thuộc tính của đối tượng và thực hiện các thiết lập cần thiết cho đối tượng khi nó được tạo ra.
        $this->ten = $ten;   
        $this->diem = $diem; 
    }
}

// Lớp QuanLySinhVien
class QuanLySinhVien {
    private $dsSinhVien = array(); // Mảng lưu trữ ds sinh viên

    // Thêm sinh viên mới vào danh sách
    public function themSinhVien($ten, $diem) {
        $sinhVien = new SinhVien($ten, $diem); // Tạo đối tượng SinhVien mới
        $this->dsSinhVien[] = $sinhVien;       // Thêm đối tượng vào danh sách
    }

    // Hiển thị danh sách sinh viên
    public function hienThiDanhSach() {
        echo "Danh sách sinh viên:<br>"; 
        foreach ($this->dsSinhVien as $sinhVien) {
            echo "Tên: " . $sinhVien->ten . ", Điểm: " . $sinhVien->diem . "<br>"; // Hiển thị thông tin từng sinh viên
        }
    }

    // Tính điểm trung bình của tất cả sinh viên
    public function tinhDiemTrungBinh() {
        $tongDiem = 0; // Biến lưu tổng điểm
        $soLuongSinhVien = count($this->dsSinhVien); // Số lượng sinh viên

        foreach ($this->dsSinhVien as $sinhVien) {
            $tongDiem += $sinhVien->diem; // Cộng điểm từng sinh viên vào tổng điểm
        }

        if ($soLuongSinhVien > 0) {
            $diemTrungBinh = $tongDiem / $soLuongSinhVien; // Tính điểm trung bình
            echo "Điểm trung bình của các sinh viên là: $diemTrungBinh<br>"; 
        } else {
            echo "Không có sinh viên nào trong danh sách.<br>"; 
        }
    }

    // Tìm sinh viên có điểm cao nhất
    public function timSinhVienDiemCaoNhat() {
        $diemCaoNhat = -1; // Khởi tạo điểm cao nhất thấp hơn điểm có thể có
        $tenSVDiemCaoNhat = ""; // Khởi tạo tên sinh viên có điểm cao nhất

        foreach ($this->dsSinhVien as $sinhVien) {
            if ($sinhVien->diem > $diemCaoNhat) {
                $diemCaoNhat = $sinhVien->diem; // Cập nhật điểm cao nhất
                $tenSVDiemCaoNhat = $sinhVien->ten; // Cập nhật tên sinh viên có điểm cao nhất
            }
        }

        echo "Sinh viên có điểm cao nhất là: $tenSVDiemCaoNhat với điểm $diemCaoNhat<br>";
    }

    // Tìm sinh viên có điểm thấp nhất
    public function timSinhVienDiemThapNhat() {
        $diemThapNhat = 100; // Khởi tạo điểm thấp nhất lớn hơn điểm có thể có
        $tenSVDiemThapNhat = ""; // Khởi tạo tên sinh viên có điểm thấp nhất

        foreach ($this->dsSinhVien as $sinhVien) {
            if ($sinhVien->diem < $diemThapNhat) {
                $diemThapNhat = $sinhVien->diem; // Cập nhật điểm thấp nhất
                $tenSVDiemThapNhat = $sinhVien->ten; // Cập nhật tên sinh viên có điểm thấp nhất
            }
        }

        echo "Sinh viên có điểm thấp nhất là: $tenSVDiemThapNhat với điểm $diemThapNhat<br>"; 
    }
}

// Tạo đối tượng quản lý sinh viên
$quanLySinhVien = new QuanLySinhVien();

// Thêm một số sinh viên để kiểm tra
$quanLySinhVien->themSinhVien("Nguyễn Văn A", 9);
$quanLySinhVien->themSinhVien("Nguyễn Văn B", 7.5);
$quanLySinhVien->themSinhVien("Nguyễn Văn C", 6);
$quanLySinhVien->themSinhVien("Nguyễn Văn D", 8.5);
$quanLySinhVien->themSinhVien("Lê Văn A", 9.5);
$quanLySinhVien->themSinhVien("Lê Văn B", 8);
$quanLySinhVien->themSinhVien("Lê Văn C", 6.5);
$quanLySinhVien->themSinhVien("Lê Văn D", 9);

// Hiển thị danh sách sinh viên
$quanLySinhVien->hienThiDanhSach();

// Tìm sinh viên có điểm cao nhất
$quanLySinhVien->timSinhVienDiemCaoNhat();

// Tìm sinh viên có điểm thấp nhất
$quanLySinhVien->timSinhVienDiemThapNhat();

// Tính điểm trung bình
$quanLySinhVien->tinhDiemTrungBinh();
?>
