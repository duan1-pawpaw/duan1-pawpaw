<script type="text/javascript" src="../assets/js/jquery/jquery.min.js"></script>
<script type="text/javascript" src="../assets/js/jquery-ui/jquery-ui.min.js"></script>
<script type="text/javascript" src="../assets/js/popper.js/popper.min.js"></script>
<script type="text/javascript" src="../assets/js/bootstrap/js/bootstrap.min.js"></script>
<!-- jquery slimscroll js -->
<script type="text/javascript" src="../assets/js/jquery-slimscroll/jquery.slimscroll.js"></script>
<!-- modernizr js -->
<script type="text/javascript" src="../assets/js/modernizr/modernizr.js"></script>
<script type="text/javascript" src="../assets/js/modernizr/css-scrollbars.js"></script>
<!-- classie js -->
<script type="text/javascript" src="../assets/js/classie/classie.js"></script>
<!-- Custom js -->
<script type="text/javascript" src="../assets/js/script.js"></script>
<script src="../assets/js/pcoded.min.js"></script>
<script src="../assets/js/demo-12.js"></script>
<script src="../assets/js/jquery.mCustomScrollbar.concat.min.js"></script>

</body>
<script>
    const img = document.querySelector('#img');
    const input = document.querySelector('#input');

    input.addEventListener("change", () => {
        img.src = URL.createObjectURL(input.files[0])
    })
</script>
<script>
    // Lắng nghe sự kiện input khi người dùng gõ trong ô tìm kiếm
    document.getElementById('searchProduct').addEventListener('input', function() {
        // Lấy giá trị từ ô tìm kiếm và chuyển thành chữ thường để tìm kiếm không phân biệt hoa/thường
        const query = this.value.toLowerCase();
        
        // Lấy tất cả các dòng trong bảng
        const rows = document.querySelectorAll('#example1 tbody tr');
        
        // Lặp qua tất cả các dòng để kiểm tra tên sản phẩm có chứa từ khóa tìm kiếm không
        rows.forEach(row => {
            const productName = row.cells[1].textContent.toLowerCase(); // Lấy tên sản phẩm từ cột thứ 2
            if (productName.includes(query)) {
                row.style.display = ''; // Hiển thị dòng nếu tên sản phẩm chứa từ khóa tìm kiếm
            } else {
                row.style.display = 'none'; // Ẩn dòng nếu không chứa từ khóa
            }
        });
    });
</script>
<script src="../assets/tinymce/tinymce.min.js" referrerpolicy="origin"></script>
<script>
    tinymce.init({
        selector: '#content',
        plugins: 'image link lists',
        toolbar: 'undo redo | formatselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
        menubar: false
    });
</script>
</html>