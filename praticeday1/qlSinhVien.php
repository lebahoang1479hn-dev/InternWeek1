<?php
namespace Praticeday1;
// Mảng lưu trữ danh sách sinh viên
$dsSinhVien = array();

// Hàm thêm sinh viên
function themSV($ten, $diem) {
    global $dsSinhVien;
    $SinhVien = array("ten" => $ten, "diem" => $diem);
    $dsSinhVien[] = $SinhVien;
}

// Hàm hiển thị danh sách sinh viên
function hien_thi_danh_sach() {
    global $dsSinhVien;
    echo "Danh sách sinh viên:<br>";
    foreach ($dsSinhVien as $SinhVien) {
        echo "Tên: " . $SinhVien['ten'] . ", Điểm: " . $SinhVien['diem'] . "<br>";
    }
}

// Hàm tính điểm trung bình
function tinhTB() {
    global $dsSinhVien;
    $tongDiem = 0;
    $slSinhVien = count($dsSinhVien);
    
    foreach ($dsSinhVien as $SinhVien) {
        $tongDiem += $SinhVien['diem'];
    }
    
    if ($slSinhVien > 0) {
        $diem_trung_binh = $tongDiem / $slSinhVien;
        echo "Điểm trung bình của các sinh viên là: $diem_trung_binh<br>";
    } else {
        echo "Không có sinh viên nào trong danh sách.<br>";
    }
}

// Hàm tìm sinh viên có điểm cao nhất
function timSVDiemCaoNhat() {
    global $dsSinhVien;
    $diemCaoNhat = -1;
    $tenSVDiemCaoNhat = "";
    
    foreach ($dsSinhVien as $SinhVien) {
        if ($SinhVien['diem'] > $diemCaoNhat) {
            $diemCaoNhat = $SinhVien['diem'];
            $tenSVDiemCaoNhat = $SinhVien['ten'];
        }
    }
    
    echo "Sinh viên có điểm cao nhất là: $tenSVDiemCaoNhat với điểm $diemCaoNhat<br>";
}

// Hàm tìm sinh viên có điểm thấp nhất
function timSVDiemThapNhat() {
    global $dsSinhVien;
    $diemThapNhat = 100;
    $tenSVDiemThapNhat = "";
    
    foreach ($dsSinhVien as $SinhVien) {
        if ($SinhVien['diem'] < $diemThapNhat) {
            $diemThapNhat = $SinhVien['diem'];
            $tenSVDiemThapNhat = $SinhVien['ten'];
        }
    }
    
    echo "Sinh viên có điểm thấp nhất là: $tenSVDiemThapNhat với điểm $diemThapNhat<br>";
}

// Thêm một số sinh viên để kiểm tra
themSV("Nguyễn Văn A", 9);
themSV("Nguyễn Văn B", 7.5);
themSV("Nguyễn Văn C", 6);
themSV("Nguyễn Văn D", 8.5);
themSV("Lê Văn A", 9.5);
themSV("Lê Văn B", 8);
themSV("Lê Văn C", 6.5);
themSV("Lê Văn D", 9);

// Hiển thị danh sách sinh viên
hien_thi_danh_sach();

// Tìm sinh viên có điểm cao nhất
timSVDiemCaoNhat();

// Tìm sinh viên có điểm thấp nhất
timSVDiemThapNhat();

// Tính điểm trung bình
tinhTB();
?>
