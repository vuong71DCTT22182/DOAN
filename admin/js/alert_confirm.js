function confirmDelete(id, path) {
  var isConfirmed = confirm('Bạn có chắc chắn muốn xóa không?');
  if (isConfirmed) {
    // Nếu xác nhận, chuyển hướng đến trang xử lý xóa
    window.location.href = `${path}=${id}`; // Thay thế "confirm_delete.php" bằng đường dẫn đến trang xử lý xóa
  }
}
