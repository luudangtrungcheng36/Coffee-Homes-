function createCarousel(containerClass, productClass, buttonLeftClass, buttonRightClass) {
    const listproduct = document.querySelector(containerClass);
    const imgProducts = document.querySelectorAll(productClass);
    const length = imgProducts.length;

    if(length < 4) {
        return;
    }

    let current = 0;
    let isAnimating = false; // Biến để kiểm tra xem chuyển động có đang diễn ra hay không

    const btnLeft = document.querySelector(buttonLeftClass);
    const btnRight = document.querySelector(buttonRightClass);

    // Sao chép các phần tử ban đầu và thêm vào cuối danh sách
    for (let i = 0; i < 4; i++) {
        const clone = imgProducts[i].cloneNode(true);
        listproduct.appendChild(clone);
    }
    
    const handleChangeproduct = () => {
        if (isAnimating) return; // Nếu chuyển động đang diễn ra, không cho phép chuyển động mới
        isAnimating = true; // Bắt đầu chuyển động

        current++;
        let width = imgProducts[0].offsetWidth;
        listproduct.style.transition = 'transform 0.5s';
        listproduct.style.transform = `translateX(${width * -1 * current - 30 * current}px)`;

        // Nếu đã đi qua tất cả các phần tử, chuyển đến phần tử đầu tiên
        if (current == length) {
            setTimeout(() => {
                listproduct.style.transition = 'none';
                listproduct.style.transform = 'translateX(0px)';
                current = 0;
                isAnimating = false; // Kết thúc chuyển động
            }, 500); // Đợi cho hoàn thành transition trước khi reset
        } else {
            setTimeout(() => {
                isAnimating = false; // Kết thúc chuyển động
            }, 500); // Đợi cho hoàn thành transition trước khi cho phép chuyển động mới
        }
    };

    let handleEvent = setInterval(handleChangeproduct, 4000);

    btnRight.addEventListener('click', () => {
        clearInterval(handleEvent);
        handleChangeproduct();
        handleEvent = setInterval(handleChangeproduct, 4000);
    });

    btnLeft.addEventListener('click', () => {
        if (isAnimating) return; // Nếu chuyển động đang diễn ra, không cho phép chuyển động mới
        clearInterval(handleEvent);
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
                isAnimating = false; // Kết thúc chuyển động
            }, 50); // Đợi một khoảng thời gian ngắn trước khi chuyển lại để tránh hiện tượng giật
        } else {
            listproduct.style.transition = 'transform 0.5s';
            listproduct.style.transform = `translateX(${width * -1 * current - 30 * current}px)`;
            isAnimating = false; // Kết thúc chuyển động
        }
        handleEvent = setInterval(handleChangeproduct, 4000);
    });
}

document.addEventListener("DOMContentLoaded", function() {
    createCarousel('.list-product1', '.imgProduct1', '.btn-left1', '.btn-right1');
    createCarousel('.list-product2', '.imgProduct2', '.btn-left2', '.btn-right2');

});
