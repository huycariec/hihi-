<!--<button onclick="abc()">ssss</button>-->
<script>

    function confirmDeleTe(delUrl) {
        swal.fire({
            title: 'Bạn có muốn xóa không?',
            text: 'Hành động này sẽ không thể hoàn tác!',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Xóa'
        }).then((result) => {
            if (result.isConfirmed) {
                document.location = delUrl;
            }
        });
    }
</script>
<script src="../javascript/admin.js"></script>
</html>