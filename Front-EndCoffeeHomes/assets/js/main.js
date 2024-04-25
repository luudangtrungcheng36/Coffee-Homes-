document.addEventListener("DOMContentLoaded", function() {
    const listproduct = document.querySelector('.list-product');
    const imgProducts = document.querySelectorAll('.imgProduct');
    const length = imgProducts.length;
    let current = 0;

    const btnLeft = document.querySelector('.btn-left')
    const btnRight = document.querySelector('.btn-right')



    // Sao chép các phần tử ban đầu và thêm vào cuối danh sách
    for (let i = 0; i < 4; i++) {
        const clone = imgProducts[i].cloneNode(true);
        listproduct.appendChild(clone);
    }
    
    const handleChangeproduct = () => {
        current++;
        let width = imgProducts[0].offsetWidth;
        listproduct.style.transition = 'transform 0.5s';
        listproduct.style.transform = `translateX(${width * -1 * current - 30 * current}px)`

        // Nếu đã đi qua tất cả các phần tử, chuyển đến phần tử đầu tiên
        if (current == length) {
            setTimeout(() => {
                listproduct.style.transition = 'none';
                listproduct.style.transform = 'translateX(0px)';
                current = 0;
            }, 500); // Đợi cho hoàn thành transition trước khi reset
        }
    }

    let handleEvent = setInterval(handleChangeproduct, 4000);

    btnRight.addEventListener('click', () => {
        clearInterval(handleEvent)
        handleChangeproduct()
        handleEvent = setInterval(handleChangeproduct, 4000);
    })

    btnLeft.addEventListener('click', () => {
        clearInterval(handleEvent)
        current--; // Giảm chỉ số hiện tại
        let width = imgProducts[0].offsetWidth;
        if (current < 0) {
            current = length - 1; // Nếu chỉ số hiện tại nhỏ hơn 0, chuyển đến phần tử cuối cùng
            listproduct.style.transition = 'none'; // Tắt hiệu ứng chuyển động khi quay lại phần tử cuối cùng
            listproduct.style.transform = `translateX(${width * -1 * (length + 1)}px)`; // Dịch chuyển danh sách đến phần tử cuối cùng
            setTimeout(() => {
                current = length - 1; // Cập nhật chỉ số hiện tại
                listproduct.style.transition = 'transform 0.5s'; // Bật lại hiệu ứng chuyển động
                listproduct.style.transform = `translateX(${width * -1 * current - 30 * current}px)`; // Chuyển đến phần tử trước đó của danh sách gốc
            }, 50); // Đợi một khoảng thời gian ngắn trước khi chuyển lại để tránh hiện tượng giật
        } else {
            listproduct.style.transition = 'transform 0.5s';
            listproduct.style.transform = `translateX(${width * -1 * current - 30 * current}px)`;
        }
        handleEvent = setInterval(handleChangeproduct, 4000);
    });
});


