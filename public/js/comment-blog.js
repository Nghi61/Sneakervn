$(document).ready(function() {
    function getCurrentDateTime() {
        var now = new Date();
        var year = now.getFullYear();
        var month = padZero(now.getMonth() + 1);
        var day = padZero(now.getDate());
        var hours = padZero(now.getHours());
        var minutes = padZero(now.getMinutes());
        var seconds = padZero(now.getSeconds());

        return year + '-' + month + '-' + day + ' ' + hours + ':' + minutes + ':' + seconds;
    }

    // Hàm để thêm số 0 vào trước các số dưới 10
    function padZero(number) {
        return (number < 10 ? '0' : '') + number;
    }
    // Xử lý sự kiện khi nút "Gửi bình luận" được nhấn
    $("#submitComment").click(function() {
        // Lấy nội dung bình luận từ ô textarea
        var commentContent = $("#commentText").val();
        var idUser = $("#id").val();
        var name = $("#name").val();
        var idBlog = $("#idBlog").val();
        // Kiểm tra xem người dùng đã nhập nội dung bình luận hay chưa
        if (commentContent.trim() === "") {
            alert("Vui lòng nhập nội dung bình luận.");
            return;
        }

        // Gửi dữ liệu bình luận lên máy chủ bằng Ajax
        $.ajax({
            url: commentBlogUrl,
            type: "POST",
            data: {
                comment: commentContent,
                idUser: idUser,
                idBlog: idBlog,
            },
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

            },

            success: function(response) {
                // Xử lý kết quả trả về từ máy chủ
                if (response === "success") {
                    // Nếu bình luận được đăng thành công, thêm nó vào khu vực hiển thị bình luận
                    var newComment =
                        '<div class="comment">' +
                        '<div class="comment-info row">' +
                        '<div class="col">' +
                        '<span class="comment-author">Tác giả: ' + name + '</span>' +
                        '</div>' +
                        '<div class="col text-end">' +
                        '<span class="comment-date">' + getCurrentDateTime() +
                        '</span>' +
                        '</div>' +
                        '</div>' +
                        '<div class="comment-content">' + commentContent + '</div>' +
                        '</div>';

                    $("#commentList").append(newComment);

                    // Xóa nội dung trong ô textarea sau khi bình luận được đăng
                    $("#commentText").val("");
                    var currentCount = parseInt("{{ $quantity }}");
                    currentCount++;
                    // Hiển thị giá trị mới của biến $dem
                    $("#quantity").text(currentCount);
                    // Hiển thị giá trị mới của biến $dem
                    $("#commentCount").text("Bình luận(" + currentCount + ")");
                } else {
                    alert("Đã xảy ra lỗi khi đăng bình luận. Vui lòng thử lại sau.");
                }
            },
            error: function() {
                alert("Đã xảy ra lỗi khi gửi yêu cầu. Vui lòng thử lại sau.");
            }
        });
    });
});
